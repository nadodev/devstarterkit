@extends('layouts.app')

@section('title', 'Meus Certificados')

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
                <i class="fas fa-certificate text-yellow-400 mr-2"></i>
                Seus certificados
            </div>
            
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Meus
                <span class="text-gradient-yellow-orange">
                    Certificados
                </span>
            </h1>
            
            <p class="text-xl md:text-2xl text-blue-100 leading-relaxed max-w-3xl mx-auto">
                Gerencie e visualize todos os seus certificados de conclusão
            </p>
            
            <div class="mt-6">
                <span class="bg-white/20 backdrop-blur-sm text-white text-sm font-semibold px-4 py-2 rounded-full">
                    {{ $certificates->count() }} certificado(s) emitido(s)
                </span>
            </div>
        </div>
    </div>
</section>

<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4">

        @if($certificates->count() > 0)
            <!-- Grid de Certificados -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($certificates as $certificate)
                    <div class="group bg-white rounded-2xl shadow-lg border border-gray-200 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                        <!-- Header do Certificado -->
                        <div class="p-6 border-b border-gray-200">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-gradient-yellow-orange-500 rounded-2xl flex items-center justify-center">
                                        <i class="fas fa-certificate text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 text-lg">
                                            {{ $certificate->course->title }}
                                        </h3>
                                        <p class="text-sm text-gray-500">
                                            {{ $certificate->course->user->name }}
                                        </p>
                                    </div>
                                </div>
                                @if($certificate->is_valid)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i>Válido
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-times-circle mr-1"></i>Inválido
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Número do Certificado -->
                            <div class="bg-gray-50 rounded-lg p-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-gray-700">Número do Certificado:</span>
                                    <span class="text-sm font-mono text-gray-900">{{ $certificate->certificate_number }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Conteúdo do Certificado -->
                        <div class="p-6">
                            <!-- Estatísticas -->
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-blue-600">{{ $certificate->completed_lessons }}</div>
                                    <div class="text-xs text-gray-500">Aulas Concluídas</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-green-600">{{ $certificate->passed_quizzes }}</div>
                                    <div class="text-xs text-gray-500">Quizzes Aprovados</div>
                                </div>
                            </div>

                            <!-- Nota Final -->
                            @if($certificate->final_score)
                                <div class="bg-blue-50 rounded-lg p-3 mb-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-blue-700">Nota Final:</span>
                                        <span class="text-lg font-bold text-blue-900">{{ number_format($certificate->final_score, 1) }}%</span>
                                    </div>
                                </div>
                            @endif

                            <!-- Data de Emissão -->
                            <div class="text-sm text-gray-500 mb-4">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                Emitido em {{ $certificate->issued_at->format('d/m/Y') }}
                            </div>

                            <!-- Ações -->
                            <div class="flex space-x-2">
                                <a href="{{ route('certificates.show', $certificate) }}" 
                                   class="flex-1 bg-blue-600 text-white px-4 py-2 rounded-lg text-center text-sm font-medium hover:bg-blue-700 transition">
                                    <i class="fas fa-eye mr-2"></i>Visualizar
                                </a>
                                <a href="{{ route('certificates.download', $certificate) }}" 
                                   class="flex-1 bg-green-600 text-white px-4 py-2 rounded-lg text-center text-sm font-medium hover:bg-green-700 transition">
                                    <i class="fas fa-download mr-2"></i>Download
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Estado Vazio -->
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-certificate text-gray-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Nenhum certificado encontrado</h3>
                <p class="text-gray-500 mb-6">
                    Você ainda não possui certificados. Complete um curso para gerar seu primeiro certificado!
                </p>
                <a href="{{ route('student.courses.index') }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                    <i class="fas fa-book mr-2"></i>Explorar Cursos
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
