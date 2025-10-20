@extends('layouts.app')

@section('title', 'Entrar - EduPlatform')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-blue-900-purple-900 text-white overflow-hidden min-h-screen">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 py-16">
        <div class="grid lg:grid-cols-2 gap-12 items-center min-h-screen">
            <!-- Left Side - Content -->
            <div class="text-center lg:text-left">
                <div class="inline-flex items-center bg-white/10 backdrop-blur-sm rounded-full px-4 py-2 mb-6 text-sm font-medium">
                    <i class="fas fa-graduation-cap text-yellow-400 mr-2"></i>
                    Bem-vindo de volta
                </div>
                
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                    Entre na sua
                    <span class="text-gradient-yellow-orange">
                        conta
                    </span>
                </h1>
                
                <p class="text-xl md:text-2xl mb-8 text-blue-100 leading-relaxed">
                    Continue sua jornada de aprendizado e transforme seu futuro
                </p>
                
                <!-- Trust Indicators -->
                <div class="flex flex-wrap items-center justify-center lg:justify-start gap-8 text-blue-200">
                    <div class="flex items-center">
                        <i class="fas fa-shield-alt text-2xl mr-3"></i>
                        <span class="font-semibold">100% Seguro</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-users text-2xl mr-3"></i>
                        <span class="font-semibold">+50K estudantes</span>
                    </div>
                </div>
            </div>
            
            <!-- Right Side - Login Form -->
            <div class="relative">
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-white/20">
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-lock text-white text-2xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-white mb-2">Entre na sua conta</h2>
                        <p class="text-blue-100">Preencha seus dados para continuar</p>
                    </div>
                    
                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-white mb-2">
                                <i class="fas fa-envelope mr-2"></i>Email
                            </label>
                            <input id="email" 
                                   name="email" 
                                   type="email" 
                                   autocomplete="email" 
                                   required 
                                   value="{{ old('email') }}"
                                   class="w-full px-4 py-3 bg-white/20 backdrop-blur-sm border border-white/30 rounded-xl text-white placeholder-blue-200 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition @error('email') border-red-400 @enderror" 
                                   placeholder="seu@email.com">
                            @error('email')
                                <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-semibold text-white mb-2">
                                <i class="fas fa-lock mr-2"></i>Senha
                            </label>
                            <input id="password" 
                                   name="password" 
                                   type="password" 
                                   autocomplete="current-password" 
                                   required 
                                   class="w-full px-4 py-3 bg-white/20 backdrop-blur-sm border border-white/30 rounded-xl text-white placeholder-blue-200 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition @error('password') border-red-400 @enderror" 
                                   placeholder="Sua senha">
                            @error('password')
                                <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Remember & Forgot -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember" 
                                       name="remember" 
                                       type="checkbox" 
                                       class="h-4 w-4 text-yellow-400 focus:ring-yellow-400 border-white/30 rounded bg-white/20">
                                <label for="remember" class="ml-2 text-sm text-white">
                                    Lembrar de mim
                                </label>
                            </div>
                            <a href="#" class="text-sm text-yellow-300 hover:text-yellow-200 transition">
                                Esqueceu a senha?
                            </a>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full bg-gradient-yellow-orange text-white py-3 rounded-xl font-bold text-lg hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Entrar na Conta
                        </button>
                        
                        <!-- Register Link -->
                        <div class="text-center">
                            <p class="text-blue-200">
                                Não tem uma conta? 
                                <a href="{{ route('register') }}" class="text-yellow-300 hover:text-yellow-200 font-semibold transition">
                                    Criar conta grátis
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
                
                <!-- Floating Cards -->
                <div class="absolute -top-4 -left-4 bg-white rounded-2xl p-4 shadow-xl">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-check text-white"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Seguro</div>
                            <div class="text-sm text-gray-600">SSL</div>
                        </div>
                    </div>
                </div>
                
                <div class="absolute -bottom-4 -right-4 bg-white rounded-2xl p-4 shadow-xl">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-graduation-cap text-white"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Educação</div>
                            <div class="text-sm text-gray-600">Online</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection