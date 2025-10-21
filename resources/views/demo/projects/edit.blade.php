@extends('layouts.demo')

@section('title', 'Editar Projeto - DevStarter Kit Demo')
@section('page-title', 'Editar Projeto')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center">
            <a href="{{ route('demo.projects.show', $project['id']) }}" class="text-gray-600 hover:text-gray-900 mr-4">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Editar Projeto</h1>
                <p class="text-gray-600 mt-1">Atualize as informações do projeto</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <form action="{{ route('demo.projects.update', $project['id']) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Project Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nome do Projeto *
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $project['name']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                               placeholder="Ex: Sistema de Vendas"
                               required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Client -->
                    <div>
                        <label for="client" class="block text-sm font-medium text-gray-700 mb-2">
                            Cliente *
                        </label>
                        <input type="text" 
                               id="client" 
                               name="client" 
                               value="{{ old('client', $project['client']) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                               placeholder="Nome do cliente"
                               required>
                        @error('client')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Budget -->
                    <div>
                        <label for="budget" class="block text-sm font-medium text-gray-700 mb-2">
                            Orçamento (R$) *
                        </label>
                        <input type="number" 
                               id="budget" 
                               name="budget" 
                               value="{{ old('budget', $project['budget']) }}"
                               min="0"
                               step="0.01"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                               placeholder="25000.00"
                               required>
                        @error('budget')
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
                            <option value="active" {{ old('status', $project['status']) === 'active' ? 'selected' : '' }}>Ativo</option>
                            <option value="completed" {{ old('status', $project['status']) === 'completed' ? 'selected' : '' }}>Concluído</option>
                            <option value="pending" {{ old('status', $project['status']) === 'pending' ? 'selected' : '' }}>Pendente</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Descrição *
                        </label>
                        <textarea id="description" 
                                  name="description" 
                                  rows="6"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                  placeholder="Descreva o projeto em detalhes..."
                                  required>{{ old('description', $project['description']) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Dates -->
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-2">
                                Data de Início *
                            </label>
                            <input type="date" 
                                   id="start_date" 
                                   name="start_date" 
                                   value="{{ old('start_date', $project['start_date']) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                   required>
                            @error('start_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">
                                Data de Entrega *
                            </label>
                            <input type="date" 
                                   id="end_date" 
                                   name="end_date" 
                                   value="{{ old('end_date', $project['end_date']) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                   required>
                            @error('end_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Progress -->
                    <div>
                        <label for="progress" class="block text-sm font-medium text-gray-700 mb-2">
                            Progresso (%)
                        </label>
                        <input type="range" 
                               id="progress" 
                               name="progress" 
                               value="{{ old('progress', $project['progress']) }}"
                               min="0"
                               max="100"
                               class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                               oninput="document.getElementById('progressValue').textContent = this.value + '%'">
                        <div class="flex justify-between text-sm text-gray-600 mt-1">
                            <span>0%</span>
                            <span id="progressValue">{{ old('progress', $project['progress']) }}%</span>
                            <span>100%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Timeline -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Cronograma do Projeto</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-play text-blue-500 mr-2"></i>
                            <span class="font-medium text-gray-900">Início</span>
                        </div>
                        <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($project['start_date'])->format('d/m/Y') }}</p>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-clock text-yellow-500 mr-2"></i>
                            <span class="font-medium text-gray-900">Atual</span>
                        </div>
                        <p class="text-sm text-gray-600">{{ $project['progress'] }}% concluído</p>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center mb-2">
                            <i class="fas fa-flag-checkered text-green-500 mr-2"></i>
                            <span class="font-medium text-gray-900">Entrega</span>
                        </div>
                        <p class="text-sm text-gray-600">{{ \Carbon\Carbon::parse($project['end_date'])->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('demo.projects.show', $project['id']) }}" 
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
