@extends('layouts.admin')

@section('title', $title)
@section('page-title', 'Analytics')
@section('page-description', 'Dashboard de Analytics e Cookies')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900">📊 Dashboard de Analytics</h1>
    <p class="mt-2 text-gray-600">Acompanhe o desempenho do Laravel ProStarter em tempo real</p>
</div>

        <!-- Status dos Cookies -->
        <div class="mb-8 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-chart-line text-blue-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">Analytics</h3>
                        <p class="text-sm text-gray-500">
                            @if($analytics_enabled)
                                <span class="text-green-600">✅ Ativo</span>
                            @else
                                <span class="text-red-600">❌ Inativo</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-bullhorn text-purple-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">Marketing</h3>
                        <p class="text-sm text-gray-500">
                            @if($marketing_enabled)
                                <span class="text-green-600">✅ Ativo</span>
                            @else
                                <span class="text-red-600">❌ Inativo</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Métricas Principais -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-users text-blue-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Visitantes</p>
                        <p class="text-2xl font-semibold text-gray-900" id="total-visitors">-</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-percentage text-green-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Taxa de Conversão</p>
                        <p class="text-2xl font-semibold text-gray-900" id="conversion-rate">-</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-clock text-yellow-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Tempo Médio</p>
                        <p class="text-2xl font-semibold text-gray-900" id="avg-time">-</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-red-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-chart-line text-red-600"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Taxa de Rejeição</p>
                        <p class="text-2xl font-semibold text-gray-900" id="bounce-rate">-</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráficos -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            <!-- Funil de Conversão -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">🎯 Funil de Conversão</h3>
                <div id="conversion-funnel" class="h-64"></div>
            </div>

            <!-- Fontes de Tráfego -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">🌐 Fontes de Tráfego</h3>
                <div id="traffic-sources" class="h-64"></div>
            </div>
        </div>

        <!-- Tabelas -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Páginas Mais Visitadas -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">📄 Páginas Mais Visitadas</h3>
                </div>
                <div class="p-6">
                    <div id="top-pages" class="space-y-4">
                        <!-- Será preenchido via JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Eventos Rastreados -->
            <div class="bg-white rounded-lg shadow">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">⚡ Eventos Rastreados</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-eye text-blue-600 mr-3"></i>
                                <span class="text-sm font-medium text-gray-900">Visualizações de Página</span>
                            </div>
                            <span class="text-sm text-gray-500" id="page-views">-</span>
                        </div>
                        
                        <div class="flex items-center justify-between p-3 bg-green-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-mouse-pointer text-green-600 mr-3"></i>
                                <span class="text-sm font-medium text-gray-900">Cliques em CTA</span>
                            </div>
                            <span class="text-sm text-gray-500" id="cta-clicks">-</span>
                        </div>
                        
                        <div class="flex items-center justify-between p-3 bg-purple-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-video text-purple-600 mr-3"></i>
                                <span class="text-sm font-medium text-gray-900">Cliques no Vídeo</span>
                            </div>
                            <span class="text-sm text-gray-500" id="video-clicks">-</span>
                        </div>
                        
                        <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-question-circle text-yellow-600 mr-3"></i>
                                <span class="text-sm font-medium text-gray-900">Interações com FAQ</span>
                            </div>
                            <span class="text-sm text-gray-500" id="faq-interactions">-</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ações -->
        <div class="mt-8 flex flex-col sm:flex-row gap-4">
            <a href="{{ route('conversion') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                <i class="fas fa-arrow-left mr-2"></i>
                Voltar para Landing Page
            </a>
            
            <button onclick="refreshData()" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                <i class="fas fa-sync-alt mr-2"></i>
                Atualizar Dados
            </button>
        </div>
    </div>
</div>

<script>
    // Carregar dados do dashboard
    document.addEventListener('DOMContentLoaded', function() {
        loadDashboardData();
    });

    function loadDashboardData() {
        // Carregar dados gerais
        fetch('/admin/analytics/api?type=overview')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateOverviewData(data.data);
                }
            })
            .catch(error => {
                console.error('Erro ao carregar dados:', error);
            });

        // Carregar dados de conversão
        fetch('/admin/analytics/api?type=conversions')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateConversionData(data.data);
                }
            })
            .catch(error => {
                console.error('Erro ao carregar conversões:', error);
            });

        // Carregar dados de tráfego
        fetch('/admin/analytics/api?type=traffic')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateTrafficData(data.data);
                }
            })
            .catch(error => {
                console.error('Erro ao carregar tráfego:', error);
            });
    }

    function updateOverviewData(data) {
        document.getElementById('total-visitors').textContent = data.total_visitors.toLocaleString();
        document.getElementById('conversion-rate').textContent = (data.conversion_rate * 100).toFixed(1) + '%';
        document.getElementById('avg-time').textContent = Math.floor(data.avg_time_on_page / 60) + 'min';
        document.getElementById('bounce-rate').textContent = (data.bounce_rate * 100).toFixed(1) + '%';
        
        // Atualizar páginas mais visitadas
        const topPagesContainer = document.getElementById('top-pages');
        topPagesContainer.innerHTML = '';
        data.top_pages.forEach(page => {
            const div = document.createElement('div');
            div.className = 'flex items-center justify-between p-3 bg-gray-50 rounded-lg';
            div.innerHTML = `
                <span class="text-sm font-medium text-gray-900">${page.page}</span>
                <span class="text-sm text-gray-500">${page.views.toLocaleString()} visualizações</span>
            `;
            topPagesContainer.appendChild(div);
        });
    }

    function updateConversionData(data) {
        // Atualizar funil de conversão
        const funnelData = data.conversion_funnel.map(stage => ({
            name: stage.stage,
            value: stage.count
        }));
        
        // Aqui você pode integrar com uma biblioteca de gráficos como Chart.js
        console.log('Funil de conversão:', funnelData);
    }

    function updateTrafficData(data) {
        document.getElementById('page-views').textContent = data.page_views.toLocaleString();
        // Outros dados de tráfego...
    }

    function refreshData() {
        console.log('🔄 Atualizando dados...');
        loadDashboardData();
    }

    // Atualizar dados a cada 30 segundos
    setInterval(loadDashboardData, 30000);
</script>
@endsection
