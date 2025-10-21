@extends('layouts.demo')

@section('title', 'Editar Usuário - DevStarter Kit Demo')
@section('page-title', 'Editar Usuário')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('demo.users.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Editar Usuário</h1>
                <p class="text-gray-600 mt-1">Atualize as informações do usuário</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('demo.users.update', $user['id']) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div class="md:col-span-2">
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Nome Completo *
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $user['name']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
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
                           value="{{ old('email', $user['email']) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
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
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            required>
                        <option value="">Selecione uma função</option>
                        <option value="admin" {{ old('role', $user['role']) === 'admin' ? 'selected' : '' }}>Administrador</option>
                        <option value="moderator" {{ old('role', $user['role']) === 'moderator' ? 'selected' : '' }}>Moderador</option>
                        <option value="user" {{ old('role', $user['role']) === 'user' ? 'selected' : '' }}>Usuário</option>
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
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            required>
                        <option value="">Selecione um status</option>
                        <option value="active" {{ old('status', $user['status']) === 'active' ? 'selected' : '' }}>Ativo</option>
                        <option value="inactive" {{ old('status', $user['status']) === 'inactive' ? 'selected' : '' }}>Inativo</option>
                    </select>
                    @error('status')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="md:col-span-2">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Nova Senha
                    </label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                           placeholder="Deixe em branco para manter a senha atual">
                    <p class="text-sm text-gray-500 mt-1">Deixe em branco para manter a senha atual</p>
                </div>
            </div>

            <!-- Role Permissions -->
            <div class="mt-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Permissões por Função</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="border border-gray-200 rounded-lg p-4">
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
                    
                    <div class="border border-gray-200 rounded-lg p-4">
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
                    
                    <div class="border border-gray-200 rounded-lg p-4">
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
                <a href="{{ route('demo.users.show', $user['id']) }}" 
                   class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-save mr-2"></i>Salvar Alterações
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
