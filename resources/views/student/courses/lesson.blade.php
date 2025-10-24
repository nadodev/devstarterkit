@extends('layouts.app')

@section('title', $lesson->title . ' - ' . $course->title)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    <!-- Hero Header -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-blue-600-purple-600 opacity-90"></div>
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <div class="text-center lg:text-left mb-8 lg:mb-0">
                    <div class="flex items-center justify-center lg:justify-start mb-6">
                        <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center shadow-2xl">
                            <i class="fas fa-{{ $lesson->type === 'video' ? 'play' : ($lesson->type === 'text' ? 'file-alt' : 'file') }} text-white text-4xl"></i>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 mb-4">
                        <span class="bg-white/20 backdrop-blur-sm text-white text-sm font-semibold px-4 py-2 rounded-full">{{ ucfirst($lesson->type) }}</span>
                        @if($progress && $progress->is_completed)
                            <span class="bg-green-500/20 backdrop-blur-sm text-white text-sm font-semibold px-4 py-2 rounded-full">
                                <i class="fas fa-check mr-1"></i>Concluída
                            </span>
                        @endif
                    </div>
                    
                    <h1 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                        {{ $lesson->title }}
                    </h1>
                    <p class="text-xl text-white mb-6 max-w-3xl">{{ $course->title }} • {{ $lesson->module->title }}</p>
                    
                    @if($lesson->description)
                        <p class="text-lg text-white/90 max-w-4xl">{{ $lesson->description }}</p>
                    @endif
                </div>
                
                <!-- Lesson Stats -->
                <div class="grid grid-cols-2 lg:grid-cols-1 gap-6">
                    <div class="text-center bg-white/20 backdrop-blur-sm rounded-2xl p-6">
                        <div class="text-3xl font-bold text-white">{{ $lesson->duration_minutes ?? 0 }}min</div>
                        <div class="text-white text-sm font-medium">Duração</div>
                    </div>
                    <div class="text-center bg-white/20 backdrop-blur-sm rounded-2xl p-6">
                        <div class="text-3xl font-bold text-white">{{ $lesson->module->lessons->count() }}</div>
                        <div class="text-white text-sm font-medium">Aulas no Módulo</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-16">

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Lesson Content -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-blue-600-purple-600 px-8 py-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold text-white">Conteúdo da Aula</h2>
                                <p class="text-white mt-1 font-medium">{{ ucfirst($lesson->type) }} • {{ $lesson->duration_minutes ?? 0 }}min</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                            @if($lesson->has_video && $lesson->video_url)
                                <div class="mb-8">
                                    <div class="aspect-video bg-gray-900 rounded-2xl flex items-center justify-center overflow-hidden shadow-2xl">
                                        @php
                                            // Converter URL do YouTube para formato de embed
                                            $videoUrl = $lesson->video_url;
                                            if (strpos($videoUrl, 'youtube.com/watch') !== false) {
                                                $videoId = '';
                                                parse_str(parse_url($videoUrl, PHP_URL_QUERY), $query);
                                                if (isset($query['v'])) {
                                                    $videoId = $query['v'];
                                                }
                                                $videoUrl = 'https://www.youtube.com/embed/' . $videoId;
                                            } elseif (strpos($videoUrl, 'youtu.be/') !== false) {
                                                $videoId = substr(parse_url($videoUrl, PHP_URL_PATH), 1);
                                                $videoUrl = 'https://www.youtube.com/embed/' . $videoId;
                                            }
                                        @endphp
                                        <iframe 
                                            src="{{ $videoUrl }}" 
                                            class="w-full h-full rounded-2xl"
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                            @endif

                        @if($lesson->has_text && $lesson->content)
                            <div class="prose max-w-none prose-lg">
                                {!! nl2br(e($lesson->content)) !!}
                            </div>
                        @endif

                        @if($lesson->has_file && $lesson->file_path)
                            <div class="mt-8 p-6 bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl border border-gray-200">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-blue-purple rounded-2xl flex items-center justify-center shadow-lg mr-4">
                                        <i class="fas fa-download text-white text-lg"></i>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900 mb-1">Arquivo para Download</h4>
                                        <p class="text-gray-600 text-sm">Baixe o material complementar desta aula</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a href="{{ route('lesson.file.download', $lesson) }}" 
                                       class="inline-flex items-center bg-gradient-blue-purple text-white px-6 py-3 rounded-xl font-medium hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                                        <i class="fas fa-download mr-2"></i>
                                        Baixar Arquivo
                                    </a>
                                </div>
                            </div>
                        @endif

                        <!-- Quiz Section -->
                        @if($lesson->quizzes && $lesson->quizzes->count() > 0)
                            @foreach($lesson->quizzes as $quiz)
                                @php
                                    $userAttempts = auth()->user()->quizAttempts()
                                        ->where('quiz_id', $quiz->id)
                                        ->orderBy('created_at', 'desc')
                                        ->get();
                                    
                                    $latestAttempt = $userAttempts->first();
                                    $quizCompleted = $latestAttempt && $latestAttempt->passed;
                                    $quizFailed = $latestAttempt && !$latestAttempt->passed;
                                    $attemptsCount = $userAttempts->count();
                                    $maxAttempts = 3;
                                    $canAttempt = $attemptsCount < $maxAttempts;
                                    
                                    $cardClass = 'bg-gradient-to-r from-yellow-50 to-orange-50 border-yellow-200'; // Padrão: amarelo (não tentou)
                                    $textClass = 'text-yellow-900';
                                    $textSecondaryClass = 'text-yellow-700';
                                    $textTertiaryClass = 'text-yellow-600';
                                    
                                    if ($quizCompleted) {
                                        $cardClass = 'bg-gradient-to-r from-green-50 to-emerald-50 border-green-200';
                                        $textClass = 'text-green-900';
                                        $textSecondaryClass = 'text-green-700';
                                        $textTertiaryClass = 'text-green-600';
                                    } elseif ($quizFailed) {
                                        $cardClass = 'bg-gradient-to-r from-red-50 to-pink-50 border-red-200';
                                        $textClass = 'text-red-900';
                                        $textSecondaryClass = 'text-red-700';
                                        $textTertiaryClass = 'text-red-600';
                                    }
                                @endphp
                                <div class="mt-8 p-6 {{ $cardClass }} rounded-2xl border shadow-lg">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <div class="flex items-center mb-4">
                                                <div class="w-12 h-12 bg-gradient-blue-purple rounded-2xl flex items-center justify-center shadow-lg mr-4">
                                                    <i class="fas fa-question-circle text-white text-lg"></i>
                                                </div>
                                                <div>
                                                    <h4 class="text-xl font-bold {{ $textClass }}">{{ $quiz->title }}</h4>
                                                    <p class="{{ $textSecondaryClass }} text-sm">{{ $quiz->description }}</p>
                                                </div>
                                            </div>
                                            
                                            <div class="flex flex-wrap items-center gap-4 mb-4">
                                                @if($quizCompleted)
                                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                        <i class="fas fa-check mr-2"></i>Concluído
                                                    </span>
                                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                                        <i class="fas fa-chart-line mr-2"></i>{{ $latestAttempt->score }}%
                                                    </span>
                                                @elseif($quizFailed)
                                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                                        <i class="fas fa-times mr-2"></i>Reprovado
                                                    </span>
                                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-orange-100 text-orange-800">
                                                        <i class="fas fa-chart-line mr-2"></i>{{ $latestAttempt->score }}%
                                                    </span>
                                                @endif
                                            </div>
                                            
                                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm {{ $textTertiaryClass }}">
                                                <div class="flex items-center">
                                                    <i class="fas fa-question-circle mr-2"></i>
                                                    <span>{{ count($quiz->questions) }} questões</span>
                                                </div>
                                                @if($quiz->time_limit_minutes)
                                                <div class="flex items-center">
                                                    <i class="fas fa-clock mr-2"></i>
                                                    <span>{{ $quiz->time_limit_minutes }}min</span>
                                                </div>
                                                @endif
                                                <div class="flex items-center">
                                                    <i class="fas fa-trophy mr-2"></i>
                                                    <span>{{ $quiz->passing_score }}% para aprovar</span>
                                                </div>
                                                <div class="flex items-center">
                                                    <i class="fas fa-redo mr-2"></i>
                                                    <span>{{ $attemptsCount }}/{{ $maxAttempts }} tentativas</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="ml-6">
                                            @if($canAttempt)
                                                @php
                                                    $buttonClass = 'bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-600 hover:to-orange-600';
                                                    $buttonIcon = 'fas fa-play';
                                                    $buttonText = 'Iniciar Quiz';
                                                    
                                                    if ($quizCompleted) {
                                                        $buttonClass = 'bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600';
                                                        $buttonIcon = 'fas fa-redo';
                                                        $buttonText = 'Refazer Quiz';
                                                    } elseif ($quizFailed) {
                                                        $buttonClass = 'bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-600 hover:to-pink-600';
                                                        $buttonIcon = 'fas fa-redo';
                                                        $buttonText = 'Tentar Novamente';
                                                    }
                                                @endphp
                                                <button onclick="openQuizModal({{ $quiz->id }})" 
                                                        class="{{ $buttonClass }} text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                                                    <i class="{{ $buttonIcon }} mr-2"></i>{{ $buttonText }}
                                                </button>
                                            @else
                                                <button disabled class="bg-gray-400 text-white px-6 py-3 rounded-xl font-semibold cursor-not-allowed">
                                                    <i class="fas fa-ban mr-2"></i>Limite atingido
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    <!-- Lesson Actions -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                @if(!$progress || !$progress->is_completed)
                                    <button id="markCompleteBtn" class="bg-green-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                                        <i class="fas fa-check mr-2"></i>Marcar como Concluída
                                    </button>
                                @else
                                    <span class="bg-green-100 text-green-800 px-4 py-2 rounded-lg font-semibold">
                                        <i class="fas fa-check mr-2"></i>Concluída
                                    </span>
                                @endif
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                @if($previousLesson)
                                    <a href="{{ route('student.courses.lesson', [$course, $previousLesson]) }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                                        <i class="fas fa-chevron-left mr-1"></i>Anterior
                                    </a>
                                @endif
                                
                                @if($nextLesson)
                                    <a href="{{ route('student.courses.lesson', [$course, $nextLesson]) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                        Próxima<i class="fas fa-chevron-right ml-1"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
                
    <!-- Sistema de Tabs - Abaixo do grid principal -->
    @include('student.courses.lesson-tabs')
        </div>
        <div class="lg:col-span-1 space-y-8">
            <!-- Course Progress -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-green px-6 py-4">
                    <h3 class="text-xl font-bold text-white">Progresso do Curso</h3>
                    <p class="text-white text-sm font-medium">Seu avanço no curso</p>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                    @foreach($course->modules as $module)
                    <div class="border border-gray-200 rounded-lg">
                        <!-- Module Header (Dropdown) -->
                        <div class="module-header cursor-pointer p-3 hover:bg-gray-50 transition" onclick="toggleModule({{ $module->id }})">
                            <div class="flex items-center justify-between">
                                <h4 class="font-medium text-gray-900">{{ $module->title }}</h4>
                                <div class="flex items-center space-x-2">
                                    @php
                                        $moduleLessons = $module->lessons;
                                        $completedLessons = $moduleLessons->filter(function($moduleLesson) use ($userProgress) {
                                            $progress = $userProgress->get($moduleLesson->id);
                                            return $progress && $progress->is_completed;
                                        })->count();
                                        $totalLessons = $moduleLessons->count();
                                    @endphp
                                    <span class="text-xs text-gray-500">{{ $completedLessons }}/{{ $totalLessons }}</span>
                                    <i class="fas fa-chevron-down transition-transform duration-200" id="chevron-{{ $module->id }}"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Module Lessons (Collapsible) -->
                        <div class="module-content hidden" id="module-{{ $module->id }}">
                            <div class="border-t border-gray-200 p-3 space-y-2">
                                @foreach($module->lessons as $moduleLesson)
                                @php
                                    $moduleLessonProgress = $userProgress->get($moduleLesson->id);
                                    $isCompleted = $moduleLessonProgress && $moduleLessonProgress->is_completed;
                                    $isCurrent = $moduleLesson->id === $lesson->id;
                                @endphp
                                <div class="flex items-center space-x-3 py-2 hover:bg-gray-50 rounded px-2 transition">
                                    <!-- Checkbox ou Ícone da aula -->
                                    <div class="flex-shrink-0">
                                        @if($isCompleted)
                                            <!-- Ícone clicável quando concluída -->
                                            <div 
                                                class="w-4 h-4 rounded-full flex items-center justify-center bg-green-100 text-green-600 cursor-pointer hover:bg-green-200 transition"
                                                onclick="toggleLessonCompletionFromIcon(this)"
                                                data-lesson-id="{{ $moduleLesson->id }}"
                                                data-course-id="{{ $course->id }}"
                                                title="Clique para desmarcar como concluída"
                                            >
                                                <i class="fas fa-check text-xs"></i>
                                            </div>
                                        @else
                                            <!-- Checkbox personalizado quando não concluída -->
                                            <input 
                                                type="checkbox" 
                                                class="lesson-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" 
                                                data-lesson-id="{{ $moduleLesson->id }}"
                                                data-course-id="{{ $course->id }}"
                                                onchange="toggleLessonCompletion(this)"
                                            >
                                        @endif
                                    </div>
                                    
                                    <!-- Link da aula -->
                                    <a href="{{ route('student.courses.lesson', [$course, $moduleLesson]) }}" class="flex-1 text-sm {{ $isCurrent ? 'text-blue-600 font-medium' : 'text-gray-600 hover:text-gray-900' }} transition">
                                        {{ $moduleLesson->title }}
                                    </a>
                                    
                                    <!-- Status da aula -->
                                    @if($isCurrent)
                                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded-full">Atual</span>
                                    @elseif($isCompleted)
                                        <span class="text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full">Concluída</span>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-blue-purple px-6 py-4">
                    <h3 class="text-xl font-bold text-white">Navegação</h3>
                    <p class="text-white text-sm font-medium">Links úteis</p>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <a href="{{ route('student.courses.show', $course) }}" 
                           class="group flex items-center p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl hover:shadow-lg transition-all duration-300 border border-gray-200">
                            <div class="w-12 h-12 bg-gradient-blue-purple rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-list text-white"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-900">Índice do Curso</p>
                                <p class="text-sm text-gray-600">Ver todos os módulos</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('student.courses.index') }}" 
                           class="group flex items-center p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl hover:shadow-lg transition-all duration-300 border border-gray-200">
                            <div class="w-12 h-12 bg-gradient-green rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-book text-white"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-900">Meus Cursos</p>
                                <p class="text-sm text-gray-600">Minha lista de cursos</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('dashboard') }}" 
                           class="group flex items-center p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl hover:shadow-lg transition-all duration-300 border border-gray-200">
                            <div class="w-12 h-12 bg-gradient-purple rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <i class="fas fa-home text-white"></i>
                            </div>
                            <div class="ml-4">
                                <p class="text-lg font-semibold text-gray-900">Dashboard</p>
                                <p class="text-sm text-gray-600">Página inicial</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Botão de Certificado -->
            @php
                // Usar uma abordagem mais simples para evitar ambiguidade
                $totalLessons = \DB::table('lessons')
                    ->join('modules', 'modules.id', '=', 'lessons.module_id')
                    ->where('modules.course_id', $course->id)
                    ->where('lessons.is_published', true)
                    ->count();
                
                $completedLessons = auth()->user()->progress()
                    ->whereHas('lesson', function($query) use ($course) {
                        $query->whereHas('module', function($q) use ($course) {
                            $q->where('course_id', $course->id);
                        });
                    })
                    ->where('is_completed', true)
                    ->count();
                
                // Buscar quizzes de forma mais direta
                $courseQuizzes = \DB::table('quizzes')
                    ->join('lessons', 'lessons.id', '=', 'quizzes.lesson_id')
                    ->join('modules', 'modules.id', '=', 'lessons.module_id')
                    ->where('modules.course_id', $course->id)
                    ->where('lessons.is_published', true)
                    ->get();
                
                $totalQuizzes = $courseQuizzes->count();
                $passedQuizzes = 0;
                $totalScore = 0;
                $quizCount = 0;
                
                foreach ($courseQuizzes as $quiz) {
                    // Pegar a MELHOR tentativa (maior score), não a última
                    $bestAttempt = auth()->user()->quizAttempts()
                        ->where('quiz_id', $quiz->id)
                        ->where('course_id', $course->id)
                        ->orderBy('score', 'desc') // Ordenar por score decrescente
                        ->first();
                    
                    if ($bestAttempt) {
                        if ($bestAttempt->passed) {
                            $passedQuizzes++;
                        }
                        $totalScore += $bestAttempt->score;
                        $quizCount++;
                    }
                }
                
                $averageScore = $quizCount > 0 ? $totalScore / $quizCount : 0;
                $canGenerateCertificate = $completedLessons >= $totalLessons && 
                                        ($totalQuizzes == 0 || ($passedQuizzes >= $totalQuizzes && $averageScore >= 70));
                
                $existingCertificate = auth()->user()->certificates()->where('course_id', $course->id)->first();
            @endphp


            @if($canGenerateCertificate)
                <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        <i class="fas fa-certificate text-yellow-500 mr-2"></i>Certificado
                    </h3>
                    
                    @if($existingCertificate)
                        <div class="text-center">
                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-certificate text-green-600 text-2xl"></i>
                            </div>
                            <p class="text-sm text-gray-600 mb-4">Certificado já emitido!</p>
                            <a href="{{ route('certificates.show', $existingCertificate) }}" 
                               class="w-full bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition flex items-center justify-center">
                                <i class="fas fa-download mr-2"></i>Baixar Certificado
                            </a>
                        </div>
                    @else
                        <div class="text-center">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-certificate text-blue-600 text-2xl"></i>
                            </div>
                            <p class="text-sm text-gray-600 mb-4">Parabéns! Você pode gerar seu certificado.</p>
                            <form method="POST" action="{{ route('certificates.generate', $course) }}" class="w-full">
                                @csrf
                                <button type="submit" 
                                        class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition flex items-center justify-center">
                                    <i class="fas fa-certificate mr-2"></i>Gerar Certificado
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>

</div>

<!-- Quiz Modal -->
<div id="quizModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 id="quizTitle" class="text-lg font-semibold text-gray-900"></h3>
                <button onclick="closeQuizModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <div id="quizInfo" class="mb-6 p-4 bg-blue-50 rounded-lg">
                <div class="flex items-center justify-between text-sm text-blue-700">
                    <span id="quizQuestions"></span>
                    <span id="quizTime"></span>
                    <span id="quizPassing"></span>
                </div>
            </div>
            
            <div id="quizContent">
            </div>
            
            <div class="mt-6 flex justify-between">
                <button onclick="closeQuizModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">
                    Cancelar
                </button>
                <button id="submitQuizBtn" onclick="submitQuiz()" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-paper-plane mr-2"></i>Enviar Respostas
                </button>
            </div>
        </div>
    </div>
</div>

<div id="quizChoiceModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-2/3 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Escolha o Resultado</h3>
                <button onclick="closeQuizChoiceModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <div class="mb-6">
                <p class="text-gray-700 mb-4">Você não passou nesta tentativa, mas já havia passado anteriormente. Qual resultado deseja manter?</p>
                
                <div class="space-y-4">
                    <div class="p-4 border border-green-200 rounded-lg bg-green-50">
                        <h4 class="font-semibold text-green-900 mb-2">Manter Melhor Resultado</h4>
                        <p class="text-green-700 text-sm mb-3">Manter a aula como concluída (resultado anterior)</p>
                        <button onclick="chooseResult('keep_best')" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                            <i class="fas fa-trophy mr-2"></i>Manter Melhor
                        </button>
                    </div>
                    
                    <div class="p-4 border border-yellow-200 rounded-lg bg-yellow-50">
                        <h4 class="font-semibold text-yellow-900 mb-2">Usar Último Resultado</h4>
                        <p class="text-yellow-700 text-sm mb-3">Marcar aula como não concluída (resultado atual)</p>
                        <button onclick="chooseResult('use_latest')" class="bg-yellow-600 text-white px-4 py-2 rounded-lg hover:bg-yellow-700 transition">
                            <i class="fas fa-clock mr-2"></i>Usar Último
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="quizResultsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Resultado do Quiz</h3>
                <button onclick="closeQuizResultsModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <div id="quizResultsContent">
            </div>
            
            <div class="mt-6 flex justify-between">
                <button onclick="retakeQuiz()" class="px-6 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition">
                    <i class="fas fa-redo mr-2"></i>Refazer Quiz
                </button>
                <button onclick="closeQuizResultsModal()" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    Fechar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let currentQuiz = null;
let quizAnswers = {};

function openQuizModal(quizId) {
    const quiz = @json($lesson->quizzes);
    currentQuiz = quiz.find(q => q.id === quizId);
    
    if (!currentQuiz) {
        alert('Quiz não encontrado');
        return;
    }
    
    document.getElementById('quizTitle').textContent = currentQuiz.title;
    document.getElementById('quizQuestions').textContent = `${currentQuiz.questions.length} questões`;
    document.getElementById('quizTime').textContent = currentQuiz.time_limit_minutes ? `${currentQuiz.time_limit_minutes}min` : 'Sem limite';
    document.getElementById('quizPassing').textContent = `${currentQuiz.passing_score}% para aprovar`;
    
    generateQuizContent();
    
    document.getElementById('quizModal').classList.remove('hidden');
}

function closeQuizModal() {
    document.getElementById('quizModal').classList.add('hidden');
    currentQuiz = null;
    quizAnswers = {};
}

function generateQuizContent() {
    const content = document.getElementById('quizContent');
    content.innerHTML = '';
    
    currentQuiz.questions.forEach((question, index) => {
        const questionDiv = document.createElement('div');
        questionDiv.className = 'mb-6 p-4 border border-gray-200 rounded-lg';
        
        questionDiv.innerHTML = `
            <h4 class="font-semibold text-gray-900 mb-3">${index + 1}. ${question.question}</h4>
            <div class="space-y-2">
                ${question.options.map((option, optionIndex) => `
                    <label class="flex items-center p-2 hover:bg-gray-50 rounded cursor-pointer">
                        <input type="radio" name="question_${index}" value="${optionIndex}" class="mr-3">
                        <span>${option}</span>
                    </label>
                `).join('')}
            </div>
        `;
        
        content.appendChild(questionDiv);
    });
}

function submitQuiz() {
    quizAnswers = {};
    currentQuiz.questions.forEach((question, index) => {
        const selectedOption = document.querySelector(`input[name="question_${index}"]:checked`);
        quizAnswers[index] = selectedOption ? parseInt(selectedOption.value) : null;
    });
    
    const unanswered = Object.values(quizAnswers).some(answer => answer === null);
    if (unanswered) {
        alert('Por favor, responda todas as questões antes de enviar.');
        return;
    }
    
    fetch(`{{ route('quiz.submit', [$course, $lesson, 'QUIZ_ID']) }}`.replace('QUIZ_ID', currentQuiz.id), {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            answers: quizAnswers
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            closeQuizModal();
            
            if (data.needs_choice) {
                showQuizChoice(data);
            } else {
                showQuizResults(data);
            }
        } else {
            alert('Erro ao enviar quiz: ' + (data.error || 'Erro desconhecido'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Erro ao enviar quiz');
    });
}

function showQuizChoice(data) {
    document.getElementById('quizChoiceModal').classList.remove('hidden');
}


function chooseResult(choice) {
    fetch(`{{ route('quiz.choose', [$course, $lesson, 'QUIZ_ID']) }}`.replace('QUIZ_ID', currentQuiz.id), {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            choice: choice
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            closeQuizChoiceModal();
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        } else {
            alert('Erro ao processar escolha: ' + (data.error || 'Erro desconhecido'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Erro ao processar escolha');
    });
}

function closeQuizChoiceModal() {
    document.getElementById('quizChoiceModal').classList.add('hidden');
}

function showQuizResults(data) {
    const resultsContent = document.getElementById('quizResultsContent');
    
    const resultClass = data.passed ? 'bg-green-50 border-green-200' : 'bg-red-50 border-red-200';
    const resultIcon = data.passed ? 'fas fa-check-circle text-green-600' : 'fas fa-times-circle text-red-600';
    const resultText = data.passed ? 'Parabéns! Você passou!' : 'Você não atingiu a pontuação mínima';
    
    resultsContent.innerHTML = `
        <div class="p-4 ${resultClass} border rounded-lg mb-4">
            <div class="flex items-center mb-2">
                <i class="${resultIcon} text-2xl mr-3"></i>
                <h4 class="font-semibold text-lg">${resultText}</h4>
            </div>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <span class="font-medium">Pontuação:</span> ${data.score}%
                </div>
                <div>
                    <span class="font-medium">Respostas corretas:</span> ${data.correct_answers}/${data.total_questions}
                </div>
                <div>
                    <span class="font-medium">Pontuação mínima:</span> ${data.passing_score}%
                </div>
                <div>
                    <span class="font-medium">Status:</span> ${data.passed ? 'Aprovado' : 'Reprovado'}
                </div>
            </div>
        </div>
        
        <div class="space-y-4">
            <h5 class="font-semibold text-gray-900">Detalhes das Respostas:</h5>
            ${data.results.map((result, index) => `
                <div class="p-3 border rounded-lg ${result.is_correct ? 'bg-green-50 border-green-200' : 'bg-red-50 border-red-200'}">
                    <div class="font-medium mb-2">${index + 1}. ${result.question}</div>
                    <div class="text-sm">
                        <div class="mb-1">
                            <span class="font-medium">Sua resposta:</span> 
                            <span class="${result.is_correct ? 'text-green-700' : 'text-red-700'}">
                                ${result.options[result.user_answer]}
                            </span>
                        </div>
                        ${!result.is_correct ? `
                            <div>
                                <span class="font-medium">Resposta correta:</span> 
                                <span class="text-green-700">${result.options[result.correct_answer]}</span>
                            </div>
                        ` : ''}
                    </div>
                </div>
            `).join('')}
        </div>
    `;
    
    document.getElementById('quizResultsModal').classList.remove('hidden');
}

function retakeQuiz() {
    document.getElementById('quizResultsModal').classList.add('hidden');
    
    if (currentQuiz) {
        openQuizModal(currentQuiz.id);
    }
}

function closeQuizResultsModal() {
    document.getElementById('quizResultsModal').classList.add('hidden');
    
    setTimeout(() => {
        window.location.reload();
    }, 1000);
}

document.addEventListener('DOMContentLoaded', function() {
    const markCompleteBtn = document.getElementById('markCompleteBtn');
    
    if (markCompleteBtn) {
        markCompleteBtn.addEventListener('click', function() {
            fetch('{{ route("student.courses.complete", [$course, $lesson]) }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    time_spent: 0
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    markCompleteBtn.innerHTML = '<i class="fas fa-check mr-2"></i>Concluída';
                    markCompleteBtn.className = 'bg-green-100 text-green-800 px-4 py-2 rounded-lg font-semibold';
                    markCompleteBtn.disabled = true;
                    
                    alert(data.message);
                    
                    setTimeout(() => {
                        window.location.reload();
                    }, 1000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Erro ao marcar aula como concluída');
            });
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const commentForm = document.getElementById('commentForm');
    const commentContent = document.getElementById('commentContent');
    const charCount = document.getElementById('charCount');
    const submitBtn = document.getElementById('submitCommentBtn');
    const commentsContainer = document.getElementById('commentsContainer');
    const commentsList = document.getElementById('commentsList');
    const commentsLoading = document.getElementById('commentsLoading');
    const noComments = document.getElementById('noComments');

    if (commentContent) {
        commentContent.addEventListener('input', function() {
            const length = this.value.length;
            charCount.textContent = `${length}/1000`;
            
            if (length > 1000) {
                charCount.classList.add('text-red-500');
                submitBtn.disabled = true;
            } else {
                charCount.classList.remove('text-red-500');
                submitBtn.disabled = false;
            }
        });
    }

    function loadComments() {
        fetch(`{{ route('comments.index', ['course' => $course->id, 'lesson' => $lesson->id]) }}`)
            .then(response => response.json())
            .then(data => {
                commentsLoading.classList.add('hidden');
                
                if (data.success && data.comments.length > 0) {
                    commentsList.classList.remove('hidden');
                    noComments.classList.add('hidden');
                    renderComments(data.comments);
                } else {
                    commentsList.classList.add('hidden');
                    noComments.classList.remove('hidden');
                }
            })
            .catch(error => {
                console.error('Erro ao carregar comentários:', error);
                commentsLoading.classList.add('hidden');
                noComments.classList.remove('hidden');
            });
    }

    function renderComments(comments) {
        commentsList.innerHTML = '';
        
        comments.forEach(comment => {
            const commentElement = createCommentElement(comment);
            commentsList.appendChild(commentElement);
        });
    }

    function createCommentElement(comment) {
        const div = document.createElement('div');
        div.className = 'border border-gray-200 rounded-lg p-4';
        div.setAttribute('data-comment-id', comment.id);
        
        const isOwner = comment.user.id === {{ auth()->id() }};
        const isInstructor = {{ auth()->user()->isInstructor() ? 'true' : 'false' }};
        const isAdmin = {{ auth()->user()->isAdmin() ? 'true' : 'false' }};
        const canDelete = isOwner || isInstructor || isAdmin;
        
        div.innerHTML = `
            <div class="flex items-start space-x-3">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-blue-600 text-sm"></i>
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <h4 class="text-sm font-medium text-gray-900">${comment.user.name}</h4>
                            ${comment.user.role === 'instructor' ? '<span class="bg-purple-100 text-purple-800 px-2 py-1 rounded-full text-xs font-medium"><i class="fas fa-chalkboard-teacher mr-1"></i>Instrutor</span>' : ''}
                            ${comment.user.role === 'admin' ? '<span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-medium"><i class="fas fa-crown mr-1"></i>Admin</span>' : ''}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="text-xs text-gray-500">${formatDate(comment.created_at)}</span>
                            ${canDelete ? `<button onclick="deleteComment(${comment.id})" class="text-red-500 hover:text-red-700 text-xs"><i class="fas fa-trash"></i></button>` : ''}
                        </div>
                    </div>
                    <p class="text-sm text-gray-700 mt-2 whitespace-pre-wrap">${comment.content}</p>
                    
                    <!-- Respostas -->
                    ${comment.replies && comment.replies.length > 0 ? `
                        <div class="mt-4 space-y-3">
                            ${comment.replies.map(reply => `
                                <div class="ml-6 border-l-2 border-gray-200 pl-4">
                                    <div class="flex items-start space-x-3">
                                        <div class="flex-shrink-0">
                                            <div class="w-6 h-6 bg-gray-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-user text-gray-600 text-xs"></i>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-2">
                                                    <h5 class="text-xs font-medium text-gray-900">${reply.user.name}</h5>
                                                    ${reply.user.role === 'instructor' ? '<span class="bg-purple-100 text-purple-800 px-1 py-0.5 rounded-full text-xs font-medium">Instrutor</span>' : ''}
                                                    ${reply.user.role === 'admin' ? '<span class="bg-red-100 text-red-800 px-1 py-0.5 rounded-full text-xs font-medium">Admin</span>' : ''}
                                                </div>
                                                <div class="flex items-center space-x-2">
                                                    <span class="text-xs text-gray-500">${formatDate(reply.created_at)}</span>
                                                    ${(reply.user.id === {{ auth()->id() }} || isInstructor || isAdmin) ? `<button onclick="deleteComment(${reply.id})" class="text-red-500 hover:text-red-700 text-xs"><i class="fas fa-trash"></i></button>` : ''}
                                                </div>
                                            </div>
                                            <p class="text-xs text-gray-700 mt-1 whitespace-pre-wrap">${reply.content}</p>
                                        </div>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    ` : ''}
                    
                    <!-- Botão de Responder -->
                    <div class="mt-3">
                        <button onclick="showReplyForm(${comment.id})" class="text-blue-600 hover:text-blue-800 text-xs font-medium">
                            <i class="fas fa-reply mr-1"></i>Responder
                        </button>
                    </div>
                    
                    <!-- Formulário de Resposta (oculto) -->
                    <div id="replyForm-${comment.id}" class="mt-3 hidden">
                        <form onsubmit="submitReply(event, ${comment.id})">
                            <textarea 
                                name="content" 
                                rows="2" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none text-sm"
                                placeholder="Escreva sua resposta..."
                                maxlength="1000"
                                required
                            ></textarea>
                            <div class="flex justify-end space-x-2 mt-2">
                                <button type="button" onclick="hideReplyForm(${comment.id})" class="px-3 py-1 text-sm text-gray-600 hover:text-gray-800">
                                    Cancelar
                                </button>
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm font-medium">
                                    <i class="fas fa-paper-plane mr-1"></i>Responder
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        `;
        
        return div;
    }

    function formatDate(dateString) {
        const date = new Date(dateString);
        const now = new Date();
        const diff = now - date;
        
        if (diff < 60000) { 
            return 'Agora mesmo';
        } else if (diff < 3600000) {
            const minutes = Math.floor(diff / 60000);
            return `${minutes} min atrás`;
        } else if (diff < 86400000) { 
            const hours = Math.floor(diff / 3600000);
            return `${hours}h atrás`;
        } else {
            return date.toLocaleDateString('pt-BR');
        }
    }

    if (commentForm) {
        commentForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const content = commentContent.value.trim();
            if (!content) return;
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Enviando...';
            
            fetch(`{{ route('comments.store', ['course' => $course->id, 'lesson' => $lesson->id]) }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ content: content })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    commentContent.value = '';
                    charCount.textContent = '0/1000';
                    loadComments(); 
                } else {
                    alert(data.error || 'Erro ao enviar comentário');
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao enviar comentário');
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-paper-plane mr-2"></i>Enviar Comentário';
            });
        });
    }

    loadComments();
});

function switchTab(tabName) {
    document.querySelectorAll('.tab-button').forEach(btn => {
        btn.classList.remove('active', 'border-blue-500', 'text-blue-600');
        btn.classList.add('border-transparent', 'text-gray-500');
    });
    
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.add('hidden');
    });
    
    const activeTab = document.getElementById(`tab-${tabName}`);
    const activeContent = document.getElementById(`content-${tabName}`);
    
    activeTab.classList.add('active', 'border-blue-500', 'text-blue-600');
    activeTab.classList.remove('border-transparent', 'text-gray-500');
    activeContent.classList.remove('hidden');
    
    if (tabName === 'qa') {
        if (document.getElementById('commentsList').classList.contains('hidden')) {
            document.dispatchEvent(new Event('DOMContentLoaded'));
        }
    } else if (tabName === 'reviews') {
        loadReviews();
    }
}

let currentRating = 0;

function setRating(rating) {
    currentRating = rating;
    document.getElementById('rating').value = rating;
    
    document.querySelectorAll('.star-rating').forEach((star, index) => {
        if (index < rating) {
            star.classList.remove('text-gray-300');
            star.classList.add('text-yellow-400');
        } else {
            star.classList.remove('text-yellow-400');
            star.classList.add('text-gray-300');
        }
    });
}

function loadReviews() {
    document.getElementById('reviewsLoading').classList.remove('hidden');
    document.getElementById('reviewsList').classList.add('hidden');
    document.getElementById('noReviews').classList.add('hidden');
    
    setTimeout(() => {
        document.getElementById('reviewsLoading').classList.add('hidden');
        document.getElementById('noReviews').classList.remove('hidden');
    }, 1000);
}

document.addEventListener('DOMContentLoaded', function() {
    const reviewComment = document.getElementById('reviewComment');
    const reviewCharCount = document.getElementById('reviewCharCount');
    
    if (reviewComment && reviewCharCount) {
        reviewComment.addEventListener('input', function() {
            const length = this.value.length;
            reviewCharCount.textContent = `${length}/500`;
            
            if (length > 500) {
                reviewCharCount.classList.add('text-red-500');
            } else {
                reviewCharCount.classList.remove('text-red-500');
            }
        });
    }
    
    const reviewForm = document.getElementById('reviewForm');
    if (reviewForm) {
        reviewForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const rating = document.getElementById('rating').value;
            const comment = document.getElementById('reviewComment').value.trim();
            
            if (rating == 0) {
                alert('Por favor, selecione uma avaliação de 1 a 5 estrelas');
                return;
            }
            
            const submitBtn = document.getElementById('submitReviewBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Enviando...';
            
            setTimeout(() => {
                alert('Avaliação enviada com sucesso!');
                reviewForm.reset();
                currentRating = 0;
                document.querySelectorAll('.star-rating').forEach(star => {
                    star.classList.remove('text-yellow-400');
                    star.classList.add('text-gray-300');
                });
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-star mr-2"></i>Enviar Avaliação';
            }, 1000);
        });
    }
});

function showReplyForm(commentId) {
    const form = document.getElementById(`replyForm-${commentId}`);
    if (form) {
        form.classList.remove('hidden');
    }
}

function hideReplyForm(commentId) {
    const form = document.getElementById(`replyForm-${commentId}`);
    if (form) {
        form.classList.add('hidden');
        form.querySelector('textarea').value = '';
    }
}

function submitReply(event, parentId) {
    event.preventDefault();
    
    const form = event.target;
    const content = form.querySelector('textarea').value.trim();
    if (!content) return;
    
    const submitBtn = form.querySelector('button[type="submit"]');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Enviando...';
    
    fetch(`{{ route('comments.store', ['course' => $course->id, 'lesson' => $lesson->id]) }}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ 
            content: content,
            parent_id: parentId
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            hideReplyForm(parentId);
            document.getElementById('commentsLoading').classList.remove('hidden');
            document.getElementById('commentsList').classList.add('hidden');
            document.getElementById('noComments').classList.add('hidden');
            setTimeout(() => {
                document.dispatchEvent(new Event('DOMContentLoaded'));
            }, 100);
        } else {
            alert(data.error || 'Erro ao enviar resposta');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao enviar resposta');
    })
    .finally(() => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-paper-plane mr-1"></i>Responder';
    });
}

function deleteComment(commentId) {
    if (!confirm('Tem certeza que deseja excluir este comentário?')) {
        return;
    }
    
    fetch(`/my-courses/{{ $course->id }}/lesson/{{ $lesson->id }}/comments/${commentId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('commentsLoading').classList.remove('hidden');
            document.getElementById('commentsList').classList.add('hidden');
            document.getElementById('noComments').classList.add('hidden');
            setTimeout(() => {
                document.dispatchEvent(new Event('DOMContentLoaded'));
            }, 100);
        } else {
            alert(data.error || 'Erro ao excluir comentário');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao excluir comentário');
    });
}

function toggleModule(moduleId) {
    const moduleContent = document.getElementById(`module-${moduleId}`);
    const chevron = document.getElementById(`chevron-${moduleId}`);
    
    if (moduleContent.classList.contains('hidden')) {
        moduleContent.classList.remove('hidden');
        chevron.style.transform = 'rotate(180deg)';
    } else {
        moduleContent.classList.add('hidden');
        chevron.style.transform = 'rotate(0deg)';
    }
}

function updateModuleProgressFromIcon(iconElement) {
    const moduleItem = iconElement.closest('.border.border-gray-200.rounded-lg');
    if (!moduleItem) return;
    
    const progressSpan = moduleItem.querySelector('.text-xs.text-gray-500, .text-xs.text-green-600, .text-xs.text-yellow-600');
    if (!progressSpan) return;
    
    const currentText = progressSpan.textContent;
    const [completed, total] = currentText.split('/').map(Number);
    const newCompleted = completed - 1;
    
    progressSpan.textContent = `${newCompleted}/${total}`;
    
    if (newCompleted === total) {
        progressSpan.className = 'text-xs text-green-600 font-medium';
    } else if (newCompleted > 0) {
        progressSpan.className = 'text-xs text-yellow-600 font-medium';
    } else {
        progressSpan.className = 'text-xs text-gray-500';
    }
}

function toggleLessonCompletionFromIcon(iconElement) {
    const lessonId = iconElement.dataset.lessonId;
    const courseId = iconElement.dataset.courseId;
    const isCompleted = false; 
    
    iconElement.style.pointerEvents = 'none';
    iconElement.style.opacity = '0.5';
    
    fetch(`/my-courses/${courseId}/lesson/${lessonId}/complete`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            completed: isCompleted,
            time_spent: 0
        })
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(data => {
                throw new Error(data.error || `HTTP ${response.status}: ${response.statusText}`);
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            const lessonItem = iconElement.closest('.flex');
            if (lessonItem) {
                const statusSpan = lessonItem.querySelector('.text-xs');
                const iconContainer = lessonItem.querySelector('.flex-shrink-0');
                
                
                if (iconContainer) {
                    iconContainer.innerHTML = `
                        <input 
                            type="checkbox" 
                            class="lesson-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" 
                            data-lesson-id="${lessonId}"
                            data-course-id="${courseId}"
                            onchange="toggleLessonCompletion(this)"
                        >
                    `;
                }
                
                if (statusSpan) {
                    statusSpan.className = 'text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full';
                    statusSpan.textContent = 'Pendente';
                }
            }
            
            updateModuleProgressFromIcon(iconElement);
            
            showNotification('Aula marcada como pendente!', 'success');
            
            setTimeout(() => {
                if (!lessonItem.querySelector('.lesson-checkbox')) {
                    window.location.reload();
                }
            }, 1000);
        } else {
            showNotification(data.error || 'Erro ao atualizar status da aula', 'error');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        showNotification(`Erro: ${error.message}`, 'error');
    })
    .finally(() => {
        iconElement.style.pointerEvents = 'auto';
        iconElement.style.opacity = '1';
    });
}

function toggleLessonCompletion(checkbox) {
    const lessonId = checkbox.dataset.lessonId;
    const courseId = checkbox.dataset.courseId;
    const isCompleted = checkbox.checked;
    
    checkbox.disabled = true;
    
    fetch(`/my-courses/${courseId}/lesson/${lessonId}/complete`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            completed: isCompleted,
            time_spent: 0
        })
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(data => {
                throw new Error(data.error || `HTTP ${response.status}: ${response.statusText}`);
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            const lessonItem = checkbox.closest('.flex');
            if (lessonItem) {
                const statusSpan = lessonItem.querySelector('.text-xs');
                const checkboxContainer = lessonItem.querySelector('.flex-shrink-0');
                
                if (checkboxContainer) {
                    if (isCompleted) {
                        checkboxContainer.innerHTML = `
                            <div class="w-4 h-4 rounded-full flex items-center justify-center bg-green-100 text-green-600">
                                <i class="fas fa-check text-xs"></i>
                            </div>
                        `;
                    } else {
                        const lessonId = checkbox.dataset.lessonId;
                        const courseId = checkbox.dataset.courseId;
                        checkboxContainer.innerHTML = `
                            <input 
                                type="checkbox" 
                                class="lesson-checkbox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" 
                                data-lesson-id="${lessonId}"
                                data-course-id="${courseId}"
                                onchange="toggleLessonCompletion(this)"
                            >
                        `;
                    }
                }
                
                if (statusSpan) {
                    if (isCompleted) {
                        statusSpan.className = 'text-xs bg-green-100 text-green-800 px-2 py-1 rounded-full';
                        statusSpan.textContent = 'Concluída';
                    } else {
                        statusSpan.className = 'text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full';
                        statusSpan.textContent = 'Pendente';
                    }
                }
            }
            
            updateModuleProgress(checkbox);
            
            showNotification(isCompleted ? 'Aula marcada como concluída!' : 'Aula marcada como pendente!', 'success');
        } else {
            checkbox.checked = !isCompleted;
            showNotification(data.error || 'Erro ao atualizar status da aula', 'error');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        checkbox.checked = !isCompleted;
        showNotification(`Erro: ${error.message}`, 'error');
    })
    .finally(() => {
        checkbox.disabled = false;
    });
}

function updateModuleProgress(checkbox) {
    const moduleItem = checkbox.closest('.border.border-gray-200.rounded-lg');
    if (!moduleItem) return;
    
    const progressSpan = moduleItem.querySelector('.text-xs.text-gray-500, .text-xs.text-green-600, .text-xs.text-yellow-600');
    if (!progressSpan) return;
    
    const currentText = progressSpan.textContent;
    const [completed, total] = currentText.split('/').map(Number);
    const isCompleted = checkbox.checked;
    const newCompleted = isCompleted ? completed + 1 : completed - 1;
    
    progressSpan.textContent = `${newCompleted}/${total}`;
    
    if (newCompleted === total) {
        progressSpan.className = 'text-xs text-green-600 font-medium';
    } else if (newCompleted > 0) {
        progressSpan.className = 'text-xs text-yellow-600 font-medium';
    } else {
        progressSpan.className = 'text-xs text-gray-500';
    }
}

function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-300 ${
        type === 'success' ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200'
    }`;
    notification.innerHTML = `
        <div class="flex items-center">
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} mr-2"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

document.addEventListener('DOMContentLoaded', function() {
    const currentLessonId = {{ $lesson->id }};
    const currentModuleId = {{ $lesson->module_id }};
    
    const currentModule = document.getElementById(`module-${currentModuleId}`);
    const currentChevron = document.getElementById(`chevron-${currentModuleId}`);
    
    if (currentModule && currentChevron) {
        currentModule.classList.remove('hidden');
        currentChevron.style.transform = 'rotate(180deg)';
    }
});
</script>
@endsection
