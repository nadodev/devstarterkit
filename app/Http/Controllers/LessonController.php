<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Module;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    /**
     * Show the form for creating a new lesson.
     */
    public function create(Course $course, Module $module)
    {
        return view('instructor.lessons.create', compact('course', 'module'));
    }

    /**
     * Store a newly created lesson.
     */
    public function store(Request $request, Course $course, Module $module)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'video_url' => 'nullable|url',
            'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,txt|max:10240',
            'duration_minutes' => 'nullable|integer|min:1',
            'order' => 'nullable|integer|min:1',
            'has_video' => 'boolean',
            'has_text' => 'boolean',
            'has_file' => 'boolean',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'video_url' => $request->video_url,
            'duration_minutes' => $request->duration_minutes,
            'order' => $request->order ?? ($module->lessons()->max('order') + 1),
            'is_published' => $request->has('is_published'),
            'is_free' => $request->has('is_free'),
            'has_video' => $request->has('has_video'),
            'has_text' => $request->has('has_text'),
            'has_file' => $request->has('has_file'),
        ];

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('lessons', $filename, 'public');
            $data['file_path'] = $path;
        }

        $lesson = $module->lessons()->create($data);

        return redirect()->route('instructor.courses.show', $course)
            ->with('success', 'Aula criada com sucesso!');
    }

    /**
     * Show the form for editing a lesson.
     */
    public function edit(Course $course, Module $module, Lesson $lesson)
    {
        return view('instructor.lessons.edit', compact('course', 'module', 'lesson'));
    }

    /**
     * Update the specified lesson.
     */
    public function update(Request $request, Course $course, Module $module, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'video_url' => 'nullable|url',
            'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,txt|max:10240',
            'duration_minutes' => 'nullable|integer|min:1',
            'order' => 'nullable|integer|min:1',
            'has_video' => 'boolean',
            'has_text' => 'boolean',
            'has_file' => 'boolean',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'video_url' => $request->video_url,
            'duration_minutes' => $request->duration_minutes,
            'order' => $request->order,
            'is_published' => $request->has('is_published'),
            'is_free' => $request->has('is_free'),
            'has_video' => $request->has('has_video'),
            'has_text' => $request->has('has_text'),
            'has_file' => $request->has('has_file'),
        ];

        // Handle file upload
        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($lesson->file_path && Storage::disk('public')->exists($lesson->file_path)) {
                Storage::disk('public')->delete($lesson->file_path);
            }
            
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('lessons', $filename, 'public');
            $data['file_path'] = $path;
        }

        $lesson->update($data);

        return redirect()->route('instructor.courses.show', $course)
            ->with('success', 'Aula atualizada com sucesso!');
    }

    /**
     * Remove the specified lesson.
     */
    public function destroy(Course $course, Module $module, Lesson $lesson)
    {
        // Delete file if exists
        if ($lesson->file_path && Storage::disk('public')->exists($lesson->file_path)) {
            Storage::disk('public')->delete($lesson->file_path);
        }

        $lesson->delete();

        return redirect()->route('instructor.courses.show', $course)
            ->with('success', 'Aula excluída com sucesso!');
    }

    /**
     * Download lesson file.
     */
    public function downloadFile(Lesson $lesson)
    {
        if (!$lesson->file_path || !Storage::disk('public')->exists($lesson->file_path)) {
            abort(404, 'Arquivo não encontrado');
        }

        return Storage::disk('public')->download($lesson->file_path);
    }
}
