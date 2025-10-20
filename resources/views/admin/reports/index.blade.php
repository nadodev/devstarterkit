@extends('layouts.admin')

@section('title', 'Relatórios')
@section('page-title', 'Relatórios e Analytics')
@section('page-description', 'Análise completa da plataforma')

@section('content')
<!-- Estatísticas Gerais -->
<div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                    <i class="fas fa-users text-white"></i>
                </div>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-500">Total de Usuários</p>
                <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_users'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                    <i class="fas fa-book text-white"></i>
                </div>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-500">Total de Cursos</p>
                <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_courses'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                    <i class="fas fa-user-plus text-white"></i>
                </div>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-500">Total de Leads</p>
                <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_leads'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-8 h-8 bg-purple-500 rounded-full flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-white"></i>
                </div>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-500">Inscrições</p>
                <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_enrollments'] }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center">
                    <i class="fas fa-certificate text-white"></i>
                </div>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-500">Certificados</p>
                <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_certificates'] }}</p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- Leads por Mês -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Leads por Mês (Últimos 6 meses)</h3>
        </div>
        <div class="p-6">
            @if($leadsByMonth->count() > 0)
                <div class="space-y-4">
                    @foreach($leadsByMonth as $month)
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-700">{{ \Carbon\Carbon::createFromFormat('Y-m', $month->month)->format('M/Y') }}</span>
                        <div class="flex items-center">
                            <div class="w-32 bg-gray-200 rounded-full h-2 mr-3">
                                <div class="bg-blue-500 h-2 rounded-full" style="width: {{ ($month->count / $leadsByMonth->max('count')) * 100 }}%"></div>
                            </div>
                            <span class="text-sm font-medium text-gray-900">{{ $month->count }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center py-4">Nenhum dado disponível</p>
            @endif
        </div>
    </div>

    <!-- Usuários por Role -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Usuários por Tipo</h3>
        </div>
        <div class="p-6">
            @foreach($usersByRole as $role)
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-3 h-3 rounded-full mr-3
                        @if($role->role === 'admin') bg-red-500
                        @elseif($role->role === 'instructor') bg-blue-500
                        @else bg-green-500
                        @endif">
                    </div>
                    <span class="text-sm font-medium text-gray-700">{{ ucfirst($role->role) }}</span>
                </div>
                <span class="text-sm font-medium text-gray-900">{{ $role->count }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- Cursos Mais Populares -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Cursos Mais Populares</h3>
        </div>
        <div class="p-6">
            @forelse($popularCourses as $course)
            <div class="flex items-center justify-between mb-4">
                <div class="flex-1 min-w-0">
                    <h4 class="text-sm font-medium text-gray-900 truncate">{{ $course->title }}</h4>
                    <p class="text-sm text-gray-500">{{ $course->user->name }}</p>
                </div>
                <div class="flex items-center">
                    <span class="text-sm text-gray-500 mr-2">{{ $course->enrollments_count }} inscrições</span>
                    <div class="w-16 bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: {{ ($course->enrollments_count / $popularCourses->max('enrollments_count')) * 100 }}%"></div>
                    </div>
                </div>
            </div>
            @empty
            <p class="text-gray-500 text-center py-4">Nenhum curso encontrado</p>
            @endforelse
        </div>
    </div>

    <!-- Status dos Leads -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Status dos Leads</h3>
        </div>
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="w-3 h-3 rounded-full bg-yellow-500 mr-3"></div>
                    <span class="text-sm font-medium text-gray-700">Pendentes</span>
                </div>
                <span class="text-sm font-medium text-gray-900">{{ $leadsByStatus['pending'] }}</span>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-3 h-3 rounded-full bg-green-500 mr-3"></div>
                    <span class="text-sm font-medium text-gray-700">Emails Enviados</span>
                </div>
                <span class="text-sm font-medium text-gray-900">{{ $leadsByStatus['sent'] }}</span>
            </div>
        </div>
    </div>
</div>

<!-- Ações Rápidas -->
<div class="bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">Ações Rápidas</h3>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('admin.reports.leads') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                <i class="fas fa-users text-blue-600 text-xl mr-3"></i>
                <div>
                    <h4 class="font-medium text-gray-900">Relatório de Leads</h4>
                    <p class="text-sm text-gray-500">Análise detalhada</p>
                </div>
            </a>
            
            <a href="{{ route('admin.reports.courses') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                <i class="fas fa-book text-green-600 text-xl mr-3"></i>
                <div>
                    <h4 class="font-medium text-gray-900">Relatório de Cursos</h4>
                    <p class="text-sm text-gray-500">Performance dos cursos</p>
                </div>
            </a>
            
            <a href="{{ route('admin.reports.users') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                <i class="fas fa-user-friends text-purple-600 text-xl mr-3"></i>
                <div>
                    <h4 class="font-medium text-gray-900">Relatório de Usuários</h4>
                    <p class="text-sm text-gray-500">Análise de usuários</p>
                </div>
            </a>
            
            <a href="{{ route('admin.reports.export', ['type' => 'leads', 'format' => 'csv']) }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                <i class="fas fa-download text-red-600 text-xl mr-3"></i>
                <div>
                    <h4 class="font-medium text-gray-900">Exportar Dados</h4>
                    <p class="text-sm text-gray-500">Download CSV</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
