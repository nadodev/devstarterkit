<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    
    @yield('meta')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Performance optimizations -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="//fonts.bunny.net">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-50">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-rocket text-white text-sm"></i>
                            </div>
                            <span class="text-xl font-bold text-gray-900">DevStarter Kit</span>
                        </a>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('conversion') }}" class="text-gray-600 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-home mr-1"></i>
                            Início
                        </a>
                        {{-- <a href="{{ route('products.index') }}" 
                        class="group bg-gradient-green text-white px-4 py-2 rounded-sm text-md hover:shadow-lg transition-all duration-300 transform">
                         Ver Produtos
                     </a> --}}
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>

    <!-- Modal Falar com Especialista -->
    <div id="specialistModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                <!-- Header -->
                <div class="bg-gradient-red-orange-yellow text-white p-6 rounded-t-2xl">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-2xl font-bold">💬 Falar com Especialista</h3>
                            <p class="text-yellow-100 mt-2">Nossa equipe está pronta para ajudar você!</p>
                        </div>
                        <button onclick="closeSpecialistModal()" class="text-white hover:text-yellow-200 transition-colors">
                            <i class="fas fa-times text-2xl"></i>
                        </button>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-6">
                    <form id="specialistForm" class="space-y-6">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nome Completo *</label>
                                <input type="text" name="name" required
                                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="Seu nome completo">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                <input type="email" name="email" required
                                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="seu@email.com">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">WhatsApp</label>
                                <input type="tel" name="whatsapp"
                                       class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="(11) 99999-9999">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Assunto *</label>
                                <select name="subject" required
                                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Selecione o assunto</option>
                                    <option value="duvida-produto">Dúvida sobre produto</option>
                                    <option value="suporte-tecnico">Suporte técnico</option>
                                    <option value="parceria">Parceria</option>
                                    <option value="outros">Outros</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Mensagem *</label>
                            <textarea name="message" rows="4" required
                                      class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                      placeholder="Descreva sua dúvida ou necessidade..."></textarea>
                        </div>

                        <!-- Proteção contra Spam -->
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex-1">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Verificação de Segurança *</label>
                                    <div class="flex items-center space-x-2">
                                        <span id="captchaQuestion" class="text-lg font-bold text-gray-800"></span>
                                        <input type="number" name="captcha_answer" required
                                               class="w-20 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-center"
                                               placeholder="?">
                                    </div>
                                </div>
                                <button type="button" onclick="generateCaptcha()" 
                                        class="bg-gray-200 hover:bg-gray-300 px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                                    <i class="fas fa-refresh mr-1"></i>Nova
                                </button>
                            </div>
                        </div>

                        <!-- Botões -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button type="button" onclick="closeSpecialistModal()" 
                                    class="flex-1 bg-gray-500 text-white py-3 px-6 rounded-lg font-semibold hover:bg-gray-600 transition-colors">
                                <i class="fas fa-times mr-2"></i>Cancelar
                            </button>
                            <button type="submit" 
                                    class="flex-1 bg-gradient-red-orange-yellow text-white py-3 px-6 rounded-lg font-semibold hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                <i class="fas fa-paper-plane mr-2"></i>Enviar Mensagem
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        let captchaAnswer = 0;

        function openSpecialistModal() {
            document.getElementById('specialistModal').classList.remove('hidden');
            generateCaptcha();
        }

        function closeSpecialistModal() {
            document.getElementById('specialistModal').classList.add('hidden');
            document.getElementById('specialistForm').reset();
        }

        function generateCaptcha() {
            const num1 = Math.floor(Math.random() * 10) + 1;
            const num2 = Math.floor(Math.random() * 10) + 1;
            captchaAnswer = num1 + num2;
            
            document.getElementById('captchaQuestion').textContent = `${num1} + ${num2} = ?`;
        }

        // Form submission
        document.getElementById('specialistForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const userAnswer = parseInt(formData.get('captcha_answer'));
            
            if (userAnswer !== captchaAnswer) {
                alert('Resposta incorreta. Tente novamente.');
                generateCaptcha();
                return;
            }

            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Enviando...';
            submitButton.disabled = true;

            // Enviar requisição AJAX
            fetch('{{ route("specialist.send-message") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('✅ ' + data.message);
                    closeSpecialistModal();
                } else {
                    alert('❌ ' + data.message);
                    if (data.errors) {
                        console.error('Erros de validação:', data.errors);
                    }
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('❌ Erro de conexão. Verifique sua internet e tente novamente.');
            })
            .finally(() => {
                submitButton.innerHTML = originalText;
                submitButton.disabled = false;
            });
        });

        // Fechar modal ao clicar fora
        document.getElementById('specialistModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeSpecialistModal();
            }
        });

        // Console welcome message
        console.log('%c🚀 DevStarter Kit Landing Page', 'color: #DC2626; font-size: 20px; font-weight: bold;');
        console.log('%cDesenvolvido com ❤️ para desenvolvedores iniciantes', 'color: #EA580C; font-size: 14px;');
    </script>
</body>
</html>
