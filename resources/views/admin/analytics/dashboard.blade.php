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
        
        // NORMALIZAR DADOS: Converter para porcentagens para manter escala fixa
        const maxValue = Math.max(...funnelData.map(d => d.value));
        const normalizedData = funnelData.map(d => ({
            name: d.name,
            value: maxValue > 0 ? Math.round((d.value / maxValue) * 100) : 0,
            originalValue: d.value // Manter valor original para tooltip
        }));
        
        console.log('📊 Dados normalizados:', normalizedData);
        
        // Verificar se os dados são os mesmos para evitar recriação desnecessária
        if (window.conversionChart && window.lastConversionData) {
            const currentData = JSON.stringify(normalizedData);
            if (currentData === window.lastConversionData) {
                console.log('📊 Dados de conversão inalterados, pulando atualização');
                return;
            }
        }
        
        window.lastConversionData = JSON.stringify(normalizedData);
        
        const ctx = document.getElementById('conversion-funnel').getContext('2d');
        
        if (window.conversionChart) {
            console.log('🗑️ Destruindo gráfico de conversão anterior');
            window.conversionChart.destroy();
        }
        
        console.log('🆕 Criando novo gráfico de conversão (gauge)');
        window.conversionChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: normalizedData.map(d => d.name),
                datasets: [{
                    data: normalizedData.map(d => d.value),
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(16, 185, 129, 0.8)', 
                        'rgba(245, 158, 11, 0.8)',
                        'rgba(239, 68, 68, 0.8)'
                    ],
                    borderWidth: 0,
                    cutout: '60%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 1,
                plugins: { 
                    legend: { 
                        display: true,
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const originalValue = funnelData[context.dataIndex].value;
                                return context.label + ': ' + originalValue.toLocaleString() + ' usuários';
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

        // NORMALIZAR DADOS: Converter para porcentagens para manter escala fixa
        const totalVisitors = trafficValues.reduce((sum, val) => sum + val, 0);
        const normalizedValues = trafficValues.map(val => 
            totalVisitors > 0 ? Math.round((val / totalVisitors) * 100) : 0
        );
        
        console.log('📊 Dados normalizados:', normalizedValues);

        // Verificar se os dados são os mesmos para evitar recriação desnecessária
        const currentTrafficData = JSON.stringify({labels: trafficLabels, values: normalizedValues});
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
        
        console.log('🆕 Criando novo gráfico de tráfego (gauge)');
        window.trafficChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: trafficLabels,
                datasets: [{
                    data: normalizedValues,
                    backgroundColor: [
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(239, 68, 68, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(245, 158, 11, 0.8)'
                    ],
                    borderWidth: 0,
                    cutout: '60%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 1,
                plugins: { 
                    legend: { 
                        display: true,
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const originalValue = trafficValues[context.dataIndex];
                                const percentage = normalizedValues[context.dataIndex];
                                return context.label + ': ' + originalValue.toLocaleString() + ' visitantes (' + percentage + '%)';
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
