@extends('layouts.landing')

@section('title', 'DevStarter Kit - Crie Sistemas Completos em Horas | Laravel + Blade + Tailwind')

@section('meta')
<meta name="description" content="DevStarter Kit: Sistema base completo que já ajudou +127 desenvolvedores a acelerar projetos com Laravel + Blade + Tailwind. Crie sistemas em horas, não em semanas!">
<meta name="keywords" content="devstarter kit, laravel, Blade, tailwind, sistema base, desenvolvedor, projeto completo, dashboard, login, crud">
<meta name="author" content="DevStarter Kit">
<meta name="robots" content="index, follow">
<meta name="language" content="pt-BR">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ request()->url() }}">
<meta property="og:title" content="DevStarter Kit - Crie Sistemas Completos em Horas">
<meta property="og:description" content="Sistema base completo que já ajudou +127 desenvolvedores a acelerar projetos com Laravel + Blade + Tailwind.">
<meta property="og:image" content="{{ asset('images/devstarter-kit-og.jpg') }}">
<meta property="og:site_name" content="DevStarter Kit">
<meta property="og:locale" content="pt_BR">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ request()->url() }}">
<meta property="twitter:title" content="DevStarter Kit - Crie Sistemas Completos em Horas">
<meta property="twitter:description" content="Sistema base completo que já ajudou +127 desenvolvedores a acelerar projetos com Laravel + Blade + Tailwind.">
<meta property="twitter:image" content="{{ asset('images/devstarter-kit-og.jpg') }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ request()->url() }}">
@endsection

@section('content')
<!-- Sticky CTA -->
<div id="sticky-cta" class="fixed top-0 left-0 right-0 bg-orange-500 text-white py-2 sm:py-3 px-2 sm:px-4 z-50 transform -translate-y-full transition-transform duration-300">
    <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2 sm:gap-4">
        <div class="flex items-center text-center sm:text-left">
            <i class="fas fa-fire mr-1 sm:mr-2 text-sm sm:text-base"></i>
            <span class="font-bold text-sm sm:text-base">🔥 Oferta limitada - Só para os primeiros 50!</span>
        </div>
        <a href="#oferta" class="bg-white text-orange-500 px-3 sm:px-6 py-1.5 sm:py-2 rounded-lg font-bold hover:bg-gray-100 transition-colors text-xs sm:text-sm whitespace-nowrap">
            Quero o DevStarter Kit Agora
        </a>
    </div>
</div>

<!-- Seção 1 – Hero -->
<section class="pt-6 pb-6 relative min-h-screen flex items-center bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0">
        <!-- Floating particles -->
        <div class="absolute inset-0 opacity-20">
            <div class="particle absolute w-2 h-2 bg-orange-400 rounded-full animate-float-1"></div>
            <div class="particle absolute w-3 h-3 bg-blue-400 rounded-full animate-float-2"></div>
            <div class="particle absolute w-1 h-1 bg-purple-400 rounded-full animate-float-3"></div>
            <div class="particle absolute w-2 h-2 bg-green-400 rounded-full animate-float-4"></div>
            <div class="particle absolute w-1 h-1 bg-yellow-400 rounded-full animate-float-5"></div>
        </div>
        
        <!-- Gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-r from-orange-500/10 via-transparent to-blue-500/10"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Left Content -->
            <div class="text-center lg:text-left">
                <!-- Badge -->
                <div class="inline-flex items-center bg-orange-500/20 backdrop-blur-sm border border-orange-500/30 rounded-full px-3 py-2 mb-4 sm:mb-6 text-xs font-medium">
                    <span class="w-2 h-2 bg-orange-400 rounded-full mr-2 animate-pulse"></span>
                    <span class="text-center">🔥 +127 desenvolvedores já aceleraram</span>
                </div>
                
                <!-- Main Headline -->
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold mb-4 sm:mb-6 lg:mb-8 leading-tight">
                    <span class="block text-white">Crie sistemas</span>
                    <span class="block text-white">completos em</span>
                    <span class="block bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 bg-clip-text text-transparent animate-gradient">
                        HORAS
                    </span>
                    <span class="block text-white">não em semanas!</span>
                </h1>
                
                <!-- Subtitle -->
                <p class="text-sm sm:text-base lg:text-lg mb-6 sm:mb-8 lg:mb-10 text-gray-300 max-w-2xl mx-auto lg:mx-0">
                    O <strong class="text-orange-400">DevStarter Kit</strong> é a base completa que você precisa para 
                    entregar projetos profissionais em tempo recorde.
                </p>
                
                <!-- Features Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 mb-8 lg:mb-10">
                    <div class="flex items-center justify-center lg:justify-start space-x-3 bg-white/5 backdrop-blur-sm rounded-xl p-3 sm:p-4 border border-white/10">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-orange-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-bolt text-white text-sm sm:text-lg"></i>
                        </div>
                        <div>
                            <div class="font-semibold text-xs sm:text-sm">Rapidez</div>
                            <div class="text-xs text-gray-400">Setup em minutos</div>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-center lg:justify-start space-x-3 bg-white/5 backdrop-blur-sm rounded-xl p-3 sm:p-4 border border-white/10">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-shield-alt text-white text-sm sm:text-lg"></i>
                        </div>
                        <div>
                            <div class="font-semibold text-xs sm:text-sm">Segurança</div>
                            <div class="text-xs text-gray-400">Pronto para produção</div>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-center lg:justify-start space-x-3 bg-white/5 backdrop-blur-sm rounded-xl p-3 sm:p-4 border border-white/10">
                        <div class="w-8 h-8 sm:w-10 sm:h-10 bg-green-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-rocket text-white text-sm sm:text-lg"></i>
                        </div>
                        <div>
                            <div class="font-semibold text-xs sm:text-sm">Performance</div>
                            <div class="text-xs text-gray-400">Otimizado</div>
                        </div>
                    </div>
                </div>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                <a href="#oferta" class="group relative bg-gradient-to-r from-orange-500 to-orange-600 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-2xl font-bold text-base sm:text-lg hover:from-orange-600 hover:to-orange-700 transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-orange-500/25 animate-pulse-border">
                    <span class="relative z-10">Quero o DevStarter Kit Agora</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-orange-600 to-orange-700 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </a>
                    
                    <a href="https://devkit-demo.leonardogeja.com.br" target="_blank" rel="noopener noreferrer"  class="group bg-white/10 backdrop-blur-sm border border-white/20 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-2xl font-semibold text-base sm:text-lg hover:bg-white/20 transition-all duration-300">
                        <i class="fas fa-play mr-2"></i>Ver Demo
                    </a>
                </div>
                
                <!-- Trust Indicators -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start space-y-3 sm:space-y-0 sm:space-x-6 mt-6 sm:mt-8 lg:mt-10">
                    <div class="flex items-center space-x-2">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                            <i class="fas fa-star text-xs"></i>
                        </div>
                        <span class="text-xs sm:text-sm text-gray-300">4.9/5 (127+)</span>
                    </div>
                    <div class="text-xs sm:text-sm text-gray-400">
                        ✅ Garantia 30 dias
                    </div>
                </div>
            </div>
            
            <!-- Right Content - Interactive Demo -->
            <div class="relative">
                <!-- Main Demo Card -->
                <div class="relative bg-white rounded-3xl shadow-2xl overflow-hidden transform rotate-2 hover:rotate-0 transition-transform duration-500">
                    <!-- Browser Header -->
                    <div class="bg-gray-100 px-4 py-3 flex items-center space-x-2">
                        <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        <div class="flex-1 text-center">
                            <span class="text-sm font-medium text-gray-600">DevStarter Kit Dashboard</span>
                        </div>
                    </div>
                    
                    <!-- Demo Content -->
                    <div class="p-6 bg-gradient-to-br from-gray-50 to-white">
                        <!-- Stats Cards -->
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="bg-blue-50 rounded-xl p-4">
                                <div class="text-2xl font-bold text-blue-600">127</div>
                                <div class="text-xs text-blue-500">Projetos</div>
                            </div>
                            <div class="bg-green-50 rounded-xl p-4">
                                <div class="text-2xl font-bold text-green-600">98%</div>
                                <div class="text-xs text-green-500">Satisfação</div>
                            </div>
                        </div>
                        
                        <!-- Progress Bars -->
                        <div class="space-y-3 mb-6">
                            <div>
                                <div class="flex justify-between text-xs text-gray-600 mb-1">
                                    <span>Autenticação</span>
                                    <span>100%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-500 h-2 rounded-full animate-progress" style="width: 100%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs text-gray-600 mb-1">
                                    <span>Dashboard</span>
                                    <span>95%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-purple-500 h-2 rounded-full animate-progress" style="width: 95%"></div>
                                </div>
                            </div>
                            <div>
                                <div class="flex justify-between text-xs text-gray-600 mb-1">
                                    <span>CRUD</span>
                                    <span>90%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-orange-500 h-2 rounded-full animate-progress" style="width: 90%"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Action Button -->
                        <button class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white py-3 rounded-xl font-semibold hover:from-orange-600 hover:to-orange-700 transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-rocket mr-2"></i>Sistema Funcionando
                        </button>
                    </div>
                </div>
                
                <!-- Floating Elements -->
                <div class="absolute -top-4 -right-4 w-20 h-20 bg-orange-500/20 rounded-full blur-xl animate-pulse"></div>
                <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-blue-500/20 rounded-full blur-xl animate-pulse"></div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center">
            <div class="w-1 h-3 bg-white/60 rounded-full mt-2 animate-pulse"></div>
        </div>
    </div>
</section>

<!-- Seção 2 – Prova Social -->
<section class="py-12 sm:py-16 lg:py-20 px-4 bg-white">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12 sm:mb-16">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-4 sm:mb-6 font-display">
                Quem já acelerou projetos com o DevStarter Kit
            </h2>
            <div class="flex items-center justify-center mb-6 sm:mb-8">
                <div class="flex text-yellow-400 text-lg sm:text-xl lg:text-2xl mr-3 sm:mr-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <span class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-800">4.9/5</span>
            </div>
        </div>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            <div class="bg-gray-50 rounded-2xl p-6 sm:p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&crop=face" alt="Lucas Pereira" class="w-16 h-16 sm:w-20 sm:h-20 rounded-full mx-auto mb-4 sm:mb-6">
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2">Lucas Pereira</h3>
                <p class="text-gray-600 mb-3 sm:mb-4 text-sm sm:text-base">Freelancer Full Stack</p>
                <p class="text-gray-700 italic text-base sm:text-lg">
                    "Economizei 25 horas no último projeto! O DevStarter Kit me permitiu focar na lógica de negócio desde o primeiro dia."
                </p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6 sm:p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=80&h=80&fit=crop&crop=face" alt="Marina Santos" class="w-16 h-16 sm:w-20 sm:h-20 rounded-full mx-auto mb-4 sm:mb-6">
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2">Marina Santos</h3>
                <p class="text-gray-600 mb-3 sm:mb-4 text-sm sm:text-base">Desenvolvedora Front-end</p>
                <p class="text-gray-700 italic text-base sm:text-lg">
                    "Em 1 dia, já tinha meu sistema no ar. A estrutura modular do DevStarter Kit é incrível!"
                </p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-6 sm:p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 sm:col-span-2 lg:col-span-1">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&h=80&fit=crop&crop=face" alt="Carlos Lima" class="w-16 h-16 sm:w-20 sm:h-20 rounded-full mx-auto mb-4 sm:mb-6">
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2">Carlos Lima</h3>
                <p class="text-gray-600 mb-3 sm:mb-4 text-sm sm:text-base">Agência Digital</p>
                <p class="text-gray-700 italic text-base sm:text-lg">
                    "Nossa agência usa o DevStarter Kit em todos os projetos. Reduzimos o tempo de entrega de 2 semanas para 3 dias."
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Seção 3 – Benefícios -->
<section class="py-12 sm:py-16 lg:py-20 px-4 bg-gray-100">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12 sm:mb-16">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-4 sm:mb-6 font-display">
                O que você recebe
            </h2>
        </div>
        
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-8 sm:mb-12">
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-12 h-12 sm:w-16 sm:h-16 bg-blue-500 rounded-full flex items-center justify-center mb-4 sm:mb-6">
                    <i class="fas fa-puzzle-piece text-white text-lg sm:text-2xl"></i>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3 sm:mb-4">Estrutura de sistema modular pronta para uso</h3>
                <p class="text-gray-600 text-sm sm:text-base">Base sólida e organizada para qualquer tipo de projeto, sem precisar começar do zero.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-12 h-12 sm:w-16 sm:h-16 bg-green-500 rounded-full flex items-center justify-center mb-4 sm:mb-6">
                    <i class="fas fa-lock text-white text-lg sm:text-2xl"></i>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3 sm:mb-4">Login, registro e dashboard integrados</h3>
                <p class="text-gray-600 text-sm sm:text-base">Sistema de autenticação completo e seguro, pronto para usar em produção.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-12 h-12 sm:w-16 sm:h-16 bg-purple-500 rounded-full flex items-center justify-center mb-4 sm:mb-6">
                    <i class="fas fa-globe text-white text-lg sm:text-2xl"></i>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3 sm:mb-4">Página pública pronta e templates reutilizáveis</h3>
                <p class="text-gray-600 text-sm sm:text-base">Landing page e templates profissionais que você pode personalizar facilmente.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-12 h-12 sm:w-16 sm:h-16 bg-orange-500 rounded-full flex items-center justify-center mb-4 sm:mb-6">
                    <i class="fas fa-gift text-white text-lg sm:text-2xl"></i>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3 sm:mb-4">Guia + bônus PDF exclusivo</h3>
                <p class="text-gray-600 text-sm sm:text-base">Documentação completa e bônus exclusivos para acelerar ainda mais seu desenvolvimento.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-12 h-12 sm:w-16 sm:h-16 bg-red-500 rounded-full flex items-center justify-center mb-4 sm:mb-6">
                    <i class="fas fa-users text-white text-lg sm:text-2xl"></i>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3 sm:mb-4">Suporte e comunidade inclusos</h3>
                <p class="text-gray-600 text-sm sm:text-base">Acesso à comunidade exclusiva e suporte direto dos criadores do DevStarter Kit.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-12 h-12 sm:w-16 sm:h-16 bg-indigo-500 rounded-full flex items-center justify-center mb-4 sm:mb-6">
                    <i class="fas fa-rocket text-white text-lg sm:text-2xl"></i>
                </div>
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3 sm:mb-4">Performance otimizada</h3>
                <p class="text-gray-600 text-sm sm:text-base">Código otimizado e seguindo as melhores práticas de Laravel, Blade e Tailwind.</p>
            </div>
        </div>
        
        <div class="text-center">
            <a href="#oferta" class="bg-orange-500 text-white px-6 sm:px-8 lg:px-12 py-3 sm:py-4 lg:py-6 rounded-2xl font-bold text-lg sm:text-xl lg:text-2xl hover:bg-orange-600 transition-all duration-300 transform hover:scale-105 shadow-2xl inline-block w-full sm:w-auto animate-pulse-border">
                Quero o DevStarter Kit Agora
            </a>
        </div>
    </div>
</section>

<!-- Tabela Comparativa -->
<section class="py-20 px-4 bg-white">
    @include('components.comparison-table')
</section>

<!-- Seção 4 – Oferta e Escassez -->
<section id="oferta" class="py-12 sm:py-16 lg:py-20 px-4 bg-gray-800 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="max-w-4xl mx-auto text-center relative">
        <div class="inline-flex items-center bg-orange-500 text-white rounded-full px-4 sm:px-6 py-2 sm:py-3 mb-6 sm:mb-8 text-sm sm:text-base lg:text-lg font-bold animate-pulse">
            <i class="fas fa-fire mr-1 sm:mr-2"></i>
            <span class="text-center">🔥 Oferta limitada - Só para os primeiros 50 compradores!</span>
        </div>
        
        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold mb-6 sm:mb-8 text-white font-display leading-tight">
            Pare de começar do <span class="text-orange-400">ZERO</span> a cada projeto
        </h2>
        
        <div class="bg-white/10 backdrop-blur-sm rounded-2xl sm:rounded-3xl p-6 sm:p-8 lg:p-12 mb-8 sm:mb-12">
            <div class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-3 sm:mb-4 text-orange-400">R$ 97</div>
            <div class="text-lg sm:text-xl lg:text-2xl line-through opacity-75 mb-3 sm:mb-4">De R$ 197</div>
            <div class="text-xl sm:text-2xl lg:text-3xl font-bold text-orange-400 mb-6 sm:mb-8">50% DE DESCONTO!</div>
            
            <div class="bg-orange-500/20 backdrop-blur-sm rounded-xl sm:rounded-2xl p-4 sm:p-6 mb-6 sm:mb-8">
                <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-orange-300 mb-3 sm:mb-4">🎁 Bônus Inclusos (R$ 197):</h3>
                <ul class="text-left space-y-2 sm:space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-400 mr-2 sm:mr-3 mt-1 flex-shrink-0"></i>
                        <span class="text-sm sm:text-base">Guia "Como Criar Estruturas de Sistema Profissionais do Zero"</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-400 mr-2 sm:mr-3 mt-1 flex-shrink-0"></i>
                        <span class="text-sm sm:text-base">Template prontos: Login, Dashboard e CRUD básico</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-400 mr-2 sm:mr-3 mt-1 flex-shrink-0"></i>
                        <span class="text-sm sm:text-base">1 hora de suporte comigo por call, para configurar o sistema e resolver qualquer dúvida.</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-400 mr-2 sm:mr-3 mt-1 flex-shrink-0"></i>
                        <span class="text-sm sm:text-base">Suporte e comunidade exclusiva</span>
                    </li>
                </ul>
            </div>
            
            <a href="https://pay.kiwify.com.br/8FjTcKO" class="bg-orange-500 text-white px-6 sm:px-8 lg:px-16 py-4 sm:py-6 lg:py-8 rounded-2xl font-bold text-lg sm:text-xl lg:text-2xl xl:text-3xl hover:bg-orange-600 transition-all duration-300 transform hover:scale-105 shadow-2xl inline-block w-full sm:w-auto animate-pulse-border">
                Quero o DevStarter Kit + Bônus Agora
            </a>
        </div>
    </div>
</section>

<!-- Seção 5 – Garantia -->
<section class="py-12 sm:py-16 lg:py-20 px-4 bg-white">
    <div class="max-w-4xl mx-auto text-center">
        <div class="w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6 sm:mb-8">
            <i class="fas fa-shield-alt text-white text-2xl sm:text-3xl lg:text-4xl"></i>
        </div>
        
        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-4 sm:mb-6 font-display">
            Garantia Total de 30 Dias
        </h2>
        
        <p class="text-lg sm:text-xl text-gray-600 mb-6 sm:mb-8 max-w-3xl mx-auto">
            Se você não conseguir entregar seu primeiro sistema, devolvemos 100% do valor. 
            <strong>Sem perguntas, sem burocracia.</strong>
        </p>
        
        <div class="bg-green-50 rounded-2xl p-6 sm:p-8 border-2 border-green-200">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                <div class="text-center">
                    <i class="fas fa-undo text-green-500 text-2xl sm:text-3xl mb-3 sm:mb-4"></i>
                    <h3 class="text-base sm:text-lg font-bold text-gray-800 mb-2">Reembolso Total</h3>
                    <p class="text-gray-600 text-sm sm:text-base">100% do valor devolvido</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-clock text-green-500 text-2xl sm:text-3xl mb-3 sm:mb-4"></i>
                    <h3 class="text-base sm:text-lg font-bold text-gray-800 mb-2">30 Dias</h3>
                    <p class="text-gray-600 text-sm sm:text-base">Tempo suficiente para testar</p>
                </div>
                <div class="text-center sm:col-span-2 lg:col-span-1">
                    <i class="fas fa-question text-green-500 text-2xl sm:text-3xl mb-3 sm:mb-4"></i>
                    <h3 class="text-base sm:text-lg font-bold text-gray-800 mb-2">Sem Perguntas</h3>
                    <p class="text-gray-600 text-sm sm:text-base">Processo simples e rápido</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Seção 6 – FAQs -->
<section class="py-12 sm:py-16 lg:py-20 px-4 bg-gray-100">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12 sm:mb-16">
            <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-gray-800 mb-4 sm:mb-6 font-display">
                Perguntas Frequentes
            </h2>
        </div>
        
        <div class="space-y-4 sm:space-y-6">
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-lg">
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3 sm:mb-4">❓ Preciso saber Laravel?</h3>
                <p class="text-gray-600 text-sm sm:text-base">Não! O DevStarter Kit vem com documentação completa e exemplos práticos. Mesmo iniciantes conseguem usar em poucas horas.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-lg">
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3 sm:mb-4">❓ Funciona em hospedagem compartilhada?</h3>
                <p class="text-gray-600 text-sm sm:text-base">Sim! O DevStarter Kit é otimizado para funcionar em qualquer hospedagem que suporte PHP 8.0+ e MySQL.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-lg">
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3 sm:mb-4">❓ Posso personalizar tudo?</h3>
                <p class="text-gray-600 text-sm sm:text-base">Absolutamente! Cores, logos, textos, funcionalidades - tudo pode ser personalizado. É seu código, você tem total controle.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-lg">
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3 sm:mb-4">❓ E se eu não conseguir usar?</h3>
                <p class="text-gray-600 text-sm sm:text-base">Temos garantia de 30 dias! Se você não conseguir entregar seu primeiro sistema, devolvemos 100% do valor.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-lg">
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3 sm:mb-4">❓ Posso usar em vários projetos?</h3>
                <p class="text-gray-600 text-sm sm:text-base">Sim! Uma vez adquirido, você pode usar o DevStarter Kit em quantos projetos quiser, sem limitações.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-6 sm:p-8 shadow-lg">
                <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-3 sm:mb-4">❓ Tem suporte técnico?</h3>
                <p class="text-gray-600 text-sm sm:text-base">Sim! Incluímos suporte completo por email e acesso à nossa comunidade exclusiva de desenvolvedores.</p>
            </div>
        </div>
    </div>
</section>

<!-- Seção 7 – Última Chamada -->
<section class="py-12 sm:py-16 lg:py-20 px-4 bg-orange-500 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="max-w-4xl mx-auto text-center relative">
        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold mb-6 sm:mb-8 text-white font-display leading-tight">
            Pare de começar do <span class="text-yellow-300">ZERO</span>.
        </h2>
        <p class="text-lg sm:text-xl lg:text-2xl mb-8 sm:mb-12 text-orange-100 font-medium max-w-3xl mx-auto">
            Tenha uma base sólida e entregue projetos profissionais hoje mesmo!
        </p>
        
        <a href="https://pay.kiwify.com.br/8FjTcKO" class="bg-white text-orange-500 px-6 sm:px-8 lg:px-16 py-4 sm:py-6 lg:py-8 rounded-2xl font-bold text-lg sm:text-xl lg:text-2xl xl:text-3xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl inline-block w-full sm:w-auto mb-6 sm:mb-8 animate-pulse-border">
            Quero o DevStarter Kit Agora
        </a>
        
        <div class="text-orange-200 space-y-2 sm:space-y-3">
            <p class="text-base sm:text-lg">✅ Acesso imediato após pagamento</p>
            <p class="text-base sm:text-lg">🎁 Bônus incluído</p>
            <p class="text-base sm:text-lg">🛡️ Garantia de 30 dias</p>
        </div>
    </div>
</section>

<!-- Rodapé -->
<footer class="bg-gray-900 text-white py-12 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="grid md:grid-cols-4 gap-8">
            <div class="md:col-span-2">
                <h3 class="text-xl font-bold mb-4 text-white font-display">DevStarter Kit</h3>
                <p class="text-gray-300 mb-6 text-base">
                    A base completa para desenvolvedores que querem entregar projetos profissionais em horas, não em semanas.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>
            <div>
                <h4 class="text-base font-semibold mb-4 text-white">Links</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition-colors text-sm">Sobre</a></li>
                    <li><a href="{{ route('privacy-policy') }}" class="text-gray-300 hover:text-white transition-colors text-sm">Política de Privacidade</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-base font-semibold mb-4 text-white">Suporte</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('help-center') }}" class="text-gray-300 hover:text-white transition-colors text-sm">Central de Ajuda</a></li>
                    <li><a href="{{ route('documentation') }}" class="text-gray-300 hover:text-white transition-colors text-sm">Documentação</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center">
            <p class="text-gray-300 text-sm">
                © 2025 DevStarter Kit – A base completa para desenvolvedores profissionais.
            </p>
        </div>
    </div>
</footer>

<style>
    .animate-fade-in {
        animation: fadeIn 0.8s ease-in;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-slide-up {
        animation: slideUp 0.6s ease-out;
    }
    @keyframes slideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .font-display {
        font-family: 'Poppins', sans-serif;
    }
    
    /* New Hero Animations */
    .animate-float-1 {
        animation: float1 6s ease-in-out infinite;
        top: 20%;
        left: 10%;
    }
    .animate-float-2 {
        animation: float2 8s ease-in-out infinite;
        top: 60%;
        right: 15%;
    }
    .animate-float-3 {
        animation: float3 7s ease-in-out infinite;
        top: 30%;
        right: 20%;
    }
    .animate-float-4 {
        animation: float4 9s ease-in-out infinite;
        bottom: 20%;
        left: 20%;
    }
    .animate-float-5 {
        animation: float5 5s ease-in-out infinite;
        top: 80%;
        right: 30%;
    }
    
    @keyframes float1 {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }
    @keyframes float2 {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-30px) rotate(-180deg); }
    }
    @keyframes float3 {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(90deg); }
    }
    @keyframes float4 {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-25px) rotate(-90deg); }
    }
    @keyframes float5 {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(45deg); }
    }
    
    .animate-gradient {
        background-size: 200% 200%;
        animation: gradient 3s ease infinite;
    }
    
    @keyframes gradient {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    .animate-progress {
        animation: progress 2s ease-in-out;
    }
    
    @keyframes progress {
        from { width: 0%; }
        to { width: var(--target-width); }
    }
    
    /* Responsive adjustments */
    @media (max-width: 640px) {
        .particle {
            display: none;
        }
    }
    
    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: #1f2937;
    }
    
    ::-webkit-scrollbar-thumb {
        background: #f97316;
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: #ea580c;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Sticky CTA
    const stickyCta = document.getElementById('sticky-cta');
    const heroSection = document.querySelector('section.bg-gray-800');
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > heroSection.offsetHeight) {
            stickyCta.classList.remove('-translate-y-full');
        } else {
            stickyCta.classList.add('-translate-y-full');
        }
    });
    
    // Countdown timer
    function updateCountdown() {
        const countdownElement = document.getElementById('countdown');
        if (countdownElement) {
            const now = new Date().getTime();
            const endTime = now + (24 * 60 * 60 * 1000); // 24 horas
            
            const timer = setInterval(function() {
                const now = new Date().getTime();
                const distance = endTime - now;
                
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                countdownElement.innerHTML = hours.toString().padStart(2, '0') + ":" + 
                                          minutes.toString().padStart(2, '0') + ":" + 
                                          seconds.toString().padStart(2, '0');
                
                if (distance < 0) {
                    clearInterval(timer);
                    countdownElement.innerHTML = "EXPIRADO!";
                }
            }, 1000);
        }
    }
    
    // Iniciar countdown
    updateCountdown();
    
    // Smooth scroll para links internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Console welcome message
    console.log('%c🚀 DevStarter Kit - Página de Conversão', 'color: #F59E0B; font-size: 20px; font-weight: bold;');
    console.log('%cCrie sistemas completos em horas, não em semanas!', 'color: #1F2937; font-size: 14px;');
});
</script>

<style>
    /* Animação de borda pulsante */
    @keyframes pulse-border {
        0% {
            box-shadow: 0 0 0 0 rgba(249, 115, 22, 0.7);
        }
        70% {
            box-shadow: 0 0 0 10px rgba(249, 115, 22, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(249, 115, 22, 0);
        }
    }
    
    .animate-pulse-border {
        animation: pulse-border 2s infinite;
    }
</style>
@endsection
