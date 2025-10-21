@extends('layouts.landing')


@section('title', 'DevStarter Kit - Sistema Base Completo para Desenvolvedores | Laravel + Blade + Tailwind')

@section('meta')
<meta name="description" content="DevStarter Kit: Sistema base completo para desenvolvedores iniciantes. Laravel + Vue + Tailwind CSS. Login, painel admin, landing page prontos. Economize semanas de desenvolvimento!">
<meta name="keywords" content="devstarter kit, sistema base, laravel, blade, tailwind, desenvolvedor iniciante, painel admin, login, autenticação, sistema completo, base de projeto">
<meta name="author" content="DevStarter Kit">
<meta name="robots" content="index, follow">
<meta name="language" content="pt-BR">
<meta name="revisit-after" content="7 days">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ request()->url() }}">
<meta property="og:title" content="DevStarter Kit - Sistema Base Completo para Desenvolvedores">
<meta property="og:description" content="Sistema base completo com Laravel + Vue + Tailwind. Login, painel admin, landing page prontos. Economize semanas de desenvolvimento!">
<meta property="og:image" content="{{ asset('images/devstarter-kit-og.jpg') }}">
<meta property="og:site_name" content="DevStarter Kit">
<meta property="og:locale" content="pt_BR">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ request()->url() }}">
<meta property="twitter:title" content="DevStarter Kit - Sistema Base Completo para Desenvolvedores">
<meta property="twitter:description" content="Sistema base completo com Laravel + Vue + Tailwind. Login, painel admin, landing page prontos. Economize semanas de desenvolvimento!">
<meta property="twitter:image" content="{{ asset('images/devstarter-kit-og.jpg') }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ request()->url() }}">
    
    
@endsection

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-red-orange-yellow text-white py-20 px-4 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="max-w-6xl mx-auto relative">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="animate-fade-in">
                <div class="inline-flex items-center bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 mb-6 text-sm font-medium">
                    <i class="fas fa-fire text-yellow-300 mr-2"></i>
                    🔥 OFERTA LIMITADA - Últimas vagas!
                </div>
                
                <h1 class="text-4xl lg:text-6xl font-bold mb-6 leading-tight text-white font-display">
                    Crie sistemas completos em <span class="text-yellow-300 animate-pulse">HORAS</span>, não em semanas!
                </h1>
                <p class="text-xl lg:text-2xl mb-6 text-orange-100 font-medium">
                    O DevStarter Kit é o sistema base que todo desenvolvedor e pequena agência precisa para começar projetos com estrutura profissional, design moderno e performance pronta.
                </p>
                <div class="bg-white/20 backdrop-blur-sm rounded-xl p-6 mb-8">
                    <h3 class="text-lg font-bold text-yellow-300 mb-4">🎯 Perfeito para você se:</h3>
                    <div class="grid md:grid-cols-2 gap-4 text-sm">
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-300 mr-2"></i>
                            <span>Desenvolve com Laravel + Vue/Tailwind</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-300 mr-2"></i>
                            <span>Quer montar SaaS ou sistemas web</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-300 mr-2"></i>
                            <span>Gerencia micro-time de desenvolvimento</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check text-green-300 mr-2"></i>
                            <span>Quer acelerar entregas de projetos</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-6 mb-8 inline-block">
                    <div class="flex items-center justify-center mb-3">
                        <div class="flex -space-x-2">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop&crop=face" alt="João Silva" class="w-10 h-10 rounded-full border-2 border-white">
                            <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=40&h=40&fit=crop&crop=face" alt="Maria Santos" class="w-10 h-10 rounded-full border-2 border-white">
                            <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=40&h=40&fit=crop&crop=face" alt="Carlos Lima" class="w-10 h-10 rounded-full border-2 border-white">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=40&h=40&fit=crop&crop=face" alt="Ana Costa" class="w-10 h-10 rounded-full border-2 border-white">
                        </div>
                        <div class="ml-3 text-left">
                            <div class="flex items-center">
                                <div class="flex text-yellow-300">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="ml-2 text-sm font-bold">4.9/5</span>
                            </div>
                            <p class="text-sm text-yellow-100">+127 desenvolvedores já aceleraram seus projetos</p>
                        </div>
                    </div>
                    <p class="text-lg text-yellow-300 font-bold text-center">
                        ⚡ Economize até 40 horas de desenvolvimento por projeto!
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4">
                    <button id="hero-cta" class="bg-white text-red-600 px-8 py-4 rounded-xl font-bold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                        <i class="fas fa-rocket mr-2"></i>
                        🚀 QUERO O DEVSTARTER KIT AGORA
                    </button>
                    <button class="border-2 border-white text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white hover:text-red-600 transition-all duration-300 backdrop-blur-sm">
                        <i class="fas fa-gift mr-2"></i>
                        🎁 Ver o bônus gratuito
                    </button>
                </div>
            </div>
            <div class="animate-slide-up">
                <div class="bg-white rounded-2xl p-8 shadow-2xl">
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg p-6 mb-4 border">
                        <div class="flex items-center mb-4">
                            <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            <span class="ml-4 text-sm font-medium text-gray-600">Painel Administrativo</span>
                        </div>
                        <div class="space-y-3">
                            <div class="h-3 bg-blue-500 rounded w-full"></div>
                            <div class="h-3 bg-purple-500 rounded w-4/5"></div>
                            <div class="h-3 bg-yellow-400 rounded w-3/4"></div>
                            <div class="h-3 bg-green-500 rounded w-2/3"></div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-600 font-medium mb-3">Sistema DevStarter Kit em Ação</p>
                        <div class="flex justify-center space-x-4">
                            <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-blue-600 transition-colors">
                                <i class="fas fa-play mr-1"></i>Ver Demo
                            </a>
                            <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-600 transition-colors">
                                <i class="fas fa-download mr-1"></i>Teste Grátis
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Problema/Dor do Usuário -->
<section class="py-20 px-4 bg-gradient-red-orange-50">
    <div class="max-w-6xl mx-auto">
        <header class="text-center mb-16">
            <div class="inline-flex items-center bg-red-100 text-red-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                Você reconhece esses problemas?
            </div>
            <h2 class="text-4xl lg:text-5xl font-bold text-red-600 mb-6 font-display">
                Você já começou um projeto e <span class="text-orange-500">parou no meio</span>?
            </h2>
            <p class="text-xl text-gray-700 max-w-3xl mx-auto">
                Se você se identifica com pelo menos um desses problemas, o DevStarter Kit foi feito para você!
            </p>
        </header>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white rounded-2xl p-8 text-center shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-l-4 border-red-500">
                <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <i class="fas fa-clock text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-red-600 mb-4">⏰ Faltou tempo pra configurar autenticação?</h3>
                <p class="text-gray-600">Dias perdidos tentando configurar login, registro e painéis administrativos.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 text-center shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-l-4 border-orange-500">
                <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <i class="fas fa-route text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-orange-600 mb-4">🔄 Se perdeu nas rotas e componentes?</h3>
                <p class="text-gray-600">Confusão total na estrutura de pastas e organização do código.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 text-center shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-l-4 border-yellow-500">
                <div class="w-20 h-20 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <i class="fas fa-redo text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-yellow-600 mb-4">🔄 Cansou de repetir as mesmas telas toda vez?</h3>
                <p class="text-gray-600">Reinventando a roda a cada projeto novo que começa.</p>
            </div>
            <div class="bg-white rounded-2xl p-8 text-center shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-l-4 border-red-600">
                <div class="w-20 h-20 bg-gradient-to-br from-red-600 to-red-700 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <i class="fas fa-exclamation-triangle text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold text-red-700 mb-4">💥 Isso acontece porque você começa do zero toda vez!</h3>
                <p class="text-gray-600">Sem uma base sólida, cada projeto vira uma nova dor de cabeça.</p>
            </div>
        </div>
        <div class="text-center mt-16">
            <div class="bg-gradient-to-r from-red-500 to-orange-500 text-white rounded-2xl p-8 max-w-4xl mx-auto shadow-2xl">
                <h3 class="text-3xl font-bold mb-4">💡 A SOLUÇÃO ESTÁ AQUI!</h3>
                <p class="text-xl font-semibold">
                    O DevStarter Kit resolve TODOS esses problemas de uma vez por todas!
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Solução - Produto -->
<section class="py-20 px-4 bg-gradient-green-blue-50">
    <div class="max-w-6xl mx-auto">
        <header class="text-center mb-16">
            <div class="inline-flex items-center bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-check-circle mr-2"></i>
                A solução definitiva
            </div>
            <h2 class="text-4xl lg:text-5xl font-bold text-green-600 mb-6 font-display">
                O que é o <span class="text-blue-600">DevStarter Kit</span>
            </h2>
            <p class="text-xl text-gray-700 max-w-4xl mx-auto font-medium">
                O DevStarter Kit é uma base completa para iniciar projetos modernos. 
                <span class="text-green-600 font-bold">Tudo pronto para você começar a desenvolver em minutos!</span>
            </p>
        </header>
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="space-y-6">
                    <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-green-500 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mr-6 flex-shrink-0 shadow-lg">
                                <i class="fas fa-puzzle-piece text-white text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-green-600 mb-2">🧩 Estrutura pronta e modular</h3>
                                <p class="text-gray-600">Tudo organizado e pronto para usar. Sem configurações complexas!</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-blue-500 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mr-6 flex-shrink-0 shadow-lg">
                                <i class="fas fa-lock text-white text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-blue-600 mb-2">🔐 Login, registro e painel administrativo integrados</h3>
                                <p class="text-gray-600">Sistema de autenticação completo e seguro, pronto para usar!</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-purple-500 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mr-6 flex-shrink-0 shadow-lg">
                                <i class="fas fa-palette text-white text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-purple-600 mb-2">🎨 Layout profissional com Tailwind + Vue</h3>
                                <p class="text-gray-600">Design moderno e responsivo, sem precisar criar do zero!</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-orange-500 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start">
                            <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mr-6 flex-shrink-0 shadow-lg">
                                <i class="fas fa-globe text-white text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-orange-600 mb-2">🌐 Página pública e sistema conectados</h3>
                                <p class="text-gray-600">Landing page e painel administrativo integrados!</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg border-l-4 border-red-500 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start">
                            <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mr-6 flex-shrink-0 shadow-lg">
                                <i class="fas fa-rocket text-white text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-red-600 mb-2">🚀 Pronto pra personalizar e lançar novos sistemas</h3>
                                <p class="text-gray-600">Base sólida para qualquer tipo de projeto que você queira criar!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="bg-white rounded-2xl shadow-2xl p-8">
                    <div class="bg-gray-100 rounded-lg p-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        </div>
                        <div class="space-y-3">
                            <div class="h-3 bg-blue-500 rounded w-full"></div>
                            <div class="h-3 bg-purple-500 rounded w-4/5"></div>
                            <div class="h-3 bg-yellow-400 rounded w-3/4"></div>
                            <div class="h-3 bg-green-500 rounded w-2/3"></div>
                        </div>
                    </div>
                    <p class="text-center text-gray-600 font-medium">Tudo isso pronto pra você começar seu próximo projeto com estrutura profissional.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-16">
            <div class="bg-gradient-to-r from-green-500 to-blue-500 text-white rounded-2xl p-8 max-w-4xl mx-auto shadow-2xl">
                <h3 class="text-3xl font-bold mb-4">🎯 FOQUE NO QUE IMPORTA!</h3>
                <p class="text-xl font-semibold">
                    Você foca na lógica e nas ideias — e deixa a base com o DevStarter Kit.
                </p>
                <p class="text-lg mt-4 opacity-90">
                    Economize semanas de trabalho e comece a entregar projetos profissionais hoje mesmo!
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Bônus Exclusivo -->
<section class="py-20 px-4 bg-gradient-purple-pink-50">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <div class="inline-flex items-center bg-purple-100 text-purple-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-gift mr-2"></i>
                Bônus exclusivo
            </div>
            <h2 class="text-4xl lg:text-5xl font-bold text-purple-600 mb-6 font-display">
                O Bônus <span class="text-pink-500">Exclusivo</span> 🎁
            </h2>
            <p class="text-xl text-gray-700 max-w-4xl mx-auto font-medium">
                Ao adquirir o DevStarter Kit, você ganha <span class="text-purple-600 font-bold">GRATUITAMENTE</span> o mini-guia:
            </p>
            <p class="text-2xl font-bold text-purple-600 mt-6 bg-white rounded-xl p-6 shadow-lg inline-block">
                📚 "Como Criar Estruturas de Sistema Profissionais do Zero"
            </p>
        </div>
        <div class="bg-gradient-to-br from-purple-600 via-pink-500 to-red-500 rounded-3xl p-10 text-white shadow-2xl">
            <div class="text-center mb-8">
                <h3 class="text-3xl font-bold mb-4">📘 Nesse guia você vai aprender:</h3>
                <p class="text-xl opacity-90">Tudo que você precisa saber para criar sistemas profissionais!</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="flex items-start">
                        <span class="text-yellow-300 text-2xl mr-4">✅</span>
                        <p class="text-lg font-semibold">Os 5 erros que travam o início de qualquer projeto</p>
                    </div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="flex items-start">
                        <span class="text-yellow-300 text-2xl mr-4">✅</span>
                        <p class="text-lg font-semibold">Como planejar a base de um sistema moderno</p>
                    </div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="flex items-start">
                        <span class="text-yellow-300 text-2xl mr-4">✅</span>
                        <p class="text-lg font-semibold">Um exercício prático para estruturar seus módulos</p>
                    </div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="flex items-start">
                        <span class="text-yellow-300 text-2xl mr-4">✅</span>
                        <p class="text-lg font-semibold">E como o DevStarter Kit elimina essas barreiras automaticamente</p>
                    </div>
                </div>
            </div>
            <div class="text-center mt-10">
                <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-8">
                    <h4 class="text-2xl font-bold mb-4">🎯 É o combo perfeito:</h4>
                    <p class="text-xl font-semibold">
                        Você aprende a mentalidade e já recebe a ferramenta pronta para aplicar.
                    </p>
                    <p class="text-lg mt-4 opacity-90">
                        <strong>Valor do bônus: R$ 197</strong> - <span class="text-yellow-300 font-bold">SEU GRÁTIS!</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Demonstração/Como Funciona -->
<section class="py-20 px-4 bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-blue-900 mb-6">
                Como Funciona
            </h2>
            <p class="text-xl text-gray-600">
                Siga passos simples para começar a entregar projetos completos rapidamente:
            </p>
        </div>
        <div class="relative">
            <!-- Funil visual -->
            <div class="hidden lg:block absolute top-1/2 left-0 right-0 h-1 bg-gradient-to-r from-yellow-400 via-blue-500 to-green-500 transform -translate-y-1/2 z-0"></div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 relative z-10">
                <div class="text-center bg-white rounded-2xl p-8 shadow-lg border-2 border-yellow-400">
                    <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6 relative z-10">
                        <span class="text-blue-900 text-2xl font-bold">1</span>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">📝 Cadastro em 30 segundos</h3>
                    <p class="text-gray-600 mb-4">Crie sua conta e acesse o sistema imediatamente.</p>
                    <div class="bg-yellow-100 rounded-lg p-3">
                        <p class="text-sm font-semibold text-yellow-800">⏱️ Tempo: 30 segundos</p>
                    </div>
                </div>
                
                <div class="text-center bg-white rounded-2xl p-8 shadow-lg border-2 border-blue-500">
                    <div class="w-20 h-20 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-6 relative z-10">
                        <span class="text-white text-2xl font-bold">2</span>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">⚙️ Configure em 1 hora</h3>
                    <p class="text-gray-600 mb-4">Configure painel admin e página pública em minutos.</p>
                    <div class="bg-blue-100 rounded-lg p-3">
                        <p class="text-sm font-semibold text-blue-800">⏱️ Tempo: 1 hora</p>
                    </div>
                </div>
                
                <div class="text-center bg-white rounded-2xl p-8 shadow-lg border-2 border-purple-500">
                    <div class="w-20 h-20 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-6 relative z-10">
                        <span class="text-white text-2xl font-bold">3</span>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">🎨 Personalize em 1 dia</h3>
                    <p class="text-gray-600 mb-4">Customize cores, logos e conteúdo com o guia passo a passo.</p>
                    <div class="bg-purple-100 rounded-lg p-3">
                        <p class="text-sm font-semibold text-purple-800">⏱️ Tempo: 1 dia</p>
                    </div>
                </div>
                
                <div class="text-center bg-white rounded-2xl p-8 shadow-lg border-2 border-green-500">
                    <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6 relative z-10">
                        <span class="text-white text-2xl font-bold">4</span>
                    </div>
                    <h3 class="text-xl font-bold text-blue-900 mb-4">🚀 Lance seu sistema</h3>
                    <p class="text-gray-600 mb-4">Sistema profissional no ar e pronto para receber usuários!</p>
                    <div class="bg-green-100 rounded-lg p-3">
                        <p class="text-sm font-semibold text-green-800">⏱️ Tempo: Imediato</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Captura de Leads -->
<section class="py-20 px-4 bg-white">
    <div class="max-w-4xl mx-auto text-center">
        <div class="bg-gradient-to-r from-yellow-400 to-orange-500 rounded-2xl p-8 mb-8 max-w-4xl mx-auto">
            <h2 class="text-3xl lg:text-4xl font-bold mb-4 text-white font-display text-center">
                🎁 Receba o Guia Gratuito AGORA
            </h2>
            <p class="text-xl text-white/90 text-center mb-6">
                <strong>Guia completo:</strong> "Como Criar Estruturas de Sistema Profissionais do Zero"
            </p>
            <div class="bg-white/20 backdrop-blur-sm rounded-xl p-4 text-center">
                <p class="text-white font-bold text-lg">
                    💰 Valor: R$ 197 - <span class="text-yellow-300">SEU GRÁTIS!</span>
                </p>
            </div>
        </div>
        <form id="lead-form" class="max-w-lg mx-auto">
            @csrf
            <div class="space-y-4">
                <div>
                    <input type="text" id="name" name="name" placeholder="Nome (opcional)" class="w-full px-4 py-3 rounded-lg text-gray-800 text-base focus:outline-none focus:ring-2 focus:ring-yellow-400 border border-gray-300">
                </div>
                <div>
                    <input type="email" id="email" name="email" placeholder="Email (obrigatório)" required class="w-full px-4 py-3 rounded-lg text-gray-800 text-base focus:outline-none focus:ring-2 focus:ring-yellow-400 border border-gray-300">
                </div>
                <div>
                    <input type="tel" id="whatsapp" name="whatsapp" placeholder="WhatsApp (opcional)" class="w-full px-4 py-3 rounded-lg text-gray-800 text-base focus:outline-none focus:ring-2 focus:ring-yellow-400 border border-gray-300">
                </div>
                <div>
                    <button type="submit" class="w-full bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-8 py-4 rounded-xl font-bold text-lg hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                        <i class="fas fa-download mr-2"></i>
                        🚀 RECEBER GUIA GRÁTIS AGORA
                    </button>
                </div>
            </div>
        </form>
        <p class="text-sm text-gray-600 mt-4">
            Sem spam. Você pode cancelar a qualquer momento.
        </p>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 px-4 bg-gray-50">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-blue-900 mb-6 font-display">
                Perguntas Frequentes
            </h2>
            <p class="text-xl text-gray-600">
                Tire suas dúvidas sobre o DevStarter Kit
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-bold text-blue-900 mb-3">❓ Preciso saber Laravel?</h3>
                <p class="text-gray-600">Não! O DevStarter Kit vem com documentação completa e exemplos práticos. Mesmo iniciantes conseguem usar em poucas horas.</p>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-bold text-blue-900 mb-3">❓ Funciona em hospedeiro compartilhado?</h3>
                <p class="text-gray-600">Sim! O DevStarter Kit é otimizado para funcionar em qualquer hospedagem que suporte PHP 8.0+ e MySQL.</p>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-bold text-blue-900 mb-3">❓ Posso personalizar tudo?</h3>
                <p class="text-gray-600">Absolutamente! Cores, logos, textos, funcionalidades - tudo pode ser personalizado. É seu código, você tem total controle.</p>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-bold text-blue-900 mb-3">❓ E se eu não conseguir usar?</h3>
                <p class="text-gray-600">Temos garantia de 30 dias! Se você não conseguir entregar seu primeiro sistema, devolvemos 100% do valor.</p>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-bold text-blue-900 mb-3">❓ Posso usar em vários projetos?</h3>
                <p class="text-gray-600">Sim! Uma vez adquirido, você pode usar o DevStarter Kit em quantos projetos quiser, sem limitações.</p>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-bold text-blue-900 mb-3">❓ Tem suporte técnico?</h3>
                <p class="text-gray-600">Sim! Incluímos suporte completo por email e acesso à nossa comunidade exclusiva de desenvolvedores.</p>
            </div>
        </div>
    </div>
</section>

<!-- Depoimentos -->
<section class="py-20 px-4 bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-blue-900 mb-6 font-display">
                Depoimentos
            </h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white rounded-xl p-8 shadow-lg border-l-4 border-blue-500">
                <div class="flex items-center mb-6">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60&h=60&fit=crop&crop=face" alt="Lucas Pereira" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-bold text-blue-900">Lucas Pereira</h4>
                        <p class="text-gray-600 text-sm">Freelancer Full Stack</p>
                        <div class="flex text-yellow-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 italic text-base mb-4">
                    "Eu gastava 3-4 dias pra montar autenticação e layout. Com o DevStarter Kit, em 30 minutos eu tinha tudo rodando. <strong>Economizei 25 horas no último projeto!</strong>"
                </p>
                <div class="bg-green-50 rounded-lg p-3">
                    <p class="text-sm text-green-700 font-semibold">
                        ✅ Resultado: Entregou projeto 3 dias antes do prazo
                    </p>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-8 shadow-lg border-l-4 border-purple-500">
                <div class="flex items-center mb-6">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=60&h=60&fit=crop&crop=face" alt="Marina Santos" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-bold text-blue-900">Marina Santos</h4>
                        <p class="text-gray-600 text-sm">Desenvolvedora Front-End</p>
                        <div class="flex text-yellow-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 italic text-base mb-4">
                    "Usei como base para meu sistema de gestão. <strong>Economizei 20 horas de setup</strong> e consegui focar na lógica de negócio desde o primeiro dia."
                </p>
                <div class="bg-blue-50 rounded-lg p-3">
                    <p class="text-sm text-blue-700 font-semibold">
                        ✅ Resultado: Sistema no ar em 2 dias
                    </p>
                </div>
            </div>
            
            <div class="bg-white rounded-xl p-8 shadow-lg border-l-4 border-green-500">
                <div class="flex items-center mb-6">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=60&h=60&fit=crop&crop=face" alt="Carlos Lima" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-bold text-blue-900">Carlos Lima</h4>
                        <p class="text-gray-600 text-sm">Agência Digital</p>
                        <div class="flex text-yellow-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 italic text-base mb-4">
                    "Nossa agência usa o DevStarter Kit em todos os projetos. <strong>Reduzimos o tempo de entrega de 2 semanas para 3 dias</strong>. Clientes ficam impressionados!"
                </p>
                <div class="bg-purple-50 rounded-lg p-3">
                    <p class="text-sm text-purple-700 font-semibold">
                        ✅ Resultado: +40% de produtividade da equipe
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Oferta e Benefícios -->
<section class="py-20 px-4 bg-gradient-yellow-orange-50">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <div class="inline-flex items-center bg-red-100 text-red-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-fire mr-2"></i>
                OFERTA LIMITADA
            </div>
            <h2 class="text-4xl lg:text-5xl font-bold text-red-600 mb-6 font-display">
                Oferta e <span class="text-orange-500">Benefícios</span>
            </h2>
            <p class="text-xl text-gray-700 max-w-3xl mx-auto">
                Não perca essa oportunidade única! Oferta válida apenas por tempo limitado.
            </p>
        </div>
        <div class="grid lg:grid-cols-2 gap-12">
            <div class="bg-white rounded-3xl p-10 shadow-2xl border-2 border-green-200">
                <h3 class="text-2xl font-bold text-green-600 mb-8 text-center">✅ O que você recebe:</h3>
                <div class="space-y-6">
                    <div class="flex items-center bg-green-50 rounded-xl p-4">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-check text-white text-xl"></i>
                        </div>
                        <span class="text-lg font-semibold text-gray-800">Estrutura de sistema profissional pronta</span>
                    </div>
                    <div class="flex items-center bg-blue-50 rounded-xl p-4">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-check text-white text-xl"></i>
                        </div>
                        <span class="text-lg font-semibold text-gray-800">Painel + página pública conectados</span>
                    </div>
                    <div class="flex items-center bg-purple-50 rounded-xl p-4">
                        <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-check text-white text-xl"></i>
                        </div>
                        <span class="text-lg font-semibold text-gray-800">Base moderna com Vue 3, Tailwind e Laravel</span>
                    </div>
                    <div class="flex items-center bg-orange-50 rounded-xl p-4">
                        <div class="w-12 h-12 bg-orange-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-check text-white text-xl"></i>
                        </div>
                        <span class="text-lg font-semibold text-gray-800">Documentação e guia de uso incluídos</span>
                    </div>
                    <div class="flex items-center bg-red-50 rounded-xl p-4">
                        <div class="w-12 h-12 bg-red-500 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-check text-white text-xl"></i>
                        </div>
                        <span class="text-lg font-semibold text-gray-800">Bônus: Mini-guia "Como Criar Estruturas de Sistema Profissionais do Zero"</span>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-br from-red-500 via-orange-500 to-yellow-400 rounded-3xl p-10 text-white text-center shadow-2xl relative overflow-hidden">
                <!-- Decorative elements -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-16 translate-x-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full translate-y-12 -translate-x-12"></div>
                
                <div class="relative z-10">
                    <div class="inline-flex items-center bg-red-500 text-white rounded-full px-4 py-2 mb-6 text-sm font-bold animate-pulse">
                        <i class="fas fa-fire mr-2"></i>
                        🔥 OFERTA LIMITADA - SÓ PARA OS PRIMEIROS 50!
                    </div>
                    
                    <h3 class="text-3xl font-bold mb-6">💰 Preço promocional:</h3>
                    
                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 mb-6">
                        <div class="text-6xl font-bold mb-2 text-yellow-300">R$ 97</div>
                        <div class="text-lg line-through opacity-75">De R$ 197</div>
                        <div class="text-xl font-bold text-yellow-300 mt-2">50% DE DESCONTO!</div>
                        <div class="text-sm opacity-90 mt-2">⏰ Preço volta ao normal em:</div>
                        <div class="text-2xl font-bold text-red-300" id="countdown">23:59:59</div>
                    </div>
                    
                    <div class="bg-yellow-300/20 backdrop-blur-sm rounded-xl p-4 mb-6">
                        <h4 class="text-lg font-bold text-yellow-300 mb-2">🎁 BÔNUS INCLUÍDO (R$ 197):</h4>
                        <p class="text-sm opacity-90">
                            <strong>Guia "Como Criar Estruturas de Sistema Profissionais do Zero"</strong><br>
                            <span class="text-yellow-200">Valor de mercado: R$ 197 - SEU GRÁTIS!</span>
                        </p>
                    </div>
                    
                    <button class="bg-white text-red-600 px-8 py-4 rounded-2xl font-bold text-xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl w-full">
                        🚀 QUERO O DEVSTARTER KIT + BÔNUS AGORA
                    </button>
                    
                    <div class="bg-green-500/20 backdrop-blur-sm rounded-xl p-4 mt-4">
                        <h4 class="text-lg font-bold text-green-300 mb-2">🛡️ GARANTIA TOTAL DE 30 DIAS</h4>
                        <p class="text-sm opacity-90 mb-2">
                            <strong>Se você não conseguir entregar seu primeiro sistema em 30 dias, devolvemos 100% do valor!</strong>
                        </p>
                        <p class="text-xs opacity-75">
                            ✅ Acesso imediato após o pagamento<br>
                            ✅ Suporte completo incluído<br>
                            ✅ Sem perguntas, sem burocracias
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="py-20 px-4 bg-gradient-red-orange-yellow text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="max-w-4xl mx-auto text-center relative">
        <div class="inline-flex items-center bg-white/20 backdrop-blur-sm rounded-full px-6 py-3 mb-8 text-lg font-semibold">
            <i class="fas fa-fire text-yellow-300 mr-3"></i>
            🔥 ÚLTIMA CHAMADA - OFERTA EXPIRA EM BREVE!
        </div>
        
        <h2 class="text-4xl lg:text-6xl font-bold mb-8 text-white font-display">
            Pare de começar do <span class="text-yellow-300 animate-pulse">ZERO</span>!
        </h2>
        <p class="text-xl lg:text-2xl mb-10 text-orange-100 font-medium max-w-3xl mx-auto">
            Tenha uma base sólida para criar qualquer sistema com segurança e velocidade.
            <span class="text-yellow-300 font-bold">Comece a entregar projetos profissionais hoje mesmo!</span>
        </p>
        
        <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 mb-10 max-w-2xl mx-auto">
            <h3 class="text-2xl font-bold mb-4 text-yellow-300">🎯 O que você está perdendo:</h3>
            <div class="grid md:grid-cols-2 gap-4 text-left">
                <div class="flex items-center">
                    <span class="text-red-300 text-xl mr-3">❌</span>
                    <span class="text-lg">Semanas configurando autenticação</span>
                </div>
                <div class="flex items-center">
                    <span class="text-red-300 text-xl mr-3">❌</span>
                    <span class="text-lg">Dias criando layouts básicos</span>
                </div>
                <div class="flex items-center">
                    <span class="text-red-300 text-xl mr-3">❌</span>
                    <span class="text-lg">Horas perdidas com configurações</span>
                </div>
                <div class="flex items-center">
                    <span class="text-red-300 text-xl mr-3">❌</span>
                    <span class="text-lg">Projetos que nunca saem do papel</span>
                </div>
            </div>
        </div>
        
        <button id="final-cta" class="bg-white text-red-600 px-12 py-6 rounded-2xl font-bold text-2xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl mb-8">
            <i class="fas fa-rocket mr-4"></i>
            🚀 QUERO O DEVSTARTER KIT + BÔNUS AGORA
        </button>
        
        <div class="grid md:grid-cols-3 gap-6 text-center">
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4">
                <i class="fas fa-bolt text-yellow-300 text-2xl mb-2"></i>
                <p class="text-sm font-semibold">Acesso Imediato</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4">
                <i class="fas fa-gift text-yellow-300 text-2xl mb-2"></i>
                <p class="text-sm font-semibold">Bônus Grátis</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4">
                <i class="fas fa-shield-alt text-yellow-300 text-2xl mb-2"></i>
                <p class="text-sm font-semibold">Garantia 30 dias</p>
            </div>
        </div>
    </div>
</section>

<!-- Rodapé -->
<footer class="bg-blue-900 text-white py-12 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="grid md:grid-cols-4 gap-8">
            <div class="md:col-span-2">
                <h3 class="text-xl font-bold mb-4 text-white font-display">DevStarter Kit</h3>
                <p class="text-blue-200 mb-6 text-base">
                    Aprenda, crie e entregue projetos completos de forma simples.
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
                    <li><a href="#" class="text-blue-200 hover:text-white transition-colors text-sm">Sobre</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white transition-colors text-sm">Contato</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white transition-colors text-sm">Política de Privacidade</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-base font-semibold mb-4 text-white">Suporte</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-blue-200 hover:text-white transition-colors text-sm">Central de Ajuda</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white transition-colors text-sm">Documentação</a></li>
                    <li><a href="#" class="text-blue-200 hover:text-white transition-colors text-sm">Comunidade</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-blue-700 mt-8 pt-8 text-center">
            <div class="grid md:grid-cols-3 gap-6 mb-6">
                <div class="flex items-center justify-center">
                    <i class="fas fa-briefcase text-yellow-400 text-lg mr-3"></i>
                    <span class="text-blue-200 text-sm">💼 Criado por desenvolvedores, para desenvolvedores.</span>
                </div>
                <div class="flex items-center justify-center">
                    <i class="fas fa-shield-alt text-yellow-400 text-lg mr-3"></i>
                    <span class="text-blue-200 text-sm">🔒 Pagamento 100% seguro.</span>
                </div>
                <div class="flex items-center justify-center">
                    <i class="fas fa-envelope text-yellow-400 text-lg mr-3"></i>
                    <span class="text-blue-200 text-sm">📩 Suporte e atualizações garantidas.</span>
                </div>
            </div>
            <p class="text-blue-200 text-sm">
                © 2025 DevStarter Kit – Aprenda, crie e entregue projetos completos.
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
    .hover-scale {
        transition: transform 0.3s ease;
    }
    .hover-scale:hover {
        transform: scale(1.05);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Formulário de captura de leads
    const leadForm = document.getElementById('lead-form');
    if (leadForm) {
        leadForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const whatsapp = document.getElementById('whatsapp').value.trim();
            
            // Validação
            if (!email) {
                showErrorMessage('Por favor, insira seu email.');
                return;
            }
            
            if (!isValidEmail(email)) {
                showErrorMessage('Por favor, insira um email válido.');
                return;
            }
            
            if (whatsapp && !isValidWhatsApp(whatsapp)) {
                showErrorMessage('Por favor, insira um WhatsApp válido (apenas números).');
                return;
            }
            
            // Enviar dados para o servidor
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Enviando...';
            submitButton.disabled = true;
            
            // Verificar CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                showErrorMessage('Erro de segurança. Recarregue a página e tente novamente.');
                return;
            }

            console.log('Enviando dados:', { name, email, whatsapp });
            console.log('CSRF Token:', csrfToken.getAttribute('content'));

            // Enviar dados via AJAX
            fetch('/leads', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    name: name,
                    email: email,
                    whatsapp: whatsapp
                })
            })
            .then(response => {
                console.log('Response status:', response.status);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('Response data:', data);
                if (data.success) {
                    showSuccessMessage(data.message);
                    this.reset();
                } else {
                    showErrorMessage(data.message || 'Erro ao enviar formulário. Tente novamente.');
                }
            })
            .catch(error => {
                console.error('Erro completo:', error);
                showErrorMessage('Erro de conexão. Verifique sua internet e tente novamente.');
            })
            .finally(() => {
                submitButton.innerHTML = originalText;
                submitButton.disabled = false;
            });
        });
    }
    
    // Mostrar mensagem de sucesso
    function showSuccessMessage(message = 'Obrigado! Confira seu email para acessar o guia completo do DevStarter Kit.') {
        const successDiv = document.createElement('div');
        successDiv.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg z-50 animate-slide-up';
        successDiv.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-3"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(successDiv);
        
        setTimeout(() => {
            successDiv.remove();
        }, 5000);
    }
    
    // Mostrar mensagem de erro
    function showErrorMessage(message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg z-50 animate-slide-up';
        errorDiv.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-3"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(errorDiv);
        
        setTimeout(() => {
            errorDiv.remove();
        }, 4000);
    }
    
    // Validação de email
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // Validação de WhatsApp
    function isValidWhatsApp(whatsapp) {
        // Remove todos os caracteres não numéricos
        const cleanNumber = whatsapp.replace(/\D/g, '');
        // Verifica se tem entre 10 e 15 dígitos (formato internacional)
        return cleanNumber.length >= 10 && cleanNumber.length <= 15;
    }
    
    // CTAs principais
    const heroCta = document.getElementById('hero-cta');
    const finalCta = document.getElementById('final-cta');
    
    [heroCta, finalCta].forEach(cta => {
        if (cta) {
            cta.addEventListener('click', function() {
                // Scroll para o formulário
                const formSection = document.querySelector('section.bg-white');
                if (formSection) {
                    formSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            });
        }
    });
    
    // Efeitos hover melhorados
    document.querySelectorAll('.hover-scale').forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
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
    
    // Console welcome message
    console.log('%c🚀 DevStarter Kit Landing Page', 'color: #8B5CF6; font-size: 20px; font-weight: bold;');
    console.log('%cDesenvolvido com ❤️ para desenvolvedores iniciantes', 'color: #3B82F6; font-size: 14px;');
});
</script>
@endsection