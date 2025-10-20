@extends('layouts.app')

@section('title', 'Cursos - EduPlatform')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-blue-900-purple-900 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 py-16">
        <div class="text-center">
            <div class="inline-flex items-center bg-white/10 backdrop-blur-sm rounded-full px-4 py-2 mb-6 text-sm font-medium">
                <i class="fas fa-book-open text-yellow-400 mr-2"></i>
                Descubra novos conhecimentos
            </div>
            
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Todos os
                    <span class="text-gradient-yellow-orange">
                    Cursos
                </span>
            </h1>
            
            <p class="text-xl md:text-2xl mb-8 text-blue-100 max-w-3xl mx-auto">
                Descubra cursos incríveis para sua jornada de aprendizado e transforme sua carreira
            </p>
        </div>
    </div>
</section>

<!-- Filters Section -->
<section class="py-12 bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8">
            <form method="GET" action="{{ route('courses.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div>
                    <label for="search" class="block text-sm font-semibold text-gray-700 mb-3">
                        <i class="fas fa-search mr-2 text-blue-500"></i>Buscar Curso
                    </label>
                    <input type="text" 
                           name="search" 
                           id="search" 
                           value="{{ request('search') }}" 
                           placeholder="Digite o nome do curso..." 
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                </div>
                
                <div>
                    <label for="category" class="block text-sm font-semibold text-gray-700 mb-3">
                        <i class="fas fa-tags mr-2 text-blue-500"></i>Categoria
                    </label>
                    <select name="category" 
                            id="category" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <option value="">Todas as categorias</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label for="level" class="block text-sm font-semibold text-gray-700 mb-3">
                        <i class="fas fa-signal mr-2 text-blue-500"></i>Nível
                    </label>
                    <select name="level" 
                            id="level" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        <option value="">Todos os níveis</option>
                        <option value="beginner" {{ request('level') == 'beginner' ? 'selected' : '' }}>Iniciante</option>
                        <option value="intermediate" {{ request('level') == 'intermediate' ? 'selected' : '' }}>Intermediário</option>
                        <option value="advanced" {{ request('level') == 'advanced' ? 'selected' : '' }}>Avançado</option>
                    </select>
                </div>
                
                <div class="flex items-end">
                    <button type="submit" 
                            class="w-full bg-gradient-blue-600-purple-600 text-white px-6 py-3 rounded-xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-search mr-2"></i>Filtrar Cursos
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Results Section -->
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <!-- Results Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">
                    {{ $courses->total() }} curso(s) encontrado(s)
                </h2>
                <p class="text-gray-600">
                    @if(request('search') || request('category') || request('level'))
                        Resultados para sua busca
                    @else
                        Todos os cursos disponíveis
                    @endif
                </p>
            </div>
            
            @if(request('search') || request('category') || request('level'))
                <a href="{{ route('courses.index') }}" 
                   class="inline-flex items-center bg-white text-gray-700 px-4 py-2 rounded-xl border border-gray-300 hover:bg-gray-50 transition">
                    <i class="fas fa-times mr-2"></i>
                    Limpar Filtros
                </a>
            @endif
        </div>

        <!-- Courses Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($courses as $course)
            <div class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <!-- Course Image -->
                <div class="relative h-48 bg-gradient-blue-purple overflow-hidden">
                    @if($course->cover_image)
                        <img src="{{ Storage::url($course->cover_image) }}" 
                             alt="{{ $course->title }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <i class="fas fa-play-circle text-white text-6xl"></i>
                        </div>
                    @endif
                    
                    <!-- Course Level Badge -->
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/90 backdrop-blur-sm text-gray-900 text-xs font-bold px-3 py-1 rounded-full">
                            {{ ucfirst($course->level) }}
                        </span>
                    </div>
                    
                    <!-- Favorite Button -->
                    <div class="absolute top-4 right-4">
                        <button class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-white/30 transition">
                            <i class="fas fa-bookmark text-white"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Course Content -->
                <div class="p-6">
                    <!-- Category -->
                    <div class="flex items-center mb-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-folder text-blue-600 text-sm"></i>
                        </div>
                        <span class="text-sm text-gray-600">{{ $course->category->name }}</span>
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">{{ $course->title }}</h3>
                    
                    <!-- Description -->
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ Str::limit($course->short_description ?? $course->description, 100) }}</p>
                    
                    <!-- Course Stats -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center">
                                <div class="flex text-yellow-400">
                                    @for($i = 0; $i < 5; $i++)
                                        <i class="fas fa-star text-sm"></i>
                                    @endfor
                                </div>
                                <span class="ml-2 text-sm text-gray-600">{{ $course->rating }}</span>
                            </div>
                            <div class="flex items-center text-gray-500">
                                <i class="fas fa-users text-sm mr-1"></i>
                                <span class="text-sm">{{ $course->students_count }} alunos</span>
                            </div>
                            <div class="flex items-center text-gray-500">
                                <i class="fas fa-clock text-sm mr-1"></i>
                                <span class="text-sm">{{ $course->duration_hours }}h</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Price and Action -->
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold text-blue-600">
                            @if($course->is_free)
                                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">Grátis</span>
                            @else
                                R$ {{ number_format($course->price, 2, ',', '.') }}
                            @endif
                        </div>
                        <a href="{{ route('courses.show', $course) }}" 
                           class="bg-gradient-blue-600-purple-600 text-white px-6 py-2 rounded-xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                            Ver Curso
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <!-- Empty State -->
            <div class="col-span-full">
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-search text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Nenhum curso encontrado</h3>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">
                        Não encontramos cursos que correspondam aos seus critérios de busca. 
                        Tente ajustar os filtros ou explorar outras categorias.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('courses.index') }}" 
                           class="bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">
                            <i class="fas fa-refresh mr-2"></i>
                            Ver Todos os Cursos
                        </a>
                        <a href="{{ route('courses.index') }}" 
                           class="border-2 border-gray-300 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-50 transition">
                            <i class="fas fa-filter mr-2"></i>
                            Limpar Filtros
                        </a>
                    </div>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($courses->hasPages())
        <div class="mt-12 flex justify-center">
            <div class="bg-white rounded-2xl shadow-lg p-4">
                {{ $courses->links() }}
            </div>
        </div>
        @endif
    </div>
</section>
@endsection