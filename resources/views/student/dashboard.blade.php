@extends('layouts.app')

@section('title', 'Dashboard - EduPlatform')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    <!-- Hero Header -->
    <div class="relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-gradient-blue-600-purple-600 opacity-90"></div>
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <div class="text-center lg:text-left mb-8 lg:mb-0">
                    <h1 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                        Bem-vindo de volta,<br>
                        <span class="text-slate-500">
                            {{ auth()->user()->name }}
                        </span>
                    </h1>
                    <p class="text-xl text-white mb-6">Continue sua jornada de aprendizado</p>
                    <div class="flex items-center justify-center lg:justify-start space-x-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">{{ $enrollments->count() }}</div>
                            <div class="text-white text-sm font-medium">Cursos</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">{{ $completedCourses }}</div>
                            <div class="text-white text-sm font-medium">Concluídos</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-white">{{ $certificatesCount }}</div>
                            <div class="text-white text-sm font-medium">Certificados</div>
                        </div>
                    </div>
                </div>
                
                <!-- Progress Circle -->
                <div class="relative">
                    <div class="w-48 h-48 relative">
                        <svg class="w-48 h-48 transform -rotate-90" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="40" stroke="rgba(255,255,255,0.2)" stroke-width="8" fill="none"/>
                            <circle cx="50" cy="50" r="40" stroke="url(#gradient)" stroke-width="8" fill="none" 
                                    stroke-dasharray="{{ 2 * 3.14159 * 40 }}" 
                                    stroke-dashoffset="{{ 2 * 3.14159 * 40 * (1 - $overallProgress / 100) }}"
                                    stroke-linecap="round" class="transition-all duration-1000 ease-out"/>
                            <defs>
                                <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" style="stop-color:#fbbf24;stop-opacity:1" />
                                    <stop offset="100%" style="stop-color:#f59e0b;stop-opacity:1" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <div class="text-4xl font-bold text-white">{{ $overallProgress }}%</div>
                                <div class="text-white text-sm font-medium">Progresso</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-16">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <!-- Course Card -->
            <div class="group relative bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-blue-purple opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                <div class="relative p-8">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-16 h-16 bg-gradient-blue-purple rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-book text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-gray-900">{{ $enrollments->count() }}</div>
                            <div class="text-sm text-gray-500">Cursos</div>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Cursos Inscritos</h3>
                    <p class="text-gray-600 text-sm">Continue aprendendo e desenvolvendo suas habilidades</p>
                </div>
            </div>

            <!-- Completed Card -->
            <div class="group relative bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-green opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                <div class="relative p-8">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-16 h-16 bg-gradient-green rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-check-circle text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-gray-900">{{ $completedCourses }}</div>
                            <div class="text-sm text-gray-500">Concluídos</div>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Cursos Concluídos</h3>
                    <p class="text-gray-600 text-sm">Parabéns! Você está evoluindo constantemente</p>
                </div>
            </div>

            <!-- Certificates Card -->
            <div class="group relative bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-yellow-orange-500 opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                <div class="relative p-8">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-16 h-16 bg-gradient-yellow-orange-500 rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-certificate text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-gray-900">{{ $certificatesCount }}</div>
                            <div class="text-sm text-gray-500">Certificados</div>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Certificados</h3>
                    <p class="text-gray-600 text-sm">Suas conquistas e reconhecimentos profissionais</p>
                </div>
            </div>

            <!-- Hours Card -->
            <div class="group relative bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-purple opacity-0 group-hover:opacity-10 transition-opacity duration-300"></div>
                <div class="relative p-8">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-16 h-16 bg-gradient-purple rounded-2xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-clock text-white text-2xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold text-gray-900">{{ $totalHours }}h</div>
                            <div class="text-sm text-gray-500">Estudadas</div>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Horas Estudadas</h3>
                    <p class="text-gray-600 text-sm">Tempo dedicado ao seu desenvolvimento</p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Courses Section -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-blue-600-purple-600 px-8 py-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold text-slate-500">Meus Cursos</h2>
                                <p class="text-slate-700 mt-1 font-medium">Continue sua jornada de aprendizado</p>
                            </div>
                            <a href="{{ route('courses.index') }}" class="bg-white/20 backdrop-blur-sm text-slate-700 px-4 py-2 rounded-xl font-medium hover:bg-white/30 transition-all duration-300">
                                Ver todos
                            </a>
                        </div>
                    </div>
                    <div class="p-8">
                        @if($enrollments->count() > 0)
                            <div class="space-y-6">
                                @foreach($enrollments->take(3) as $enrollment)
                                <div class="group relative bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 border border-gray-200">
                                    <div class="flex items-start space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="w-16 h-16 bg-gradient-blue-purple rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                                <i class="fas fa-play text-white text-xl"></i>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-300">
                                                {{ $enrollment->course->title }}
                                            </h3>
                                            <p class="text-gray-600 mb-4">{{ $enrollment->course->category->name }} • {{ $enrollment->course->duration_hours }}h</p>
                                            
                                            <!-- Progress Bar -->
                                            <div class="mb-4">
                                                <div class="flex items-center justify-between mb-2">
                                                    <span class="text-sm font-medium text-gray-700">Progresso</span>
                                                    <span class="text-sm font-bold text-gray-900">{{ $enrollment->progress_percentage }}%</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                                                    <div class="bg-gradient-blue-purple h-3 rounded-full transition-all duration-1000 ease-out" 
                                                         style="width: {{ $enrollment->progress_percentage }}%"></div>
                                                </div>
                                            </div>
                                            
                                            <!-- Status Badge -->
                                            <div class="flex items-center justify-between">
                                                @if($enrollment->status === 'completed')
                                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                        <i class="fas fa-check mr-2"></i>Concluído
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                                        <i class="fas fa-play mr-2"></i>Em andamento
                                                    </span>
                                                @endif
                                                
                                                <div class="flex space-x-3">
                                                    <a href="{{ route('student.courses.show', $enrollment->course) }}" 
                                                       class="bg-blue-600 text-white px-6 py-2 rounded-xl font-medium hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                                                        <i class="fas fa-play mr-2"></i>{{ $enrollment->status === 'completed' ? 'Refazer' : 'Continuar' }}
                                                    </a>
                                                    
                                                    <a href="{{ route('student.courses.show', $enrollment->course) }}" 
                                                       class="bg-white border-2 border-blue-500 text-blue-600 px-4 py-2 rounded-xl font-medium hover:bg-blue-50 transform hover:scale-105 transition-all duration-300"
                                                       title="Entrar no curso">
                                                        <i class="fas fa-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="fas fa-book-open text-blue-500 text-3xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-4">Nenhum curso encontrado</h3>
                                <p class="text-gray-600 mb-8 text-lg">Você ainda não está inscrito em nenhum curso.</p>
                                <a href="{{ route('courses.index') }}" class="bg-gradient-blue-purple text-white px-8 py-4 rounded-2xl font-bold hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                                    Explorar Cursos
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Recent Activity -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-green px-6 py-4">
                        <h3 class="text-xl font-bold text-slate-500">Atividade Recente</h3>
                        <p class="text-slate-700 text-sm font-medium">Suas últimas conquistas</p>
                    </div>
                    <div class="p-6">
                        <div class="space-y-6">
                            <div class="flex items-start group">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-gradient-green rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        <i class="fas fa-check text-white"></i>
                                    </div>
                                </div>
                                <div class="ml-4 flex-1">
                                    <p class="text-lg font-semibold text-gray-900">Aula concluída</p>
                                    <p class="text-gray-600">Introdução ao Laravel</p>
                                    <p class="text-sm text-gray-400 mt-1">2 horas atrás</p>
                                </div>
                            </div>
                            <div class="flex items-start group">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-gradient-blue-purple rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        <i class="fas fa-play text-white"></i>
                                    </div>
                                </div>
                                <div class="ml-4 flex-1">
                                    <p class="text-lg font-semibold text-gray-900">Quiz iniciado</p>
                                    <p class="text-gray-600">Fundamentos do PHP</p>
                                    <p class="text-sm text-gray-400 mt-1">1 dia atrás</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Certificates -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-yellow-orange-500 px-6 py-4">
                        <h3 class="text-xl font-bold text-slate-500">Certificados</h3>
                        <p class="text-slate-700 text-sm font-medium">Suas conquistas profissionais</p>
                    </div>
                    <div class="p-6">
                        @if($certificatesCount > 0)
                            <div class="space-y-4">
                                @foreach(auth()->user()->certificates()->latest()->take(2)->get() as $certificate)
                                <div class="group bg-gradient-to-r from-yellow-50 to-orange-50 rounded-2xl p-4 hover:shadow-lg transition-all duration-300 border border-yellow-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="w-12 h-12 bg-gradient-yellow-orange-500 rounded-2xl flex items-center justify-center shadow-lg">
                                                <i class="fas fa-certificate text-white"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <p class="text-lg font-semibold text-gray-900">{{ $certificate->course->title }}</p>
                                            <p class="text-sm text-gray-600">{{ $certificate->issued_at->format('d/m/Y') }}</p>
                                        </div>
                                        <a href="{{ route('certificates.show', $certificate) }}" 
                                           class="text-yellow-600 hover:text-yellow-700 transform hover:scale-110 transition-all duration-300">
                                            <i class="fas fa-external-link-alt text-lg"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="mt-6">
                                <a href="{{ route('certificates.index') }}" 
                                   class="w-full bg-gradient-yellow-orange-500 text-slate-700 px-6 py-3 rounded-2xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300 text-center block">
                                    Ver todos os certificados
                                </a>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="w-20 h-20 bg-gradient-to-br from-yellow-100 to-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-certificate text-yellow-500 text-2xl"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Nenhum certificado ainda</h4>
                                <p class="text-gray-600 text-sm">Complete cursos para obter certificados</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
