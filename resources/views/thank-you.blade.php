@extends('layouts.landing')

@section('title', 'Guia Enviado com Sucesso | DevStarter Kit')

@section('meta')
<meta name="description" content="Guia enviado com sucesso! Verifique seu e-mail e descubra como o DevStarter Kit pode te ajudar a economizar até 40 horas em cada projeto.">
<meta name="robots" content="noindex, nofollow">
@endsection

@section('content')
<!-- Página de Obrigado -->
<section class="min-h-screen bg-gradient-to-br from-green-500 via-blue-500 to-purple-600 text-white py-20 px-4 flex items-center justify-center">
    <div class="max-w-4xl mx-auto text-center">
        <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-12 shadow-2xl">
            <div class="w-24 h-24 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-8 animate-bounce">
                <i class="fas fa-check text-white text-4xl"></i>
            </div>
            
            <h1 class="text-5xl lg:text-6xl font-bold mb-8 text-white font-display">
                🎉 Guia enviado com sucesso!
            </h1>
            
            <p class="text-xl lg:text-2xl mb-8 text-blue-100 font-medium">
                Verifique seu e-mail — o guia já está a caminho.
            </p>
            
            <p class="text-lg text-blue-200 mb-12 max-w-3xl mx-auto">
                Enquanto isso, veja como o DevStarter Kit pode te ajudar a economizar até 40 horas em cada novo projeto.
            </p>
            
            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lock text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">🔐 Login Pronto</h3>
                    <p class="text-blue-200">Sistema de autenticação completo e seguro</p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-palette text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">🎨 Design Moderno</h3>
                    <p class="text-blue-200">Layout responsivo com Vue + Tailwind</p>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                    <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-bolt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">⚡ Estrutura Modular</h3>
                    <p class="text-blue-200">Base sólida em Laravel para qualquer projeto</p>
                </div>
            </div>
            
            <div class="bg-white/20 backdrop-blur-sm rounded-2xl p-8 mb-8">
                <h3 class="text-2xl font-bold mb-4 text-yellow-300">💡 O que você vai economizar:</h3>
                <div class="grid md:grid-cols-2 gap-4 text-left">
                    <div class="flex items-center">
                        <span class="text-green-300 text-xl mr-3">✅</span>
                        <span class="text-lg">Semanas configurando autenticação</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-green-300 text-xl mr-3">✅</span>
                        <span class="text-lg">Dias criando layouts básicos</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-green-300 text-xl mr-3">✅</span>
                        <span class="text-lg">Horas perdidas com configurações</span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-green-300 text-xl mr-3">✅</span>
                        <span class="text-lg">Projetos que nunca saem do papel</span>
                    </div>
                </div>
            </div>
            
            <a href="/products" class="inline-block bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-12 py-6 rounded-2xl font-bold text-2xl hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                🔍 Ver o DevStarter Kit em ação
            </a>
            
            <div class="mt-8 text-blue-200">
                <p class="text-sm">📧 Não recebeu o e-mail? Verifique sua caixa de spam ou lixo eletrônico.</p>
            </div>
        </div>
    </div>
</section>

<!-- Rodapé -->
<footer class="bg-gray-900 text-white py-12 px-4">
    <div class="max-w-6xl mx-auto text-center">
        <h3 class="text-xl font-bold mb-4 text-white font-display">DevStarter Kit</h3>
        <p class="text-gray-300 mb-6 text-base">
            Aprenda, crie e entregue projetos completos de forma simples.
        </p>
        <div class="flex justify-center space-x-4">
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
        <div class="border-t border-gray-700 mt-8 pt-8">
            <p class="text-gray-300 text-sm">
                © 2025 DevStarter Kit – Aprenda, crie e entregue projetos completos.
            </p>
        </div>
    </div>
</footer>
@endsection
