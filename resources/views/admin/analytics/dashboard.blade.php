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
                <canvas id="conversion-funnel" class="h-64"></canvas>
            </div>

            <!-- Fontes de Tráfego -->
            <div class="bg-white rounded-lg shadow p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">🌐 Fontes de Tráfego</h3>
                <canvas id="traffic-sources" class="h-64"></canvas>
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
        console.log('🚀 Dashboard carregado, iniciando dados...');
        loadDashboardData();
    });

    function loadDashboardData() {
        console.log('📡 Carregando dados do dashboard...');
        
        // Carregar dados gerais
        fetch('/admin/analytics/api?type=overview')
            .then(response => response.json())
            .then(data => {
                console.log('📊 Dados gerais recebidos:', data);
                if (data.success) {
                    updateOverviewData(data.data);
                }
            })
            .catch(error => {
                console.error('❌ Erro ao carregar dados:', error);
            });

        // Carregar dados de conversão
        fetch('/admin/analytics/api?type=conversions')
            .then(response => response.json())
            .then(data => {
                console.log('🔄 Dados de conversão recebidos:', data);
                if (data.success) {
                    updateConversionData(data.data);
                }
            })
            .catch(error => {
                console.error('❌ Erro ao carregar conversões:', error);
            });

        // Carregar dados de tráfego
        fetch('/admin/analytics/api?type=traffic')
            .then(response => response.json())
            .then(data => {
                console.log('🌐 Dados de tráfego recebidos:', data);
                if (data.success) {
                    updateTrafficData(data.data);
                }
            })
            .catch(error => {
                console.error('❌ Erro ao carregar tráfego:', error);
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
        console.log('📊 Dados de conversão recebidos:', data);
        
        if (!data.conversion_funnel || !Array.isArray(data.conversion_funnel)) {
            console.error('❌ Dados de conversão inválidos:', data);
            return;
        }
        
        const funnelData = data.conversion_funnel.map(stage => ({
            name: stage.stage,
            value: stage.value
        }));
        
        console.log('🔄 Dados do funil:', funnelData);
        console.log('🔢 Valores individuais:', funnelData.map(d => d.value));
        
        // Verificar se os dados são os mesmos para evitar recriação desnecessária
        if (window.conversionChart && window.lastConversionData) {
            const currentData = JSON.stringify(funnelData);
            if (currentData === window.lastConversionData) {
                console.log('📊 Dados de conversão inalterados, pulando atualização');
                return;
            }
        }
        
        window.lastConversionData = JSON.stringify(funnelData);
        
        const ctx = document.getElementById('conversion-funnel').getContext('2d');
        
        if (window.conversionChart) {
            console.log('🗑️ Destruindo gráfico de conversão anterior');
            window.conversionChart.destroy();
        }
        
        console.log('🆕 Criando novo gráfico de conversão');
        window.conversionChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: funnelData.map(d => d.name),
                datasets: [{
                    label: 'Número de Usuários',
                    data: funnelData.map(d => d.value),
                    backgroundColor: ['#3B82F6', '#10B981', '#F59E0B', '#EF4444'],
                    borderColor: ['#2563EB', '#059669', '#D97706', '#DC2626'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 2000, // Limite máximo reduzido do eixo Y
                        min: 0,
                        ticks: { 
                            maxTicksLimit: 6, // Limitar número de ticks
                            callback: function(value) { 
                                if (value >= 1000) {
                                    return (value / 1000).toFixed(1) + 'k';
                                }
                                return value.toLocaleString(); 
                            }
                        }
                    }
                }
            }
        });
    }

    function updateTrafficData(data) {
        console.log('📊 Dados de tráfego recebidos:', data);
        
        if (!data.traffic_sources || !Array.isArray(data.traffic_sources)) {
            console.error('❌ Dados de tráfego inválidos:', data);
            return;
        }
        
        const trafficLabels = data.traffic_sources.map(s => s.source);
        const trafficValues = data.traffic_sources.map(s => s.visitors);
        
        console.log('🏷️ Labels:', trafficLabels);
        console.log('📈 Valores:', trafficValues);

        // Verificar se os dados são os mesmos para evitar recriação desnecessária
        const currentTrafficData = JSON.stringify({labels: trafficLabels, values: trafficValues});
        if (window.trafficChart && window.lastTrafficData) {
            if (currentTrafficData === window.lastTrafficData) {
                console.log('📊 Dados de tráfego inalterados, pulando atualização');
                return;
            }
        }
        
        window.lastTrafficData = currentTrafficData;

        const ctx = document.getElementById('traffic-sources').getContext('2d');
        
        if (window.trafficChart) {
            console.log('🗑️ Destruindo gráfico anterior');
            window.trafficChart.destroy();
        }
        
        console.log('🆕 Criando novo gráfico de tráfego');
        window.trafficChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: trafficLabels,
                datasets: [{
                    data: trafficValues,
                    backgroundColor: ['#3B82F6', '#EF4444', '#10B981', '#F59E0B'],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { position: 'right' },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const value = context.parsed;
                                if (value >= 1000) {
                                    return context.label + ': ' + (value / 1000).toFixed(1) + 'k visitantes';
                                }
                                return context.label + ': ' + value.toLocaleString() + ' visitantes';
                            }
                        }
                    }
                }
            }
        });
    }

    function refreshData() {
        console.log('🔄 Atualizando dados...');
        loadDashboardData();
    }

    // Atualizar dados a cada 2 minutos (apenas uma instância)
    if (!window.dashboardInitialized) {
        window.dashboardInitialized = true;
        console.log('🔄 Dashboard inicializado - atualização automática a cada 2 minutos');
        
        // Atualização automática com intervalo maior para evitar problemas
        window.dashboardRefreshInterval = setInterval(function() {
            console.log('⏰ Atualização automática dos dados');
            loadDashboardData();
        }, 120000); // 2 minutos
    }
</script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
