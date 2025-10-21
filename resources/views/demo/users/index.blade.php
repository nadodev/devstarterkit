@extends('layouts.demo')

@section('title', 'Usuários - DevStarter Kit Demo')
@section('page-title', 'Usuários')
@section('page-description', 'Gerencie usuários e permissões do sistema')

@section('content')
<!-- Header with Actions -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Usuários</h1>
        <p class="text-gray-600 mt-2">Gerencie usuários e permissões do sistema</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="{{ route('demo.users.create') }}" 
           class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
            <i class="fas fa-plus mr-2"></i>Novo Usuário
        </a>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200/50 card-hover">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mr-4">
                <i class="fas fa-users text-blue-600 text-xl"></i>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Total</p>
                <p class="text-2xl font-bold text-gray-900">{{ $users->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200/50 card-hover">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mr-4">
                <i class="fas fa-user-check text-green-600 text-xl"></i>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Ativos</p>
                <p class="text-2xl font-bold text-gray-900">{{ $users->where('status', 'active')->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200/50 card-hover">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mr-4">
                <i class="fas fa-user-times text-red-600 text-xl"></i>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Inativos</p>
                <p class="text-2xl font-bold text-gray-900">{{ $users->where('status', 'inactive')->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200/50 card-hover">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mr-4">
                <i class="fas fa-crown text-purple-600 text-xl"></i>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Admins</p>
                <p class="text-2xl font-bold text-gray-900">{{ $users->where('role', 'admin')->count() }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-6 mb-8 border border-gray-200/50">
    <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Buscar</label>
            <input type="text" 
                   name="search" 
                   value="{{ $search }}"
                   placeholder="Nome, email ou função..."
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Função</label>
            <select name="role" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Todas as funções</option>
                <option value="admin" {{ $role === 'admin' ? 'selected' : '' }}>Administrador</option>
                <option value="moderator" {{ $role === 'moderator' ? 'selected' : '' }}>Moderador</option>
                <option value="user" {{ $role === 'user' ? 'selected' : '' }}>Usuário</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <select name="status" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Todos os status</option>
                <option value="active" {{ $status === 'active' ? 'selected' : '' }}>Ativo</option>
                <option value="inactive" {{ $status === 'inactive' ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>
        
        <div class="flex items-end">
            <button type="submit" class="w-full bg-gray-600 text-white px-4 py-3 rounded-xl hover:bg-gray-700 transition-colors">
                <i class="fas fa-search mr-2"></i>Filtrar
            </button>
        </div>
    </form>
</div>

<!-- Users Table -->
<div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg overflow-hidden border border-gray-200/50">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50/80">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuário</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Função</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Última Atividade</th>
                    <th class="px-6 py-4 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($users as $user)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <img src="{{ $user['avatar'] }}" alt="{{ $user['name'] }}" class="w-10 h-10 rounded-full mr-4 border-2 border-gray-200">
                            <div>
                                <div class="text-sm font-medium text-gray-900">{{ $user['name'] }}</div>
                                <div class="text-sm text-gray-500">{{ $user['email'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $user['role'] === 'admin' ? 'bg-red-100 text-red-800' : 
                               ($user['role'] === 'moderator' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                            <i class="fas fa-{{ $user['role'] === 'admin' ? 'crown' : ($user['role'] === 'moderator' ? 'shield-alt' : 'user') }} mr-1"></i>
                            {{ ucfirst($user['role']) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $user['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            <div class="w-2 h-2 rounded-full mr-2 {{ $user['status'] === 'active' ? 'bg-green-400' : 'bg-gray-400' }}"></div>
                            {{ $user['status'] === 'active' ? 'Ativo' : 'Inativo' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($user['created_at'])->diffForHumans() }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end space-x-2">
                            <a href="{{ route('demo.users.show', $user['id']) }}" 
                               class="text-blue-600 hover:text-blue-900 p-2 rounded-lg hover:bg-blue-50 transition-colors">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('demo.users.edit', $user['id']) }}" 
                               class="text-yellow-600 hover:text-yellow-900 p-2 rounded-lg hover:bg-yellow-50 transition-colors">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('demo.users.destroy', $user['id']) }}" method="POST" class="inline" 
                                  onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50 transition-colors">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                        <i class="fas fa-users text-4xl text-gray-300 mb-4"></i>
                        <p class="text-lg">Nenhum usuário encontrado</p>
                        <p class="text-sm">Tente ajustar os filtros ou criar um novo usuário</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination Info -->
<div class="mt-8 flex items-center justify-between">
    <div class="text-sm text-gray-700">
        Mostrando {{ $users->count() }} de {{ $users->count() }} usuários
    </div>
    <div class="flex space-x-2">
        <button class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm hover:bg-gray-200 transition-colors">
            <i class="fas fa-download mr-1"></i>Exportar CSV
        </button>
        <button class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm hover:bg-gray-200 transition-colors">
            <i class="fas fa-file-pdf mr-1"></i>Exportar PDF
        </button>
    </div>
</div>
@endsection