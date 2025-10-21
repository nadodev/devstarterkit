@extends('layouts.landing')

@section('title', 'Guia Gratuito: Como Criar Estruturas de Sistema Profissionais | DevStarter Kit')

@section('meta')
<meta name="description" content="Receba gratuitamente o guia 'Como Criar Estruturas de Sistema Profissionais do Zero' e descubra como economizar até 40 horas de trabalho por projeto.">
<meta name="keywords" content="guia gratuito, sistema profissional, estrutura base, desenvolvedor, laravel, vue, tailwind">
<meta name="author" content="DevStarter Kit">
<meta name="robots" content="index, follow">
<meta name="language" content="pt-BR">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ request()->url() }}">
<meta property="og:title" content="Guia Gratuito: Como Criar Estruturas de Sistema Profissionais">
<meta property="og:description" content="Receba gratuitamente o guia e descubra como economizar até 40 horas de trabalho por projeto.">
<meta property="og:image" content="{{ asset('images/devstarter-kit-og.jpg') }}">
<meta property="og:site_name" content="DevStarter Kit">
<meta property="og:locale" content="pt_BR">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ request()->url() }}">
<meta property="twitter:title" content="Guia Gratuito: Como Criar Estruturas de Sistema Profissionais">
<meta property="twitter:description" content="Receba gratuitamente o guia e descubra como economizar até 40 horas de trabalho por projeto.">
<meta property="twitter:image" content="{{ asset('images/devstarter-kit-og.jpg') }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ request()->url() }}">
@endsection

@section('content')
<!-- Seção 1 — Hero -->
<section class="bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white py-20 px-4 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="max-w-6xl mx-auto relative">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="animate-fade-in">
                <h1 class="text-4xl lg:text-6xl font-bold mb-6 leading-tight text-white font-display">
                    Crie sistemas completos em <span class="text-yellow-300">horas</span> — com a base que desenvolvedores profissionais usam.
                </h1>
                <p class="text-xl lg:text-2xl mb-8 text-blue-100 font-medium">
                    Receba gratuitamente o <strong>Bônus Exclusivo DevStarter Kit – Mini Combo</strong>
                    e descubra como economizar até 40 horas de trabalho por projeto.
                </p>
                
                <!-- Formulário de Captura -->
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 mb-8">
                    <form id="lead-form" class="space-y-4">
                        @csrf
                        <div>
                            <input type="email" id="email" name="email" placeholder="Seu melhor email" required class="w-full px-4 py-4 rounded-xl text-gray-800 text-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 border border-gray-300">
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="newsletter" name="newsletter" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                            <label for="newsletter" class="ml-2 text-sm text-blue-100">
                                Quero receber novidades e materiais exclusivos
                            </label>
                        </div>
                        <button type="submit" class="w-full bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-8 py-4 rounded-xl font-bold text-xl hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                            🎁 Quero o Mini Combo gratuito (R$197)
                        </button>
                        <p class="text-sm text-blue-200 text-center">
                            🔒 Sem spam. Você pode cancelar a qualquer momento.
                        </p>
                    </form>
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

<!-- Seção 2 — O que você vai aprender -->
<section class="py-20 px-4 bg-white">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6 font-display">
            🎁 Bônus Exclusivo DevStarter Kit – Mini Combo
        </h2>
        <p class="text-xl text-gray-600 mb-12">
            <strong>Valor percebido: R$197</strong> — entregue gratuitamente ao se cadastrar:
        </p>
        
        <div class="grid md:grid-cols-3 gap-8 mb-12">
            <div class="bg-green-50 rounded-2xl p-8 border-l-4 border-green-500">
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-book text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-green-600 mb-2">📚 Guia prático: "Como Criar Estruturas de Sistema Profissionais do Zero"</h3>
                        <p class="text-gray-600">Aprenda o método usado por desenvolvedores profissionais para organizar projetos.</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-blue-50 rounded-2xl p-8 border-l-4 border-blue-500">
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-code text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-blue-600 mb-2">🎨 Templates prontos: Login, Dashboard e CRUD básico</h3>
                        <p class="text-gray-600">Código pronto para usar em seus projetos, sem precisar criar do zero.</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-purple-50 rounded-2xl p-8 border-l-4 border-purple-500">
                <div class="flex items-start">
                    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                        <i class="fas fa-list-check text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-purple-600 mb-2">⚡ Checklist rápido de setup: configure e personalize seu projeto em minutos</h3>
                        <p class="text-gray-600">Um passo a passo para estruturar qualquer tipo de sistema rapidamente.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <button class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-8 py-4 rounded-xl font-bold text-xl hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-2xl">
            🎁 Quero o Mini Combo gratuito (R$197)
        </button>
    </div>
</section>

<!-- Seção 3 — O que o DevStarter Kit faz por você -->
<section class="py-20 px-4 bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6 font-display">
                Pare de começar do zero a cada novo projeto.
            </h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto">
                O DevStarter Kit é uma base pronta feita para desenvolvedores e pequenas agências que querem entregar sistemas com agilidade e estrutura profissional.
            </p>
        </div>
        
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h3 class="text-2xl font-bold text-gray-800 mb-8">Com ele, você tem:</h3>
                <div class="space-y-6">
                    <div class="flex items-center bg-white rounded-xl p-6 shadow-lg">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mr-6 flex-shrink-0 shadow-lg">
                            <i class="fas fa-lock text-white text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-green-600 mb-2">🔐 Login e painel prontos</h4>
                            <p class="text-gray-600">Sistema de autenticação completo e seguro, pronto para usar!</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center bg-white rounded-xl p-6 shadow-lg">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mr-6 flex-shrink-0 shadow-lg">
                            <i class="fas fa-palette text-white text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-blue-600 mb-2">🎨 Layout moderno com Vue + Tailwind</h4>
                            <p class="text-gray-600">Design responsivo e profissional, sem precisar criar do zero!</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center bg-white rounded-xl p-6 shadow-lg">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mr-6 flex-shrink-0 shadow-lg">
                            <i class="fas fa-bolt text-white text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-purple-600 mb-2">⚡ Estrutura modular em Laravel</h4>
                            <p class="text-gray-600">Base sólida e organizada para qualquer tipo de projeto!</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center bg-white rounded-xl p-6 shadow-lg">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mr-6 flex-shrink-0 shadow-lg">
                            <i class="fas fa-globe text-white text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="text-xl font-bold text-orange-600 mb-2">🌐 Página pública integrada</h4>
                            <p class="text-gray-600">Landing page e painel administrativo conectados!</p>
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
        
        <div class="text-center mt-12">
            <button class="bg-gradient-to-r from-green-500 to-blue-500 text-white px-8 py-4 rounded-xl font-bold text-xl hover:from-green-600 hover:to-blue-600 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                💡 Baixe o guia e veja como tudo funciona na prática
            </button>
        </div>
    </div>
</section>

<!-- Seção 4 — Prova social -->
<section class="py-20 px-4 bg-white">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6 font-display">
            +127 desenvolvedores já estão acelerando seus projetos
        </h2>
        
        <div class="grid md:grid-cols-2 gap-8 mb-12">
            <div class="bg-gray-50 rounded-2xl p-8">
                <div class="flex items-center mb-4">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=60&h=60&fit=crop&crop=face" alt="Lucas Pereira" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-bold text-gray-800">Lucas P.</h4>
                        <p class="text-gray-600 text-sm">Full Stack</p>
                    </div>
                </div>
                <p class="text-gray-600 italic text-lg">
                    "Economizei 25 horas de setup no meu último projeto."
                </p>
            </div>
            
            <div class="bg-gray-50 rounded-2xl p-8">
                <div class="flex items-center mb-4">
                    <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=60&h=60&fit=crop&crop=face" alt="Marina Santos" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-bold text-gray-800">Marina S.</h4>
                        <p class="text-gray-600 text-sm">Front-end Dev</p>
                    </div>
                </div>
                <p class="text-gray-600 italic text-lg">
                    "Em 1 dia, já tinha meu sistema no ar."
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Seção 5 — Chamada final -->
<section class="py-20 px-4 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="max-w-4xl mx-auto text-center relative">
        <h2 class="text-4xl lg:text-6xl font-bold mb-8 text-white font-display">
            Dê o primeiro passo para projetos mais rápidos e profissionais.
        </h2>
        <p class="text-xl lg:text-2xl mb-12 text-blue-100 font-medium max-w-3xl mx-auto">
            Receba gratuitamente o <strong>Bônus Exclusivo DevStarter Kit – Mini Combo (R$197)</strong>
            e descubra como aplicar o mesmo método usado por devs que entregam sistemas completos em um fim de semana.
        </p>
        
        <button id="final-cta" class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-12 py-6 rounded-2xl font-bold text-2xl hover:from-yellow-500 hover:to-orange-600 transition-all duration-300 transform hover:scale-105 shadow-2xl">
            🎁 Quero o Mini Combo gratuito (R$197)
        </button>
        
        <div class="mt-8 text-blue-200">
            <p class="text-sm">🔒 Sem spam. Você pode cancelar a qualquer momento.</p>
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Formulário de captura de leads
    const leadForm = document.getElementById('lead-form');
    if (leadForm) {
        leadForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value.trim();
            const newsletter = document.getElementById('newsletter').checked;
            
            // Validação
            if (!email) {
                showErrorMessage('Por favor, insira seu email.');
                return;
            }
            
            if (!isValidEmail(email)) {
                showErrorMessage('Por favor, insira um email válido.');
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

            // Enviar dados via AJAX
            fetch('/leads', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    email: email,
                    newsletter: newsletter
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Redirecionar para página de obrigado
                    window.location.href = '/thank-you';
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
    
    // CTAs principais
    const finalCta = document.getElementById('final-cta');
    if (finalCta) {
        finalCta.addEventListener('click', function() {
            const formSection = document.querySelector('section.bg-gradient-to-br.from-blue-600');
            if (formSection) {
                formSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });
    }
    
    // Console welcome message
    console.log('%c🚀 DevStarter Kit - Página de Captura', 'color: #8B5CF6; font-size: 20px; font-weight: bold;');
    console.log('%cReceba o guia gratuito e acelere seus projetos', 'color: #3B82F6; font-size: 14px;');
});
</script>
@endsection