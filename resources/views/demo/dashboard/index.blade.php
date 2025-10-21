@extends('layouts.demo')

@section('title', 'Dashboard - DevStarter Kit Demo')
@section('page-title', 'Dashboard')
@section('page-description', 'Visão geral do sistema')

@section('content')
<!-- Welcome Section -->
<div class="mb-8">
    <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-2xl p-8 text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="relative z-10">
            <h1 class="text-3xl font-bold mb-2">Bem-vindo ao DevStarter Kit!</h1>
            <p class="text-blue-100 text-lg">Sistema completo para desenvolvimento de aplicações web modernas</p>
        </div>
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/10 rounded-full"></div>
        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-white/5 rounded-full"></div>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Users Card -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg card-hover border border-gray-200/50">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Total de Usuários</p>
                <p class="text-3xl font-bold text-gray-900">{{ $stats['users'] }}</p>
                <p class="text-green-600 text-sm flex items-center mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>
                    +12% este mês
                </p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-users text-blue-600 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Clients Card -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg card-hover border border-gray-200/50">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Clientes Ativos</p>
                <p class="text-3xl font-bold text-gray-900">{{ $stats['clients'] }}</p>
                <p class="text-green-600 text-sm flex items-center mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>
                    +8% este mês
                </p>
            </div>
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-user-tie text-green-600 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Projects Card -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg card-hover border border-gray-200/50">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Projetos Ativos</p>
                <p class="text-3xl font-bold text-gray-900">{{ $stats['projects'] }}</p>
                <p class="text-blue-600 text-sm flex items-center mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>
                    +15% este mês
                </p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-project-diagram text-purple-600 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Revenue Card -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg card-hover border border-gray-200/50">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-600 text-sm font-medium">Faturamento</p>
                <p class="text-3xl font-bold text-gray-900">R$ {{ number_format($stats['revenue'], 2, ',', '.') }}</p>
                <p class="text-green-600 text-sm flex items-center mt-1">
                    <i class="fas fa-arrow-up mr-1"></i>
                    +22% este mês
                </p>
            </div>
            <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                <i class="fas fa-dollar-sign text-yellow-600 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- User Growth Chart -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200/50">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Crescimento de Usuários</h3>
            <div class="flex space-x-2">
                <button class="px-3 py-1 bg-blue-100 text-blue-600 rounded-lg text-sm">6M</button>
                <button class="px-3 py-1 text-gray-600 rounded-lg text-sm hover:bg-gray-100">1A</button>
            </div>
        </div>
        <div class="h-64">
            <canvas id="userGrowthChart"></canvas>
        </div>
    </div>

    <!-- Revenue Chart -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200/50">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Faturamento Mensal</h3>
            <div class="flex space-x-2">
                <button class="px-3 py-1 bg-green-100 text-green-600 rounded-lg text-sm">6M</button>
                <button class="px-3 py-1 text-gray-600 rounded-lg text-sm hover:bg-gray-100">1A</button>
            </div>
        </div>
        <div class="h-64">
            <canvas id="revenueChart"></canvas>
        </div>
    </div>
</div>

<!-- Recent Activity & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Recent Activity -->
    <div class="lg:col-span-2 bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200/50">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Atividade Recente</h3>
            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Ver todas</a>
        </div>
        
        <div class="space-y-4">
            <div class="flex items-center p-4 bg-blue-50/50 rounded-xl">
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-user-plus text-blue-600"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">Novo usuário cadastrado</p>
                    <p class="text-xs text-gray-500">João Silva se cadastrou no sistema</p>
                </div>
                <span class="text-xs text-gray-400">2 min atrás</span>
            </div>
            
            <div class="flex items-center p-4 bg-green-50/50 rounded-xl">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-project-diagram text-green-600"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">Projeto concluído</p>
                    <p class="text-xs text-gray-500">Sistema de Vendas foi finalizado</p>
                </div>
                <span class="text-xs text-gray-400">1 hora atrás</span>
            </div>
            
            <div class="flex items-center p-4 bg-purple-50/50 rounded-xl">
                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-user-tie text-purple-600"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">Novo cliente</p>
                    <p class="text-xs text-gray-500">Empresa ABC se tornou cliente</p>
                </div>
                <span class="text-xs text-gray-400">3 horas atrás</span>
            </div>
            
            <div class="flex items-center p-4 bg-yellow-50/50 rounded-xl">
                <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center mr-4">
                    <i class="fas fa-cog text-yellow-600"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-gray-900">Sistema atualizado</p>
                    <p class="text-xs text-gray-500">Nova versão 2.1.0 disponível</p>
                </div>
                <span class="text-xs text-gray-400">1 dia atrás</span>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200/50">
        <h3 class="text-lg font-semibold text-gray-900 mb-6">Ações Rápidas</h3>
        
        <div class="space-y-3">
            <a href="{{ route('demo.users.create') }}" class="flex items-center p-4 bg-blue-50/50 rounded-xl hover:bg-blue-100/50 transition-colors">
                <i class="fas fa-user-plus text-blue-600 mr-3"></i>
                <span class="font-medium text-gray-900">Novo Usuário</span>
            </a>
            
            <a href="{{ route('demo.clients.create') }}" class="flex items-center p-4 bg-green-50/50 rounded-xl hover:bg-green-100/50 transition-colors">
                <i class="fas fa-user-tie text-green-600 mr-3"></i>
                <span class="font-medium text-gray-900">Novo Cliente</span>
            </a>
            
            <a href="{{ route('demo.projects.create') }}" class="flex items-center p-4 bg-purple-50/50 rounded-xl hover:bg-purple-100/50 transition-colors">
                <i class="fas fa-project-diagram text-purple-600 mr-3"></i>
                <span class="font-medium text-gray-900">Novo Projeto</span>
            </a>
            
            <a href="{{ route('demo.settings') }}" class="flex items-center p-4 bg-gray-50/50 rounded-xl hover:bg-gray-100/50 transition-colors">
                <i class="fas fa-cog text-gray-600 mr-3"></i>
                <span class="font-medium text-gray-900">Configurações</span>
            </a>
        </div>
    </div>
</div>

<!-- System Status -->
<div class="mt-8 bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg border border-gray-200/50">
    <h3 class="text-lg font-semibold text-gray-900 mb-6">Status do Sistema</h3>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="flex items-center">
            <div class="w-3 h-3 bg-green-500 rounded-full mr-3 animate-pulse"></div>
            <div>
                <p class="text-sm font-medium text-gray-900">Servidor</p>
                <p class="text-xs text-gray-500">Online - 99.9% uptime</p>
            </div>
        </div>
        
        <div class="flex items-center">
            <div class="w-3 h-3 bg-green-500 rounded-full mr-3 animate-pulse"></div>
            <div>
                <p class="text-sm font-medium text-gray-900">Banco de Dados</p>
                <p class="text-xs text-gray-500">Conectado - 45ms latência</p>
            </div>
        </div>
        
        <div class="flex items-center">
            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-3 animate-pulse"></div>
            <div>
                <p class="text-sm font-medium text-gray-900">Backup</p>
                <p class="text-xs text-gray-500">Em andamento - 75%</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // User Growth Chart
    const userGrowthCtx = document.getElementById('userGrowthChart').getContext('2d');
    new Chart(userGrowthCtx, {
        type: 'line',
        data: {
            labels: @json($chartData['labels']),
            datasets: [{
                label: 'Usuários',
                data: @json($chartData['users']),
                borderColor: 'rgb(59, 130, 246)',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: 300,
                    stepSize: 50
                }
            }
        }
    });

    // Revenue Chart
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'bar',
        data: {
            labels: @json($chartData['labels']),
            datasets: [{
                label: 'Faturamento',
                data: @json($chartData['revenue']),
                backgroundColor: 'rgba(16, 185, 129, 0.8)',
                borderColor: 'rgb(16, 185, 129)',
                borderWidth: 0,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    suggestedMax: 40000,
                    stepSize: 10000
                }
            }
        }
    });
</script>
@endsection