@extends('layouts.app')

@section('title', 'Cadastrar - EduPlatform')

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
                    <i class="fas fa-rocket text-yellow-400 mr-2"></i>
                    Comece sua jornada
                </div>
                
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                    Crie sua
                    <span class="text-gradient-yellow-orange">
                        conta
                    </span>
                </h1>
                
                <p class="text-xl md:text-2xl mb-8 text-blue-100 leading-relaxed">
                    Junte-se a milhares de estudantes que já transformaram suas vidas
                </p>
                
                <!-- Benefits -->
                <div class="space-y-4 mb-8">
                    <div class="flex items-center text-blue-200">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span>Acesso a centenas de cursos</span>
                    </div>
                    <div class="flex items-center text-blue-200">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span>Certificados reconhecidos</span>
                    </div>
                    <div class="flex items-center text-blue-200">
                        <i class="fas fa-check-circle text-green-400 mr-3"></i>
                        <span>Comunidade ativa</span>
                    </div>
                </div>
                
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
            
            <!-- Right Side - Register Form -->
            <div class="relative">
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 shadow-2xl border border-white/20">
                    <div class="text-center mb-8">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-user-plus text-white text-2xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-white mb-2">Crie sua conta</h2>
                        <p class="text-blue-100">Preencha os dados para começar</p>
                    </div>
                    
                    <form method="POST" action="{{ route('register') }}" class="space-y-6">
                        @csrf
                        
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-semibold text-white mb-2">
                                <i class="fas fa-user mr-2"></i>Nome completo
                            </label>
                            <input id="name" 
                                   name="name" 
                                   type="text" 
                                   autocomplete="name" 
                                   required 
                                   value="{{ old('name') }}"
                                   class="w-full px-4 py-3 bg-white/20 backdrop-blur-sm border border-white/30 rounded-xl text-white placeholder-blue-200 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition @error('name') border-red-400 @enderror" 
                                   placeholder="Seu nome completo">
                            @error('name')
                                <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                            @enderror
                        </div>
                        
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
                        
                        <!-- Role -->
                        <div>
                            <label for="role" class="block text-sm font-semibold text-white mb-2">
                                <i class="fas fa-user-tag mr-2"></i>Tipo de conta
                            </label>
                            <select id="role" 
                                    name="role" 
                                    required 
                                    class="w-full px-4 py-3 bg-white/20 backdrop-blur-sm border border-white/30 rounded-xl text-white focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition @error('role') border-red-400 @enderror">
                                <option value="" class="bg-gray-800">Selecione uma opção</option>
                                <option value="student" {{ old('role') == 'student' ? 'selected' : '' }} class="bg-gray-800">🎓 Aluno - Quero aprender</option>
                                <option value="instructor" {{ old('role') == 'instructor' ? 'selected' : '' }} class="bg-gray-800">👨‍🏫 Instrutor - Quero ensinar</option>
                            </select>
                            @error('role')
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
                                   autocomplete="new-password" 
                                   required 
                                   class="w-full px-4 py-3 bg-white/20 backdrop-blur-sm border border-white/30 rounded-xl text-white placeholder-blue-200 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition @error('password') border-red-400 @enderror" 
                                   placeholder="Mínimo 8 caracteres">
                            @error('password')
                                <p class="mt-2 text-sm text-red-300">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-white mb-2">
                                <i class="fas fa-lock mr-2"></i>Confirmar senha
                            </label>
                            <input id="password_confirmation" 
                                   name="password_confirmation" 
                                   type="password" 
                                   autocomplete="new-password" 
                                   required 
                                   class="w-full px-4 py-3 bg-white/20 backdrop-blur-sm border border-white/30 rounded-xl text-white placeholder-blue-200 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 transition" 
                                   placeholder="Digite a senha novamente">
                        </div>
                        
                        <!-- Terms -->
                        <div class="flex items-start">
                            <input id="terms" 
                                   name="terms" 
                                   type="checkbox" 
                                   required 
                                   class="h-4 w-4 text-yellow-400 focus:ring-yellow-400 border-white/30 rounded bg-white/20 mt-1">
                            <label for="terms" class="ml-2 text-sm text-white">
                                Aceito os <a href="#" class="text-yellow-300 hover:text-yellow-200 transition">termos de uso</a> e <a href="#" class="text-yellow-300 hover:text-yellow-200 transition">política de privacidade</a>
                            </label>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full bg-gradient-yellow-orange text-white py-3 rounded-xl font-bold text-lg hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                            <i class="fas fa-rocket mr-2"></i>
                            Criar Conta Grátis
                        </button>
                        
                        <!-- Login Link -->
                        <div class="text-center">
                            <p class="text-blue-200">
                                Já tem uma conta? 
                                <a href="{{ route('login') }}" class="text-yellow-300 hover:text-yellow-200 font-semibold transition">
                                    Entrar aqui
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
                
                <!-- Floating Cards -->
                <div class="absolute -top-4 -left-4 bg-white rounded-2xl p-4 shadow-xl">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-graduation-cap text-white"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Grátis</div>
                            <div class="text-sm text-gray-600">Para começar</div>
                        </div>
                    </div>
                </div>
                
                <div class="absolute -bottom-4 -right-4 bg-white rounded-2xl p-4 shadow-xl">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-star text-white"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">4.9/5</div>
                            <div class="text-sm text-gray-600">Avaliação</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection