@extends('layouts.landing')

@section('title', 'Laravel ProStarter - Crie Sistemas Completos em Horas | Laravel + Blade + Tailwind')

@section('meta')
    <meta name="description"
        content="Laravel ProStarter: Sistema base completo que já ajudou +127 desenvolvedores a acelerar projetos com Laravel + Blade + Tailwind. Crie sistemas em horas, não em semanas!">
    <meta name="keywords"
        content="laravel prostarter, laravel, Blade, tailwind, sistema base, desenvolvedor, projeto completo, dashboard, login, crud">
    <meta name="author" content="Laravel ProStarter">
<meta name="robots" content="index, follow">
<meta name="language" content="pt-BR">
    
    <!-- Performance -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    
    <!-- Preload critical resources -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" as="style">

<meta property="og:type" content="website">
<meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="Laravel ProStarter - Crie Sistemas Completos em Horas">
    <meta property="og:description"
        content="Sistema base completo que já ajudou +127 desenvolvedores a acelerar projetos com Laravel + Blade + Tailwind.">
    <meta property="og:image" content="{{ asset('images/laravel-prostarter-og.jpg') }}">
    <meta property="og:site_name" content="Laravel ProStarter">
<meta property="og:locale" content="pt_BR">

<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ request()->url() }}">
    <meta property="twitter:title" content="Laravel ProStarter - Crie Sistemas Completos em Horas">
    <meta property="twitter:description"
        content="Sistema base completo que já ajudou +127 desenvolvedores a acelerar projetos com Laravel + Blade + Tailwind.">
    <meta property="twitter:image" content="{{ asset('images/laravel-prostarter-og.jpg') }}">

<link rel="canonical" href="{{ request()->url() }}">
@endsection

@section('content')
    <!-- Sticky CTA -->
    <div id="sticky-cta"
        class="fixed top-0 left-0 right-0 bg-yellow-500 text-black py-2 sm:py-3 px-2 sm:px-4 z-50 transition-transform duration-300 shadow-lg">
    <div class="max-w-6xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2 sm:gap-4">
        <div class="flex items-center text-center sm:text-left">
            <i class="fas fa-fire mr-1 sm:mr-2 text-sm sm:text-base"></i>
                <span class="font-bold text-sm sm:text-base">🔥 Oferta limitada - Primeiros 50 compradores!</span>
        </div>
            <a href="https://pay.kiwify.com.br/i0FGVRc"
                class="bg-purple-700 text-white px-3 sm:px-6 py-1.5 sm:py-2 rounded-lg font-bold hover:bg-purple-800 transition-colors text-xs sm:text-sm whitespace-nowrap">
                Quero o Laravel ProStarter Agora
        </a>
    </div>
</div>

    <!-- Hero / Topo -->
    <section class="relative text-white py-40 text-center overflow-hidden min-h-screen flex items-center"
        style="background: linear-gradient(135deg, #6B21A8 0%, #7C3AED 50%, #1D4ED8 100%);">
        <!-- Elementos geométricos animados -->
        <div class="absolute inset-0 opacity-30">
    <div class="absolute inset-0">
                <!-- Código difuso de fundo -->
                <div class="absolute top-10 left-10 w-32 h-32 bg-yellow-400/20 rounded-full blur-xl animate-pulse"></div>
                <div
                    class="absolute top-32 right-20 w-24 h-24 bg-blue-400/20 rounded-full blur-lg animate-pulse delay-1000">
        </div>
                <div
                    class="absolute bottom-20 left-1/4 w-40 h-40 bg-purple-400/20 rounded-full blur-2xl animate-pulse delay-2000">
    </div>
                <div
                    class="absolute bottom-32 right-1/3 w-28 h-28 bg-pink-400/20 rounded-full blur-xl animate-pulse delay-500">
                        </div>
                    </div>
                    
            <!-- Partículas flutuantes -->
            <div class="particle absolute w-2 h-2 bg-yellow-400 rounded-full animate-float-1"></div>
            <div class="particle absolute w-3 h-3 bg-blue-400 rounded-full animate-float-2"></div>
            <div class="particle absolute w-1 h-1 bg-purple-400 rounded-full animate-float-3"></div>
            <div class="particle absolute w-2 h-2 bg-green-400 rounded-full animate-float-4"></div>
            <div class="particle absolute w-1 h-1 bg-pink-400 rounded-full animate-float-5"></div>
            <div class="particle absolute w-2 h-2 bg-orange-400 rounded-full animate-float-6"></div>
        </div>
        
        <div class="max-w-6xl mx-auto px-4 relative z-10">
            <div
                class="inline-flex items-center bg-yellow-500 text-black rounded-full px-4 py-2 mb-4 mt-10  lg:mt-0 text-xs font-bold animate-bounce shadow-xl">
                <span class="w-2 h-2 bg-yellow-600 rounded-full mr-2 animate-pulse"></span>
                🔥 Oferta limitada — primeiros 50!
    </div>
            <div class="flex justify-center mb-4">
                <div class="relative max-w-4xl w-full">
                    <div
                        class="relative bg-white rounded-3xl shadow-2xl overflow-hidden transform rotate-1 hover:rotate-0 transition-transform duration-500">
                    <div class="bg-gray-100 px-4 py-3 flex items-center space-x-2">
                        <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        <div class="flex-1 text-center">
                                <span class="text-sm font-medium text-gray-600">Laravel ProStarter Demo</span>
                </div>
                    </div>
                        <!-- Vídeo do YouTube -->
                        <div class="relative bg-black rounded-b-3xl overflow-hidden" style="height: 500px;">
                            <!-- Iframe do YouTube -->
                            <iframe width="100%" height="100%"
                                src="https://www.youtube.com/embed/KpTO4CUNE08?autoplay=0&rel=0&modestbranding=1&showinfo=0&controls=1&enablejsapi=1&origin={{ request()->getHost() }}"
                                title="Laravel ProStarter Demo" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" id="youtube-video"
                                loading="lazy">
                            </iframe>

                            <!-- Loading indicator -->
                            <div class="absolute inset-0 bg-gray-900 flex items-center justify-center" id="video-loading">
                                <div class="text-center text-white">
                                    <div
                                        class="w-8 h-8 border-4 border-white/30 border-t-white rounded-full animate-spin mx-auto mb-4">
                        </div>
                                    <p class="text-sm">Carregando vídeo...</p>
                        </div>
                    </div>
                        </div>
                    </div>
                    
                    <!-- Efeitos de fundo -->
                    <div class="absolute -top-4 -right-4 w-20 h-20 bg-yellow-500/20 rounded-full blur-xl animate-pulse">
                        </div>
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-blue-500/20 rounded-full blur-xl animate-pulse">
                        </div>
                    </div>
                </div>
                        
            <!-- Conteúdo centralizado abaixo -->
            <div class="text-center mb-10">
                <!-- Subtítulo emocional -->
                <p class="text-xl md:text-2xl mb-6 font-medium text-gray-200 max-w-4xl mx-auto leading-relaxed">
                    Entregue seu sistema completo em <span class="text-yellow-400 font-bold">horas, não semanas</span> — economize até <span class="text-yellow-400 font-bold">33h por projeto!</span>
                </p>
                
                <!-- Sub-subtítulo técnico -->
                <p class="text-lg md:text-xl mb-10 font-medium text-gray-300 max-w-4xl mx-auto leading-relaxed">
                    Laravel ProStarter: a base pronta de sistema profissional para acelerar seus projetos Laravel
                </p>

                <!-- CTA Principal -->
                <a href="https://pay.kiwify.com.br/i0FGVRc"
                    class="group relative text-black font-bold px-12 py-6 rounded-2xl shadow-2xl transition-all duration-300 transform hover:scale-110 inline-block mb-8 animate-pulse-border"
                    style="background: linear-gradient(45deg, #FACC15, #F59E0B);">
                    <span class="relative z-10 text-lg">Quero o Laravel ProStarter Agora</span>
                </a>

                <!-- Prova social -->
                <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-8 gap-4">
                    <div class="flex items-center" style="margin-bottom: 0px;">
                        <div class="flex text-yellow-400 text-xl">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <span class="text-lg font-semibold">4.9/5 (127+)</span>
                    </div>
                    <div class="flex items-center space-x-4 text-lg">
                        <span class="flex items-center">
                            <i class="fas fa-shield-alt text-green-400 mr-2"></i>
                            Garantia 30 dias
                        </span>
                        <span class="flex items-center">
                            <i class="fas fa-rocket text-blue-400 mr-2"></i>
                            Acesso imediato
                        </span>
                    </div>
                </div>
                        </div>
                    </div>
                    
        <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center">
            <div class="w-1 h-3 bg-white/60 rounded-full mt-2 animate-pulse"></div>
                            </div>
                            </div>
</section>
    <!-- Features / Benefícios -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 right-20 w-60 h-60 bg-purple-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-40 h-40 bg-blue-400 rounded-full blur-2xl"></div>
                        </div>
                        
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">O que você recebe</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Tudo que você precisa para criar sistemas profissionais
                    em tempo recorde</p>
                                </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    class="group p-8 bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-lock text-white text-2xl"></i>
                                </div>
                    <h3 class="font-bold text-xl mb-4 text-gray-800">Autenticação completa</h3>
                    <p class="text-gray-600 leading-relaxed">Login, registro e painel seguro prontos para produção com
                        sistema de permissões avançado</p>
                            </div>

                <div
                    class="group p-8 bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-tachometer-alt text-white text-2xl"></i>
                                </div>
                    <h3 class="font-bold text-xl mb-4 text-gray-800">Painel administrativo moderno</h3>
                    <p class="text-gray-600 leading-relaxed">Dashboard inicial com sistema de cadastros <span class="text-blue-600 font-semibold" title="Create, Read, Update, Delete - Sistema completo de gerenciamento de dados">(CRUD)</span> funcional integrado e métricas em
                        tempo real</p>
                                </div>

                <div
                    class="group p-8 bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-palette text-white text-2xl"></i>
                            </div>
                    <h3 class="font-bold text-xl mb-4 text-gray-800">Layouts prontos</h3>
                    <p class="text-gray-600 leading-relaxed">Templates Blade totalmente personalizáveis e responsivos com
                        design moderno</p>
                                </div>
        
                <div
                    class="group p-8 bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-users text-white text-2xl"></i>
                                </div>
                    <h3 class="font-bold text-xl mb-4 text-gray-800">Sistema de usuários e permissões</h3>
                    <p class="text-gray-600 leading-relaxed">Controle completo sobre quem pode acessar o sistema com
                        diferentes níveis de acesso <span class="text-green-600 font-semibold" title="Admin, Usuário comum, etc.">(Admin, Usuário, etc.)</span></p>
                        </div>
                        
                <div
                    class="group p-8 bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-bolt text-white text-2xl"></i>
                    </div>
                    <h3 class="font-bold text-xl mb-4 text-gray-800">Estrutura organizada</h3>
                    <p class="text-gray-600 leading-relaxed">Código limpo seguindo boas práticas Laravel + Tailwind com
                        documentação completa</p>
                </div>
                
                <div
                    class="group p-8 bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
            </div>
                    <h3 class="font-bold text-xl mb-4 text-gray-800">100% Responsivo</h3>
                    <p class="text-gray-600 leading-relaxed">Funciona perfeitamente em desktop, tablet e mobile sem
                        necessidade de ajustes</p>
        </div>
    </div>
    </div>
</section>

    <!-- Economia / Impacto -->
    <section class="py-24 bg-gradient-to-br from-gray-50 to-gray-100 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-40 h-40 bg-purple-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-32 h-32 bg-yellow-400 rounded-full blur-2xl"></div>
        </div>
        
        <div class="max-w-6xl mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">Quanto tempo você economiza</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Veja o impacto real do Laravel ProStarter no seu
                    desenvolvimento</p>
    </div>
            
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <div
                    class="group bg-gradient-to-br from-purple-500 to-purple-600 p-10 rounded-3xl shadow-2xl text-white transform hover:scale-105 transition-all duration-300">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center rounded-full">
                            <i class="fas fa-clock text-3xl"></i>
                </div>
            </div>
                    <h4 class="font-bold text-4xl mb-4 text-center">33h30min</h4>
                    <p class="text-xl text-center text-purple-100 mb-4">economizadas por projeto</p>
                    <p class="text-lg text-center text-purple-200">Entrega até 6 dias mais rápida por projeto</p>
        </div>
        
                <div
                    class="group bg-gradient-to-br from-yellow-500 to-yellow-600 p-10 rounded-3xl shadow-2xl text-white transform hover:scale-105 transition-all duration-300">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center rounded-full">
                            <i class="fas fa-dollar-sign text-3xl"></i>
            </div>
            </div>
                    <h4 class="font-bold text-4xl mb-4 text-center">R$1.870</h4>
                    <p class="text-xl text-center text-yellow-100 mb-4">economizados por projeto</p>
                    <p class="text-lg text-center text-yellow-200">Dinheiro e tempo que você pode investir em mais projetos
                </p>
            </div>
            </div>
            
            <div class="text-center mt-12">
                <div class="inline-flex items-center bg-white rounded-full px-6 py-3 shadow-lg">
                    <i class="fas fa-chart-line text-green-500 text-xl mr-3"></i>
                    <span class="text-lg font-semibold text-gray-800">ROI médio de 1.900% em economia de tempo</span>
            </div>
        </div>
    </div>
</section>

    <!-- Bônus e Escassez -->
    <section class="bg-gradient-to-br from-yellow-50 to-yellow-100 py-24 text-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-20 w-40 h-40 bg-yellow-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-32 h-32 bg-orange-400 rounded-full blur-2xl"></div>
        </div>
        
        <div class="max-w-6xl mx-auto px-4 relative z-10">
            <div class="mb-12">
                <div
                    class="inline-flex items-center bg-yellow-500 text-black rounded-full px-6 py-3 mb-6 text-sm font-bold animate-pulse">
                    <span class="w-2 h-2 bg-yellow-600 rounded-full mr-3 animate-pulse"></span>
                    🎁 Bônus limitados
                </div>
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">Bônus exclusivos para os 10 primeiros
                    compradores</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Valor total dos bônus: R$ 197 - Grátis para os primeiros
                    compradores!</p>
            </div>
            
            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto mb-12">
                <div
                    class="bg-white p-8 rounded-2xl shadow-xl border-l-4 border-yellow-500 transform hover:scale-105 transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-gift text-white text-xl"></i>
                </div>
                        <h3 class="text-xl font-bold text-gray-800">1 hora de call individual</h3>
            </div>
                    <p class="text-gray-600">Para configuração e dúvidas com suporte direto</p>
            </div>
            
                <div
                    class="bg-white p-8 rounded-2xl shadow-xl border-l-4 border-blue-500 transform hover:scale-105 transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-book text-white text-xl"></i>
                </div>
                        <h3 class="text-xl font-bold text-gray-800">Guia passo a passo</h3>
                    </div>
                    <p class="text-gray-600">Criando sistemas profissionais do zero</p>
            </div>
            
                <div
                    class="bg-white p-8 rounded-2xl shadow-xl border-l-4 border-green-500 transform hover:scale-105 transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-palette text-white text-xl"></i>
                </div>
                        <h3 class="text-xl font-bold text-gray-800">Templates prontos</h3>
                    </div>
                    <p class="text-gray-600">Login, Dashboard e CRUD básico</p>
            </div>
            
                <div
                    class="bg-white p-8 rounded-2xl shadow-xl border-l-4 border-purple-500 transform hover:scale-105 transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-users text-white text-xl"></i>
                </div>
                        <h3 class="text-xl font-bold text-gray-800">Comunidade exclusiva</h3>
                    </div>
                    <p class="text-gray-600">Acesso à comunidade de desenvolvedores</p>
            </div>
        </div>
        
            <a href="https://pay.kiwify.com.br/i0FGVRc"
                class="group relative text-white font-bold px-12 py-6 rounded-2xl shadow-2xl transition-all duration-300 transform hover:scale-110 inline-block animate-pulse-border"
                style="background: linear-gradient(45deg, #7C3AED, #6B21A8);">
                <span class="relative z-10 text-lg">Garanta seu bônus agora</span>
                <div class="absolute inset-0 bg-gradient-to-r from-purple-800 to-purple-900 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </a>
    </div>
</section>

    <!-- Autoridade / História -->
    <section class="py-24 bg-gradient-to-br from-gray-50 to-gray-100 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 right-20 w-40 h-40 bg-purple-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 left-20 w-32 h-32 bg-blue-400 rounded-full blur-2xl"></div>
    </div>
    
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <div class="bg-white rounded-3xl p-12 shadow-2xl">
                <img src="https://github.com/nadodev.png" alt="Leonardo Geja"
                    class="w-32 h-32 rounded-full mx-auto mb-8 border-4 border-purple-500 shadow-lg"
                    loading="lazy" width="128" height="128">
                <blockquote class="text-2xl italic mb-6 text-gray-700 leading-relaxed">
                    "Criei o Laravel ProStarter porque sempre perdia horas configurando sistemas. Agora, você pode começar
                    pronto e focar na lógica do seu projeto."
                </blockquote>
                <p class="text-xl font-semibold text-gray-800">- Leonardo Geja</p>
                <p class="text-gray-600 mt-2">Criador do Laravel ProStarter</p>
        </div>
    </div>
</section>

    <!-- Depoimentos -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 left-20 w-60 h-60 bg-green-400 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-40 h-40 bg-blue-400 rounded-full blur-2xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-gray-800">Quem já acelerou projetos com o Laravel
                    ProStarter</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Veja o que nossos desenvolvedores estão dizendo</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div
                    class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl shadow-xl transform hover:scale-105 transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60&h=60&fit=crop&crop=face"
                            alt="Lucas Pereira" class="w-16 h-16 rounded-full mr-4" loading="lazy" width="60" height="60">
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">Lucas Pereira</h3>
                            <p class="text-gray-600">Freelancer Full Stack</p>
        </div>
    </div>
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 italic leading-relaxed">"Economizei 25 horas no último projeto! O ProStarter me
                        permitiu focar na lógica de negócio desde o primeiro dia."</p>
            </div>
            
                <div
                    class="bg-gradient-to-br from-green-50 to-green-100 p-8 rounded-2xl shadow-xl transform hover:scale-105 transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=60&h=60&fit=crop&crop=face"
                            alt="Marina Santos" class="w-16 h-16 rounded-full mr-4" loading="lazy" width="60" height="60">
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">Marina Santos</h3>
                            <p class="text-gray-600">Desenvolvedora Front-end</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-700 italic leading-relaxed">"Em 1 dia, já tinha meu sistema no ar. A estrutura
                        modular do ProStarter é incrível!"</p>
        </div>
        
                <div
                    class="bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-2xl shadow-xl transform hover:scale-105 transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=60&h=60&fit=crop&crop=face"
                            alt="Carlos Lima" class="w-16 h-16 rounded-full mr-4" loading="lazy" width="60" height="60">
                        <div>
                            <h3 class="font-bold text-lg text-gray-800">Carlos Lima</h3>
                            <p class="text-gray-600">Agência Digital</p>
                </div>
                </div>
                    <div class="flex text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                </div>
                    <p class="text-gray-700 italic leading-relaxed">"Nossa agência usa o ProStarter em todos os projetos.
                        Reduzimos o tempo de entrega de 2 semanas para 3 dias."</p>
            </div>
        </div>
    </div>
</section>

    <!-- Oferta + CTA Final -->
    <section id="compra" class="py-24 text-white text-center relative overflow-hidden"
        style="background: linear-gradient(135deg, #6B21A8 0%, #7C3AED 50%, #1D4ED8 100%);">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-20 w-40 h-40 bg-yellow-400/30 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-20 w-32 h-32 bg-white/20 rounded-full blur-2xl animate-pulse"></div>
        </div>
        
        <div class="max-w-5xl mx-auto px-4 relative z-10">
            <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-12 border border-white/20">
                <div class="mb-8">
                    <div
                        class="inline-flex items-center bg-yellow-500 text-black rounded-full px-6 py-3 mb-6 text-sm font-bold animate-pulse">
                        <span class="w-2 h-2 bg-yellow-600 rounded-full mr-3 animate-pulse"></span>
                        🔥 Oferta de Lançamento — Apenas 50 licenças!
            </div>
                    <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-4 leading-tight">Pare de começar do ZERO a cada projeto</h2>
                    <p class="text-base sm:text-lg mb-6">De R$197 por <span class="text-yellow-400 font-bold text-xl sm:text-2xl">R$97</span> — 50%
                        de desconto!</p>
            </div>
            
                <!-- Bônus e Garantias - Design Limpo -->
                <div class="max-w-4xl mx-auto mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Bônus -->
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-gift text-white"></i>
            </div>
                                <div>
                                    <h3 class="text-white font-bold text-lg">Bônus Inclusos</h3>
                                    <p class="text-yellow-300 text-sm">Valor: R$ 197</p>
            </div>
            </div>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-check text-green-400 mr-3"></i>
                                    <span class="text-white text-sm">Guia completo de estruturas profissionais</span>
            </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check text-green-400 mr-3"></i>
                                    <span class="text-white text-sm">Templates: Login, Dashboard e CRUD</span>
        </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check text-green-400 mr-3"></i>
                                    <span class="text-white text-sm">1 hora de suporte personalizado</span>
    </div>
                                <div class="flex items-center">
                                    <i class="fas fa-check text-green-400 mr-3"></i>
                                    <span class="text-white text-sm">Comunidade exclusiva</span>
                                </div>
                            </div>
    </div>
    
                        <!-- Garantias -->
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-shield-alt text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-white font-bold text-lg">Garantias</h3>
                                    <p class="text-green-300 text-sm">100% Seguro</p>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <i class="fas fa-shield-alt text-blue-400 mr-3"></i>
                                    <span class="text-white text-sm">30 dias de garantia total</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-rocket text-blue-400 mr-3"></i>
                                    <span class="text-white text-sm">Acesso imediato após pagamento</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-users text-blue-400 mr-3"></i>
                                    <span class="text-white text-sm">Comunidade inclusa vitalícia</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-headset text-blue-400 mr-3"></i>
                                    <span class="text-white text-sm">Suporte técnico completo</span>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
    
                <a href="https://pay.kiwify.com.br/i0FGVRc"
                    class="group relative text-black font-bold px-6 sm:px-8 md:px-12 py-4 sm:py-6 rounded-xl shadow-xl transition-all duration-300 transform hover:scale-105 inline-block mb-6 animate-pulse-border"
                    style="background: linear-gradient(45deg, #FACC15, #F59E0B);">
                    <span class="relative z-10 text-base sm:text-lg md:text-xl">Quero o Laravel ProStarter Agora</span>
                </a>

                <p class="text-xs sm:text-sm md:text-base text-center">✅ Garantia de 30 dias | Acesso imediato | Bônus incluídos</p>
        </div>
    </div>
</section>

    <!-- FAQ -->
    <section class="py-20 bg-gray-50 max-w-4xl mx-auto text-left">
        <h2 class="text-3xl font-bold mb-8 text-center">Perguntas Frequentes</h2>
        <div class="space-y-4">
            <details class="bg-white p-4 rounded shadow">
                <summary class="font-bold cursor-pointer">Preciso saber Laravel?</summary>
                <p class="mt-2">Não! O ProStarter vem com guia passo a passo e exemplos práticos.</p>
            </details>
            <details class="bg-white p-4 rounded shadow">
                <summary class="font-bold cursor-pointer">Funciona em hospedagem simples?</summary>
                <p class="mt-2">Sim! Compatível com PHP 8+ e MySQL.</p>
            </details>
            <details class="bg-white p-4 rounded shadow">
                <summary class="font-bold cursor-pointer">Posso personalizar tudo?</summary>
                <p class="mt-2">Absolutamente! Cores, textos e funcionalidades são totalmente ajustáveis.</p>
            </details>
            <details class="bg-white p-4 rounded shadow">
                <summary class="font-bold cursor-pointer">E se eu não conseguir usar?</summary>
                <p class="mt-2">Temos garantia de 30 dias. Se não entregar seu primeiro sistema, devolvemos 100% do valor.
                </p>
            </details>
                </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 bg-gray-900 text-white text-center">
        <p>© 2025 Laravel ProStarter – Base pronta de sistema profissional para desenvolvedores</p>
        <div class="mt-4 space-x-4">
            <a href="/politica" class="hover:underline">Política de Privacidade</a>
            <a href="/suporte" class="hover:underline">Suporte</a>
    </div>
</footer>

<style>
        /* Hero Animations */
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

        .animate-float-6 {
            animation: float6 4s ease-in-out infinite;
            top: 50%;
            left: 30%;
    }
    
    @keyframes float1 {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

    @keyframes float2 {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-30px) rotate(-180deg);
            }
        }

    @keyframes float3 {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(90deg);
            }
        }

    @keyframes float4 {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-25px) rotate(-90deg);
            }
        }

    @keyframes float5 {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(45deg);
            }
        }

        @keyframes float6 {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-18px) rotate(120deg);
            }
        }

        /* Gradient animations */
    .animate-gradient {
        background-size: 200% 200%;
        animation: gradient 3s ease infinite;
    }
    
    @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Pulse border animation */
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
            background: linear-gradient(45deg, #6B21A8, #1D4ED8);
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(45deg, #7C3AED, #2563EB);
        }

    /* Barra sticky visível */
    #sticky-cta {
        transform: translateY(0);
    }
    
    /* Performance optimizations */
    img {
        image-rendering: -webkit-optimize-contrast;
        image-rendering: crisp-edges;
    }
    
    /* Reduce motion for users who prefer it */
    @media (prefers-reduced-motion: reduce) {
        .animate-pulse,
        .animate-bounce,
        .animate-float-1,
        .animate-float-2,
        .animate-float-3,
        .animate-float-4,
        .animate-float-5,
        .animate-float-6 {
            animation: none;
        }
    }
    
    /* Critical CSS for above-the-fold content */
    .hero-section {
        contain: layout style paint;
    }
</style>

<script>
        document.addEventListener('DOMContentLoaded', function () {
    
            // Sticky CTA - Aparece quando sair da seção hero
    const stickyCta = document.getElementById('sticky-cta');
            const heroSection = document.querySelector('section[style*="background: linear-gradient"]');

            if (stickyCta && heroSection) {
                // Começar escondida
                stickyCta.style.transform = 'translateY(-100%)';
                
                window.addEventListener('scroll', function () {
                    const scrollY = window.scrollY;
                    const heroHeight = heroSection.offsetHeight;

                    // Mostra quando sair da seção hero
                    if (scrollY > heroHeight - 100) {
                        stickyCta.style.transform = 'translateY(0)';
        } else {
                        stickyCta.style.transform = 'translateY(-100%)';
                    }
                });
            }
    
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
    
            // Eventos de Tracking
            
            // Função auxiliar para enviar eventos
            function sendAnalyticsEvent(eventType, eventName, eventData = {}) {
                const csrfToken = document.querySelector('meta[name="csrf-token"]');
                if (!csrfToken) {
                    return;
                }
                
                const url = '{{ url("/analytics/track") }}';
                
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                    },
                    body: JSON.stringify({
                        event_type: eventType,
                        event_name: eventName,
                        event_data: {
                            ...eventData,
                            timestamp: new Date().toISOString(),
                            user_agent: navigator.userAgent,
                            page_url: window.location.href
                        }
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Evento enviado com sucesso
                })
                .catch(error => {
                    // Erro ao enviar evento
                });
            }
            
            // Tracking de visualização da página
            sendAnalyticsEvent('page_view', 'Page Viewed', {
                page_title: document.title
            });
            
            if (typeof trackConversion === 'function') {
                trackConversion('page_view');
            }
            
            // Tracking de cliques nos botões CTA
            document.querySelectorAll('a[href*="checkout"], button[onclick*="checkout"], .cta-button, a[href*="kiwify"]').forEach(button => {
                button.addEventListener('click', function() {
                    sendAnalyticsEvent('cta_click', 'CTA Button Clicked', {
                        button_text: this.textContent.trim(),
                        button_url: this.href || 'N/A',
                        button_position: this.getBoundingClientRect()
                    });
                    
                    if (typeof trackConversion === 'function') {
                        trackConversion('cta_click', 97.00);
                    }
                });
            });
            
            // Tracking de cliques no vídeo
            const videoContainer = document.querySelector('#youtube-video');
            if (videoContainer) {
                videoContainer.addEventListener('click', function() {
                    sendAnalyticsEvent('video_click', 'Video Clicked', {
                        video_id: 'KpTO4CUNE08',
                        video_title: 'Laravel ProStarter Demo'
                    });
                    
                    if (typeof trackConversion === 'function') {
                        trackConversion('video_click');
                    }
                });
            }
            
            // Tracking de scroll profundo (75% da página)
            let deepScrollTracked = false;
            window.addEventListener('scroll', function() {
                const scrollPercent = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
                if (scrollPercent > 75 && !deepScrollTracked) {
                    if (typeof trackConversion === 'function') {
                        trackConversion('deep_scroll');
                    }
                    deepScrollTracked = true;
                }
            });
            
            // Tracking de tempo na página (2 minutos)
            setTimeout(function() {
                if (typeof trackConversion === 'function') {
                    trackConversion('time_on_page');
                }
            }, 120000);
            
            // Tracking de interação com FAQ
            document.querySelectorAll('details').forEach(detail => {
                detail.addEventListener('toggle', function() {
                    if (this.open) {
                        if (typeof trackConversion === 'function') {
                            trackConversion('faq_interaction');
                        }
                    }
                });
            });

            // Configuração do vídeo
            const videoIframe = document.getElementById('youtube-video');
            const videoLoading = document.getElementById('video-loading');

            if (videoIframe && videoLoading) {
                // Esconder loading quando o vídeo carregar
                videoIframe.addEventListener('load', function () {
                    videoLoading.style.display = 'none';
                });

                // Se der erro, manter loading
                videoIframe.addEventListener('error', function () {
                    videoLoading.innerHTML = `
                    <div class="text-center text-white">
                        <div class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-exclamation-triangle text-2xl"></i>
                        </div>
                        <p class="text-sm">Erro ao carregar vídeo</p>
                        <a href="https://www.youtube.com/watch?v=KpTO4CUNE08" target="_blank" class="mt-2 inline-block bg-white/20 text-white px-4 py-2 rounded text-xs hover:bg-white/30 transition-colors">
                            Abrir no YouTube
                        </a>
                    </div>
                `;
                });

                // Timeout para esconder loading após 5 segundos
                setTimeout(function () {
                    if (videoLoading.style.display !== 'none') {
                        videoLoading.style.display = 'none';
                    }
                }, 5000);
            }
        });
    </script>
@endsection
