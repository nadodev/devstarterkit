@extends('layouts.demo')

@section('title', 'Detalhes do Projeto - DevStarter Kit Demo')
@section('page-title', 'Detalhes do Projeto')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('demo.projects.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Detalhes do Projeto</h1>
                <p class="text-gray-600 mt-1">Informações completas do projeto</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Project Info -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900">{{ $project['name'] }}</h2>
                        <p class="text-gray-600">{{ $project['client'] }}</p>
                    </div>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                        {{ $project['status'] === 'active' ? 'bg-green-100 text-green-800' : 
                           ($project['status'] === 'completed' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800') }}">
                        {{ $project['status'] === 'active' ? 'Ativo' : 
                           ($project['status'] === 'completed' ? 'Concluído' : 'Pendente') }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nome do Projeto</label>
                        <p class="text-gray-900">{{ $project['name'] }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Cliente</label>
                        <p class="text-gray-900">{{ $project['client'] }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Orçamento</label>
                        <p class="text-gray-900">R$ {{ number_format($project['budget'], 2, ',', '.') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            {{ $project['status'] === 'active' ? 'bg-green-100 text-green-800' : 
                               ($project['status'] === 'completed' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ $project['status'] === 'active' ? 'Ativo' : 
                               ($project['status'] === 'completed' ? 'Concluído' : 'Pendente') }}
                        </span>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Data de Início</label>
                        <p class="text-gray-900">{{ \Carbon\Carbon::parse($project['start_date'])->format('d/m/Y') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Data de Entrega</label>
                        <p class="text-gray-900">{{ \Carbon\Carbon::parse($project['end_date'])->format('d/m/Y') }}</p>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Descrição</label>
                    <p class="text-gray-900">{{ $project['description'] }}</p>
                </div>
            </div>

            <!-- Progress -->
            <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Progresso do Projeto</h3>
                <div class="mb-4">
                    <div class="flex justify-between text-sm text-gray-600 mb-2">
                        <span>Progresso Atual</span>
                        <span>{{ $project['progress'] }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div class="bg-blue-600 h-3 rounded-full transition-all duration-500" 
                             style="width: {{ $project['progress'] }}%"></div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600">{{ $project['progress'] }}%</div>
                        <div class="text-sm text-gray-600">Concluído</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-green-600">R$ {{ number_format($project['budget'] * $project['progress'] / 100, 2, ',', '.') }}</div>
                        <div class="text-sm text-gray-600">Faturado</div>
                    </div>
                    <div class="text-center">
                        @php
                            $endDate = \Carbon\Carbon::parse($project['end_date']);
                            $isOverdue = now()->isAfter($endDate);
                            $daysRemaining = $isOverdue ? now()->diffInDays($endDate) : $endDate->diffInDays(now());
                        @endphp
                        <div class="text-2xl font-bold {{ $isOverdue ? 'text-red-600' : 'text-purple-600' }}">
                            {{ $daysRemaining }} dias
                        </div>
                        <div class="text-sm {{ $isOverdue ? 'text-red-600' : 'text-gray-600' }}">
                            {{ $isOverdue ? 'Atrasado' : 'Restantes' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tasks -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Tarefas do Projeto</h3>
                    <a href="{{ route('demo.tasks.index', ['project_id' => $project['id']]) }}" 
                       class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                        Ver todas →
                    </a>
                </div>
                <div class="space-y-3">
                    @forelse($projectTasks->take(4) as $task)
                    <div class="flex items-center justify-between p-3 rounded-lg
                        {{ $task->status === 'completed' ? 'bg-green-50' : 
                           ($task->status === 'in_progress' ? 'bg-blue-50' : 
                           ($task->status === 'cancelled' ? 'bg-red-50' : 'bg-gray-50')) }}">
                        <div class="flex items-center">
                            <i class="fas {{ $task->status === 'completed' ? 'fa-check-circle text-green-500' : 
                                           ($task->status === 'in_progress' ? 'fa-clock text-blue-500' : 
                                           ($task->status === 'cancelled' ? 'fa-times-circle text-red-500' : 'fa-circle text-gray-300')) }} mr-3"></i>
                            <div>
                                <span class="text-sm font-medium text-gray-900">{{ $task->title }}</span>
                                @if($task->assignedUser)
                                <p class="text-xs text-gray-500">{{ $task->assignedUser->name }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-xs {{ $task->status === 'completed' ? 'text-green-600' : 
                                                   ($task->status === 'in_progress' ? 'text-blue-600' : 
                                                   ($task->status === 'cancelled' ? 'text-red-600' : 'text-gray-500')) }}">
                                {{ $task->status_text }}
                            </span>
                            @if($task->due_date)
                            <p class="text-xs text-gray-400 mt-1">{{ $task->due_date->format('d/m/Y') }}</p>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4">
                        <i class="fas fa-tasks text-2xl text-gray-300 mb-2"></i>
                        <p class="text-sm text-gray-500">Nenhuma tarefa encontrada</p>
                        <a href="{{ route('demo.tasks.create', ['project_id' => $project['id']]) }}" 
                           class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            Criar primeira tarefa
                        </a>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Actions & Stats -->
        <div class="space-y-6">
            <!-- Actions -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Ações</h3>
                <div class="space-y-3">
                    <a href="{{ route('demo.projects.edit', $project['id']) }}" 
                       class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center">
                        <i class="fas fa-edit mr-2"></i>Editar Projeto
                    </a>
                    
                    <a href="{{ route('demo.tasks.index', ['project_id' => $project['id']]) }}" 
                       class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors flex items-center justify-center">
                        <i class="fas fa-tasks mr-2"></i>Gerenciar Tarefas
                    </a>
                    
                    <a href="{{ route('demo.projects.export', $project['id']) }}" 
                       class="w-full bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors flex items-center justify-center">
                        <i class="fas fa-download mr-2"></i>Exportar Relatório
                    </a>
                    
                    <form action="{{ route('demo.projects.destroy', $project['id']) }}" method="POST" 
                          onsubmit="return confirm('Tem certeza que deseja excluir este projeto?')" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors flex items-center justify-center">
                            <i class="fas fa-trash mr-2"></i>Excluir Projeto
                        </button>
                    </form>
                </div>
            </div>

            <!-- Stats -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Estatísticas</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Orçamento Total</span>
                        <span class="text-lg font-semibold text-gray-900">R$ {{ number_format($project['budget'], 2, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Valor Faturado</span>
                        <span class="text-lg font-semibold text-gray-900">R$ {{ number_format($project['budget'] * $project['progress'] / 100, 2, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Tarefas Concluídas</span>
                        <span class="text-lg font-semibold text-gray-900">2/4</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Dias Restantes</span>
                        @php
                            $endDate = \Carbon\Carbon::parse($project['end_date']);
                            $isOverdue = now()->isAfter($endDate);
                            $daysRemaining = $isOverdue ? now()->diffInDays($endDate) : $endDate->diffInDays(now());
                        @endphp
                        <span class="text-lg font-semibold {{ $isOverdue ? 'text-red-600' : 'text-gray-900' }}">
                            {{ $isOverdue ? $daysRemaining . ' dias atrasado' : $daysRemaining . ' dias' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Team -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Equipe</h3>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <img src="https://ui-avatars.com/api/?name=João+Silva&background=3B82F6&color=fff" alt="João Silva" class="w-8 h-8 rounded-full mr-3">
                        <div>
                            <p class="text-sm font-medium text-gray-900">João Silva</p>
                            <p class="text-xs text-gray-500">Desenvolvedor Full Stack</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <img src="https://ui-avatars.com/api/?name=Maria+Santos&background=10B981&color=fff" alt="Maria Santos" class="w-8 h-8 rounded-full mr-3">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Maria Santos</p>
                            <p class="text-xs text-gray-500">Designer UX/UI</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                        <img src="https://ui-avatars.com/api/?name=Pedro+Costa&background=8B5CF6&color=fff" alt="Pedro Costa" class="w-8 h-8 rounded-full mr-3">
                        <div>
                            <p class="text-sm font-medium text-gray-900">Pedro Costa</p>
                            <p class="text-xs text-gray-500">Gerente de Projeto</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
