@extends('layouts.demo')

@section('title', 'Clientes - DevStarter Kit Demo')
@section('page-title', 'Clientes')

@section('content')
<!-- Header with Actions -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Clientes</h1>
        <p class="text-gray-600 mt-1">Gerencie seus clientes e parceiros</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="{{ route('demo.clients.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>Novo Cliente
        </a>
    </div>
</div>

<!-- Filters -->
<div class="bg-white rounded-xl shadow-lg p-6 mb-6">
    <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Buscar</label>
            <input type="text" 
                   name="search" 
                   value="{{ $search }}"
                   placeholder="Nome, email ou empresa..."
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Todos os status</option>
                <option value="active" {{ $status === 'active' ? 'selected' : '' }}>Ativo</option>
                <option value="inactive" {{ $status === 'inactive' ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>
        
        <div class="flex items-end">
            <button type="submit" class="w-full bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                <i class="fas fa-search mr-2"></i>Filtrar
            </button>
        </div>
    </form>
</div>

<!-- Clients Table -->
<div class="bg-white rounded-xl shadow-lg overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Empresa</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Projetos</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Criado em</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($clients as $client)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <div class="h-10 w-10 rounded-full bg-blue-500 flex items-center justify-center">
                                    <span class="text-white font-medium">{{ substr($client['name'], 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{ $client['name'] }}</div>
                                <div class="text-sm text-gray-500">{{ $client['email'] }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $client['company'] }}</div>
                        <div class="text-sm text-gray-500">{{ $client['phone'] }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $client['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $client['status'] === 'active' ? 'Ativo' : 'Inativo' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $client['projects_count'] }} projeto(s)
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($client['created_at'])->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end space-x-2">
                            <a href="{{ route('demo.clients.show', $client['id']) }}" 
                               class="text-blue-600 hover:text-blue-900 p-1 rounded">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('demo.clients.edit', $client['id']) }}" 
                               class="text-yellow-600 hover:text-yellow-900 p-1 rounded">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('demo.clients.export', $client['id']) }}" 
                               class="text-green-600 hover:text-green-900 p-1 rounded">
                                <i class="fas fa-download"></i>
                            </a>
                            <form action="{{ route('demo.clients.destroy', $client['id']) }}" method="POST" class="inline" 
                                  onsubmit="return confirm('Tem certeza que deseja excluir este cliente?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 p-1 rounded">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                        <i class="fas fa-user-tie text-4xl text-gray-300 mb-4"></i>
                        <p class="text-lg">Nenhum cliente encontrado</p>
                        <p class="text-sm">Tente ajustar os filtros ou criar um novo cliente</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination Info -->
<div class="mt-6 flex items-center justify-between">
    <div class="text-sm text-gray-700">
        Mostrando {{ $clients->count() }} de {{ $clients->count() }} clientes
    </div>
    <div class="flex space-x-2">
        <button class="px-3 py-1 bg-gray-100 text-gray-600 rounded-lg text-sm hover:bg-gray-200">
            <i class="fas fa-download mr-1"></i>Exportar CSV
        </button>
        <button class="px-3 py-1 bg-gray-100 text-gray-600 rounded-lg text-sm hover:bg-gray-200">
            <i class="fas fa-file-pdf mr-1"></i>Exportar PDF
        </button>
    </div>
</div>
@endsection
