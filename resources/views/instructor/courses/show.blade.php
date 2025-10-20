@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <!-- Hero Header -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center mb-4">
                        @if($course->is_published)
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium mr-4">
                                <i class="fas fa-check-circle mr-1"></i>Publicado
                            </span>
                        @else
                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium mr-4">
                                <i class="fas fa-clock mr-1"></i>Rascunho
                            </span>
                        @endif
                        <span class="bg-white bg-opacity-20 text-white px-3 py-1 rounded-full text-sm font-medium">
                            {{ $course->category->name }}
                        </span>
                    </div>
                    <h1 class="text-4xl font-bold mb-4">{{ $course->title }}</h1>
                    <p class="text-xl text-blue-100">{{ $course->description }}</p>
                </div>
                <div class="flex space-x-4">
                    <a href="{{ route('instructor.courses.edit', $course) }}" 
                       class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300">
                        <i class="fas fa-edit mr-2"></i>Editar
                    </a>
                    <a href="{{ route('instructor.courses.index') }}" 
                       class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Course Image -->
                @if($course->image)
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                        <img src="{{ Storage::url($course->image) }}" 
                             alt="{{ $course->title }}" 
                             class="w-full h-64 object-cover">
                    </div>
                @endif

                <!-- Course Modules -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white">Módulos do Curso</h2>
                        <p class="text-white mt-1 font-medium">{{ $course->modules->count() }} módulos</p>
                    </div>
                    
                    <div class="p-8">
                        @if($course->modules->count() > 0)
                            <div class="space-y-6">
                                @foreach($course->modules as $module)
                                    <div class="border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start justify-between mb-4">
                                            <div>
                                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $module->title }}</h3>
                                                <p class="text-gray-600">{{ $module->description }}</p>
                                            </div>
                                            <div class="flex items-center space-x-4">
                                                <div class="text-right">
                                                    <div class="text-2xl font-bold text-blue-600">{{ $module->lessons->count() }}</div>
                                                    <div class="text-sm text-gray-500">Aulas</div>
                                                </div>
                                                <a href="{{ route('instructor.modules.edit', [$course, $module]) }}" 
                                                   class="text-blue-600 hover:text-blue-800 text-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        @if($module->lessons->count() > 0)
                                            <div class="space-y-3">
                                                @foreach($module->lessons as $lesson)
                                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                                        <div class="flex items-center">
                                                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                                                @if($lesson->has_video && $lesson->has_text && $lesson->has_file)
                                                                    <i class="fas fa-layer-group text-blue-600"></i>
                                                                @elseif($lesson->has_video && $lesson->has_text)
                                                                    <i class="fas fa-play-circle text-blue-600"></i>
                                                                @elseif($lesson->has_video && $lesson->has_file)
                                                                    <i class="fas fa-video text-blue-600"></i>
                                                                @elseif($lesson->has_text && $lesson->has_file)
                                                                    <i class="fas fa-file-alt text-blue-600"></i>
                                                                @elseif($lesson->has_video)
                                                                    <i class="fas fa-play text-blue-600"></i>
                                                                @elseif($lesson->has_text)
                                                                    <i class="fas fa-file-alt text-blue-600"></i>
                                                                @elseif($lesson->has_file)
                                                                    <i class="fas fa-download text-blue-600"></i>
                                                                @else
                                                                    <i class="fas fa-book text-blue-600"></i>
                                                                @endif
                                                            </div>
                                                            <div>
                                                                <p class="font-medium text-gray-900">{{ $lesson->title }}</p>
                                                                <p class="text-sm text-gray-500">
                                                                    @if($lesson->has_video && $lesson->has_text && $lesson->has_file)
                                                                        Vídeo + Texto + Arquivo
                                                                    @elseif($lesson->has_video && $lesson->has_text)
                                                                        Vídeo + Texto
                                                                    @elseif($lesson->has_video && $lesson->has_file)
                                                                        Vídeo + Arquivo
                                                                    @elseif($lesson->has_text && $lesson->has_file)
                                                                        Texto + Arquivo
                                                                    @elseif($lesson->has_video)
                                                                        Vídeo
                                                                    @elseif($lesson->has_text)
                                                                        Texto
                                                                    @elseif($lesson->has_file)
                                                                        Arquivo
                                                                    @else
                                                                        Aula
                                                                    @endif
                                                                    • {{ $lesson->duration_minutes ?? 0 }}min
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center space-x-2">
                                                            @if($lesson->is_published)
                                                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Publicada</span>
                                                            @else
                                                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">Rascunho</span>
                                                            @endif
                                                            <a href="{{ route('instructor.lessons.edit', [$course, $module, $lesson]) }}" 
                                                               class="text-blue-600 hover:text-blue-800 text-sm">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="mt-4 pt-4 border-t border-gray-200">
                                                <a href="{{ route('instructor.lessons.create', [$course, $module]) }}" 
                                                   class="w-full bg-purple-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-purple-700 transition flex items-center justify-center">
                                                    <i class="fas fa-plus mr-2"></i>Adicionar Aula
                                                </a>
                                            </div>
                                        @else
                                            <div class="text-center py-8 text-gray-500">
                                                <i class="fas fa-book text-4xl mb-4"></i>
                                                <p class="mb-4">Nenhuma aula neste módulo</p>
                                                <a href="{{ route('instructor.lessons.create', [$course, $module]) }}" 
                                                   class="inline-flex items-center bg-purple-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-purple-700 transition">
                                                    <i class="fas fa-plus mr-2"></i>Adicionar Primeira Aula
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="fas fa-book text-4xl text-gray-400"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Nenhum módulo criado</h3>
                                <p class="text-gray-600 mb-6">Comece criando módulos para organizar seu curso</p>
                                <button class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                                    <i class="fas fa-plus mr-2"></i>Criar Primeiro Módulo
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Course Stats -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-500 to-pink-600 px-6 py-4">
                        <h3 class="text-xl font-bold text-white">Estatísticas</h3>
                        <p class="text-white text-sm font-medium">Dados do curso</p>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center p-4 bg-blue-50 rounded-xl">
                                <div class="text-3xl font-bold text-blue-600">{{ $course->modules->count() }}</div>
                                <div class="text-sm text-gray-600">Módulos</div>
                            </div>
                            <div class="text-center p-4 bg-green-50 rounded-xl">
                                <div class="text-3xl font-bold text-green-600">{{ $course->lessons->count() }}</div>
                                <div class="text-sm text-gray-600">Aulas</div>
                            </div>
                            <div class="text-center p-4 bg-yellow-50 rounded-xl">
                                <div class="text-3xl font-bold text-yellow-600">{{ $course->enrollments->count() }}</div>
                                <div class="text-sm text-gray-600">Alunos</div>
                            </div>
                            <div class="text-center p-4 bg-purple-50 rounded-xl">
                                <div class="text-3xl font-bold text-purple-600">{{ $course->duration_hours }}h</div>
                                <div class="text-sm text-gray-600">Duração</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course Info -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-500 to-cyan-600 px-6 py-4">
                        <h3 class="text-xl font-bold text-white">Informações</h3>
                        <p class="text-white text-sm font-medium">Detalhes do curso</p>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center">
                                <i class="fas fa-tag text-blue-500 mr-3"></i>
                                <div>
                                    <p class="text-sm text-gray-600">Categoria</p>
                                    <p class="font-semibold text-gray-900">{{ $course->category->name }}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-signal text-blue-500 mr-3"></i>
                                <div>
                                    <p class="text-sm text-gray-600">Nível</p>
                                    <p class="font-semibold text-gray-900">{{ ucfirst($course->level) }}</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-clock text-blue-500 mr-3"></i>
                                <div>
                                    <p class="text-sm text-gray-600">Duração</p>
                                    <p class="font-semibold text-gray-900">{{ $course->duration_hours }} horas</p>
                                </div>
                            </div>
                            @if($course->price)
                                <div class="flex items-center">
                                    <i class="fas fa-dollar-sign text-blue-500 mr-3"></i>
                                    <div>
                                        <p class="text-sm text-gray-600">Preço</p>
                                        <p class="font-semibold text-gray-900">R$ {{ number_format($course->price, 2, ',', '.') }}</p>
                                    </div>
                                </div>
                            @endif
                            <div class="flex items-center">
                                <i class="fas fa-calendar text-blue-500 mr-3"></i>
                                <div>
                                    <p class="text-sm text-gray-600">Criado em</p>
                                    <p class="font-semibold text-gray-900">{{ $course->created_at->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-6 py-4">
                        <h3 class="text-xl font-bold text-white">Ações Rápidas</h3>
                        <p class="text-white text-sm font-medium">Gerenciar curso</p>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <a href="{{ route('instructor.courses.edit', $course) }}" 
                               class="w-full bg-blue-600 text-white px-4 py-3 rounded-xl font-semibold hover:bg-blue-700 transition flex items-center justify-center">
                                <i class="fas fa-edit mr-2"></i>Editar Curso
                            </a>
                            
                            <a href="{{ route('instructor.modules.create', $course) }}" 
                               class="w-full bg-green-600 text-white px-4 py-3 rounded-xl font-semibold hover:bg-green-700 transition flex items-center justify-center">
                                <i class="fas fa-plus mr-2"></i>Adicionar Módulo
                            </a>
                            
                            <button class="w-full bg-purple-600 text-white px-4 py-3 rounded-xl font-semibold hover:bg-purple-700 transition flex items-center justify-center">
                                <i class="fas fa-users mr-2"></i>Ver Alunos
                            </button>
                            
                            <a href="{{ route('instructor.courses.index') }}" 
                               class="w-full bg-gray-600 text-white px-4 py-3 rounded-xl font-semibold hover:bg-gray-700 transition flex items-center justify-center">
                                <i class="fas fa-arrow-left mr-2"></i>Voltar à Lista
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
