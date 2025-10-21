@extends('layouts.demo')

@section('title', 'Projetos - DevStarter Kit Demo')
@section('page-title', 'Projetos')

@section('content')
<!-- Header with Actions -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Projetos</h1>
        <p class="text-gray-600 mt-1">Gerencie seus projetos e entregas</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="{{ route('demo.projects.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>Novo Projeto
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
                   placeholder="Nome do projeto ou cliente..."
                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Todos os status</option>
                <option value="active" {{ $status === 'active' ? 'selected' : '' }}>Ativo</option>
                <option value="completed" {{ $status === 'completed' ? 'selected' : '' }}>Concluído</option>
                <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>Pendente</option>
            </select>
        </div>
        
        <div class="flex items-end">
            <button type="submit" class="w-full bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition-colors">
                <i class="fas fa-search mr-2"></i>Filtrar
            </button>
        </div>
    </form>
</div>

<!-- Projects Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($projects as $project)
    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
        <!-- Project Header -->
        <div class="flex items-start justify-between mb-4">
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $project['name'] }}</h3>
                <p class="text-sm text-gray-600">{{ $project['client'] }}</p>
            </div>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                {{ $project['status'] === 'active' ? 'bg-green-100 text-green-800' : 
                   ($project['status'] === 'completed' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800') }}">
                {{ $project['status'] === 'active' ? 'Ativo' : 
                   ($project['status'] === 'completed' ? 'Concluído' : 'Pendente') }}
            </span>
        </div>

        <!-- Project Description -->
        <p class="text-sm text-gray-600 mb-4">{{ $project['description'] }}</p>

        <!-- Progress Bar -->
        <div class="mb-4">
            <div class="flex justify-between text-sm text-gray-600 mb-1">
                <span>Progresso</span>
                <span>{{ $project['progress'] }}%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-blue-600 h-2 rounded-full transition-all duration-300" 
                     style="width: {{ $project['progress'] }}%"></div>
            </div>
        </div>

        <!-- Project Info -->
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <p class="text-xs text-gray-500">Orçamento</p>
                <p class="text-sm font-semibold text-gray-900">R$ {{ number_format($project['budget'], 2, ',', '.') }}</p>
            </div>
            <div>
                <p class="text-xs text-gray-500">Prazo</p>
                <p class="text-sm font-semibold text-gray-900">{{ \Carbon\Carbon::parse($project['end_date'])->format('d/m/Y') }}</p>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-between pt-4 border-t border-gray-200">
            <div class="flex space-x-2">
                <a href="{{ route('demo.projects.show', $project['id']) }}" 
                   class="text-blue-600 hover:text-blue-900 p-1 rounded">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('demo.projects.edit', $project['id']) }}" 
                   class="text-yellow-600 hover:text-yellow-900 p-1 rounded">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{ route('demo.projects.export', $project['id']) }}" 
                   class="text-green-600 hover:text-green-900 p-1 rounded">
                    <i class="fas fa-download"></i>
                </a>
            </div>
            <form action="{{ route('demo.projects.destroy', $project['id']) }}" method="POST" class="inline" 
                  onsubmit="return confirm('Tem certeza que deseja excluir este projeto?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900 p-1 rounded">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
        </div>
    </div>
    @empty
    <div class="col-span-full">
        <div class="bg-white rounded-xl shadow-lg p-12 text-center">
            <i class="fas fa-project-diagram text-4xl text-gray-300 mb-4"></i>
            <p class="text-lg text-gray-500">Nenhum projeto encontrado</p>
            <p class="text-sm text-gray-400">Tente ajustar os filtros ou criar um novo projeto</p>
        </div>
    </div>
    @endforelse
</div>

<!-- Summary Stats -->
<div class="mt-8 grid grid-cols-1 md:grid-cols-4 gap-6">
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-project-diagram text-blue-600 text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Total de Projetos</p>
                <p class="text-2xl font-bold text-gray-900">{{ $projects->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-check-circle text-green-600 text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Concluídos</p>
                <p class="text-2xl font-bold text-gray-900">{{ $projects->where('status', 'completed')->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-clock text-yellow-600 text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Em Andamento</p>
                <p class="text-2xl font-bold text-gray-900">{{ $projects->where('status', 'active')->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                <i class="fas fa-dollar-sign text-purple-600 text-xl"></i>
            </div>
            <div>
                <p class="text-sm text-gray-600">Faturamento Total</p>
                <p class="text-2xl font-bold text-gray-900">R$ {{ number_format($projects->sum('budget'), 2, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
