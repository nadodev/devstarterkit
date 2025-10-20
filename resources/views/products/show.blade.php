@extends('layouts.landing')

@section('title', $product->name)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50">
    <!-- Product Hero -->
    <div class="bg-gradient-red-orange-yellow text-white py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Product Images -->
                <div class="space-y-6">
                    @if($product->image)
                    <div class="relative">
                        <div class="aspect-square bg-white/20 backdrop-blur-sm rounded-3xl overflow-hidden border-4 border-white/30 shadow-2xl">
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        <!-- Floating badges -->
                        @if($product->discount_price)
                        <div class="absolute -top-4 -right-4 bg-red-500 text-white px-4 py-2 rounded-full text-lg font-bold animate-pulse shadow-lg">
                            -{{ $product->discount_percentage }}% OFF
                        </div>
                        @endif
                        @if($product->is_featured)
                        <div class="absolute -bottom-4 -left-4 bg-yellow-400 text-red-600 px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                            ⭐ MAIS VENDIDO
                        </div>
                        @endif
                    </div>
                    @else
                    <!-- Placeholder quando não há imagem -->
                    <div class="aspect-square bg-white/20 backdrop-blur-sm rounded-3xl border-4 border-white/30 shadow-2xl flex items-center justify-center">
                        <div class="text-center text-white">
                            <div class="text-8xl mb-4">📦</div>
                            <h3 class="text-2xl font-bold">{{ $product->name }}</h3>
                            <p class="text-yellow-100">Produto Digital</p>
                        </div>
                    </div>
                    @endif
                    
                    @if($product->gallery && count($product->gallery) > 0)
                    <div class="grid grid-cols-4 gap-4">
                        @foreach($product->gallery as $image)
                        <div class="aspect-square bg-white/20 backdrop-blur-sm rounded-xl overflow-hidden border-2 border-white/30 hover:border-white/50 transition-all duration-300 cursor-pointer">
                            <img src="{{ Storage::url($image) }}" alt="{{ $product->name }}" 
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                        @endforeach
                    </div>
                    @endif
                    
                    <!-- Trust indicators -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <h4 class="text-white font-bold text-lg mb-4">🛡️ Garantias Incluídas</h4>
                        <div class="space-y-3">
                            <div class="flex items-center text-yellow-100">
                                <i class="fas fa-shield-alt mr-3"></i>
                                <span>Garantia de 30 dias</span>
                            </div>
                            <div class="flex items-center text-yellow-100">
                                <i class="fas fa-download mr-3"></i>
                                <span>Acesso imediato</span>
                            </div>
                            <div class="flex items-center text-yellow-100">
                                <i class="fas fa-headset mr-3"></i>
                                <span>Suporte 24/7</span>
                            </div>
                            <div class="flex items-center text-yellow-100">
                                <i class="fas fa-lock mr-3"></i>
                                <span>Pagamento 100% seguro</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product Info -->
                <div class="space-y-6">
                    <div class="flex items-center space-x-4 mb-4">
                        <span class="bg-yellow-400 text-red-600 px-4 py-2 rounded-full font-bold text-sm">
                            🔥 OFERTA LIMITADA
                        </span>
                        <span class="bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-full font-medium">
                            {{ ucfirst($product->type) }}
                        </span>
                        @if($product->category)
                        <span class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-full font-medium">
                            {{ $product->category }}
                        </span>
                        @endif
                        @if($product->is_featured)
                        <span class="bg-yellow-400 text-red-600 px-4 py-2 rounded-full font-bold text-sm">
                            ⭐ MAIS VENDIDO
                        </span>
                        @endif
                    </div>
                    
                    <h1 class="text-6xl font-bold text-white">{{ $product->name }}</h1>
                    
                    @if($product->short_description)
                    <p class="text-2xl text-yellow-100">{{ $product->short_description }}</p>
                    @endif
                    
                    <!-- Price -->
                    <div class="flex items-center space-x-4">
                        @if($product->discount_price)
                        <div class="flex items-center space-x-4">
                            <span class="text-6xl font-bold text-white">{{ $product->formatted_discount_price }}</span>
                            <span class="text-3xl text-yellow-200 line-through">{{ $product->formatted_price }}</span>
                            <span class="bg-red-500 text-white px-4 py-2 rounded-full text-lg font-bold animate-pulse">
                                -{{ $product->discount_percentage }}% OFF
                            </span>
                        </div>
                        @else
                        <span class="text-6xl font-bold text-white">{{ $product->formatted_price }}</span>
                        @endif
                    </div>
                    
                    <!-- Action Button -->
                    <div class="space-y-4">
                        @if($product->button_url)
                        <a href="{{ $product->button_url }}" target="_blank"
                           class="w-full bg-white text-red-600 py-6 px-8 rounded-2xl font-bold text-2xl text-center block hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                            <i class="fas fa-shopping-cart mr-3"></i>{{ $product->button_text }}
                        </a>
                        @else
                        <button class="w-full bg-white text-red-600 py-6 px-8 rounded-2xl font-bold text-2xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                            <i class="fas fa-shopping-cart mr-3"></i>{{ $product->button_text }}
                        </button>
                        @endif
                        
                        <div class="text-center space-y-2">
                            <p class="text-lg text-yellow-100">
                                <i class="fas fa-shield-alt mr-2"></i>
                                Garantia de 30 dias • Acesso imediato
                            </p>
                            <p class="text-sm text-yellow-200">
                                💳 Pagamento 100% seguro • 🚚 Entrega instantânea
                            </p>
                        </div>
                    </div>
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
                    <p class="text-xl">{{ $product->name }} foi criado especificamente para resolver esses problemas.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Details -->
    <div class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-12">
                    <!-- Description -->
                    <div>
                        <h2 class="text-4xl font-bold text-gray-900 mb-6">O Que Você Vai Receber</h2>
                        <div class="prose prose-lg max-w-none text-gray-700">
                            {!! nl2br(e($product->description)) !!}
                        </div>
                    </div>
                    
                    <!-- Features -->
                    @if($product->features && count($product->features) > 0)
                    <div>
                        <h2 class="text-4xl font-bold text-gray-900 mb-6">✅ Características Incluídas</h2>
                        <div class="grid md:grid-cols-2 gap-6">
                            @foreach($product->features as $feature)
                            <div class="flex items-start space-x-4 bg-green-50 rounded-xl p-6 border-l-4 border-green-500">
                                <div class="bg-gradient-green text-white rounded-full p-2 mt-1">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700 font-medium">{{ $feature }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    
                    <!-- Benefits -->
                    @if($product->benefits && count($product->benefits) > 0)
                    <div>
                        <h2 class="text-4xl font-bold text-gray-900 mb-6">🎯 Benefícios Que Você Vai Ter</h2>
                        <div class="grid md:grid-cols-2 gap-6">
                            @foreach($product->benefits as $benefit)
                            <div class="flex items-start space-x-4 bg-blue-50 rounded-xl p-6 border-l-4 border-blue-500">
                                <div class="bg-gradient-blue-purple text-white rounded-full p-2 mt-1">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-700 font-medium">{{ $benefit }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                
                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Quick Info -->
                    <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-6 border-2 border-blue-200">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">📋 Informações do Produto</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 font-medium">Tipo:</span>
                                <span class="font-bold text-lg bg-gradient-blue-purple text-white px-3 py-1 rounded-full">{{ ucfirst($product->type) }}</span>
                            </div>
                            @if($product->category)
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 font-medium">Categoria:</span>
                                <span class="font-bold text-lg">{{ $product->category }}</span>
                            </div>
                            @endif
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 font-medium">Preço:</span>
                                <span class="font-bold text-2xl text-green-600">{{ $product->formatted_final_price }}</span>
                            </div>
                            @if($product->discount_price)
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 font-medium">Desconto:</span>
                                <span class="font-bold text-xl text-red-600">{{ $product->discount_percentage }}% OFF</span>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- CTA Sidebar -->
                    <div class="bg-gradient-red-orange-yellow text-white rounded-2xl p-6">
                        <h3 class="text-2xl font-bold mb-4">🚀 Pronto para Começar?</h3>
                        <p class="text-yellow-100 mb-6">Junte-se a milhares de profissionais que já transformaram suas carreiras!</p>
                        
                        @if($product->button_url)
                        <a href="{{ $product->button_url }}" target="_blank"
                           class="w-full bg-white text-red-600 py-4 px-6 rounded-xl font-bold text-lg text-center block hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl mb-4">
                            <i class="fas fa-shopping-cart mr-2"></i>{{ $product->button_text }}
                        </a>
                        @else
                        <button class="w-full bg-white text-red-600 py-4 px-6 rounded-xl font-bold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl mb-4">
                            <i class="fas fa-shopping-cart mr-2"></i>{{ $product->button_text }}
                        </button>
                        @endif
                        
                        <div class="text-center space-y-2">
                            <p class="text-sm text-yellow-100">
                                <i class="fas fa-shield-alt mr-1"></i>
                                Garantia de 30 dias
                            </p>
                            <p class="text-sm text-yellow-200">
                                <i class="fas fa-download mr-1"></i>
                                Acesso imediato
                            </p>
                        </div>
                    </div>
                    
                    <!-- Contact Info -->
                    <div class="bg-white border-2 border-gray-200 rounded-2xl p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">💬 Precisa de Ajuda?</h3>
                        <p class="text-gray-600 mb-4">Nossa equipe está pronta para esclarecer suas dúvidas.</p>
                        <div class="space-y-3">
                            <a href="mailto:contato@devstarterkit.com" 
                               class="flex items-center space-x-3 text-blue-600 hover:text-blue-800 bg-blue-50 p-3 rounded-lg">
                                <i class="fas fa-envelope"></i>
                                <span>contato@devstarterkit.com</span>
                            </a>
                            <a href="https://wa.me/5511999999999" 
                               class="flex items-center space-x-3 text-green-600 hover:text-green-800 bg-green-50 p-3 rounded-lg">
                                <i class="fab fa-whatsapp"></i>
                                <span>WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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
                    Mais de 10.000 profissionais já transformaram suas carreiras com {{ $product->name }}
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
                    <p class="text-gray-700 italic">"{{ $product->name }} mudou completamente minha forma de trabalhar. Economizo 80% do meu tempo agora!"</p>
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
                    <p class="text-gray-700 italic">"Consegui triplicar minha renda usando {{ $product->name }}. Clientes adoram a qualidade profissional!"</p>
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
                    <p class="text-gray-700 italic">"{{ $product->name }} me salvou! Agora tenho controle total do meu negócio. Vale cada centavo!"</p>
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

    <!-- Benefits Section -->
    <div class="py-20 bg-gradient-green-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="inline-block bg-green-500 text-white px-4 py-2 rounded-full text-sm font-bold mb-6">
                    🎯 FOQUE NO QUE IMPORTA!
                </div>
                <h2 class="text-5xl font-bold text-gray-900 mb-6">Por Que {{ $product->name }} É Diferente?</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Não somos apenas mais uma loja de produtos digitais. Somos especialistas em resultados!
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-2xl p-8 shadow-lg border-l-4 border-green-500">
                    <div class="text-4xl mb-4">⚡</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Acesso Imediato</h3>
                    <p class="text-gray-600">Receba {{ $product->name }} instantaneamente após a compra. Sem espera, sem complicação.</p>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border-l-4 border-blue-500">
                    <div class="text-4xl mb-4">🛡️</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Garantia Total</h3>
                    <p class="text-gray-600">30 dias para testar. Se não ficar satisfeito, devolvemos 100% do seu dinheiro.</p>
                </div>
                
                <div class="bg-white rounded-2xl p-8 shadow-lg border-l-4 border-purple-500">
                    <div class="text-4xl mb-4">🎓</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Suporte Especializado</h3>
                    <p class="text-gray-600">Nossa equipe está sempre disponível para ajudar você a ter sucesso com {{ $product->name }}.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Final CTA Section -->
    <div class="py-20 bg-gradient-red-orange-yellow text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="inline-block bg-yellow-400 text-red-600 px-4 py-2 rounded-full text-sm font-bold mb-6 animate-pulse">
                🚨 ÚLTIMA CHAMADA
            </div>
            <h2 class="text-6xl font-bold mb-6">Não Perca Esta Oportunidade!</h2>
            <p class="text-2xl text-yellow-100 mb-8 max-w-4xl mx-auto">
                Milhares de profissionais já transformaram suas carreiras com {{ $product->name }}. Agora é sua vez!
            </p>
            
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                    <div class="text-4xl mb-4">⚡</div>
                    <h3 class="text-xl font-bold mb-2">Acesso Imediato</h3>
                    <p class="text-yellow-100">Receba {{ $product->name }} instantaneamente</p>
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
                @if($product->button_url)
                <a href="{{ $product->button_url }}" target="_blank"
                   class="bg-white text-red-600 px-8 py-4 rounded-xl font-bold text-xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-shopping-cart mr-2"></i>{{ $product->button_text }}
                </a>
                @else
                <button class="bg-white text-red-600 px-8 py-4 rounded-xl font-bold text-xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-shopping-cart mr-2"></i>{{ $product->button_text }}
                </button>
                @endif
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

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
    <div class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="inline-block bg-blue-500 text-white px-4 py-2 rounded-full text-sm font-bold mb-6">
                    🔗 PRODUTOS RELACIONADOS
                </div>
                <h2 class="text-5xl font-bold text-gray-900 mb-6">Você Também Pode Se Interessar</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Explore outros produtos que podem acelerar ainda mais seu sucesso
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($relatedProducts as $relatedProduct)
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border-2 border-gray-100 hover:border-blue-300">
                    @if($relatedProduct->image)
                    <div class="h-48 bg-gradient-to-br from-blue-500 to-purple-600 relative overflow-hidden">
                        <img src="{{ Storage::url($relatedProduct->image) }}" alt="{{ $relatedProduct->name }}" 
                             class="w-full h-full object-cover">
                        @if($relatedProduct->is_featured)
                        <div class="absolute bottom-3 left-3 bg-yellow-400 text-red-600 px-2 py-1 rounded-full text-xs font-bold">
                            ⭐ DESTAQUE
                        </div>
                        @endif
                    </div>
                    @endif
                    
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-3">{{ $relatedProduct->name }}</h3>
                        
                        @if($relatedProduct->short_description)
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $relatedProduct->short_description }}</p>
                        @endif
                        
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-2xl font-bold text-gray-900">{{ $relatedProduct->formatted_final_price }}</span>
                        </div>
                        
                        <a href="{{ route('products.show', $relatedProduct->slug) }}" 
                           class="w-full bg-gradient-red-orange-yellow text-white py-3 px-4 rounded-lg font-bold text-center block hover:shadow-lg transition-all duration-300 text-sm transform hover:scale-105">
                            <i class="fas fa-shopping-cart mr-2"></i>Ver Detalhes
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
