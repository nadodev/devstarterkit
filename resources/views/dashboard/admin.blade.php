@extends('layouts.admin')

@section('title', 'Dashboard Admin - DevStarter Kit')
@section('page-title', 'Dashboard Administrativo')
@section('page-description', 'Visão geral da plataforma')

@section('content')

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-book text-blue-600 text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total de Cursos</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $stats['total_courses'] }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-eye text-green-600 text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Cursos Publicados</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $stats['published_courses'] }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-users text-purple-600 text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Estudantes</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $stats['total_students'] }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-chalkboard-teacher text-yellow-600 text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Instrutores</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $stats['total_instructors'] }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-users text-red-600 text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total de Leads</dt>
                                <dd class="text-lg font-medium text-gray-900">{{ $stats['total_leads'] }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Leads Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-users text-white"></i>
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
                        <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Pendentes</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $stats['pending_leads'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Emails Enviados</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $stats['sent_leads'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Cursos Recentes -->
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Cursos Recentes</h3>
                    <div class="space-y-4">
                        @forelse($recentCourses as $course)
                        <div class="flex items-center space-x-4 p-4 border border-gray-200 rounded-lg">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-400 to-purple-500 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-play text-white"></i>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-medium text-gray-900 truncate">
                                    {{ $course->title }}
                                </h4>
                                <p class="text-sm text-gray-500">{{ $course->user->name }} • {{ $course->category->name }}</p>
                                <div class="flex items-center mt-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $course->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $course->is_published ? 'Publicado' : 'Rascunho' }}
                                    </span>
                                    <span class="ml-2 text-sm text-gray-500">{{ $course->students_count }} alunos</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <span class="text-sm text-gray-500">{{ $course->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8">
                            <i class="fas fa-book-open text-gray-400 text-4xl mb-4"></i>
                            <p class="text-gray-500">Nenhum curso encontrado</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Estatísticas da Plataforma -->
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Estatísticas da Plataforma</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-chart-line text-blue-600 text-xl mr-3"></i>
                                <div>
                                    <h4 class="font-medium text-gray-900">Crescimento Mensal</h4>
                                    <p class="text-sm text-gray-500">Novos usuários este mês</p>
                                </div>
                            </div>
                            <span class="text-2xl font-bold text-blue-600">+15%</span>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-star text-green-600 text-xl mr-3"></i>
                                <div>
                                    <h4 class="font-medium text-gray-900">Avaliação Média</h4>
                                    <p class="text-sm text-gray-500">Satisfação dos usuários</p>
                                </div>
                            </div>
                            <span class="text-2xl font-bold text-green-600">4.7</span>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-purple-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-clock text-purple-600 text-xl mr-3"></i>
                                <div>
                                    <h4 class="font-medium text-gray-900">Tempo Médio</h4>
                                    <p class="text-sm text-gray-500">Sessão por usuário</p>
                                </div>
                            </div>
                            <span class="text-2xl font-bold text-purple-600">45min</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-8">
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Ações Administrativas</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                        <a href="{{ route('admin.leads.index') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-users text-blue-600 text-xl mr-3"></i>
                            <div>
                                <h4 class="font-medium text-gray-900">Gerenciar Leads</h4>
                                <p class="text-sm text-gray-500">Capturar e enviar emails</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-book text-green-600 text-xl mr-3"></i>
                            <div>
                                <h4 class="font-medium text-gray-900">Moderar Cursos</h4>
                                <p class="text-sm text-gray-500">Aprovar cursos</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-chart-bar text-purple-600 text-xl mr-3"></i>
                            <div>
                                <h4 class="font-medium text-gray-900">Relatórios</h4>
                                <p class="text-sm text-gray-500">Analytics completos</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-cog text-gray-600 text-xl mr-3"></i>
                            <div>
                                <h4 class="font-medium text-gray-900">Configurações</h4>
                                <p class="text-sm text-gray-500">Sistema</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection
