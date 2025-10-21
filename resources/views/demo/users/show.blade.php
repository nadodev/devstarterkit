@extends('layouts.demo')

@section('title', 'Detalhes do Usuário - DevStarter Kit Demo')
@section('page-title', 'Detalhes do Usuário')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('demo.users.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detalhes do Usuário</h1>
                <p class="text-gray-600 mt-1">Informações completas do usuário</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- User Info -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center mb-6">
                    <img src="{{ $user['avatar'] }}" alt="{{ $user['name'] }}" class="w-16 h-16 rounded-full mr-4">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">{{ $user['name'] }}</h2>
                        <p class="text-gray-600">{{ $user['email'] }}</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $user['role'] === 'admin' ? 'bg-red-100 text-red-800' : 
                               ($user['role'] === 'moderator' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800') }}">
                            {{ ucfirst($user['role']) }}
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nome Completo</label>
                        <p class="text-gray-900">{{ $user['name'] }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <p class="text-gray-900">{{ $user['email'] }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Função</label>
                        <p class="text-gray-900">{{ ucfirst($user['role']) }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $user['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $user['status'] === 'active' ? 'Ativo' : 'Inativo' }}
                        </span>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Criado em</label>
                        <p class="text-gray-900">{{ \Carbon\Carbon::parse($user['created_at'])->format('d/m/Y H:i') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Última Atividade</label>
                        <p class="text-gray-900">Há 2 horas</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions & Stats -->
        <div class="space-y-6">
            <!-- Actions -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Ações</h3>
                <div class="space-y-3">
                    <a href="{{ route('demo.users.edit', $user['id']) }}" 
                       class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center">
                        <i class="fas fa-edit mr-2"></i>Editar Usuário
                    </a>
                    
                    <form action="{{ route('demo.users.toggle-status', $user['id']) }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" 
                                class="w-full {{ $user['status'] === 'active' ? 'bg-gray-600 hover:bg-gray-700' : 'bg-green-600 hover:bg-green-700' }} text-white px-4 py-2 rounded-lg transition-colors flex items-center justify-center">
                            <i class="fas fa-{{ $user['status'] === 'active' ? 'ban' : 'check' }} mr-2"></i>
                            {{ $user['status'] === 'active' ? 'Desativar' : 'Ativar' }} Usuário
                        </button>
                    </form>
                    
                    <form action="{{ route('demo.users.destroy', $user['id']) }}" method="POST" 
                          onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors flex items-center justify-center">
                            <i class="fas fa-trash mr-2"></i>Excluir Usuário
                        </button>
                    </form>
                </div>
            </div>

            <!-- Stats -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Estatísticas</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Projetos Ativos</span>
                        <span class="text-lg font-semibold text-gray-900">3</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Tarefas Concluídas</span>
                        <span class="text-lg font-semibold text-gray-900">47</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Horas Trabalhadas</span>
                        <span class="text-lg font-semibold text-gray-900">156h</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Último Login</span>
                        <span class="text-lg font-semibold text-gray-900">2h atrás</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
