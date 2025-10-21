<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DevStarter Kit Demo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .pulse-slow {
            animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-white/10 rounded-full floating"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-white/5 rounded-full floating" style="animation-delay: -3s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-white/5 rounded-full pulse-slow"></div>
    </div>

    <div class="relative z-10 w-full max-w-md">
        <div class="text-center mb-8">
            <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 floating">
                <i class="fas fa-rocket text-white text-3xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">DevStarter Kit</h1>
            <p class="text-blue-100">Demo Panel - Acesso Administrativo</p>
        </div>

        <div class="glass-effect rounded-2xl p-8 shadow-2xl">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-white mb-2">Bem-vindo de volta!</h2>
                <p class="text-blue-100">Faça login para acessar o painel</p>
            </div>

            @if(session('error'))
                <div class="mb-6 bg-red-500/20 border border-red-500/30 text-red-100 px-4 py-3 rounded-xl">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('demo.login') }}" method="POST">
                @csrf
                
                <div class="mb-6">
                    <label for="email" class="block text-white text-sm font-medium mb-2">
                        <i class="fas fa-envelope mr-2"></i>Email
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email', 'admin@demo.com') }}"
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-200 focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all backdrop-blur-sm"
                           placeholder="Digite seu email"
                           required>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-white text-sm font-medium mb-2">
                        <i class="fas fa-lock mr-2"></i>Senha
                    </label>
                    <input type="password" 
                           id="password" 
                           value="123456"
                           name="password" 
                           class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-blue-200 focus:ring-2 focus:ring-white/50 focus:border-transparent transition-all backdrop-blur-sm"
                           placeholder="Digite sua senha"
                           required>
                </div>

                <div class="flex items-center justify-between mb-6">
                    <label class="flex items-center text-white">
                        <input type="checkbox" 
                               name="remember" 
                               class="w-4 h-4 text-blue-600 bg-white/10 border-white/20 rounded focus:ring-blue-500">
                        <span class="ml-2 text-sm">Lembrar de mim</span>
                    </label>
                    <a href="#" class="text-blue-200 hover:text-white text-sm transition-colors">
                        Esqueceu a senha?
                    </a>
                </div>

                <button type="submit" 
                        class="w-full bg-white/20 hover:bg-white/30 text-white font-semibold py-3 px-4 rounded-xl transition-all duration-200 backdrop-blur-sm border border-white/20 hover:border-white/30 transform hover:scale-105">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Entrar no Painel
                </button>
            </form>

            <div class="mt-8 p-4 bg-blue-500/20 rounded-xl border border-blue-400/30">
                <div class="flex items-start">
                    <i class="fas fa-info-circle text-blue-200 mt-1 mr-3"></i>
                    <div>
                        <p class="text-blue-100 text-sm font-medium mb-1">Modo Demo</p>
                        <p class="text-blue-200 text-xs">
                            Este é um painel de demonstração. Use qualquer email e senha para acessar.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-8">
            <p class="text-blue-100 text-sm">
                © 2024 DevStarter Kit. Todos os direitos reservados.
            </p>
        </div>
    </div>
</body>
</html>