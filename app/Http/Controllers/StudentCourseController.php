<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Progress;
use App\Models\Lesson;

class StudentCourseController extends Controller
{

    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        if (!$user->isStudent()) {
            return redirect()->route('dashboard')->with('error', 'Apenas estudantes podem acessar esta página.');
        }

        $enrollments = $user->enrollments()
            ->with(['course.category', 'course.user'])
            ->latest()
            ->get();

        return view('student.courses.index', compact('enrollments'));
    }

    public function show(Course $course)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        // Verificar se o usuário está inscrito no curso
        $enrollment = $user->enrollments()->where('course_id', $course->id)->first();
        
        if (!$enrollment) {
            return redirect()->route('courses.show', $course)->with('error', 'Você precisa se inscrever neste curso primeiro.');
        }

        // Carregar curso com módulos e aulas
        $course->load(['modules.lessons' => function($query) {
            $query->where('lessons.is_published', true)->orderBy('lessons.order');
        }]);

        // Buscar progresso do usuário
        $userProgress = $user->progress()
            ->whereHas('lesson', function($query) use ($course) {
                $query->whereHas('module', function($q) use ($course) {
                    $q->where('course_id', $course->id);
                });
            })
            ->get()
            ->keyBy('lesson_id');

        // Calcular progresso geral
        $totalLessons = $course->lessons()->where('lessons.is_published', true)->count();
        $completedLessons = $userProgress->where('is_completed', true)->count();
        $progressPercentage = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100, 2) : 0;

        return view('student.courses.show', compact('course', 'enrollment', 'userProgress', 'progressPercentage'));
    }

    public function lesson(Course $course, Lesson $lesson)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $user = auth()->user();
        
        // Verificar se o usuário está inscrito no curso
        $enrollment = $user->enrollments()->where('course_id', $course->id)->first();
        
        if (!$enrollment) {
            return redirect()->route('courses.show', $course)->with('error', 'Você precisa se inscrever neste curso primeiro.');
        }

        // Verificar se a aula pertence ao curso
        if ($lesson->module->course_id !== $course->id) {
            abort(404);
        }

        // Carregar aula com módulo e curso
        $lesson->load(['module.course', 'quizzes']);

        // Buscar progresso da aula
        $progress = $user->progress()->where('lesson_id', $lesson->id)->first();
        
        // Verificar tentativas de quiz para determinar o status correto
        if ($lesson->quizzes && $lesson->quizzes->count() > 0) {
            foreach ($lesson->quizzes as $quiz) {
                $latestAttempt = $user->quizAttempts()
                    ->where('quiz_id', $quiz->id)
                    ->latest()
                    ->first();
                
                if ($latestAttempt) {
                    // Se a última tentativa passou, marcar aula como concluída
                    if ($latestAttempt->passed) {
                        if (!$progress) {
                            $progress = $user->progress()->create([
                                'lesson_id' => $lesson->id,
                                'is_completed' => true,
                                'completed_at' => $latestAttempt->completed_at,
                                'time_spent_minutes' => 0,
                            ]);
                        } else {
                            $progress->update([
                                'is_completed' => true,
                                'completed_at' => $latestAttempt->completed_at,
                            ]);
                        }
                    } else {
                        // Se a última tentativa não passou, marcar como não concluída
                        if ($progress) {
                            $progress->update([
                                'is_completed' => false,
                                'completed_at' => null,
                            ]);
                        }
                    }
                }
            }
        }

        // Progresso do usuário em todas as aulas do curso (para sidebar)
        $userProgress = $user->progress()
            ->whereHas('lesson', function($query) use ($course) {
                $query->whereHas('module', function($q) use ($course) {
                    $q->where('course_id', $course->id);
                });
            })
            ->get()
            ->keyBy('lesson_id');

        // Buscar aulas anteriores e próximas
        $allLessons = $course->lessons()->where('lessons.is_published', true)->orderBy('lessons.order')->get();
        $currentIndex = $allLessons->search(function($item) use ($lesson) {
            return $item->id === $lesson->id;
        });

        $previousLesson = $currentIndex > 0 ? $allLessons[$currentIndex - 1] : null;
        $nextLesson = $currentIndex < $allLessons->count() - 1 ? $allLessons[$currentIndex + 1] : null;

        return view('student.courses.lesson', compact('course', 'lesson', 'progress', 'previousLesson', 'nextLesson', 'userProgress'));
    }

    public function markComplete(Request $request, Course $course, Lesson $lesson)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Usuário não autenticado'], 401);
        }

        $user = auth()->user();
        
        // Verificar se o usuário está inscrito no curso
        $enrollment = $user->enrollments()->where('course_id', $course->id)->first();
        
        if (!$enrollment) {
            return response()->json(['error' => 'Você precisa se inscrever neste curso primeiro.'], 403);
        }

        // Verificar se a aula pertence ao curso
        if ($lesson->module->course_id !== $course->id) {
            return response()->json(['error' => 'Aula não encontrada'], 404);
        }

        // Verificar se deve marcar como concluída ou pendente
        $isCompleted = $request->has('completed') ? $request->completed : true;
        
        // Verificar se já existe certificado para este curso
        $existingCertificate = $user->certificates()->where('course_id', $course->id)->first();
        
        // Se existe certificado e está tentando desmarcar uma aula, bloquear
        if ($existingCertificate && !$isCompleted) {
            return response()->json([
                'success' => false,
                'error' => 'Não é possível desmarcar aulas após a geração do certificado. O certificado já foi emitido para este curso.'
            ], 403);
        }
        
        \Log::info('Marking lesson as completed: ' . ($isCompleted ? 'true' : 'false'));
        
        try {
            // Criar ou atualizar progresso
            $progress = $user->progress()->where('lesson_id', $lesson->id)->first();
            
            if (!$progress) {
                $progress = $user->progress()->create([
                    'lesson_id' => $lesson->id,
                    'is_completed' => $isCompleted,
                    'completed_at' => $isCompleted ? now() : null,
                    'time_spent_minutes' => $request->time_spent ?? 0,
                ]);
            } else {
                $progress->update([
                    'is_completed' => $isCompleted,
                    'completed_at' => $isCompleted ? now() : null,
                    'time_spent_minutes' => $progress->time_spent_minutes + ($request->time_spent ?? 0),
                ]);
            }

            // Atualizar progresso geral do curso
            $this->updateCourseProgress($user, $course);

            return response()->json([
                'success' => true, 
                'message' => $isCompleted ? 'Aula marcada como concluída!' : 'Aula marcada como pendente!'
            ]);
        } catch (\Exception $e) {
            \Log::error('Erro ao atualizar progresso da aula: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Erro interno do servidor. Tente novamente.'
            ], 500);
        }
    }

    private function updateCourseProgress($user, $course)
    {
        $totalLessons = $course->lessons()->where('lessons.is_published', true)->count();
        $completedLessons = $user->progress()
            ->whereHas('lesson', function($query) use ($course) {
                $query->whereHas('module', function($q) use ($course) {
                    $q->where('course_id', $course->id);
                });
            })
            ->where('is_completed', true)
            ->count();

        $progressPercentage = $totalLessons > 0 ? round(($completedLessons / $totalLessons) * 100, 2) : 0;

        // Atualizar progresso na inscrição
        $enrollment = $user->enrollments()->where('course_id', $course->id)->first();
        if ($enrollment) {
            $enrollment->update(['progress_percentage' => $progressPercentage]);
            
            // Se completou 100%, marcar curso como concluído
            if ($progressPercentage >= 100) {
                $enrollment->update([
                    'status' => 'completed',
                    'completed_at' => now()
                ]);
            }
        }
    }
}
