@extends('layouts.admin')

@section('title', 'Configurações de Analytics')
@section('page-title', 'Configurações de Analytics')
@section('page-description', 'Configure os IDs de analytics e marketing')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">⚙️ Configurações de Analytics</h2>
                <p class="text-gray-600 mt-1">Configure os IDs de analytics e marketing para rastreamento</p>
            </div>
            <div class="flex space-x-3">
                <button onclick="testConfigurations()" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                    <i class="fas fa-play mr-2"></i>
                    Testar Configurações
                </button>
                <a href="{{ route('analytics.dashboard') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors">
                    <i class="fas fa-chart-line mr-2"></i>
                    Ver Dashboard
                </a>
            </div>
        </div>
    </div>

    <!-- Formulário de Configuração -->
    <form action="{{ route('admin.analytics.config.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Google Analytics -->
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-chart-line text-blue-600"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Google Analytics 4</h3>
                    <p class="text-sm text-gray-600">Rastreamento de visitantes e comportamento</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        ID de Medição (G-XXXXXXXXXX)
                    </label>
                    <input type="text" 
                           name="google_analytics_id" 
                           value="{{ $config['google_analytics']['measurement_id'] }}"
                           placeholder="G-XXXXXXXXXX"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex items-center">
                    <label class="flex items-center">
                        <input type="checkbox" 
                               name="google_analytics_enabled" 
                               value="1"
                               {{ $config['google_analytics']['enabled'] ? 'checked' : '' }}
                               class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm font-medium text-gray-700">Ativar Google Analytics</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Facebook Pixel -->
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fab fa-facebook text-blue-600"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Facebook Pixel</h3>
                    <p class="text-sm text-gray-600">Rastreamento para campanhas no Facebook</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        ID do Pixel
                    </label>
                    <input type="text" 
                           name="facebook_pixel_id" 
                           value="{{ $config['facebook_pixel']['pixel_id'] }}"
                           placeholder="XXXXXXXXXXXXXXX"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex items-center">
                    <label class="flex items-center">
                        <input type="checkbox" 
                               name="facebook_pixel_enabled" 
                               value="1"
                               {{ $config['facebook_pixel']['enabled'] ? 'checked' : '' }}
                               class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm font-medium text-gray-700">Ativar Facebook Pixel</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Google Tag Manager -->
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-tags text-orange-600"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Google Tag Manager</h3>
                    <p class="text-sm text-gray-600">Gerenciamento centralizado de tags</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        ID do Container (GTM-XXXXXXX)
                    </label>
                    <input type="text" 
                           name="google_tag_manager_id" 
                           value="{{ $config['gtm']['container_id'] }}"
                           placeholder="GTM-XXXXXXX"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex items-center">
                    <label class="flex items-center">
                        <input type="checkbox" 
                               name="google_tag_manager_enabled" 
                               value="1"
                               {{ $config['gtm']['enabled'] ? 'checked' : '' }}
                               class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm font-medium text-gray-700">Ativar GTM</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Hotjar -->
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                    <i class="fas fa-eye text-purple-600"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Hotjar</h3>
                    <p class="text-sm text-gray-600">Heatmaps e gravações de sessão</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Site ID
                    </label>
                    <input type="text" 
                           name="hotjar_site_id" 
                           value="{{ $config['hotjar']['site_id'] }}"
                           placeholder="XXXXXXX"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex items-center">
                    <label class="flex items-center">
                        <input type="checkbox" 
                               name="hotjar_enabled" 
                               value="1"
                               {{ $config['hotjar']['enabled'] ? 'checked' : '' }}
                               class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm font-medium text-gray-700">Ativar Hotjar</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Botões -->
        <div class="flex justify-end space-x-4">
            <a href="{{ route('analytics.dashboard') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                Cancelar
            </a>
            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                <i class="fas fa-save mr-2"></i>
                Salvar Configurações
            </button>
        </div>
    </form>

    <!-- Resultados dos Testes -->
    <div id="test-results" class="hidden bg-white shadow rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">🧪 Resultados dos Testes</h3>
        <div id="test-content"></div>
    </div>
</div>

<script>
    function testConfigurations() {
        const button = document.querySelector('button[onclick="testConfigurations()"]');
        const originalText = button.innerHTML;
        
        // Mostrar loading
        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Testando...';
        button.disabled = true;
        
        // Fazer requisição
        fetch('{{ route("admin.analytics.config.test") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showTestResults(data.results);
            } else {
                showErrorMessage('Erro ao testar configurações');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            showErrorMessage('Erro ao testar configurações');
        })
        .finally(() => {
            // Restaurar botão
            button.innerHTML = originalText;
            button.disabled = false;
        });
    }

    function showTestResults(results) {
        const resultsDiv = document.getElementById('test-results');
        const contentDiv = document.getElementById('test-content');
        
        let html = '';
        
        Object.keys(results).forEach(service => {
            const result = results[service];
            const statusClass = result.status === 'success' ? 'text-green-600' : 'text-red-600';
            const iconClass = result.status === 'success' ? 'fa-check-circle' : 'fa-times-circle';
            
            html += `
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg mb-2">
                    <div class="flex items-center">
                        <i class="fas ${iconClass} ${statusClass} mr-3"></i>
                        <span class="font-medium">${service.replace('_', ' ').toUpperCase()}</span>
                    </div>
                    <span class="text-sm ${statusClass}">${result.message}</span>
                </div>
            `;
        });
        
        contentDiv.innerHTML = html;
        resultsDiv.classList.remove('hidden');
        
        // Scroll para os resultados
        resultsDiv.scrollIntoView({ behavior: 'smooth' });
    }

    function showErrorMessage(message) {
        alert('Erro: ' + message);
    }
</script>
@endsection
