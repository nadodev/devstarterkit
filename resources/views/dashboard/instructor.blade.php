@extends('layouts.app')

@section('title', 'Dashboard Instrutor - EduPlatform')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Dashboard do Instrutor</h1>
            <p class="text-gray-600">Gerencie seus cursos e acompanhe o desempenho</p>
        </div>

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
                                <dt class="text-sm font-medium text-gray-500 truncate">Total de Alunos</dt>
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
                            <i class="fas fa-dollar-sign text-yellow-600 text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Faturamento</dt>
                                <dd class="text-lg font-medium text-gray-900">R$ {{ number_format($stats['total_earnings'], 2, ',', '.') }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Meus Cursos -->
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Meus Cursos</h3>
                        <a href="{{ route('instructor.courses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700">
                            <i class="fas fa-plus mr-1"></i>Novo Curso
                        </a>
                    </div>
                    <div class="space-y-4">
                        @forelse($courses as $course)
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
                                <p class="text-sm text-gray-500">{{ $course->category->name }}</p>
                                <div class="flex items-center mt-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $course->is_published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $course->is_published ? 'Publicado' : 'Rascunho' }}
                                    </span>
                                    <span class="ml-2 text-sm text-gray-500">{{ $course->students_count }} alunos</span>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="{{ route('instructor.courses.show', $course) }}" class="text-blue-600 hover:text-blue-500">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8">
                            <i class="fas fa-book-open text-gray-400 text-4xl mb-4"></i>
                            <p class="text-gray-500">Você ainda não criou nenhum curso</p>
                            <a href="{{ route('instructor.courses.create') }}" class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                Criar Primeiro Curso
                            </a>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Estatísticas Rápidas -->
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Estatísticas Rápidas</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-blue-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-chart-line text-blue-600 text-xl mr-3"></i>
                                <div>
                                    <h4 class="font-medium text-gray-900">Cursos em Destaque</h4>
                                    <p class="text-sm text-gray-500">Cursos com melhor desempenho</p>
                                </div>
                            </div>
                            <span class="text-2xl font-bold text-blue-600">0</span>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-star text-green-600 text-xl mr-3"></i>
                                <div>
                                    <h4 class="font-medium text-gray-900">Avaliação Média</h4>
                                    <p class="text-sm text-gray-500">Sua avaliação geral</p>
                                </div>
                            </div>
                            <span class="text-2xl font-bold text-green-600">4.8</span>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-purple-50 rounded-lg">
                            <div class="flex items-center">
                                <i class="fas fa-clock text-purple-600 text-xl mr-3"></i>
                                <div>
                                    <h4 class="font-medium text-gray-900">Tempo Total</h4>
                                    <p class="text-sm text-gray-500">Horas de conteúdo</p>
                                </div>
                            </div>
                            <span class="text-2xl font-bold text-purple-600">0h</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-8">
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Ações Rápidas</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                        <a href="{{ route('instructor.courses.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-plus text-blue-600 text-xl mr-3"></i>
                            <div>
                                <h4 class="font-medium text-gray-900">Novo Curso</h4>
                                <p class="text-sm text-gray-500">Criar curso</p>
                            </div>
                        </a>
                        <a href="{{ route('instructor.courses.index') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-list text-green-600 text-xl mr-3"></i>
                            <div>
                                <h4 class="font-medium text-gray-900">Gerenciar Cursos</h4>
                                <p class="text-sm text-gray-500">Ver todos os cursos</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-chart-bar text-purple-600 text-xl mr-3"></i>
                            <div>
                                <h4 class="font-medium text-gray-900">Relatórios</h4>
                                <p class="text-sm text-gray-500">Analytics detalhados</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-cog text-gray-600 text-xl mr-3"></i>
                            <div>
                                <h4 class="font-medium text-gray-900">Configurações</h4>
                                <p class="text-sm text-gray-500">Perfil e preferências</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
