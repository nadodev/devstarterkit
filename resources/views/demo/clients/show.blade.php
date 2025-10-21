@extends('layouts.demo')

@section('title', 'Detalhes do Cliente - DevStarter Kit Demo')
@section('page-title', 'Detalhes do Cliente')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('demo.clients.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detalhes do Cliente</h1>
                <p class="text-gray-600 mt-1">Informações completas do cliente</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Client Info -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-16 h-16 rounded-full bg-blue-500 flex items-center justify-center mr-4">
                        <span class="text-white text-2xl font-bold">{{ substr($client['name'], 0, 1) }}</span>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">{{ $client['name'] }}</h2>
                        <p class="text-gray-600">{{ $client['company'] }}</p>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $client['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $client['status'] === 'active' ? 'Ativo' : 'Inativo' }}
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nome Completo</label>
                        <p class="text-gray-900">{{ $client['name'] }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <p class="text-gray-900">{{ $client['email'] }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Telefone</label>
                        <p class="text-gray-900">{{ $client['phone'] }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Empresa</label>
                        <p class="text-gray-900">{{ $client['company'] }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $client['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $client['status'] === 'active' ? 'Ativo' : 'Inativo' }}
                        </span>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Cadastrado em</label>
                        <p class="text-gray-900">{{ \Carbon\Carbon::parse($client['created_at'])->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Projects -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Projetos do Cliente</h3>
                <div class="space-y-4">
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-medium text-gray-900">Sistema de Vendas</h4>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Ativo
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">Sistema completo para gestão de vendas e estoque</p>
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>Orçamento: R$ 25.000</span>
                            <span>Progresso: 75%</span>
                        </div>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-medium text-gray-900">E-commerce Platform</h4>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Concluído
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">Plataforma de e-commerce com integração de pagamentos</p>
                        <div class="flex justify-between text-sm text-gray-500">
                            <span>Orçamento: R$ 45.000</span>
                            <span>Progresso: 100%</span>
                        </div>
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
                    <a href="{{ route('demo.clients.edit', $client['id']) }}" 
                       class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center">
                        <i class="fas fa-edit mr-2"></i>Editar Cliente
                    </a>
                    
                    <a href="{{ route('demo.projects.create') }}" 
                       class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors flex items-center justify-center">
                        <i class="fas fa-plus mr-2"></i>Novo Projeto
                    </a>
                    
                    <a href="{{ route('demo.clients.export', $client['id']) }}" 
                       class="w-full bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors flex items-center justify-center">
                        <i class="fas fa-download mr-2"></i>Exportar Dados
                    </a>
                    
                    <form action="{{ route('demo.clients.destroy', $client['id']) }}" method="POST" 
                          onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors flex items-center justify-center">
                            <i class="fas fa-trash mr-2"></i>Excluir Cliente
                        </button>
                    </form>
                </div>
            </div>

            <!-- Stats -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Estatísticas</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Total de Projetos</span>
                        <span class="text-lg font-semibold text-gray-900">{{ $client['projects_count'] }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Projetos Ativos</span>
                        <span class="text-lg font-semibold text-gray-900">1</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Projetos Concluídos</span>
                        <span class="text-lg font-semibold text-gray-900">1</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Faturamento Total</span>
                        <span class="text-lg font-semibold text-gray-900">R$ 70.000</span>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Informações de Contato</h3>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <i class="fas fa-envelope text-gray-400 mr-3"></i>
                        <span class="text-sm text-gray-600">{{ $client['email'] }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-phone text-gray-400 mr-3"></i>
                        <span class="text-sm text-gray-600">{{ $client['phone'] }}</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-building text-gray-400 mr-3"></i>
                        <span class="text-sm text-gray-600">{{ $client['company'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
