@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <!-- Hero Header -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-play-circle text-3xl"></i>
                </div>
                <h1 class="text-4xl font-bold mb-4">Criar Nova Aula</h1>
                <p class="text-xl text-blue-100">Adicione uma aula ao módulo: {{ $module->title }}</p>
            </div>
        </div>
    </div>

    <!-- Form Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-16">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-purple-500 to-pink-600 px-8 py-6">
                <h2 class="text-2xl font-bold text-white">Informações da Aula</h2>
                <p class="text-white mt-1 font-medium">Crie conteúdo envolvente para seus alunos</p>
            </div>
            
            <form method="POST" action="{{ route('instructor.lessons.store', [$course, $module]) }}" enctype="multipart/form-data" class="p-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Título -->
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-play-circle mr-2 text-blue-500"></i>Título da Aula *
                        </label>
                        <input type="text" 
                               id="title" 
                               name="title" 
                               value="{{ old('title') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="Ex: Introdução ao HTML"
                               required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Descrição -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-align-left mr-2 text-blue-500"></i>Descrição
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                  placeholder="Breve descrição do que será abordado nesta aula...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tipos de Conteúdo -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-4">
                            <i class="fas fa-cog mr-2 text-blue-500"></i>Tipos de Conteúdo
                        </label>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <label class="flex items-center p-4 border border-gray-300 rounded-xl hover:bg-gray-50 cursor-pointer">
                                <input type="checkbox" 
                                       name="has_video" 
                                       value="1"
                                       {{ old('has_video') ? 'checked' : '' }}
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <div class="ml-3">
                                    <div class="flex items-center">
                                        <i class="fas fa-video text-blue-500 mr-2"></i>
                                        <span class="font-medium text-gray-900">Vídeo</span>
                                    </div>
                                    <p class="text-sm text-gray-500">Incluir vídeo na aula</p>
                                </div>
                            </label>
                            
                            <label class="flex items-center p-4 border border-gray-300 rounded-xl hover:bg-gray-50 cursor-pointer">
                                <input type="checkbox" 
                                       name="has_text" 
                                       value="1"
                                       {{ old('has_text') ? 'checked' : '' }}
                                       class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2">
                                <div class="ml-3">
                                    <div class="flex items-center">
                                        <i class="fas fa-file-alt text-green-500 mr-2"></i>
                                        <span class="font-medium text-gray-900">Texto</span>
                                    </div>
                                    <p class="text-sm text-gray-500">Incluir conteúdo textual</p>
                                </div>
                            </label>
                            
                            <label class="flex items-center p-4 border border-gray-300 rounded-xl hover:bg-gray-50 cursor-pointer">
                                <input type="checkbox" 
                                       name="has_file" 
                                       value="1"
                                       {{ old('has_file') ? 'checked' : '' }}
                                       class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 focus:ring-2">
                                <div class="ml-3">
                                    <div class="flex items-center">
                                        <i class="fas fa-download text-purple-500 mr-2"></i>
                                        <span class="font-medium text-gray-900">Arquivo</span>
                                    </div>
                                    <p class="text-sm text-gray-500">Incluir arquivo para download</p>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Duração -->
                    <div>
                        <label for="duration_minutes" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-clock mr-2 text-blue-500"></i>Duração (minutos)
                        </label>
                        <input type="number" 
                               id="duration_minutes" 
                               name="duration_minutes" 
                               value="{{ old('duration_minutes') }}"
                               min="1"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="Ex: 15">
                        @error('duration_minutes')
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
                               value="{{ old('order', $module->lessons()->max('order') + 1) }}"
                               min="1"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="Ex: 1">
                        @error('order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- URL do Vídeo -->
                    <div id="video_url_field" class="md:col-span-2">
                        <label for="video_url" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-video mr-2 text-blue-500"></i>URL do Vídeo
                        </label>
                        <input type="url" 
                               id="video_url" 
                               name="video_url" 
                               value="{{ old('video_url') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="https://www.youtube.com/watch?v=...">
                        @error('video_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Conteúdo Textual -->
                    <div id="content_field" class="md:col-span-2">
                        <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-file-alt mr-2 text-green-500"></i>Conteúdo da Aula
                        </label>
                        <textarea id="content" 
                                  name="content" 
                                  rows="8"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-green-500 transition"
                                  placeholder="Digite o conteúdo da aula aqui...">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Arquivo -->
                    <div id="file_field" class="md:col-span-2">
                        <label for="file" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-file-upload mr-2 text-purple-500"></i>Arquivo para Download
                        </label>
                        <input type="file" 
                               id="file" 
                               name="file"
                               accept=".pdf,.doc,.docx,.ppt,.pptx,.txt"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition">
                        @error('file')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-sm text-gray-500 mt-1">Formatos aceitos: PDF, DOC, DOCX, PPT, PPTX, TXT. Tamanho máximo: 10MB</p>
                    </div>

                    <!-- Status -->
                    <div class="md:col-span-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       name="is_published" 
                                       value="1"
                                       {{ old('is_published') ? 'checked' : '' }}
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <span class="ml-2 text-sm font-semibold text-gray-700">
                                    <i class="fas fa-eye mr-1 text-blue-500"></i>Publicar aula
                                </span>
                            </label>
                            
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       name="is_free" 
                                       value="1"
                                       {{ old('is_free') ? 'checked' : '' }}
                                       class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2">
                                <span class="ml-2 text-sm font-semibold text-gray-700">
                                    <i class="fas fa-gift mr-1 text-green-500"></i>Aula gratuita
                                </span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-8 border-t border-gray-200 mt-8">
                    <a href="{{ route('instructor.courses.show', $course) }}" 
                       class="inline-flex items-center px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-medium hover:bg-gray-300 transition">
                        <i class="fas fa-arrow-left mr-2"></i>Cancelar
                    </a>
                    
                    <button type="submit" 
                            class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-plus mr-2"></i>Criar Aula
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const hasVideoCheckbox = document.querySelector('input[name="has_video"]');
    const hasTextCheckbox = document.querySelector('input[name="has_text"]');
    const hasFileCheckbox = document.querySelector('input[name="has_file"]');
    const videoUrlField = document.getElementById('video_url_field');
    const contentField = document.getElementById('content_field');
    const fileField = document.getElementById('file_field');

    function toggleFields() {
        // Show/hide video field
        if (hasVideoCheckbox.checked) {
            videoUrlField.style.display = 'block';
        } else {
            videoUrlField.style.display = 'none';
        }
        
        // Show/hide content field
        if (hasTextCheckbox.checked) {
            contentField.style.display = 'block';
        } else {
            contentField.style.display = 'none';
        }
        
        // Show/hide file field
        if (hasFileCheckbox.checked) {
            fileField.style.display = 'block';
        } else {
            fileField.style.display = 'none';
        }
    }

    hasVideoCheckbox.addEventListener('change', toggleFields);
    hasTextCheckbox.addEventListener('change', toggleFields);
    hasFileCheckbox.addEventListener('change', toggleFields);
    
    // Initialize on page load
    toggleFields();
});
</script>
@endsection
