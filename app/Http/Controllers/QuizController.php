<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Progress;
use App\Models\QuizAttempt;

class QuizController extends Controller
{
    public function show(Course $course, Lesson $lesson, Quiz $quiz)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
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

        // Verificar se o quiz pertence à aula
        if ($quiz->lesson_id !== $lesson->id) {
            return response()->json(['error' => 'Quiz não encontrado'], 404);
        }

        return response()->json([
            'quiz' => $quiz,
            'time_limit' => $quiz->time_limit_minutes,
            'passing_score' => $quiz->passing_score
        ]);
    }

    public function submit(Request $request, Course $course, Lesson $lesson, Quiz $quiz)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        // Verificar se o usuário está inscrito no curso
        $enrollment = $user->enrollments()->where('course_id', $course->id)->first();
        
        if (!$enrollment) {
            return response()->json(['error' => 'Não autorizado'], 403);
        }

        // Verificar se a aula pertence ao curso
        if ($lesson->module->course_id !== $course->id) {
            return response()->json(['error' => 'Aula não encontrada'], 404);
        }

        // Verificar se o quiz pertence à aula
        if ($quiz->lesson_id !== $lesson->id) {
            return response()->json(['error' => 'Quiz não encontrado'], 404);
        }

        $answers = $request->input('answers', []);
        $questions = $quiz->questions;
        
        $correctAnswers = 0;
        $totalQuestions = count($questions);
        $results = [];

        // Calcular pontuação
        foreach ($questions as $index => $question) {
            $userAnswer = $answers[$index] ?? null;
            $isCorrect = $userAnswer == $question['correct_answer'];
            
            if ($isCorrect) {
                $correctAnswers++;
            }
            
            $results[] = [
                'question' => $question['question'],
                'user_answer' => $userAnswer,
                'correct_answer' => $question['correct_answer'],
                'is_correct' => $isCorrect,
                'options' => $question['options']
            ];
        }

        $score = $totalQuestions > 0 ? round(($correctAnswers / $totalQuestions) * 100, 2) : 0;
        $passed = $score >= $quiz->passing_score;

        // Verificar tentativas anteriores
        $previousAttempt = $user->quizAttempts()
            ->where('quiz_id', $quiz->id)
            ->where('passed', true)
            ->latest()
            ->first();
        
        $needsChoice = false;
        $previousPassed = false;
        
        // Se não passou nesta tentativa E já tinha passado antes
        if (!$passed && $previousAttempt) {
            $previousPassed = true;
            $needsChoice = true; // Precisa escolher se já tinha passado antes
        }

        // Salvar tentativa do quiz
        $this->saveQuizAttempt($user, $course, $lesson, $quiz, $answers, $results, $score, $passed);
        
        // Salvar progresso do quiz (sempre salva o último resultado)
        $this->saveQuizProgress($user, $lesson, $quiz, $score, $passed, $results);

        return response()->json([
            'success' => true,
            'score' => $score,
            'passed' => $passed,
            'correct_answers' => $correctAnswers,
            'total_questions' => $totalQuestions,
            'passing_score' => $quiz->passing_score,
            'results' => $results,
            'needs_choice' => $needsChoice,
            'previous_passed' => $previousPassed,
            'message' => $passed ? 'Parabéns! Você passou no quiz!' : 'Você não atingiu a pontuação mínima. Tente novamente!'
        ]);
    }

    public function chooseResult(Request $request, Course $course, Lesson $lesson, Quiz $quiz)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        $choice = $request->input('choice'); // 'keep_best' or 'use_latest'
        
        // Verificar se o usuário está inscrito no curso
        $enrollment = $user->enrollments()->where('course_id', $course->id)->first();
        
        if (!$enrollment) {
            return response()->json(['error' => 'Não autorizado'], 403);
        }

        $progress = $user->progress()->where('lesson_id', $lesson->id)->first();
        
        if (!$progress) {
            return response()->json(['error' => 'Progresso não encontrado'], 404);
        }

        if ($choice === 'keep_best') {
            // Manter o melhor resultado (já estava como concluído)
            $progress->update([
                'is_completed' => true,
                'completed_at' => $progress->completed_at ?: now(),
            ]);
        } else {
            // Usar o último resultado (já está salvo como não concluído)
            // Não precisa fazer nada, já está correto
        }

        // Atualizar progresso geral do curso
        $this->updateCourseProgress($user, $course);

        return response()->json([
            'success' => true,
            'message' => $choice === 'keep_best' ? 'Melhor resultado mantido!' : 'Último resultado aplicado!'
        ]);
    }

    private function saveQuizAttempt($user, $course, $lesson, $quiz, $answers, $results, $score, $passed)
    {
        QuizAttempt::create([
            'user_id' => $user->id,
            'quiz_id' => $quiz->id,
            'course_id' => $course->id,
            'lesson_id' => $lesson->id,
            'answers' => $answers,
            'results' => $results,
            'score' => $score,
            'passed' => $passed,
            'time_spent_minutes' => 0, // Pode ser implementado depois
            'started_at' => now()->subMinutes(5), // Simular tempo de início
            'completed_at' => now(),
        ]);
    }

    private function saveQuizProgress($user, $lesson, $quiz, $score, $passed, $results)
    {
        // Criar ou atualizar progresso da aula baseado na ÚLTIMA tentativa
        $progress = $user->progress()->where('lesson_id', $lesson->id)->first();
        
        if (!$progress) {
            $progress = $user->progress()->create([
                'lesson_id' => $lesson->id,
                'is_completed' => $passed,
                'completed_at' => $passed ? now() : null,
                'time_spent_minutes' => 0,
            ]);
        } else {
            // SEMPRE atualizar baseado na última tentativa
            $progress->update([
                'is_completed' => $passed,
                'completed_at' => $passed ? now() : null,
            ]);
        }

        // Atualizar progresso geral do curso
        $this->updateCourseProgress($user, $lesson->module->course);
        
        return $progress;
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
