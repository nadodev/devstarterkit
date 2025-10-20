<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{

    public function enroll(Course $course)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        // Verificar se o usuário já está inscrito
        $existingEnrollment = Enrollment::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->first();

        if ($existingEnrollment) {
            return redirect()->back()->with('error', 'Você já está inscrito neste curso!');
        }

        // Verificar se o usuário é estudante
        if (!$user->isStudent()) {
            return redirect()->back()->with('error', 'Apenas estudantes podem se inscrever em cursos!');
        }

        // Criar inscrição
        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'status' => 'active',
            'enrolled_at' => now(),
            'progress_percentage' => 0,
        ]);

        // Atualizar contador de estudantes do curso
        $course->increment('students_count');

        return redirect()->route('dashboard')->with('success', 'Inscrição realizada com sucesso!');
    }

    public function unenroll(Course $course)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        $enrollment = Enrollment::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->first();

        if (!$enrollment) {
            return redirect()->back()->with('error', 'Você não está inscrito neste curso!');
        }

        $enrollment->delete();

        // Atualizar contador de estudantes do curso
        $course->decrement('students_count');

        return redirect()->back()->with('success', 'Inscrição cancelada com sucesso!');
    }
}
