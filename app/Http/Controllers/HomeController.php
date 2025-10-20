<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCourses = Course::where('is_published', true)
            ->where('is_featured', true)
            ->with(['user', 'category'])
            ->limit(6)
            ->get();

        $categories = Category::where('is_active', true)
            ->withCount('courses')
            ->get();

        $stats = [
            'total_courses' => Course::where('is_published', true)->count(),
            'total_students' => \App\Models\Enrollment::count(),
            'total_instructors' => \App\Models\User::where('role', 'instructor')->count(),
        ];

        return view('home', compact('featuredCourses', 'categories', 'stats'));
    }

    public function landing()
    {
        return view('landing');
    }

    public function about()
    {
        return view('about');
    }

    public function courses(Request $request)
    {
        $query = Course::where('is_published', true)
            ->with(['user', 'category']);

        // Filtros
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $courses = $query->paginate(12);
        $categories = Category::where('is_active', true)->get();

        return view('courses.index', compact('courses', 'categories'));
    }

    public function showCourse(Course $course)
    {
        if (!$course->is_published) {
            abort(404);
        }

        $course->load(['user', 'category', 'modules.lessons']);
        
        return view('courses.show', compact('course'));
    }
}
