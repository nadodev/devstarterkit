@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <!-- Hero Header -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-edit text-3xl"></i>
                </div>
                <h1 class="text-4xl font-bold mb-4">Editar Módulo</h1>
                <p class="text-xl text-blue-100">{{ $module->title }}</p>
            </div>
        </div>
    </div>

    <!-- Form Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-16">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                <h2 class="text-2xl font-bold text-white">Informações do Módulo</h2>
                <p class="text-white mt-1 font-medium">Atualize as informações do módulo</p>
            </div>
            
            <form method="POST" action="{{ route('instructor.modules.update', [$course, $module]) }}" class="p-8">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 gap-8">
                    <!-- Título -->
                    <div>
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-layer-group mr-2 text-blue-500"></i>Título do Módulo *
                        </label>
                        <input type="text" 
                               id="title" 
                               name="title" 
                               value="{{ old('title', $module->title) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="Ex: Introdução ao Desenvolvimento Web"
                               required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Descrição -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-align-left mr-2 text-blue-500"></i>Descrição
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                  placeholder="Descreva o que será abordado neste módulo...">{{ old('description', $module->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Ordem -->
                    <div>
                        <label for="order" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-sort-numeric-up mr-2 text-blue-500"></i>Ordem
                        </label>
                        <input type="number" 
                               id="order" 
                               name="order" 
                               value="{{ old('order', $module->order) }}"
                               min="1"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="Ex: 1">
                        @error('order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="is_published" 
                                   value="1"
                                   {{ old('is_published', $module->is_published) ? 'checked' : '' }}
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            <span class="ml-2 text-sm font-semibold text-gray-700">
                                <i class="fas fa-eye mr-1 text-blue-500"></i>Publicar módulo
                            </span>
                        </label>
                        <p class="text-sm text-gray-500 mt-1">Marque para tornar o módulo visível aos alunos</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-8 border-t border-gray-200 mt-8">
                    <a href="{{ route('instructor.courses.show', $course) }}" 
                       class="inline-flex items-center px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-medium hover:bg-gray-300 transition">
                        <i class="fas fa-arrow-left mr-2"></i>Cancelar
                    </a>
                    
                    <div class="flex space-x-4">
                        <button type="submit" 
                                class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-yellow-600 to-orange-600 text-white rounded-xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-save mr-2"></i>Salvar Alterações
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
