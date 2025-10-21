@extends('layouts.landing')

@section('title', 'DevStarter Kit - Crie Sistemas Completos em Horas | Laravel + Vue + Tailwind')

@section('meta')
<meta name="description" content="DevStarter Kit: Sistema base completo que já ajudou +127 desenvolvedores a acelerar projetos com Laravel + Vue + Tailwind. Crie sistemas em horas, não em semanas!">
<meta name="keywords" content="devstarter kit, laravel, vue, tailwind, sistema base, desenvolvedor, projeto completo, dashboard, login, crud">
<meta name="author" content="DevStarter Kit">
<meta name="robots" content="index, follow">
<meta name="language" content="pt-BR">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ request()->url() }}">
<meta property="og:title" content="DevStarter Kit - Crie Sistemas Completos em Horas">
<meta property="og:description" content="Sistema base completo que já ajudou +127 desenvolvedores a acelerar projetos com Laravel + Vue + Tailwind.">
<meta property="og:image" content="{{ asset('images/devstarter-kit-og.jpg') }}">
<meta property="og:site_name" content="DevStarter Kit">
<meta property="og:locale" content="pt_BR">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ request()->url() }}">
<meta property="twitter:title" content="DevStarter Kit - Crie Sistemas Completos em Horas">
<meta property="twitter:description" content="Sistema base completo que já ajudou +127 desenvolvedores a acelerar projetos com Laravel + Vue + Tailwind.">
<meta property="twitter:image" content="{{ asset('images/devstarter-kit-og.jpg') }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ request()->url() }}">
@endsection

@section('content')
<!-- Sticky CTA -->
<div id="sticky-cta" class="fixed top-0 left-0 right-0 bg-orange-500 text-white py-3 px-4 z-50 transform -translate-y-full transition-transform duration-300">
    <div class="max-w-6xl mx-auto flex items-center justify-between">
        <div class="flex items-center">
            <i class="fas fa-fire mr-2"></i>
            <span class="font-bold">🔥 Oferta limitada - Só para os primeiros 50!</span>
        </div>
        <a href="#oferta" class="bg-white text-orange-500 px-6 py-2 rounded-lg font-bold hover:bg-gray-100 transition-colors">
            Quero o DevStarter Kit Agora
        </a>
    </div>
</div>

<!-- Seção 1 – Hero -->
<section class="bg-gray-800 text-white py-20 px-4 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="max-w-6xl mx-auto relative">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="animate-fade-in">
                <h1 class="text-5xl lg:text-7xl font-bold mb-6 leading-tight text-white font-display">
                    Crie sistemas completos em <span class="text-orange-400">HORAS</span>, não em semanas!
                </h1>
                <p class="text-xl lg:text-2xl mb-8 text-gray-200 font-medium">
                    O DevStarter Kit já ajudou <strong class="text-orange-400">+127 desenvolvedores</strong> a acelerar projetos com Laravel + Vue + Tailwind.
                </p>
                
                <!-- Extras visuais -->
                <div class="flex items-center space-x-8 mb-8">
                    <div class="flex items-center">
                        <i class="fas fa-clock text-orange-400 text-2xl mr-3"></i>
                        <span class="text-lg font-semibold">Rapidez</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-shield-alt text-orange-400 text-2xl mr-3"></i>
                        <span class="text-lg font-semibold">Segurança</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-rocket text-orange-400 text-2xl mr-3"></i>
                        <span class="text-lg font-semibold">Performance</span>
                    </div>
                </div>
                
                <a href="#oferta" class="bg-orange-500 text-white px-12 py-6 rounded-2xl font-bold text-2xl hover:bg-orange-600 transition-all duration-300 transform hover:scale-105 shadow-2xl inline-block">
                    Quero o DevStarter Kit Agora
                </a>
            </div>
            <div class="animate-slide-up">
                <div class="bg-white rounded-2xl p-8 shadow-2xl">
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-lg p-6 mb-4 border">
                        <div class="flex items-center mb-4">
                            <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            <span class="ml-4 text-sm font-medium text-gray-600">DevStarter Kit em Ação</span>
                        </div>
                        <div class="space-y-3">
                            <div class="h-3 bg-blue-500 rounded w-full"></div>
                            <div class="h-3 bg-purple-500 rounded w-4/5"></div>
                            <div class="h-3 bg-yellow-400 rounded w-3/4"></div>
                            <div class="h-3 bg-green-500 rounded w-2/3"></div>
                        </div>
                    </div>
                    <div class="text-center">
                        <p class="text-gray-600 font-medium mb-3">Sistema completo funcionando</p>
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

<!-- Seção 2 – Prova Social -->
<section class="py-20 px-4 bg-white">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6 font-display">
                Quem já acelerou projetos com o DevStarter Kit
            </h2>
            <div class="flex items-center justify-center mb-8">
                <div class="flex text-yellow-400 text-2xl mr-4">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <span class="text-2xl font-bold text-gray-800">4.9/5</span>
            </div>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&crop=face" alt="Lucas Pereira" class="w-20 h-20 rounded-full mx-auto mb-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Lucas Pereira</h3>
                <p class="text-gray-600 mb-4">Freelancer Full Stack</p>
                <p class="text-gray-700 italic text-lg">
                    "Economizei 25 horas no último projeto! O DevStarter Kit me permitiu focar na lógica de negócio desde o primeiro dia."
                </p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=80&h=80&fit=crop&crop=face" alt="Marina Santos" class="w-20 h-20 rounded-full mx-auto mb-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Marina Santos</h3>
                <p class="text-gray-600 mb-4">Desenvolvedora Front-end</p>
                <p class="text-gray-700 italic text-lg">
                    "Em 1 dia, já tinha meu sistema no ar. A estrutura modular do DevStarter Kit é incrível!"
                </p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&h=80&fit=crop&crop=face" alt="Carlos Lima" class="w-20 h-20 rounded-full mx-auto mb-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">Carlos Lima</h3>
                <p class="text-gray-600 mb-4">Agência Digital</p>
                <p class="text-gray-700 italic text-lg">
                    "Nossa agência usa o DevStarter Kit em todos os projetos. Reduzimos o tempo de entrega de 2 semanas para 3 dias."
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Seção 3 – Benefícios -->
<section class="py-20 px-4 bg-gray-100">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6 font-display">
                O que você recebe
            </h2>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-puzzle-piece text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Estrutura de sistema modular pronta para uso</h3>
                <p class="text-gray-600">Base sólida e organizada para qualquer tipo de projeto, sem precisar começar do zero.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-lock text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Login, registro e dashboard integrados</h3>
                <p class="text-gray-600">Sistema de autenticação completo e seguro, pronto para usar em produção.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-globe text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Página pública pronta e templates reutilizáveis</h3>
                <p class="text-gray-600">Landing page e templates profissionais que você pode personalizar facilmente.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-gift text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Guia + bônus PDF exclusivo</h3>
                <p class="text-gray-600">Documentação completa e bônus exclusivos para acelerar ainda mais seu desenvolvimento.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Suporte e comunidade inclusos</h3>
                <p class="text-gray-600">Acesso à comunidade exclusiva e suporte direto dos criadores do DevStarter Kit.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="w-16 h-16 bg-indigo-500 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-rocket text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-4">Performance otimizada</h3>
                <p class="text-gray-600">Código otimizado e seguindo as melhores práticas de Laravel, Vue e Tailwind.</p>
            </div>
        </div>
        
        <div class="text-center">
            <a href="#oferta" class="bg-orange-500 text-white px-12 py-6 rounded-2xl font-bold text-2xl hover:bg-orange-600 transition-all duration-300 transform hover:scale-105 shadow-2xl inline-block">
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
<section id="oferta" class="py-20 px-4 bg-gray-800 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="max-w-4xl mx-auto text-center relative">
        <div class="inline-flex items-center bg-orange-500 text-white rounded-full px-6 py-3 mb-8 text-lg font-bold animate-pulse">
            <i class="fas fa-fire mr-2"></i>
            🔥 Oferta limitada - Só para os primeiros 50 compradores!
        </div>
        
        <h2 class="text-4xl lg:text-6xl font-bold mb-8 text-white font-display">
            Pare de começar do <span class="text-orange-400">ZERO</span> a cada projeto
        </h2>
        
        <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-12 mb-12">
            <div class="text-6xl font-bold mb-4 text-orange-400">R$ 97</div>
            <div class="text-2xl line-through opacity-75 mb-4">De R$ 197</div>
            <div class="text-3xl font-bold text-orange-400 mb-8">50% DE DESCONTO!</div>
            
            <div class="bg-orange-500/20 backdrop-blur-sm rounded-2xl p-6 mb-8">
                <h3 class="text-2xl font-bold text-orange-300 mb-4">🎁 Bônus Inclusos (R$ 197):</h3>
                <ul class="text-left space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-400 mr-3"></i>
                        <span>Guia "Como Criar Estruturas de Sistema Profissionais do Zero"</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-400 mr-3"></i>
                        <span>Templates prontos: Login, Dashboard e CRUD básico</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-400 mr-3"></i>
                        <span>Checklist rápido de setup</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-check text-green-400 mr-3"></i>
                        <span>Suporte e comunidade exclusiva</span>
                    </li>
                </ul>
            </div>
            
            <div class="bg-red-500/20 backdrop-blur-sm rounded-xl p-4 mb-8">
                <p class="text-xl font-bold text-red-300">
                    ⏰ Oferta expira em: <span id="countdown" class="text-2xl">23:59:59</span>
                </p>
            </div>
            
            <a href="#" class="bg-orange-500 text-white px-16 py-8 rounded-2xl font-bold text-3xl hover:bg-orange-600 transition-all duration-300 transform hover:scale-105 shadow-2xl inline-block">
                Quero o DevStarter Kit + Bônus Agora
            </a>
        </div>
    </div>
</section>

<!-- Seção 5 – Garantia -->
<section class="py-20 px-4 bg-white">
    <div class="max-w-4xl mx-auto text-center">
        <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-8">
            <i class="fas fa-shield-alt text-white text-4xl"></i>
        </div>
        
        <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6 font-display">
            Garantia Total de 30 Dias
        </h2>
        
        <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
            Se você não conseguir entregar seu primeiro sistema, devolvemos 100% do valor. 
            <strong>Sem perguntas, sem burocracia.</strong>
        </p>
        
        <div class="bg-green-50 rounded-2xl p-8 border-2 border-green-200">
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <i class="fas fa-undo text-green-500 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Reembolso Total</h3>
                    <p class="text-gray-600">100% do valor devolvido</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-clock text-green-500 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">30 Dias</h3>
                    <p class="text-gray-600">Tempo suficiente para testar</p>
                </div>
                <div class="text-center">
                    <i class="fas fa-question text-green-500 text-3xl mb-4"></i>
                    <h3 class="text-lg font-bold text-gray-800 mb-2">Sem Perguntas</h3>
                    <p class="text-gray-600">Processo simples e rápido</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Seção 6 – FAQs -->
<section class="py-20 px-4 bg-gray-100">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6 font-display">
                Perguntas Frequentes
            </h2>
        </div>
        
        <div class="space-y-6">
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 mb-4">❓ Preciso saber Laravel?</h3>
                <p class="text-gray-600">Não! O DevStarter Kit vem com documentação completa e exemplos práticos. Mesmo iniciantes conseguem usar em poucas horas.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 mb-4">❓ Funciona em hospedagem compartilhada?</h3>
                <p class="text-gray-600">Sim! O DevStarter Kit é otimizado para funcionar em qualquer hospedagem que suporte PHP 8.0+ e MySQL.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 mb-4">❓ Posso personalizar tudo?</h3>
                <p class="text-gray-600">Absolutamente! Cores, logos, textos, funcionalidades - tudo pode ser personalizado. É seu código, você tem total controle.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 mb-4">❓ E se eu não conseguir usar?</h3>
                <p class="text-gray-600">Temos garantia de 30 dias! Se você não conseguir entregar seu primeiro sistema, devolvemos 100% do valor.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 mb-4">❓ Posso usar em vários projetos?</h3>
                <p class="text-gray-600">Sim! Uma vez adquirido, você pode usar o DevStarter Kit em quantos projetos quiser, sem limitações.</p>
            </div>
            
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h3 class="text-xl font-bold text-gray-800 mb-4">❓ Tem suporte técnico?</h3>
                <p class="text-gray-600">Sim! Incluímos suporte completo por email e acesso à nossa comunidade exclusiva de desenvolvedores.</p>
            </div>
        </div>
    </div>
</section>

<!-- Seção 7 – Última Chamada -->
<section class="py-20 px-4 bg-orange-500 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="max-w-4xl mx-auto text-center relative">
        <h2 class="text-4xl lg:text-6xl font-bold mb-8 text-white font-display">
            Pare de começar do <span class="text-yellow-300">ZERO</span>.
        </h2>
        <p class="text-xl lg:text-2xl mb-12 text-orange-100 font-medium max-w-3xl mx-auto">
            Tenha uma base sólida e entregue projetos profissionais hoje mesmo!
        </p>
        
        <a href="#oferta" class="bg-white text-orange-500 px-16 py-8 rounded-2xl font-bold text-3xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl inline-block mb-8">
            Quero o DevStarter Kit Agora
        </a>
        
        <div class="text-orange-200">
            <p class="text-lg">✅ Acesso imediato após pagamento</p>
            <p class="text-lg">🎁 Bônus incluído</p>
            <p class="text-lg">🛡️ Garantia de 30 dias</p>
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
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors text-sm">Sobre</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors text-sm">Contato</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors text-sm">Política de Privacidade</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-base font-semibold mb-4 text-white">Suporte</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors text-sm">Central de Ajuda</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors text-sm">Documentação</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors text-sm">Comunidade</a></li>
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
@endsection
