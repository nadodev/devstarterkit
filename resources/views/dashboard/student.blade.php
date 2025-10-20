@extends('layouts.app')

@section('title', 'Dashboard - EduPlatform')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-blue-900-purple-900 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 py-16">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center bg-white/10 backdrop-blur-sm rounded-full px-4 py-2 mb-6 text-sm font-medium">
                <i class="fas fa-tachometer-alt text-yellow-400 mr-2"></i>
                Seu painel de controle
            </div>
            
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Bem-vindo,
                <span class="text-gradient-yellow-orange">
                    {{ auth()->user()->name }}!
                </span>
            </h1>
            
            <p class="text-xl md:text-2xl text-blue-100 leading-relaxed max-w-3xl mx-auto">
                Continue sua jornada de aprendizado e transforme seu futuro
            </p>
        </div>
    </div>
</section>

<div class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <!-- Cursos Inscritos -->
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gradient-blue-purple rounded-2xl flex items-center justify-center mr-4 hover-scale-110 transition-transform duration-300">
                            <i class="fas fa-book text-white text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-semibold text-gray-600 mb-1">Cursos Inscritos</h3>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['enrolled_courses'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cursos Concluídos -->
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gradient-green rounded-2xl flex items-center justify-center mr-4 hover-scale-110 transition-transform duration-300">
                            <i class="fas fa-check-circle text-white text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-semibold text-gray-600 mb-1">Cursos Concluídos</h3>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['completed_courses'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Certificados -->
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gradient-yellow-orange-500 rounded-2xl flex items-center justify-center mr-4 hover-scale-110 transition-transform duration-300">
                            <i class="fas fa-certificate text-white text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-semibold text-gray-600 mb-1">Certificados</h3>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['certificates'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Aulas Concluídas -->
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gradient-purple rounded-2xl flex items-center justify-center mr-4 hover-scale-110 transition-transform duration-300">
                            <i class="fas fa-play-circle text-white text-2xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-semibold text-gray-600 mb-1">Aulas Concluídas</h3>
                            <p class="text-3xl font-bold text-gray-900">{{ $stats['total_lessons_completed'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Meus Cursos -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-blue-purple rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-book text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Meus Cursos</h3>
                    </div>
                    <div class="space-y-4">
                        @forelse($enrollments as $enrollment)
                        <div class="group flex items-center space-x-4 p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-all duration-300">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-blue-purple rounded-xl flex items-center justify-center hover-scale-110 transition-transform duration-300">
                                    <i class="fas fa-play text-white"></i>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-medium text-gray-900 truncate">
                                    {{ $enrollment->course->title }}
                                </h4>
                                <p class="text-sm text-gray-500">{{ $enrollment->course->category->name }}</p>
                                <div class="mt-2">
                                    <div class="flex items-center">
                                        <div class="flex-1 bg-gray-200 rounded-full h-2">
                                            <div class="bg-gradient-blue-purple h-2 rounded-full transition-all duration-300" style="width: {{ $enrollment->progress_percentage }}%"></div>
                                        </div>
                                        <span class="ml-2 text-sm text-gray-600 font-semibold">{{ $enrollment->progress_percentage }}%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="{{ route('student.courses.show', $enrollment->course) }}" class="text-blue-600 hover:text-blue-500 transform hover:scale-110 transition-all duration-300">
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-book-open text-gray-400 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Nenhum curso encontrado</h3>
                            <p class="text-gray-500 mb-6">Você ainda não está inscrito em nenhum curso</p>
                            <a href="{{ route('courses.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-blue-purple text-white font-semibold rounded-xl hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                                <i class="fas fa-search mr-2"></i>Explorar Cursos
                            </a>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Progresso Recente -->
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-green rounded-2xl flex items-center justify-center mr-4">
                            <i class="fas fa-chart-line text-white text-xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Progresso Recente</h3>
                    </div>
                    <div class="space-y-4">
                        @forelse($recentProgress as $progress)
                        <div class="group flex items-center space-x-4 p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-all duration-300">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-gradient-green rounded-xl flex items-center justify-center hover-scale-110 transition-transform duration-300">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-medium text-gray-900 truncate">
                                    {{ $progress->lesson->title }}
                                </h4>
                                <p class="text-sm text-gray-500">{{ $progress->lesson->module->course->title }}</p>
                                <p class="text-xs text-gray-400 font-medium">{{ $progress->completed_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-8">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-chart-line text-gray-400 text-2xl"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Nenhum progresso</h3>
                            <p class="text-gray-500">Nenhum progresso registrado ainda</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-8">
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Ações Rápidas</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <a href="{{ route('student.courses.index') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-book text-blue-600 text-xl mr-3"></i>
                            <div>
                                <h4 class="font-medium text-gray-900">Meus Cursos</h4>
                                <p class="text-sm text-gray-500">Continue estudando</p>
                            </div>
                        </a>
                        <a href="{{ route('courses.index') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-search text-green-600 text-xl mr-3"></i>
                            <div>
                                <h4 class="font-medium text-gray-900">Explorar Cursos</h4>
                                <p class="text-sm text-gray-500">Descubra novos cursos</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-certificate text-yellow-600 text-xl mr-3"></i>
                            <div>
                                <h4 class="font-medium text-gray-900">Meus Certificados</h4>
                                <p class="text-sm text-gray-500">Visualizar certificados</p>
                            </div>
                        </a>
                        <a href="#" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                            <i class="fas fa-user text-green-600 text-xl mr-3"></i>
                            <div>
                                <h4 class="font-medium text-gray-900">Meu Perfil</h4>
                                <p class="text-sm text-gray-500">Editar informações</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
