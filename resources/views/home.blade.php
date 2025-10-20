@extends('layouts.app')

@section('title', 'EduPlatform - A melhor plataforma de cursos online')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-blue-900-purple-900 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 py-24 lg:py-32">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Content -->
            <div class="text-center lg:text-left">
                <div class="inline-flex items-center bg-white/10 backdrop-blur-sm rounded-full px-4 py-2 mb-6 text-sm font-medium">
                    <i class="fas fa-star text-yellow-400 mr-2"></i>
                    Plataforma #1 em Educação Online
                </div>
                
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                    Transforme seu
                    <span class="text-gradient-yellow-orange">
                        futuro
                    </span>
                    com conhecimento
                </h1>
                
                <p class="text-xl md:text-2xl mb-8 text-blue-100 leading-relaxed">
                    Aprenda com os melhores instrutores do Brasil. Mais de {{ number_format($stats['total_courses']) }} cursos disponíveis para você.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="{{ route('courses.index') }}" 
                       class="group bg-white text-blue-900 px-8 py-4 rounded-2xl font-bold text-lg hover:bg-gray-100 transition-all duration-300 transform shadow-2xl">
                        <i class="fas fa-play mr-2"></i>
                        Explorar Cursos
                    </a>
                    <a href="{{ route('register') }}" 
                       class="group border-2 border-white/30 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-white/10 hover:border-white/50 transition-all duration-300 backdrop-blur-sm">
                        <i class="fas fa-user-plus mr-2"></i>
                        Começar Grátis
                    </a>
                </div>
                
                <!-- Trust Indicators -->
                <div class="mt-12 flex flex-wrap items-center justify-center lg:justify-start gap-8 text-blue-200">
                    <div class="flex items-center">
                        <i class="fas fa-users text-2xl mr-3"></i>
                        <span class="font-semibold">{{ number_format($stats['total_students']) }}+ estudantes</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-graduation-cap text-2xl mr-3"></i>
                        <span class="font-semibold">{{ number_format($stats['total_instructors']) }}+ instrutores</span>
                    </div>
                </div>
            </div>
            
            <!-- Hero Image/Video -->
            <div class="relative">
                <div class="relative bg-gradient-blue-purple rounded-3xl p-8 shadow-2xl">
                    <div class="aspect-video bg-black/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 backdrop-blur-sm">
                                <i class="fas fa-play text-white text-3xl ml-1"></i>
                            </div>
                            <h3 class="text-white text-xl font-bold mb-2">Veja como funciona</h3>
                            <p class="text-blue-100">Assista ao vídeo e descubra nossa plataforma</p>
                        </div>
                    </div>
                </div>
                
                <!-- Floating Cards -->
                <div class="absolute -top-4 -left-4 bg-white rounded-2xl p-4 shadow-xl">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-check text-white"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Certificado</div>
                            <div class="text-sm text-gray-600">Reconhecido</div>
                        </div>
                    </div>
                </div>
                
                <div class="absolute -bottom-4 -right-4 bg-white rounded-2xl p-4 shadow-xl">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-star text-white"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">4.9/5</div>
                            <div class="text-sm text-gray-600">Avaliação</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center group">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-blue-purple rounded-2xl mb-6 transition-transform duration-300">
                    <i class="fas fa-book text-white text-3xl"></i>
                </div>
                <div class="text-5xl font-bold text-gray-900 mb-2">{{ number_format($stats['total_courses']) }}</div>
                <div class="text-gray-600 text-lg">Cursos Disponíveis</div>
            </div>
            <div class="text-center group">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-green rounded-2xl mb-6 transition-transform duration-300">
                    <i class="fas fa-users text-white text-3xl"></i>
                </div>
                <div class="text-5xl font-bold text-gray-900 mb-2">{{ number_format($stats['total_students']) }}</div>
                <div class="text-gray-600 text-lg">Estudantes Ativos</div>
            </div>
            <div class="text-center group">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-purple rounded-2xl mb-6 transition-transform duration-300">
                    <i class="fas fa-chalkboard-teacher text-white text-3xl"></i>
                </div>
                <div class="text-5xl font-bold text-gray-900 mb-2">{{ number_format($stats['total_instructors']) }}</div>
                <div class="text-gray-600 text-lg">Instrutores Especialistas</div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Courses -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <div class="inline-flex items-center bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-star mr-2"></i>
                Cursos em Destaque
            </div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Os cursos mais populares</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Escolha entre os cursos mais bem avaliados e transforme sua carreira
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredCourses as $course)
            <div class="group bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="relative h-48 bg-gradient-blue-purple overflow-hidden">
                    @if($course->cover_image)
                        <img src="{{ Storage::url($course->cover_image) }}" alt="{{ $course->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <i class="fas fa-play-circle text-white text-6xl"></i>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/90 backdrop-blur-sm text-gray-900 text-xs font-bold px-3 py-1 rounded-full">
                            {{ ucfirst($course->level) }}
                        </span>
                    </div>
                    <div class="absolute top-4 right-4">
                        <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                            <i class="fas fa-bookmark text-white"></i>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="flex items-center mb-3">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-folder text-blue-600 text-sm"></i>
                        </div>
                        <span class="text-sm text-gray-600">{{ $course->category->name }}</span>
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">{{ $course->title }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-2">{{ Str::limit($course->short_description ?? $course->description, 100) }}</p>
                    
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center">
                            <div class="flex text-yellow-400">
                                @for($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star text-sm"></i>
                                @endfor
                            </div>
                            <span class="ml-2 text-sm text-gray-600">4.9</span>
                            <span class="ml-2 text-sm text-gray-500">({{ $course->enrollments_count ?? 0 }} alunos)</span>
                        </div>
                        <div class="text-right">
                            <div class="text-2xl font-bold text-blue-600">
                                @if($course->is_free)
                                    Grátis
                                @else
                                    R$ {{ number_format($course->price, 2, ',', '.') }}
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('courses.show', $course) }}" 
                       class="px-4 w-full bg-gradient-blue-purple text-white py-3 rounded-xl font-semibold text-center hover:shadow-lg">
                        Ver Curso
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('courses.index') }}" 
               class="inline-flex items-center bg-white text-blue-600 px-8 py-4 rounded-2xl font-bold text-lg border-2 border-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300">
                <i class="fas fa-arrow-right mr-2"></i>
                Ver Todos os Cursos
            </a>
        </div>
    </div>
</section>

<!-- Categories -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <div class="inline-flex items-center bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-layer-group mr-2"></i>
                Categorias
            </div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Explore por área</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Encontre o curso perfeito para sua área de interesse
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($categories as $category)
            <a href="{{ route('courses.index', ['category' => $category->id]) }}" class="group">
                <div class="bg-white border-2 border-gray-200 rounded-2xl p-6 text-center hover:border-blue-500 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-2xl flex items-center justify-center transition-transform duration-300" 
                         style="background: linear-gradient(135deg, {{ $category->color ?? '#3B82F6' }}20, {{ $category->color ?? '#3B82F6' }}10);">
                        <i class="{{ $category->icon ?? 'fas fa-folder' }} text-2xl" style="color: {{ $category->color ?? '#3B82F6' }};"></i>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">{{ $category->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $category->courses_count }} cursos</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <div class="inline-flex items-center bg-purple-100 text-purple-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-rocket mr-2"></i>
                Por que escolher nossa plataforma?
            </div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Recursos que fazem a diferença</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-blue-purple rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-certificate text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Certificados Reconhecidos</h3>
                <p class="text-gray-600">Receba certificados válidos e reconhecidos pelo mercado de trabalho.</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-green rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-clock text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Acesso Vitalício</h3>
                <p class="text-gray-600">Acesse seus cursos a qualquer momento, de qualquer lugar, para sempre.</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-purple rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Comunidade Ativa</h3>
                <p class="text-gray-600">Conecte-se com outros estudantes e instrutores em nossa comunidade.</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-yellow-orange-500 rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-mobile-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Acesso Mobile</h3>
                <p class="text-gray-600">Estude no seu celular, tablet ou computador com nossa plataforma responsiva.</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-red-pink rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-headset text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Suporte 24/7</h3>
                <p class="text-gray-600">Nossa equipe está sempre disponível para ajudar você em sua jornada.</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-gradient-indigo-blue rounded-2xl flex items-center justify-center mb-6">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Progresso Acompanhado</h3>
                <p class="text-gray-600">Acompanhe seu progresso e veja sua evolução em tempo real.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-blue-600-purple-600 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="relative max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">
            Pronto para transformar sua carreira?
        </h2>
        <p class="text-xl md:text-2xl mb-8 text-blue-100">
            Junte-se a mais de {{ number_format($stats['total_students']) }} estudantes que já transformaram suas vidas
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
            <a href="{{ route('register') }}" 
               class="bg-white text-blue-600 px-8 py-4 rounded-2xl font-bold text-lg hover:bg-gray-100 transition-all duration-300 transform shadow-2xl">
                <i class="fas fa-rocket mr-2"></i>
                Começar Agora - Grátis
            </a>
            <a href="{{ route('courses.index') }}" 
               class="border-2 border-white/30 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-white/10 transition-all duration-300 backdrop-blur-sm">
                <i class="fas fa-search mr-2"></i>
                Explorar Cursos
            </a>
        </div>
        
        <div class="flex flex-wrap items-center justify-center gap-8 text-blue-200">
            <div class="flex items-center">
                <i class="fas fa-shield-alt text-2xl mr-3"></i>
                <span class="font-semibold">100% Seguro</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-credit-card text-2xl mr-3"></i>
                <span class="font-semibold">Pagamento Seguro</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-undo text-2xl mr-3"></i>
                <span class="font-semibold">Garantia de 30 dias</span>
            </div>
        </div>
    </div>
</section>
@endsection