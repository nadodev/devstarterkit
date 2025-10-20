@extends('layouts.app')

@section('title', $course->title . ' - EduPlatform')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-blue-900-purple-900 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 py-16">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Content -->
            <div>
                <div class="inline-flex items-center bg-white/10 backdrop-blur-sm rounded-full px-4 py-2 mb-6 text-sm font-medium">
                    <i class="fas fa-book text-yellow-400 mr-2"></i>
                    {{ $course->category->name }}
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                    {{ $course->title }}
                </h1>
                
                <p class="text-xl text-blue-100 mb-8 leading-relaxed">
                    {{ $course->description }}
                </p>
                
                <!-- Course Stats -->
                <div class="flex flex-wrap items-center gap-6 mb-8">
                    <div class="flex items-center bg-white/10 backdrop-blur-sm rounded-full px-4 py-2">
                        <i class="fas fa-signal text-yellow-400 mr-2"></i>
                        <span class="font-semibold">{{ ucfirst($course->level) }}</span>
                    </div>
                    <div class="flex items-center bg-white/10 backdrop-blur-sm rounded-full px-4 py-2">
                        <i class="fas fa-clock text-blue-400 mr-2"></i>
                        <span class="font-semibold">{{ $course->duration_hours }} horas</span>
                    </div>
                    <div class="flex items-center bg-white/10 backdrop-blur-sm rounded-full px-4 py-2">
                        <i class="fas fa-users text-green-400 mr-2"></i>
                        <span class="font-semibold">{{ $course->students_count }} alunos</span>
                    </div>
                    <div class="flex items-center bg-white/10 backdrop-blur-sm rounded-full px-4 py-2">
                        <i class="fas fa-star text-yellow-400 mr-2"></i>
                        <span class="font-semibold">{{ $course->rating }}</span>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    @auth
                        @php
                            $isEnrolled = auth()->user()->enrollments()->where('course_id', $course->id)->exists();
                        @endphp
                        
                        @if($isEnrolled)
                            <div class="flex items-center bg-green-500/20 backdrop-blur-sm text-green-300 px-6 py-3 rounded-xl font-semibold">
                                <i class="fas fa-check mr-2"></i>
                                Você está inscrito neste curso
                            </div>
                            <form method="POST" action="{{ route('courses.unenroll', $course) }}" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500/20 backdrop-blur-sm text-red-300 px-6 py-3 rounded-xl font-semibold hover:bg-red-500/30 transition">
                                    <i class="fas fa-times mr-2"></i>
                                    Cancelar inscrição
                                </button>
                            </form>
                        @else
                            @if(auth()->user()->isStudent())
                                <form method="POST" action="{{ route('courses.enroll', $course) }}">
                                    @csrf
                                    <button type="submit" class="bg-white text-blue-600 px-8 py-3 rounded-xl font-bold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                                        <i class="fas fa-plus mr-2"></i>
                                        Inscrever-se no Curso
                                    </button>
                                </form>
                            @else
                                <div class="bg-yellow-500/20 backdrop-blur-sm text-yellow-300 px-6 py-3 rounded-xl font-semibold">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Apenas estudantes podem se inscrever em cursos
                                </div>
                            @endif
                        @endif
                    @else
                        <a href="{{ route('register') }}" class="bg-white text-blue-600 px-8 py-3 rounded-xl font-bold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                            <i class="fas fa-user-plus mr-2"></i>
                            Inscrever-se
                        </a>
                    @endauth
                </div>
            </div>
            
            <!-- Course Image -->
            <div class="relative">
                <div class="relative bg-gradient-blue-purple rounded-3xl p-8 shadow-2xl">
                    <div class="aspect-video bg-black/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                        @if($course->cover_image)
                            <img src="{{ Storage::url($course->cover_image) }}" 
                                 alt="{{ $course->title }}" 
                                 class="w-full h-full object-cover rounded-2xl">
                        @else
                            <div class="text-center">
                                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                                    <i class="fas fa-play text-white text-3xl ml-1"></i>
                                </div>
                                <h3 class="text-white text-xl font-bold mb-2">Curso Disponível</h3>
                                <p class="text-blue-100">Acesse o conteúdo completo</p>
                            </div>
                        @endif
                    </div>
                </div>
                
                <!-- Price Card -->
                <div class="absolute -bottom-4 -right-4 bg-white rounded-2xl p-6 shadow-xl">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-gray-900 mb-1">
                            @if($course->is_free)
                                <span class="bg-green-100 text-green-800 px-4 py-2 rounded-full text-lg font-semibold">Grátis</span>
                            @else
                                R$ {{ number_format($course->price, 2, ',', '.') }}
                            @endif
                        </div>
                        <div class="text-sm text-gray-600">Preço do curso</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Course Content -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- What You'll Learn -->
                @if($course->what_you_will_learn)
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-green rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-lightbulb text-white text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">O que você vai aprender</h2>
                    </div>
                    <div class="prose max-w-none text-gray-600 leading-relaxed">
                        {!! nl2br(e($course->what_you_will_learn)) !!}
                    </div>
                </div>
                @endif

                <!-- Requirements -->
                @if($course->requirements)
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-blue-purple rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-list-check text-white text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">Requisitos</h2>
                    </div>
                    <div class="prose max-w-none text-gray-600 leading-relaxed">
                        {!! nl2br(e($course->requirements)) !!}
                    </div>
                </div>
                @endif

                <!-- Course Curriculum -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8">
                    <div class="flex items-center mb-8">
                        <div class="w-12 h-12 bg-gradient-purple rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-book-open text-white text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">Conteúdo do Curso</h2>
                    </div>
                    
                    <div class="space-y-6">
                        @forelse($course->modules as $module)
                        <div class="border border-gray-200 rounded-2xl overflow-hidden">
                            <div class="p-6 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900">{{ $module->title }}</h3>
                                        @if($module->description)
                                            <p class="text-sm text-gray-600 mt-1">{{ $module->description }}</p>
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $module->lessons->count() }} aulas
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-6">
                                <div class="space-y-3">
                                    @forelse($module->lessons as $lesson)
                                    <div class="flex items-center justify-between py-3 px-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                                <i class="fas fa-{{ $lesson->has_video ? 'play' : ($lesson->has_text ? 'file-alt' : 'file') }} text-blue-600"></i>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-900">{{ $lesson->title }}</span>
                                                @if($lesson->duration_minutes > 0)
                                                    <span class="ml-2 text-sm text-gray-500">({{ $lesson->duration_minutes }}min)</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            @if($lesson->is_free)
                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold">Grátis</span>
                                            @endif
                                            <i class="fas fa-chevron-right text-gray-400"></i>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="text-center py-8">
                                        <i class="fas fa-book-open text-gray-400 text-2xl mb-2"></i>
                                        <p class="text-gray-500 text-sm">Nenhuma aula disponível ainda</p>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-12">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-book-open text-gray-400 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Conteúdo em desenvolvimento</h3>
                            <p class="text-gray-500">O instrutor ainda está preparando o conteúdo deste curso</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Instructor -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Instrutor</h3>
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gradient-blue-purple rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-user text-white text-xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ $course->user->name }}</h4>
                            <p class="text-sm text-gray-600">Instrutor Especialista</p>
                            <div class="flex items-center mt-2">
                                <div class="flex text-yellow-400 mr-2">
                                    @for($i = 0; $i < 5; $i++)
                                        <i class="fas fa-star text-sm"></i>
                                    @endfor
                                </div>
                                <span class="text-sm text-gray-600">4.9 (127 avaliações)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course Info -->
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Informações do Curso</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between py-2 border-b border-gray-100">
                            <div class="flex items-center">
                                <i class="fas fa-signal text-blue-500 mr-3"></i>
                                <span class="text-gray-600">Nível:</span>
                            </div>
                            <span class="font-semibold text-gray-900">{{ ucfirst($course->level) }}</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-gray-100">
                            <div class="flex items-center">
                                <i class="fas fa-clock text-green-500 mr-3"></i>
                                <span class="text-gray-600">Duração:</span>
                            </div>
                            <span class="font-semibold text-gray-900">{{ $course->duration_hours }} horas</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-gray-100">
                            <div class="flex items-center">
                                <i class="fas fa-users text-purple-500 mr-3"></i>
                                <span class="text-gray-600">Alunos:</span>
                            </div>
                            <span class="font-semibold text-gray-900">{{ $course->students_count }}</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-gray-100">
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-500 mr-3"></i>
                                <span class="text-gray-600">Avaliação:</span>
                            </div>
                            <span class="font-semibold text-gray-900">{{ $course->rating }} ⭐</span>
                        </div>
                        <div class="flex items-center justify-between py-2">
                            <div class="flex items-center">
                                <i class="fas fa-folder text-indigo-500 mr-3"></i>
                                <span class="text-gray-600">Categoria:</span>
                            </div>
                            <span class="font-semibold text-gray-900">{{ $course->category->name }}</span>
                        </div>
                    </div>
                </div>

                <!-- Course Actions -->
                <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-6 border border-blue-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Ações do Curso</h3>
                    <div class="space-y-3">
                        <button class="w-full bg-gradient-blue-600-purple-600 text-white py-3 rounded-xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-share mr-2"></i>
                            Compartilhar Curso
                        </button>
                        <button class="w-full bg-white text-gray-700 py-3 rounded-xl font-semibold border border-gray-300 hover:bg-gray-50 transition">
                            <i class="fas fa-bookmark mr-2"></i>
                            Salvar nos Favoritos
                        </button>
                        <button class="w-full bg-white text-gray-700 py-3 rounded-xl font-semibold border border-gray-300 hover:bg-gray-50 transition">
                            <i class="fas fa-flag mr-2"></i>
                            Reportar Problema
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection