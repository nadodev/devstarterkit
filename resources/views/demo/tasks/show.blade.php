@extends('layouts.demo')

@section('title', 'Detalhes da Tarefa - DevStarter Kit Demo')
@section('page-title', 'Detalhes da Tarefa')
@section('page-description', 'Visualizar informações completas da tarefa')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-6 mb-8 border border-gray-200/50">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('demo.tasks.index') }}" 
                   class="text-gray-600 hover:text-gray-900 mr-4">
                    <i class="fas fa-arrow-left text-xl"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ $task->title }}</h1>
                    <p class="text-gray-600">Criada em {{ $task->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                    {{ $task->status === 'pending' ? 'bg-gray-100 text-gray-800' : 
                       ($task->status === 'in_progress' ? 'bg-blue-100 text-blue-800' : 
                       ($task->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800')) }}">
                    {{ $task->status_text }}
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                    {{ $task->priority === 'low' ? 'bg-green-100 text-green-800' : 
                       ($task->priority === 'medium' ? 'bg-yellow-100 text-yellow-800' : 
                       ($task->priority === 'high' ? 'bg-orange-100 text-orange-800' : 'bg-red-100 text-red-800')) }}">
                    {{ $task->priority_text }}
                </span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Description -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-gray-200/50">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Descrição</h3>
                @if($task->description)
                    <div class="prose max-w-none">
                        <p class="text-gray-700 whitespace-pre-wrap">{{ $task->description }}</p>
                    </div>
                @else
                    <p class="text-gray-500 italic">Nenhuma descrição fornecida</p>
                @endif
            </div>

            <!-- Notes -->
            @if($task->notes)
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-gray-200/50">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Observações</h3>
                <div class="prose max-w-none">
                    <p class="text-gray-700 whitespace-pre-wrap">{{ $task->notes }}</p>
                </div>
            </div>
            @endif

            <!-- Actions -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-gray-200/50">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Ações</h3>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('demo.tasks.edit', $task) }}" 
                       class="inline-flex items-center px-4 py-2 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors">
                        <i class="fas fa-edit mr-2"></i>Editar
                    </a>
                    
                    <form action="{{ route('demo.tasks.destroy', $task) }}" method="POST" class="inline" 
                          onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                            <i class="fas fa-trash mr-2"></i>Excluir
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Task Info -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-gray-200/50">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Informações</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $task->status_text }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Prioridade</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $task->priority_text }}</p>
                    </div>
                    
                    @if($task->due_date)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Data de Vencimento</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $task->due_date->format('d/m/Y') }}</p>
                    </div>
                    @endif
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Criada em</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $task->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Última atualização</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $task->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Assignment -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-gray-200/50">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Responsável</h3>
                @if($task->assignedUser)
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-user text-blue-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">{{ $task->assignedUser->name }}</p>
                            <p class="text-sm text-gray-500">{{ ucfirst($task->assignedUser->role) }}</p>
                        </div>
                    </div>
                @else
                    <p class="text-gray-500 italic">Nenhum responsável atribuído</p>
                @endif
            </div>

            <!-- Project -->
            @if($task->project)
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-gray-200/50">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Projeto</h3>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-project-diagram text-purple-600"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">{{ $task->project->name }}</p>
                        <p class="text-sm text-gray-500">{{ $task->project->company }}</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Creator -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg p-6 border border-gray-200/50">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Criado por</h3>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-user-plus text-green-600"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">{{ $task->creator->name }}</p>
                        <p class="text-sm text-gray-500">{{ ucfirst($task->creator->role) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
