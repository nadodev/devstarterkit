@extends('layouts.app')

@section('title', $course->title . ' - Meus Cursos')

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
                            <i class="fas fa-play text-white text-4xl"></i>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 mb-4">
                        <span class="bg-white/20 backdrop-blur-sm text-white text-sm font-semibold px-4 py-2 rounded-full">{{ ucfirst($course->level) }}</span>
                        <span class="text-white/80">{{ $course->category->name }}</span>
                        <span class="text-white/80">•</span>
                        <span class="text-white/80">{{ $course->duration_hours }}h</span>
                    </div>
                    
                    <h1 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                        {{ $course->title }}
                    </h1>
                    <p class="text-xl text-white mb-6 max-w-3xl">{{ $course->description }}</p>
                    
                    <!-- Progress Circle -->
                    <div class="relative">
                        <div class="w-48 h-48 relative">
                            <svg class="w-48 h-48 transform -rotate-90" viewBox="0 0 100 100">
                                <circle cx="50" cy="50" r="40" stroke="rgba(255,255,255,0.2)" stroke-width="8" fill="none"/>
                                <circle cx="50" cy="50" r="40" stroke="url(#gradient)" stroke-width="8" fill="none" 
                                        stroke-dasharray="{{ 2 * 3.14159 * 40 }}" 
                                        stroke-dashoffset="{{ 2 * 3.14159 * 40 * (1 - $progressPercentage / 100) }}"
                                        stroke-linecap="round" class="transition-all duration-1000 ease-out"/>
                                <defs>
                                    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                        <stop offset="0%" style="stop-color:#fbbf24;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#f59e0b;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="text-center">
                                    <div class="text-4xl font-bold text-white">{{ $progressPercentage }}%</div>
                                    <div class="text-white text-sm font-medium">Progresso</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-16">
        <!-- Progress Message Card -->
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden mb-8">
            <div class="p-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Status do Curso</h3>
                    <span class="text-3xl font-bold text-blue-600">{{ $progressPercentage }}%</span>
                </div>
                
                <div class="w-full bg-gray-200 rounded-full h-4 mb-6">
                    <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-4 rounded-full transition-all duration-1000 ease-out" 
                         style="width: {{ $progressPercentage }}%"></div>
                </div>
                
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6">
                    <p class="text-lg text-gray-700">
                        @php
                            // Verificar se todos os requisitos estão completos
                            $totalLessons = $course->lessons()->where('lessons.is_published', true)->count();
                            $completedLessons = auth()->user()->progress()
                                ->whereHas('lesson', function($query) use ($course) {
                                    $query->whereHas('module', function($q) use ($course) {
                                        $q->where('course_id', $course->id);
                                    });
                                })
                                ->where('is_completed', true)
                                ->count();
                            
                            // Verificar quizzes - buscar diretamente na tabela quiz_attempts
                            $userQuizAttempts = \DB::table('quiz_attempts')
                                ->where('user_id', auth()->id())
                                ->where('course_id', $course->id)
                                ->get();
                            
                            // Agrupar por quiz_id e verificar se tem pelo menos uma nota >= 70% em cada quiz
                            $quizResults = $userQuizAttempts->groupBy('quiz_id')->map(function($attempts) {
                                return $attempts->sortByDesc('score')->first();
                            });
                            
                            $totalQuizzes = $quizResults->count();
                            $passedQuizzes = $quizResults->where('score', '>=', 70)->count();
                            
                            $allLessonsCompleted = $completedLessons >= $totalLessons && $totalLessons > 0;
                            $allQuizzesPassed = $totalQuizzes > 0 && $passedQuizzes >= $totalQuizzes;
                            $courseFullyCompleted = $allLessonsCompleted && $allQuizzesPassed && $totalQuizzes > 0 && $totalLessons > 0;
                            
                        @endphp
                        
                        @if($courseFullyCompleted)
                            🎉 Parabéns! Você concluiu este curso!
                        @elseif($allLessonsCompleted && !$allQuizzesPassed)
                            ⚠️ Aulas concluídas! Complete os quizzes restantes ({{ $passedQuizzes }}/{{ $totalQuizzes }} aprovados) para finalizar o curso.
                        @elseif($totalLessons == 0)
                            📚 Este curso ainda não possui aulas disponíveis.
                        @elseif($totalQuizzes == 0)
                            📝 Este curso não possui quizzes. Entre em contato com o instrutor.
                        @else
                            📖 Continue estudando para concluir o curso
                        @endif
                    </p>
                    
                    @if($courseFullyCompleted)
                        <div class="mt-4">
                            @php
                                $existingCertificate = auth()->user()->certificates()->where('course_id', $course->id)->first();
                            @endphp
                            
                            @if($existingCertificate)
                                <a href="{{ route('certificates.show', $existingCertificate) }}" 
                                   class="inline-flex items-center px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition">
                                    <i class="fas fa-certificate mr-2"></i>Ver Certificado
                                </a>
                            @else
                                <form method="POST" action="{{ route('certificates.generate', $course) }}" class="inline">
                                    @csrf
                                    <button type="submit" 
                                            class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                        <i class="fas fa-certificate mr-2"></i>Gerar Certificado
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Course Content -->
            <div class="lg:col-span-3">
                <!-- Course Curriculum -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-blue-600-purple-600 px-8 py-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold text-white">Conteúdo do Curso</h2>
                                <p class="text-white mt-1 font-medium">Módulos e aulas disponíveis</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8">
                        @forelse($course->modules as $module)
                        <div class="group relative bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl p-6 mb-6 hover:shadow-lg transition-all duration-300 border border-gray-200">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <div class="w-16 h-16 bg-gradient-blue-purple rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        <i class="fas fa-folder text-white text-xl"></i>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-300">
                                        {{ $module->title }}
                                    </h3>
                                    @if($module->description)
                                        <p class="text-gray-600 mb-4">{{ $module->description }}</p>
                                    @endif
                                    
                                    <div class="space-y-3">
                                        @forelse($module->lessons as $lesson)
                                        @php
                                            $lessonProgress = $userProgress->get($lesson->id);
                                            $isCompleted = $lessonProgress && $lessonProgress->is_completed;
                                        @endphp
                                        <div class="group/lesson relative bg-white rounded-2xl p-4 hover:shadow-md transition-all duration-300 border border-gray-200">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-4">
                                                    <div class="w-12 h-12 rounded-2xl flex items-center justify-center shadow-lg {{ $isCompleted ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-400' }} group-hover/lesson:scale-110 transition-transform duration-300">
                                                        @if($isCompleted)
                                                            <i class="fas fa-check text-lg"></i>
                                                        @else
                                                            <i class="fas fa-{{ $lesson->type === 'video' ? 'play' : ($lesson->type === 'text' ? 'file-alt' : 'file') }} text-lg"></i>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <h4 class="text-lg font-semibold text-gray-900 group-hover/lesson:text-blue-600 transition-colors duration-300">{{ $lesson->title }}</h4>
                                                        <p class="text-sm text-gray-500">
                                                            {{ ucfirst($lesson->type) }}
                                                            @if($lesson->duration_minutes > 0)
                                                                • {{ $lesson->duration_minutes }}min
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center space-x-3">
                                                    @if($isCompleted)
                                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                            <i class="fas fa-check mr-1"></i>Concluída
                                                        </span>
                                                    @endif
                                                    <a href="{{ route('student.courses.lesson', [$course, $lesson]) }}" 
                                                       class="bg-gradient-blue-purple text-white px-6 py-2 rounded-xl font-medium hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                                                        <i class="fas fa-{{ $isCompleted ? 'redo' : 'play' }} mr-2"></i>{{ $isCompleted ? 'Revisar' : 'Assistir' }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="text-center py-8">
                                            <div class="w-16 h-16 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                                <i class="fas fa-book-open text-gray-400 text-2xl"></i>
                                            </div>
                                            <p class="text-gray-500">Nenhuma aula disponível ainda</p>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-16">
                            <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-book-open text-blue-500 text-3xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Conteúdo em desenvolvimento</h3>
                            <p class="text-gray-600 text-lg">O instrutor ainda está preparando o conteúdo deste curso.</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Course Info -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-green px-6 py-4">
                        <h3 class="text-xl font-bold text-white">Informações do Curso</h3>
                        <p class="text-white text-sm font-medium">Detalhes importantes</p>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Nível:</span>
                                <span class="font-semibold text-gray-900">{{ ucfirst($course->level) }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Duração:</span>
                                <span class="font-semibold text-gray-900">{{ $course->duration_hours }}h</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Aulas:</span>
                                <span class="font-semibold text-gray-900">{{ $course->lessons()->where('lessons.is_published', true)->count() }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Categoria:</span>
                                <span class="font-semibold text-gray-900">{{ $course->category->name }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Instrutor:</span>
                                <span class="font-semibold text-gray-900">{{ $course->user->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-blue-purple px-6 py-4">
                        <h3 class="text-xl font-bold text-white">Ações Rápidas</h3>
                        <p class="text-white text-sm font-medium">Navegação e recursos</p>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <a href="{{ route('student.courses.index') }}" 
                               class="group flex items-center p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl hover:shadow-lg transition-all duration-300 border border-gray-200">
                                <div class="w-12 h-12 bg-gradient-blue-purple rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-list text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-lg font-semibold text-gray-900">Todos os Cursos</p>
                                    <p class="text-sm text-gray-600">Voltar para lista</p>
                                </div>
                            </a>
                            
                            <a href="{{ route('courses.show', $course) }}" 
                               class="group flex items-center p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl hover:shadow-lg transition-all duration-300 border border-gray-200">
                                <div class="w-12 h-12 bg-gradient-green rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-info text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-lg font-semibold text-gray-900">Ver Detalhes</p>
                                    <p class="text-sm text-gray-600">Informações públicas</p>
                                </div>
                            </a>
                            
                            @if($progressPercentage >= 100)
                            <a href="#" 
                               class="group flex items-center p-4 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-2xl hover:shadow-lg transition-all duration-300 border border-yellow-200">
                                <div class="w-12 h-12 bg-gradient-yellow-orange-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <i class="fas fa-certificate text-white"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-lg font-semibold text-gray-900">Baixar Certificado</p>
                                    <p class="text-sm text-gray-600">Certificado de conclusão</p>
                                </div>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Progress Stats -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-purple px-6 py-4">
                        <h3 class="text-xl font-bold text-white">Estatísticas</h3>
                        <p class="text-white text-sm font-medium">Seu desempenho</p>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-gray-900">{{ $progressPercentage }}%</div>
                                <div class="text-sm text-gray-600">Progresso Geral</div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Aulas Concluídas:</span>
                                    <span class="font-semibold text-gray-900">{{ $completedLessons ?? 0 }}/{{ $totalLessons ?? 0 }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Quizzes Aprovados:</span>
                                    <span class="font-semibold text-gray-900">{{ $passedQuizzes ?? 0 }}/{{ $totalQuizzes ?? 0 }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
