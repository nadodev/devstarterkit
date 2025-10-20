<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = auth()->user()->courses()->with(['category'])->paginate(10);
        return view('instructor.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructor.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'level' => 'required|in:beginner,intermediate,advanced',
            'duration_hours' => 'required|integer|min:1',
            'price' => 'nullable|numeric|min:0',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'category_id', 'level', 'duration_hours', 'price']);
        $data['instructor_id'] = auth()->id();
        $data['is_published'] = false;

        // Handle image upload
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('courses', $filename, 'public');
            $data['cover_image'] = $path;
        }

        $course = Course::create($data);

        return redirect()->route('instructor.courses.show', $course)
            ->with('success', 'Curso criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course->load(['modules.lessons', 'category', 'enrollments']);
        return view('instructor.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('instructor.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'level' => 'required|in:beginner,intermediate,advanced',
            'duration_hours' => 'required|integer|min:1',
            'price' => 'nullable|numeric|min:0',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['title', 'description', 'category_id', 'level', 'duration_hours', 'price']);
        $data['is_published'] = $request->has('is_published');

        // Handle image upload
        if ($request->hasFile('cover_image')) {
            // Delete old image if exists
            if ($course->cover_image && Storage::disk('public')->exists($course->cover_image)) {
                Storage::disk('public')->delete($course->cover_image);
            }
            
            $image = $request->file('cover_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('courses', $filename, 'public');
            $data['cover_image'] = $path;
        }

        $course->update($data);

        return redirect()->route('instructor.courses.show', $course)
            ->with('success', 'Curso atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        // Delete image if exists
        if ($course->cover_image && Storage::disk('public')->exists($course->cover_image)) {
            Storage::disk('public')->delete($course->cover_image);
        }

        $course->delete();

        return redirect()->route('instructor.courses.index')
            ->with('success', 'Curso excluído com sucesso!');
    }
}
