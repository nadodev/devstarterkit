<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Progress;
use App\Models\User;
use App\Models\Lead;

class DashboardController extends Controller
{

    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        if ($user->isStudent()) {
            return $this->studentDashboard($user);
        } elseif ($user->isInstructor()) {
            return $this->instructorDashboard($user);
        } elseif ($user->isAdmin()) {
            return $this->adminDashboard($user);
        }

        return redirect()->route('home');
    }

    private function studentDashboard($user)
    {
        $enrollments = $user->enrollments()
            ->with(['course.category'])
            ->latest()
            ->get();

        // Calcular estatísticas
        $completedCourses = $enrollments->where('status', 'completed')->count();
        $certificatesCount = $user->certificates()->count();
        $totalHours = $enrollments->sum('course.duration_hours');
        
        // Calcular progresso geral
        $totalLessons = 0;
        $completedLessons = 0;
        
        foreach ($enrollments as $enrollment) {
            $courseLessons = $enrollment->course->lessons()->where('lessons.is_published', true)->count();
            $userCompleted = $user->progress()
                ->whereHas('lesson', function($query) use ($enrollment) {
                    $query->whereHas('module', function($q) use ($enrollment) {
                        $q->where('course_id', $enrollment->course_id);
                    });
                })
                ->where('is_completed', true)
                ->count();
            
            $totalLessons += $courseLessons;
            $completedLessons += $userCompleted;
            
            // Calcular progresso individual do curso
            $courseProgress = $courseLessons > 0 ? round(($userCompleted / $courseLessons) * 100, 1) : 0;
            
            // Debug: Log para verificar cálculo
            \Log::info("Course: {$enrollment->course->title}, Lessons: {$courseLessons}, Completed: {$userCompleted}, Progress: {$courseProgress}%");
            
            $enrollment->progress_percentage = $courseProgress;
        }
        
        $overallProgress = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100, 1) : 0;

        return view('student.dashboard', compact('enrollments', 'completedCourses', 'certificatesCount', 'totalHours', 'overallProgress'));
    }

    private function instructorDashboard($user)
    {
        $courses = $user->courses()
            ->with(['category'])
            ->latest()
            ->limit(5)
            ->get();

        $stats = [
            'total_courses' => $user->courses()->count(),
            'published_courses' => $user->courses()->where('is_published', true)->count(),
            'total_students' => $user->courses()->withCount('enrollments')->get()->sum('enrollments_count'),
            'total_earnings' => 0, // Implementar sistema de pagamento
        ];

        return view('dashboard.instructor', compact('courses', 'stats'));
    }

    private function adminDashboard($user)
    {
        $stats = [
            'total_courses' => Course::count(),
            'published_courses' => Course::where('is_published', true)->count(),
            'total_students' => User::where('role', 'student')->count(),
            'total_instructors' => User::where('role', 'instructor')->count(),
            'total_enrollments' => Enrollment::count(),
            'total_leads' => Lead::count(),
            'pending_leads' => Lead::pendingEmail()->count(),
            'sent_leads' => Lead::emailSent()->count(),
        ];

        $recentCourses = Course::with(['user', 'category'])
            ->latest()
            ->limit(5)
            ->get();

        return view('dashboard.admin', compact('stats', 'recentCourses'));
    }
}
