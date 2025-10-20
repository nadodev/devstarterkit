<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        $certificates = $user->certificates()
            ->with('course')
            ->orderBy('issued_at', 'desc')
            ->get();

        return view('student.certificates.index', compact('certificates'));
    }

    public function show(Certificate $certificate)
    {
        if (!auth()->check() || $certificate->user_id !== auth()->id()) {
            abort(403, 'Acesso negado');
        }

        return view('student.certificates.show', compact('certificate'));
    }

    public function generate(Course $course)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        // Verificar se o usuário está inscrito no curso
        $enrollment = $user->enrollments()->where('course_id', $course->id)->first();
        if (!$enrollment) {
            return redirect()->back()->with('error', 'Você precisa estar inscrito neste curso para gerar o certificado.');
        }

        // Verificar se já existe certificado para este curso
        $existingCertificate = $user->certificates()->where('course_id', $course->id)->first();
        if ($existingCertificate) {
            return redirect()->route('certificates.show', $existingCertificate)
                ->with('info', 'Você já possui um certificado para este curso.');
        }

        // Verificar requisitos para gerar certificado
        $requirements = $this->checkCertificateRequirements($user, $course);
        
        if (!$requirements['eligible']) {
            return redirect()->back()->with('error', $requirements['message']);
        }

        // Gerar certificado
        $certificate = $this->createCertificate($user, $course, $requirements);

        return redirect()->route('certificates.show', $certificate)
            ->with('success', 'Certificado gerado com sucesso!');
    }

    private function checkCertificateRequirements($user, $course)
    {
        // 1. Verificar se todas as aulas foram concluídas
        $totalLessons = $course->lessons()->where('lessons.is_published', true)->count();
        $completedLessons = $user->progress()
            ->whereHas('lesson', function($query) use ($course) {
                $query->whereHas('module', function($q) use ($course) {
                    $q->where('course_id', $course->id);
                });
            })
            ->where('is_completed', true)
            ->count();

        if ($completedLessons < $totalLessons) {
            return [
                'eligible' => false,
                'message' => "Você precisa concluir todas as aulas ({$completedLessons}/{$totalLessons}) para gerar o certificado."
            ];
        }

        // 2. Verificar se todos os quizzes foram aprovados
        // Buscar quizzes usando query direta para garantir que encontra
        $courseQuizzes = \DB::table('quizzes')
            ->join('lessons', 'lessons.id', '=', 'quizzes.lesson_id')
            ->join('modules', 'modules.id', '=', 'lessons.module_id')
            ->where('modules.course_id', $course->id)
            ->where('lessons.is_published', true)
            ->select('quizzes.*')
            ->get();

        // Debug: Log dos quizzes encontrados
        \Log::info('Quizzes found:', [
            'course_id' => $course->id,
            'quizzes_count' => $courseQuizzes->count(),
            'quizzes' => $courseQuizzes->pluck('id')->toArray()
        ]);

        // Debug: Verificar se as aulas têm quizzes
        foreach ($courseQuizzes as $quiz) {
            \Log::info('Quiz details:', [
                'quiz_id' => $quiz->id,
                'lesson_id' => $quiz->lesson_id,
                'quiz_title' => $quiz->title ?? 'No title'
            ]);
        }

        $totalQuizzes = $courseQuizzes->count();
        $passedQuizzes = 0;
        $totalScore = 0;
        $quizCount = 0;

        foreach ($courseQuizzes as $quiz) {
            // Pegar a MELHOR tentativa (maior score), não a última
            $bestAttempt = $user->quizAttempts()
                ->where('quiz_id', $quiz->id)
                ->where('course_id', $course->id)
                ->orderBy('score', 'desc') // Ordenar por score decrescente
                ->first();
            
            // Debug: Verificar todas as tentativas para este quiz
            $allAttempts = $user->quizAttempts()
                ->where('quiz_id', $quiz->id)
                ->where('course_id', $course->id)
                ->get();
            
            \Log::info('All attempts for quiz ' . $quiz->id . ':', [
                'attempts_count' => $allAttempts->count(),
                'attempts' => $allAttempts->map(function($attempt) {
                    return [
                        'id' => $attempt->id,
                        'score' => $attempt->score,
                        'passed' => $attempt->passed,
                        'created_at' => $attempt->created_at
                    ];
                })->toArray()
            ]);

            \Log::info('Processing quiz:', [
                'quiz_id' => $quiz->id,
                'has_attempt' => $bestAttempt ? 'yes' : 'no',
                'score' => $bestAttempt ? $bestAttempt->score : 0,
                'passed' => $bestAttempt ? $bestAttempt->passed : false,
                'attempts_count' => $user->quizAttempts()->where('quiz_id', $quiz->id)->count()
            ]);

            if ($bestAttempt) {
                // Se passou em QUALQUER tentativa, conta como aprovado
                if ($bestAttempt->passed) {
                    $passedQuizzes++;
                }
                $totalScore += $bestAttempt->score;
                $quizCount++;
            }
        }

        // Debug: Log dos quizzes
        \Log::info('Certificate Debug:', [
            'total_quizzes' => $totalQuizzes,
            'passed_quizzes' => $passedQuizzes,
            'quiz_count' => $quizCount,
            'total_score' => $totalScore,
            'average_score' => $quizCount > 0 ? $totalScore / $quizCount : 0,
            'completed_lessons' => $completedLessons,
            'total_lessons' => $totalLessons
        ]);

        // Se não há quizzes, não pode gerar certificado
        if ($totalQuizzes == 0) {
            return [
                'eligible' => false,
                'message' => "Este curso não possui quizzes. Não é possível gerar certificado sem avaliações."
            ];
        }

        // Verificação adicional: se não há aulas, não pode gerar certificado
        if ($totalLessons == 0) {
            return [
                'eligible' => false,
                'message' => "Este curso não possui aulas. Não é possível gerar certificado."
            ];
        }

        if ($passedQuizzes < $totalQuizzes) {
            return [
                'eligible' => false,
                'message' => "Você precisa APROVAR todos os quizzes ({$passedQuizzes}/{$totalQuizzes}) para gerar o certificado. Você fez os quizzes mas não atingiu 70% em todos eles. Tente novamente os quizzes que reprovou."
            ];
        }

        // 3. Verificar se a nota média dos quizzes é >= 70%
        $averageScore = $quizCount > 0 ? $totalScore / $quizCount : 0;
        if ($totalQuizzes > 0 && $averageScore < 70) {
            return [
                'eligible' => false,
                'message' => "Você precisa ter uma nota média de pelo menos 70% nos quizzes (atual: " . number_format($averageScore, 1) . "%) para gerar o certificado."
            ];
        }

        return [
            'eligible' => true,
            'total_lessons' => $totalLessons,
            'completed_lessons' => $completedLessons,
            'total_quizzes' => $totalQuizzes,
            'passed_quizzes' => $passedQuizzes,
            'average_score' => $averageScore
        ];
    }

    private function createCertificate($user, $course, $requirements)
    {
        $certificateNumber = 'CERT-' . strtoupper(Str::random(8)) . '-' . date('Y');
        
        $certificate = Certificate::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
            'certificate_number' => $certificateNumber,
            'title' => "Certificado de Conclusão - {$course->title}",
            'description' => "Certificado emitido para {$user->name} pela conclusão do curso {$course->title}",
            'final_score' => $requirements['average_score'],
            'total_lessons' => $requirements['total_lessons'],
            'completed_lessons' => $requirements['completed_lessons'],
            'total_quizzes' => $requirements['total_quizzes'],
            'passed_quizzes' => $requirements['passed_quizzes'],
            'issued_at' => now(),
            'is_valid' => true,
            'validation_code' => $this->generateValidationCode(),
        ]);

        return $certificate;
    }

    private function generateValidationCode()
    {
        // Gerar código de validação único (8 caracteres alfanuméricos)
        do {
            $code = strtoupper(Str::random(8));
        } while (Certificate::where('validation_code', $code)->exists());
        
        return $code;
    }

    public function download(Certificate $certificate)
    {
        if (!auth()->check() || $certificate->user_id !== auth()->id()) {
            abort(403, 'Acesso negado');
        }

        // Gerar PDF do certificado
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('student.certificates.pdf', compact('certificate'));
        
        // Configurar o PDF
        $pdf->setPaper('A4', 'portrait');
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'defaultFont' => 'Arial',
        ]);
        
        // Nome do arquivo
        $filename = 'Certificado_' . $certificate->user->name . '_' . $certificate->course->title;
        $filename = preg_replace('/[^A-Za-z0-9_\-]/', '_', $filename) . '.pdf';
        
        return $pdf->download($filename);
    }

    public function validateCertificate(Request $request)
    {
        $validationCode = $request->get('code');
        
        if (!$validationCode) {
            return view('certificates.validate', [
                'certificate' => null,
                'error' => 'Por favor, informe o código de validação.'
            ]);
        }

        $certificate = Certificate::where('validation_code', $validationCode)->first();
        
        if (!$certificate) {
            return view('certificates.validate', [
                'certificate' => null,
                'error' => 'Código de validação inválido ou certificado não encontrado.'
            ]);
        }

        return view('certificates.validate', [
            'certificate' => $certificate,
            'error' => null
        ]);
    }
}