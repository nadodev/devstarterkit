@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <!-- Hero Header -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-plus text-3xl"></i>
                </div>
                <h1 class="text-4xl font-bold mb-4">Criar Novo Curso</h1>
                <p class="text-xl text-blue-100">Compartilhe seu conhecimento com o mundo</p>
            </div>
        </div>
    </div>

    <!-- Form Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-16">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-8 py-6">
                <h2 class="text-2xl font-bold text-white">Informações do Curso</h2>
                <p class="text-white mt-1 font-medium">Preencha os dados básicos do seu curso</p>
            </div>
            
            <form method="POST" action="{{ route('instructor.courses.store') }}" enctype="multipart/form-data" class="p-8">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Título -->
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-book mr-2 text-blue-500"></i>Título do Curso *
                        </label>
                        <input type="text" 
                               id="title" 
                               name="title" 
                               value="{{ old('title') }}"
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
                                  required>{{ old('description') }}</textarea>
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
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                            <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Iniciante</option>
                            <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermediário</option>
                            <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Avançado</option>
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
                               value="{{ old('duration_hours') }}"
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
                               value="{{ old('price') }}"
                               min="0"
                               step="0.01"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                               placeholder="Ex: 199.90">
                        @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Capa do Curso -->
                    <div class="md:col-span-2">
                        <label for="cover_image" class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-image mr-2 text-blue-500"></i>Capa do Curso
                        </label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-blue-500 transition-colors">
                            <input type="file" 
                                   id="cover_image" 
                                   name="cover_image"
                                   accept="image/*"
                                   class="hidden"
                                   onchange="previewImage(this)">
                            <label for="cover_image" class="cursor-pointer">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-cloud-upload-alt text-2xl text-gray-400"></i>
                                </div>
                                <p class="text-gray-600 font-medium">Clique para selecionar uma imagem</p>
                                <p class="text-sm text-gray-500 mt-1">Formatos aceitos: JPG, PNG, GIF. Tamanho máximo: 2MB</p>
                            </label>
                        </div>
                        <div id="image-preview" class="mt-4 hidden">
                            <img id="preview-img" class="w-full h-48 object-cover rounded-xl" alt="Preview">
                        </div>
                        @error('cover_image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-8 border-t border-gray-200 mt-8">
                    <a href="{{ route('instructor.courses.index') }}" 
                       class="inline-flex items-center px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-medium hover:bg-gray-300 transition">
                        <i class="fas fa-arrow-left mr-2"></i>Cancelar
                    </a>
                    
                    <button type="submit" 
                            class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-plus mr-2"></i>Criar Curso
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const preview = document.getElementById('image-preview');
            const previewImg = document.getElementById('preview-img');
            
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
