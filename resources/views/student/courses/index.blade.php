@extends('layouts.app')

@section('title', 'Meus Cursos - EduPlatform')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-blue-900-purple-900 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 py-16">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center bg-white/10 backdrop-blur-sm rounded-full px-4 py-2 mb-6 text-sm font-medium">
                <i class="fas fa-book text-yellow-400 mr-2"></i>
                Seus cursos
            </div>
            
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Meus
                <span class="text-gradient-yellow-orange">
                    Cursos
                </span>
            </h1>
            
            <p class="text-xl md:text-2xl text-blue-100 leading-relaxed max-w-3xl mx-auto">
                Continue sua jornada de aprendizado e transforme seu futuro
            </p>
        </div>
    </div>
</section>

<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">

        @if($enrollments->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($enrollments as $enrollment)
                <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="h-48 bg-gradient-blue-purple flex items-center justify-center">
                        @if($enrollment->course->cover_image)
                            <img src="{{ $enrollment->course->cover_image }}" alt="{{ $enrollment->course->title }}" class="w-full h-full object-cover">
                        @else
                            <i class="fas fa-play-circle text-white text-6xl"></i>
                        @endif
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-1 rounded">{{ ucfirst($enrollment->course->level) }}</span>
                            <span class="ml-2 text-sm text-gray-500">{{ $enrollment->course->category->name }}</span>
                        </div>
                        
                        <h3 class="text-xl font-semibold mb-2">{{ $enrollment->course->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($enrollment->course->short_description ?? $enrollment->course->description, 100) }}</p>
                        
                        <!-- Progress Bar -->
                        <div class="mb-4">
                            <div class="flex justify-between text-sm text-gray-600 mb-1">
                                <span>Progresso</span>
                                <span>{{ $enrollment->progress_percentage }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-blue-purple h-2 rounded-full transition-all duration-300" style="width: {{ $enrollment->progress_percentage }}%"></div>
                            </div>
                        </div>
                        
                        <!-- Status -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-clock text-gray-400 mr-1"></i>
                                <span class="text-sm text-gray-600">{{ $enrollment->course->duration_hours }}h</span>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $enrollment->status === 'completed' ? 'bg-green-100 text-green-800' : ($enrollment->status === 'active' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800') }}">
                                @if($enrollment->status === 'completed')
                                    <i class="fas fa-check mr-1"></i>Concluído
                                @elseif($enrollment->status === 'active')
                                    <i class="fas fa-play mr-1"></i>Em andamento
                                @else
                                    <i class="fas fa-pause mr-1"></i>Pausado
                                @endif
                            </span>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex space-x-2">
                            @if($enrollment->status === 'completed')
                                <a href="{{ route('student.courses.show', $enrollment->course) }}" class="flex-1 bg-gradient-green text-white px-4 py-2 rounded-xl text-sm font-medium hover:shadow-lg transform hover:scale-105 transition-all duration-300 text-center">
                                    <i class="fas fa-redo mr-1"></i>Refazer
                                </a>
                            @else
                                <a href="{{ route('student.courses.show', $enrollment->course) }}" class="flex-1 bg-gradient-blue-purple text-white px-4 py-2 rounded-xl text-sm font-medium hover:shadow-lg transform hover:scale-105 transition-all duration-300 text-center">
                                    <i class="fas fa-play mr-1"></i>Continuar
                                </a>
                            @endif
                            
                            @php
                                $totalLessons = \DB::table('lessons')
                                    ->join('modules', 'modules.id', '=', 'lessons.module_id')
                                    ->where('modules.course_id', $enrollment->course->id)
                                    ->where('lessons.is_published', true)
                                    ->count();
                                
                                $completedLessons = auth()->user()->progress()
                                    ->whereHas('lesson', function($query) use ($enrollment) {
                                        $query->whereHas('module', function($q) use ($enrollment) {
                                            $q->where('course_id', $enrollment->course->id);
                                        });
                                    })
                                    ->where('is_completed', true)
                                    ->count();
                                
                                // Verificar quizzes - buscar diretamente na tabela quiz_attempts
                                $userQuizAttempts = \DB::table('quiz_attempts')
                                    ->where('user_id', auth()->id())
                                    ->where('course_id', $enrollment->course->id)
                                    ->get();
                                
                                // Agrupar por quiz_id e verificar se tem pelo menos uma nota >= 70% em cada quiz
                                $quizResults = $userQuizAttempts->groupBy('quiz_id')->map(function($attempts) {
                                    return $attempts->sortByDesc('score')->first();
                                });
                                
                                $totalQuizzes = $quizResults->count();
                                $passedQuizzes = $quizResults->where('score', '>=', 70)->count();
                                $totalScore = $quizResults->sum('score');
                                $quizCount = $quizResults->count();
                                
                                $averageScore = $quizCount > 0 ? $totalScore / $quizCount : 0;
                                $canGenerateCertificate = $completedLessons >= $totalLessons && 
                                                        $totalLessons > 0 &&
                                                        $totalQuizzes > 0 && 
                                                        $passedQuizzes >= $totalQuizzes && 
                                                        $averageScore >= 70;
                                
                                $existingCertificate = auth()->user()->certificates()->where('course_id', $enrollment->course->id)->first();
                            @endphp
                            
                            @if($canGenerateCertificate)
                                @if($existingCertificate)
                                    <a href="{{ route('certificates.show', $existingCertificate) }}" 
                                       class="bg-gradient-yellow-orange-500 text-white px-4 py-2 rounded-xl text-sm font-medium hover:shadow-lg transform hover:scale-105 transition-all duration-300"
                                       title="Baixar Certificado">
                                        <i class="fas fa-download"></i>
                                    </a>
                                @else
                                    <form method="POST" action="{{ route('certificates.generate', $enrollment->course) }}" class="inline">
                                        @csrf
                                        <button type="submit" 
                                                class="bg-gradient-green text-white px-4 py-2 rounded-xl text-sm font-medium hover:shadow-lg transform hover:scale-105 transition-all duration-300"
                                                title="Gerar Certificado">
                                            <i class="fas fa-certificate"></i>
                                        </button>
                                    </form>
                                @endif
                            @endif
                            
                            <a href="{{ route('courses.show', $enrollment->course) }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-300 transition">
                                <i class="fas fa-info"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-book-open text-gray-400 text-6xl mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Nenhum curso encontrado</h3>
                <p class="text-gray-600 mb-6">Você ainda não está inscrito em nenhum curso.</p>
                <a href="{{ route('courses.index') }}" class="bg-gradient-blue-purple text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    <i class="fas fa-search mr-2"></i>Explorar Cursos
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
