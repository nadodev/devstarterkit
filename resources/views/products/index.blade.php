@extends('layouts.landing')

@section('title', 'Produtos e Serviços Digitais | DevStarter Kit - Ferramentas para Desenvolvedores')

@section('meta')
<meta name="description" content="Produtos e serviços digitais para desenvolvedores. Templates, cursos, consultoria e ferramentas essenciais. Acelere seu desenvolvimento com nossos produtos profissionais.">
<meta name="keywords" content="produtos digitais, serviços para desenvolvedores, templates, cursos programação, consultoria desenvolvimento, ferramentas dev, software, digital products">
<meta name="author" content="DevStarter Kit">
<meta name="robots" content="index, follow">
<meta name="language" content="pt-BR">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="Produtos e Serviços Digitais - DevStarter Kit">
<meta property="og:description" content="Produtos e serviços digitais para desenvolvedores. Templates, cursos, consultoria e ferramentas essenciais.">
<meta property="og:image" content="{{ asset('images/products-og.jpg') }}">
<meta property="og:site_name" content="DevStarter Kit">
<meta property="og:locale" content="pt_BR">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title" content="Produtos e Serviços Digitais - DevStarter Kit">
<meta property="twitter:description" content="Produtos e serviços digitais para desenvolvedores. Templates, cursos, consultoria e ferramentas essenciais.">
<meta property="twitter:image" content="{{ asset('images/products-og.jpg') }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ url()->current() }}">

<!-- Structured Data -->

@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50">
    <!-- Hero Section -->
    <div class="bg-gradient-red-orange-yellow text-white py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center">
                <div class="inline-block bg-yellow-400 text-red-600 px-4 py-2 rounded-full text-sm font-bold mb-6 animate-pulse">
                    🔥 OFERTA LIMITADA
                </div>
                <h1 class="text-6xl font-bold mb-6">Produtos Digitais que Transformam</h1>
                <p class="text-2xl text-yellow-100 max-w-4xl mx-auto mb-8">
                    Acelere seu sucesso com nossos produtos digitais testados e aprovados por milhares de profissionais
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#produtos" class="bg-white text-red-600 px-8 py-4 rounded-xl font-bold text-xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-shopping-cart mr-2"></i>Ver Produtos
                    </a>
                    <a href="#garantia" class="border-2 border-white text-white px-8 py-4 rounded-xl font-bold text-xl hover:bg-white/10 transition-all duration-300">
                        <i class="fas fa-shield-alt mr-2"></i>Garantia Total
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Problema/Dor Section -->
    <div class="py-20 bg-gradient-red-orange-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="inline-block bg-red-500 text-white px-4 py-2 rounded-full text-sm font-bold mb-6">
                    ❌ VOCÊ RECONHECE ESSES PROBLEMAS?
                </div>
                <h2 class="text-5xl font-bold text-gray-900 mb-6">Pare de Perder Tempo e Dinheiro</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Milhares de profissionais enfrentam os mesmos desafios todos os dias. Você não está sozinho!
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-lg border-l-4 border-red-500">
                    <div class="text-4xl mb-4">⏰</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Perdendo Tempo Precioso</h3>
                    <p class="text-gray-600">Criando tudo do zero quando poderia usar soluções prontas e testadas.</p>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border-l-4 border-orange-500">
                    <div class="text-4xl mb-4">💰</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Gastando Mais do Que Deveria</h3>
                    <p class="text-gray-600">Contratando freelancers caros para projetos que você poderia fazer.</p>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border-l-4 border-yellow-500">
                    <div class="text-4xl mb-4">😰</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Sentindo-se Perdido</h3>
                    <p class="text-gray-600">Sem saber por onde começar ou qual a melhor abordagem.</p>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <div class="bg-gradient-red-orange-yellow text-white rounded-2xl p-8 max-w-4xl mx-auto">
                    <h3 class="text-3xl font-bold mb-4">🚨 A SOLUÇÃO ESTÁ AQUI!</h3>
                    <p class="text-xl">Nossos produtos digitais foram criados especificamente para resolver esses problemas.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Products -->
    @if($featuredProducts->count() > 0)
    <div id="produtos" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="inline-block bg-green-500 text-white px-4 py-2 rounded-full text-sm font-bold mb-6">
                    ⭐ PRODUTOS MAIS VENDIDOS
                </div>
                <h2 class="text-5xl font-bold text-gray-900 mb-6">Nossos Produtos Digitais</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Produtos testados e aprovados por milhares de profissionais. Resultados garantidos!
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProducts as $product)
                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden hover:shadow-3xl transition-all duration-300 hover:-translate-y-3 border-2 border-gray-100 hover:border-blue-300">
                    @if($product->image)
                    <div class="h-64 bg-gradient-to-br from-blue-500 to-purple-600 relative overflow-hidden">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" 
                             class="w-full h-full object-cover">
                        @if($product->discount_price)
                        <div class="absolute top-4 right-4 bg-red-500 text-white px-4 py-2 rounded-full text-sm font-bold animate-pulse">
                            -{{ $product->discount_percentage }}% OFF
                        </div>
                        @endif
                        <div class="absolute bottom-4 left-4 bg-yellow-400 text-red-600 px-3 py-1 rounded-full text-xs font-bold">
                            ⭐ MAIS VENDIDO
                        </div>
                    </div>
                    @endif
                    
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <span class="bg-gradient-blue-purple text-white px-4 py-2 rounded-full text-sm font-bold">
                                {{ ucfirst($product->type) }}
                            </span>
                            @if($product->category)
                            <span class="text-gray-500 text-sm font-medium">{{ $product->category }}</span>
                            @endif
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $product->name }}</h3>
                        
                        @if($product->short_description)
                        <p class="text-gray-600 mb-6 line-clamp-2">{{ $product->short_description }}</p>
                        @endif
                        
                        <!-- Features -->
                        @if($product->features && count($product->features) > 0)
                        <div class="mb-6">
                            <h4 class="font-bold text-gray-900 mb-3">✅ O que você recebe:</h4>
                            <ul class="space-y-2">
                                @foreach(array_slice($product->features, 0, 3) as $feature)
                                <li class="flex items-center text-sm text-gray-600">
                                    <i class="fas fa-check text-green-500 mr-2"></i>
                                    {{ $feature }}
                                </li>
                                @endforeach
                                @if(count($product->features) > 3)
                                <li class="text-sm text-blue-600 font-medium">
                                    +{{ count($product->features) - 3 }} outros itens...
                                </li>
                                @endif
                            </ul>
                        </div>
                        @endif
                        
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center space-x-3">
                                @if($product->discount_price)
                                <span class="text-4xl font-bold text-gray-900">{{ $product->formatted_discount_price }}</span>
                                <span class="text-xl text-gray-500 line-through">{{ $product->formatted_price }}</span>
                                @else
                                <span class="text-4xl font-bold text-gray-900">{{ $product->formatted_price }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <a href="{{ route('products.show', $product->slug) }}" 
                           class="w-full bg-gradient-red-orange-yellow text-white py-4 px-6 rounded-xl font-bold text-center block hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-shopping-cart mr-2"></i>{{ $product->button_text }}
                        </a>
                        
                        <div class="text-center mt-4">
                            <p class="text-sm text-gray-500">
                                <i class="fas fa-shield-alt mr-1"></i>
                                Garantia de 30 dias • Acesso imediato
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- Benefits Section -->
    <div class="py-20 bg-gradient-green-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="inline-block bg-green-500 text-white px-4 py-2 rounded-full text-sm font-bold mb-6">
                    🎯 FOQUE NO QUE IMPORTA!
                </div>
                <h2 class="text-5xl font-bold text-gray-900 mb-6">Por Que Nossos Produtos São Diferentes?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Não somos apenas mais uma loja de produtos digitais. Somos especialistas em resultados!
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-lg border-l-4 border-green-500">
                    <div class="text-4xl mb-4">⚡</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Acesso Imediato</h3>
                    <p class="text-gray-600">Receba seus produtos instantaneamente após a compra. Sem espera, sem complicação.</p>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border-l-4 border-blue-500">
                    <div class="text-4xl mb-4">🛡️</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Garantia Total</h3>
                    <p class="text-gray-600">30 dias para testar. Se não ficar satisfeito, devolvemos 100% do seu dinheiro.</p>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border-l-4 border-purple-500">
                    <div class="text-4xl mb-4">🎓</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Suporte Especializado</h3>
                    <p class="text-gray-600">Nossa equipe está sempre disponível para ajudar você a ter sucesso.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- All Products -->
    <div class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold text-gray-900 mb-6">Catálogo Completo</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Explore todos os nossos produtos digitais e encontre exatamente o que você precisa
                </p>
            </div>
            
            @if($products->count() > 0)
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($products as $product)
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border-2 border-gray-100 hover:border-blue-300">
                    @if($product->image)
                    <div class="h-48 bg-gradient-to-br from-blue-500 to-purple-600 relative overflow-hidden">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" 
                             class="w-full h-full object-cover">
                        @if($product->discount_price)
                        <div class="absolute top-3 right-3 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                            -{{ $product->discount_percentage }}% OFF
                        </div>
                        @endif
                        @if($product->is_featured)
                        <div class="absolute bottom-3 left-3 bg-yellow-400 text-red-600 px-2 py-1 rounded-full text-xs font-bold">
                            ⭐ DESTAQUE
                        </div>
                        @endif
                    </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-gradient-blue-purple text-white px-3 py-1 rounded-full text-xs font-bold">
                                {{ ucfirst($product->type) }}
                            </span>
                            @if($product->category)
                            <span class="text-gray-500 text-xs font-medium">{{ $product->category }}</span>
                            @endif
                        </div>
                        
                        <h3 class="text-lg font-bold text-gray-900 mb-3">{{ $product->name }}</h3>
                        
                        @if($product->short_description)
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $product->short_description }}</p>
                        @endif
                        
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-2">
                                @if($product->discount_price)
                                <span class="text-2xl font-bold text-gray-900">{{ $product->formatted_discount_price }}</span>
                                <span class="text-sm text-gray-500 line-through">{{ $product->formatted_price }}</span>
                                @else
                                <span class="text-2xl font-bold text-gray-900">{{ $product->formatted_price }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <a href="{{ route('products.show', $product->slug) }}" 
                           class="w-full bg-gradient-red-orange-yellow text-white py-3 px-4 rounded-lg font-bold text-center block hover:shadow-lg transition-all duration-300 text-sm transform hover:scale-105">
                            <i class="fas fa-shopping-cart mr-2"></i>{{ $product->button_text }}
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <div class="mt-12">
                {{ $products->links() }}
            </div>
            @else
            <div class="text-center py-12">
                <div class="text-6xl mb-4">📦</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Nenhum produto encontrado</h3>
                <p class="text-gray-600">Em breve teremos produtos incríveis para você!</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="py-20 bg-gradient-purple-pink-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="inline-block bg-purple-500 text-white px-4 py-2 rounded-full text-sm font-bold mb-6">
                    💬 DEPOIMENTOS REAIS
                </div>
                <h2 class="text-5xl font-bold text-gray-900 mb-6">O Que Nossos Clientes Dizem</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Mais de 10.000 profissionais já transformaram suas carreiras com nossos produtos
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-lg border-l-4 border-green-500">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-blue-purple rounded-full flex items-center justify-center text-white font-bold">
                            M
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-900">Maria Silva</h4>
                            <p class="text-sm text-gray-600">Desenvolvedora Frontend</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">"O DevStarter Kit mudou completamente minha forma de trabalhar. Economizo 80% do meu tempo agora!"</p>
                    <div class="flex text-yellow-400 mt-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border-l-4 border-blue-500">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-green rounded-full flex items-center justify-center text-white font-bold">
                            J
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-900">João Santos</h4>
                            <p class="text-sm text-gray-600">Freelancer</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">"Consegui triplicar minha renda usando os templates. Clientes adoram a qualidade profissional!"</p>
                    <div class="flex text-yellow-400 mt-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border-l-4 border-purple-500">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-purple rounded-full flex items-center justify-center text-white font-bold">
                            A
                        </div>
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-900">Ana Costa</h4>
                            <p class="text-sm text-gray-600">Empresária</p>
                        </div>
                    </div>
                    <p class="text-gray-700 italic">"O sistema de gestão me salvou! Agora tenho controle total do meu negócio. Vale cada centavo!"</p>
                    <div class="flex text-yellow-400 mt-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Final CTA Section -->
    <div id="garantia" class="py-20 bg-gradient-red-orange-yellow text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="inline-block bg-yellow-400 text-red-600 px-4 py-2 rounded-full text-sm font-bold mb-6 animate-pulse">
                🚨 ÚLTIMA CHAMADA
            </div>
            <h2 class="text-6xl font-bold mb-6">Não Perca Esta Oportunidade!</h2>
            <p class="text-2xl text-yellow-100 mb-8 max-w-4xl mx-auto">
                Milhares de profissionais já transformaram suas carreiras. Agora é sua vez!
            </p>
            
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                    <div class="text-4xl mb-4">⚡</div>
                    <h3 class="text-xl font-bold mb-2">Acesso Imediato</h3>
                    <p class="text-yellow-100">Receba instantaneamente após a compra</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                    <div class="text-4xl mb-4">🛡️</div>
                    <h3 class="text-xl font-bold mb-2">Garantia Total</h3>
                    <p class="text-yellow-100">30 dias para testar sem riscos</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                    <div class="text-4xl mb-4">🎯</div>
                    <h3 class="text-xl font-bold mb-2">Resultados Garantidos</h3>
                    <p class="text-yellow-100">Ou devolvemos seu dinheiro</p>
                </div>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#produtos" class="bg-white text-red-600 px-8 py-4 rounded-xl font-bold text-xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-shopping-cart mr-2"></i>Ver Produtos Agora
                </a>
                <button onclick="openSpecialistModal()" class="border-2 border-white text-white px-8 py-4 rounded-xl font-bold text-xl hover:bg-white/10 transition-all duration-300">
                    <i class="fas fa-envelope mr-2"></i>Falar com Especialista
                </button>
            </div>
            
            <div class="mt-12 text-yellow-100">
                <p class="text-lg">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Compra 100% segura • Suporte 24/7 • Garantia de satisfação
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
