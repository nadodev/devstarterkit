@extends('layouts.demo')

@section('title', 'Tarefas - DevStarter Kit Demo')
@section('page-title', 'Gerenciamento de Tarefas')
@section('page-description', 'Organize e acompanhe o progresso das tarefas')

@section('content')
<!-- Header with Actions -->
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
    <div>
        <h1 class="text-3xl font-bold text-gray-900">Tarefas</h1>
        @if(request('project_id'))
            @php
                $project = \App\Models\User::find(request('project_id'));
            @endphp
            @if($project)
                <p class="text-gray-600 mt-2">Tarefas do projeto: <span class="font-semibold text-blue-600">{{ $project->name }}</span></p>
                <div class="mt-2">
                    <a href="{{ route('demo.projects.show', $project->id) }}" 
                       class="inline-flex items-center text-sm text-blue-600 hover:text-blue-800">
                        <i class="fas fa-arrow-left mr-1"></i>Voltar ao projeto
                    </a>
                </div>
            @endif
        @else
            <p class="text-gray-600 mt-2">Organize e acompanhe o progresso das tarefas</p>
        @endif
    </div>
    <div class="mt-4 sm:mt-0">
        <a href="{{ route('demo.tasks.create', request('project_id') ? ['project_id' => request('project_id')] : []) }}" 
           class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
            <i class="fas fa-plus mr-2"></i>Nova Tarefa
        </a>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200/50 card-hover">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mr-4">
                <i class="fas fa-tasks text-blue-600 text-xl"></i>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Total</p>
                <p class="text-2xl font-bold text-gray-900">{{ $tasks->total() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200/50 card-hover">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center mr-4">
                <i class="fas fa-clock text-yellow-600 text-xl"></i>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Pendentes</p>
                <p class="text-2xl font-bold text-gray-900">{{ $tasks->where('status', 'pending')->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200/50 card-hover">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mr-4">
                <i class="fas fa-play text-blue-600 text-xl"></i>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Em Andamento</p>
                <p class="text-2xl font-bold text-gray-900">{{ $tasks->where('status', 'in_progress')->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200/50 card-hover">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mr-4">
                <i class="fas fa-check text-green-600 text-xl"></i>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Concluídas</p>
                <p class="text-2xl font-bold text-gray-900">{{ $tasks->where('status', 'completed')->count() }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-6 mb-8 border border-gray-200/50">
    <form method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Buscar</label>
            <input type="text" 
                   name="search" 
                   value="{{ request('search') }}"
                   placeholder="Título ou descrição..."
                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <select name="status" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Todos os status</option>
                <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pendente</option>
                <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>Em Andamento</option>
                <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Concluída</option>
                <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Prioridade</label>
            <select name="priority" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Todas as prioridades</option>
                <option value="low" {{ request('priority') === 'low' ? 'selected' : '' }}>Baixa</option>
                <option value="medium" {{ request('priority') === 'medium' ? 'selected' : '' }}>Média</option>
                <option value="high" {{ request('priority') === 'high' ? 'selected' : '' }}>Alta</option>
                <option value="urgent" {{ request('priority') === 'urgent' ? 'selected' : '' }}>Urgente</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Responsável</label>
            <select name="assigned_to" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                <option value="">Todos os responsáveis</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ request('assigned_to') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="flex items-end">
            <button type="submit" class="w-full bg-gray-600 text-white px-4 py-3 rounded-xl hover:bg-gray-700 transition-colors">
                <i class="fas fa-search mr-2"></i>Filtrar
            </button>
        </div>
    </form>
</div>

<!-- Tasks List -->
<div class="space-y-4">
    @forelse($tasks as $task)
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-gray-200/50 card-hover">
        <div class="flex items-start justify-between">
            <div class="flex-1">
                <div class="flex items-center mb-3">
                    <h3 class="text-lg font-semibold text-gray-900 mr-3">{{ $task->title }}</h3>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                        {{ $task->status === 'pending' ? 'bg-gray-100 text-gray-800' : 
                           ($task->status === 'in_progress' ? 'bg-blue-100 text-blue-800' : 
                           ($task->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800')) }}">
                        {{ $task->status_text }}
                    </span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ml-2
                        {{ $task->priority === 'low' ? 'bg-green-100 text-green-800' : 
                           ($task->priority === 'medium' ? 'bg-yellow-100 text-yellow-800' : 
                           ($task->priority === 'high' ? 'bg-orange-100 text-orange-800' : 'bg-red-100 text-red-800')) }}">
                        {{ $task->priority_text }}
                    </span>
                </div>
                
                @if($task->description)
                <p class="text-gray-600 mb-3">{{ Str::limit($task->description, 150) }}</p>
                @endif
                
                <div class="flex items-center text-sm text-gray-500 space-x-4">
                    @if($task->assignedUser)
                    <div class="flex items-center">
                        <i class="fas fa-user mr-1"></i>
                        <span>{{ $task->assignedUser->name }}</span>
                    </div>
                    @endif
                    
                    @if($task->due_date)
                    <div class="flex items-center">
                        <i class="fas fa-calendar mr-1"></i>
                        <span>{{ $task->due_date->format('d/m/Y') }}</span>
                    </div>
                    @endif
                    
                    <div class="flex items-center">
                        <i class="fas fa-clock mr-1"></i>
                        <span>{{ $task->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center space-x-2 ml-4">
                <a href="{{ route('demo.tasks.show', $task) }}" 
                   class="text-blue-600 hover:text-blue-900 p-2 rounded-lg hover:bg-blue-50 transition-colors">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('demo.tasks.edit', $task) }}" 
                   class="text-yellow-600 hover:text-yellow-900 p-2 rounded-lg hover:bg-yellow-50 transition-colors">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('demo.tasks.destroy', $task) }}" method="POST" class="inline" 
                      onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900 p-2 rounded-lg hover:bg-red-50 transition-colors">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-12 text-center">
        <i class="fas fa-tasks text-4xl text-gray-300 mb-4"></i>
        <p class="text-lg text-gray-500">Nenhuma tarefa encontrada</p>
        <p class="text-sm text-gray-400">Tente ajustar os filtros ou criar uma nova tarefa</p>
    </div>
    @endforelse
</div>

<!-- Pagination -->
@if($tasks->hasPages())
<div class="mt-8">
    {{ $tasks->links() }}
</div>
@endif
@endsection
