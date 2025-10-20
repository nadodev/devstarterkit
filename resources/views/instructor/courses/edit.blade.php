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
                <h1 class="text-4xl font-bold mb-4">Editar Curso</h1>
                <p class="text-xl text-blue-100">Atualize as informações do seu curso</p>
            </div>
        </div>
    </div>

    <!-- Form Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-16">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-yellow-500 to-orange-600 px-8 py-6">
                <h2 class="text-2xl font-bold text-white">Informações do Curso</h2>
                <p class="text-white mt-1 font-medium">Atualize os dados do seu curso</p>
            </div>
            
            <form method="POST" action="{{ route('instructor.courses.update', $course) }}" enctype="multipart/form-data" class="p-8">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Título -->
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-book mr-2 text-blue-500"></i>Título do Curso *
                        </label>
                        <input type="text" 
                               id="title" 
                               name="title" 
                               value="{{ old('title', $course->title) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="Ex: Desenvolvimento Web Completo"
                               required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Descrição -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-align-left mr-2 text-blue-500"></i>Descrição *
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                  placeholder="Descreva o que os alunos vão aprender neste curso..."
                                  required>{{ old('description', $course->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Categoria -->
                    <div>
                        <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-tags mr-2 text-blue-500"></i>Categoria *
                        </label>
                        <select id="category_id" 
                                name="category_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                required>
                            <option value="">Selecione uma categoria</option>
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" {{ (old('category_id', $course->category_id) == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nível -->
                    <div>
                        <label for="level" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-signal mr-2 text-blue-500"></i>Nível *
                        </label>
                        <select id="level" 
                                name="level"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                required>
                            <option value="">Selecione o nível</option>
                            <option value="beginner" {{ (old('level', $course->level) == 'beginner') ? 'selected' : '' }}>Iniciante</option>
                            <option value="intermediate" {{ (old('level', $course->level) == 'intermediate') ? 'selected' : '' }}>Intermediário</option>
                            <option value="advanced" {{ (old('level', $course->level) == 'advanced') ? 'selected' : '' }}>Avançado</option>
                        </select>
                        @error('level')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Duração -->
                    <div>
                        <label for="duration_hours" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-clock mr-2 text-blue-500"></i>Duração (horas) *
                        </label>
                        <input type="number" 
                               id="duration_hours" 
                               name="duration_hours" 
                               value="{{ old('duration_hours', $course->duration_hours) }}"
                               min="1"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="Ex: 20"
                               required>
                        @error('duration_hours')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Preço -->
                    <div>
                        <label for="price" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-dollar-sign mr-2 text-blue-500"></i>Preço (R$)
                        </label>
                        <input type="number" 
                               id="price" 
                               name="price" 
                               value="{{ old('price', $course->price) }}"
                               min="0"
                               step="0.01"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="Ex: 199.90">
                        @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="is_published" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-eye mr-2 text-blue-500"></i>Status
                        </label>
                        <select id="is_published" 
                                name="is_published"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            <option value="0" {{ (old('is_published', $course->is_published) == 0) ? 'selected' : '' }}>Rascunho</option>
                            <option value="1" {{ (old('is_published', $course->is_published) == 1) ? 'selected' : '' }}>Publicado</option>
                        </select>
                        @error('is_published')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Imagem Atual -->
                    @if($course->cover_image)
                        <div class="md:col-span-2">
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="fas fa-image mr-2 text-blue-500"></i>Imagem Atual
                            </label>
                            <div class="flex items-center space-x-4">
                                <img src="{{ Storage::url($course->cover_image) }}" 
                                     alt="{{ $course->title }}" 
                                     class="w-32 h-20 object-cover rounded-lg border border-gray-300">
                                <div>
                                    <p class="text-sm text-gray-600">Imagem atual do curso</p>
                                    <p class="text-xs text-gray-500">Faça upload de uma nova imagem para substituir</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Nova Imagem -->
                    <div class="md:col-span-2">
                        <label for="cover_image" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-image mr-2 text-blue-500"></i>{{ $course->cover_image ? 'Nova Capa do Curso' : 'Capa do Curso' }}
                        </label>
                        <input type="file" 
                               id="cover_image" 
                               name="cover_image"
                               accept="image/*"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        @error('cover_image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-sm text-gray-500 mt-1">Formatos aceitos: JPG, PNG, GIF. Tamanho máximo: 2MB</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-8 border-t border-gray-200 mt-8">
                    <a href="{{ route('instructor.courses.index') }}" 
                       class="inline-flex items-center px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-medium hover:bg-gray-300 transition">
                        <i class="fas fa-arrow-left mr-2"></i>Cancelar
                    </a>
                    
                    <div class="flex space-x-4">
                        <a href="{{ route('instructor.courses.show', $course) }}" 
                           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-xl font-medium hover:bg-blue-700 transition">
                            <i class="fas fa-eye mr-2"></i>Visualizar
                        </a>
                        
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
