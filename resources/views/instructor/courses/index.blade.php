@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <!-- Hero Header -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold mb-4">Meus Cursos</h1>
                    <p class="text-xl text-blue-100">Gerencie seus cursos e conteúdos</p>
                </div>
                <a href="{{ route('instructor.courses.create') }}" 
                   class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-plus mr-2"></i>Novo Curso
                </a>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-16">
        @if($courses->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($courses as $course)
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                        <!-- Course Image -->
                        <div class="aspect-video bg-gradient-to-br from-blue-500 to-purple-600 relative overflow-hidden">
                            @if($course->image)
                                <img src="{{ Storage::url($course->image) }}" 
                                     alt="{{ $course->title }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <i class="fas fa-book text-white text-6xl"></i>
                                </div>
                            @endif
                            
                            <!-- Status Badge -->
                            <div class="absolute top-4 right-4">
                                @if($course->is_published)
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                        <i class="fas fa-check-circle mr-1"></i>Publicado
                                    </span>
                                @else
                                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">
                                        <i class="fas fa-clock mr-1"></i>Rascunho
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Course Content -->
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $course->title }}</h3>
                                    <p class="text-gray-600 text-sm line-clamp-2">{{ $course->description }}</p>
                                </div>
                            </div>

                            <!-- Course Stats -->
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="text-center p-3 bg-gray-50 rounded-xl">
                                    <div class="text-2xl font-bold text-blue-600">{{ $course->modules->count() }}</div>
                                    <div class="text-xs text-gray-600">Módulos</div>
                                </div>
                                <div class="text-center p-3 bg-gray-50 rounded-xl">
                                    <div class="text-2xl font-bold text-green-600">{{ $course->enrollments->count() }}</div>
                                    <div class="text-xs text-gray-600">Alunos</div>
                                </div>
                            </div>

                            <!-- Course Info -->
                            <div class="space-y-2 mb-6">
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-tag mr-2 text-blue-500"></i>
                                    <span>{{ $course->category->name }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-signal mr-2 text-blue-500"></i>
                                    <span>{{ ucfirst($course->level) }}</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-clock mr-2 text-blue-500"></i>
                                    <span>{{ $course->duration_hours }}h</span>
                                </div>
                                @if($course->price)
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-dollar-sign mr-2 text-blue-500"></i>
                                        <span>R$ {{ number_format($course->price, 2, ',', '.') }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Actions -->
                            <div class="flex space-x-2">
                                <a href="{{ route('instructor.courses.show', $course) }}" 
                                   class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition text-center">
                                    <i class="fas fa-eye mr-1"></i>Ver
                                </a>
                                <a href="{{ route('instructor.courses.edit', $course) }}" 
                                   class="flex-1 bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-yellow-700 transition text-center">
                                    <i class="fas fa-edit mr-1"></i>Editar
                                </a>
                                <form method="POST" action="{{ route('instructor.courses.destroy', $course) }}" class="flex-1" onsubmit="return confirm('Tem certeza que deseja excluir este curso?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="w-full bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-red-700 transition">
                                        <i class="fas fa-trash mr-1"></i>Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="w-32 h-32 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-8">
                    <i class="fas fa-book text-6xl text-blue-500"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Nenhum curso criado ainda</h3>
                <p class="text-gray-600 mb-8">Comece criando seu primeiro curso e compartilhe seu conhecimento!</p>
                <a href="{{ route('instructor.courses.create') }}" 
                   class="inline-flex items-center bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-4 rounded-xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                    <i class="fas fa-plus mr-2"></i>Criar Primeiro Curso
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
