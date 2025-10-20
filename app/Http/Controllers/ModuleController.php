<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Course;

class ModuleController extends Controller
{
    /**
     * Show the form for creating a new module.
     */
    public function create(Course $course)
    {
        return view('instructor.modules.create', compact('course'));
    }

    /**
     * Store a newly created module.
     */
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:1',
        ]);

        $module = $course->modules()->create([
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order ?? ($course->modules()->max('order') + 1),
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('instructor.courses.show', $course)
            ->with('success', 'Módulo criado com sucesso!');
    }

    /**
     * Show the form for editing a module.
     */
    public function edit(Course $course, Module $module)
    {
        return view('instructor.modules.edit', compact('course', 'module'));
    }

    /**
     * Update the specified module.
     */
    public function update(Request $request, Course $course, Module $module)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer|min:1',
        ]);

        $module->update([
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('instructor.courses.show', $course)
            ->with('success', 'Módulo atualizado com sucesso!');
    }

    /**
     * Remove the specified module.
     */
    public function destroy(Course $course, Module $module)
    {
        $module->delete();

        return redirect()->route('instructor.courses.show', $course)
            ->with('success', 'Módulo excluído com sucesso!');
    }
}
