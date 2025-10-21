@extends('layouts.demo')

@section('title', 'Novo Usuário - DevStarter Kit Demo')
@section('page-title', 'Novo Usuário')
@section('page-description', 'Criar um novo usuário no sistema')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <div class="flex items-center">
            <a href="{{ route('demo.users.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Novo Usuário</h1>
                <p class="text-gray-600 mt-2">Preencha os dados para criar um novo usuário</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-8 border border-gray-200/50">
        <form action="{{ route('demo.users.store') }}" method="POST">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div class="md:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Nome Completo *
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                           placeholder="Digite o nome completo"
                           required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="md:col-span-2">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email *
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                           placeholder="usuario@exemplo.com"
                           required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-2">
                        Função *
                    </label>
                    <select id="role" 
                            name="role" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            required>
                        <option value="">Selecione uma função</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrador</option>
                        <option value="moderator" {{ old('role') === 'moderator' ? 'selected' : '' }}>Moderador</option>
                        <option value="user" {{ old('role') === 'user' ? 'selected' : '' }}>Usuário</option>
                    </select>
                    @error('role')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                        Status *
                    </label>
                    <select id="status" 
                            name="status" 
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            required>
                        <option value="">Selecione um status</option>
                        <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>Ativo</option>
                        <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>Inativo</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Role Permissions -->
            <div class="mt-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Permissões por Função</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="border border-gray-200 rounded-xl p-4">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-crown text-red-500 mr-2"></i>
                            <span class="font-medium text-gray-900">Administrador</span>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Acesso total ao sistema</li>
                            <li>• Gerenciar usuários</li>
                            <li>• Configurações avançadas</li>
                        </ul>
                    </div>
                    
                    <div class="border border-gray-200 rounded-xl p-4">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-shield-alt text-yellow-500 mr-2"></i>
                            <span class="font-medium text-gray-900">Moderador</span>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Gerenciar conteúdo</li>
                            <li>• Visualizar relatórios</li>
                            <li>• Acesso limitado</li>
                        </ul>
                    </div>
                    
                    <div class="border border-gray-200 rounded-xl p-4">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-user text-blue-500 mr-2"></i>
                            <span class="font-medium text-gray-900">Usuário</span>
                        </div>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Acesso básico</li>
                            <li>• Visualizar dados</li>
                            <li>• Funcionalidades limitadas</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('demo.users.index') }}" 
                   class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <i class="fas fa-save mr-2"></i>Criar Usuário
                </button>
            </div>
        </form>
    </div>
</div>
@endsection