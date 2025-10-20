@extends('layouts.landing')

@section('title', 'DevStarter Kit - O Kit Completo para Desenvolvedores Iniciantes')

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
                <p class="text-lg mb-8 text-yellow-300 font-bold bg-white/10 backdrop-blur-sm rounded-lg p-4 inline-block">
                    ⚡ +100 devs já estão acelerando seus projetos com o DevStarter Kit!
                </p>
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
                    <div class="bg-gray-100 rounded-lg p-6 mb-4">
                        <div class="flex items-center mb-4">
                            <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        </div>
                        <div class="space-y-2">
                            <div class="h-4 bg-blue-500 rounded w-3/4"></div>
                            <div class="h-4 bg-purple-500 rounded w-1/2"></div>
                            <div class="h-4 bg-yellow-400 rounded w-2/3"></div>
                        </div>
                    </div>
                    <p class="text-gray-600 text-center font-medium">Sistema DevStarter Kit em Ação</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Problema/Dor do Usuário -->
<section class="py-20 px-4 bg-gradient-red-orange-50">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
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
        </div>
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
        <div class="text-center mb-16">
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
        </div>
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
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-blue-900 text-2xl font-bold">1</span>
                </div>
                <h3 class="text-xl font-bold text-blue-900 mb-4">Cadastro rápido no sistema</h3>
                <p class="text-gray-600">Crie sua conta em poucos segundos e acesse o sistema imediatamente.</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-blue-900 text-2xl font-bold">2</span>
                </div>
                <h3 class="text-xl font-bold text-blue-900 mb-4">Criação de projetos e páginas públicas</h3>
                <p class="text-gray-600">Configure seu primeiro projeto ou página pública em minutos.</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-blue-900 text-2xl font-bold">3</span>
                </div>
                <h3 class="text-xl font-bold text-blue-900 mb-4">Acesso ao guia passo a passo</h3>
                <p class="text-gray-600">Siga o guia passo a passo para dominar todas as funcionalidades.</p>
            </div>
            <div class="text-center">
                <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="text-blue-900 text-2xl font-bold">4</span>
                </div>
                <h3 class="text-xl font-bold text-blue-900 mb-4">Entrega do projeto finalizado</h3>
                <p class="text-gray-600">Apresente projetos profissionais e organize seu trabalho de forma eficiente.</p>
            </div>
        </div>
    </div>
</section>

<!-- Captura de Leads -->
<section class="py-20 px-4 bg-white">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-2xl lg:text-3xl font-bold mb-6 text-blue-900 font-display">
            Receba o Guia Gratuito
        </h2>
        <p class="text-base lg:text-lg mb-8 text-gray-600 max-w-2xl mx-auto">
            Deixe seu email e receba o guia passo a passo para começar a usar o DevStarter Kit hoje mesmo.
        </p>
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
                    <button type="submit" class="w-full bg-yellow-400 text-blue-900 px-6 py-3 rounded-lg font-bold text-base hover:bg-yellow-300 transition-colors hover-scale">
                        <i class="fas fa-download mr-2"></i>
                        Quero o Guia Grátis
                    </button>
                </div>
            </div>
        </form>
        <p class="text-sm text-gray-600 mt-4">
            Sem spam. Você pode cancelar a qualquer momento.
        </p>
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
        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-white rounded-xl p-8 shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold">L</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-900">Lucas P.</h4>
                        <p class="text-gray-600 text-sm">Freelancer Full Stack</p>
                    </div>
                </div>
                <p class="text-gray-600 italic text-base">
                    💬 "Eu gastava dias pra montar autenticação e layout. Com o DevStarter Kit, em 30 minutos eu tinha tudo rodando."
                </p>
            </div>
            <div class="bg-white rounded-xl p-8 shadow-lg">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mr-4">
                        <span class="text-white font-bold">M</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-900">Marina S.</h4>
                        <p class="text-gray-600 text-sm">Desenvolvedora Front-End</p>
                    </div>
                </div>
                <p class="text-gray-600 italic text-base">
                    💬 "Usei como base para meu sistema de gestão. Economizei pelo menos 20 horas de setup."
                </p>
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
                    <div class="inline-flex items-center bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 mb-6 text-sm font-semibold">
                        <i class="fas fa-fire mr-2"></i>
                        🔥 OFERTA DE LANÇAMENTO
                    </div>
                    
                    <h3 class="text-3xl font-bold mb-6">💰 Preço promocional:</h3>
                    
                    <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-6 mb-6">
                        <div class="text-6xl font-bold mb-2 text-yellow-300">R$ 97</div>
                        <div class="text-lg line-through opacity-75">De R$ 197</div>
                        <div class="text-xl font-bold text-yellow-300 mt-2">50% DE DESCONTO!</div>
                    </div>
                    
                    <p class="text-lg mb-8 opacity-90">
                        ⏰ Oferta válida apenas por tempo limitado!
                    </p>
                    
                    <button class="bg-white text-red-600 px-8 py-4 rounded-2xl font-bold text-xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl w-full">
                        🚀 QUERO O DEVSTARTER KIT + BÔNUS AGORA
                    </button>
                    
                    <p class="text-sm mt-4 opacity-75">
                        ✅ Acesso imediato após o pagamento<br>
                        ✅ Suporte completo incluído<br>
                        ✅ Garantia de 30 dias
                    </p>
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
    
    // Console welcome message
    console.log('%c🚀 DevStarter Kit Landing Page', 'color: #8B5CF6; font-size: 20px; font-weight: bold;');
    console.log('%cDesenvolvido com ❤️ para desenvolvedores iniciantes', 'color: #3B82F6; font-size: 14px;');
    
});
</script>
@endsection
