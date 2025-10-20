@extends('layouts.app')

@section('title', 'Validar Certificado')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">
                <i class="fas fa-shield-alt mr-3 text-blue-500"></i>Validar Certificado
            </h1>
            <p class="mt-2 text-gray-600">
                Digite o código de validação para verificar a autenticidade do certificado
            </p>
        </div>

        <!-- Formulário de Validação -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <form method="GET" action="{{ route('certificates.validate') }}" class="max-w-md mx-auto">
                <div class="mb-6">
                    <label for="code" class="block text-sm font-medium text-gray-700 mb-2">
                        Código de Validação
                    </label>
                    <input type="text" 
                           id="code" 
                           name="code" 
                           value="{{ request('code') }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-center text-lg font-mono tracking-wider"
                           placeholder="Digite o código de validação"
                           required>
                    <p class="mt-2 text-sm text-gray-500">
                        O código de validação é um código único de 8 caracteres encontrado no certificado
                    </p>
                </div>
                
                <button type="submit" 
                        class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-medium">
                    <i class="fas fa-search mr-2"></i>Validar Certificado
                </button>
            </form>
        </div>

        @if($error)
            <!-- Erro -->
            <div class="bg-red-50 border border-red-200 rounded-lg p-6 mb-8">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-triangle text-red-500 text-xl mr-3"></i>
                    <div>
                        <h3 class="text-lg font-semibold text-red-800">Erro na Validação</h3>
                        <p class="text-red-700 mt-1">{{ $error }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if($certificate)
            <!-- Certificado Válido -->
            <div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden">
                <!-- Header do Certificado -->
                <div class="bg-gradient-to-r from-green-600 to-green-700 text-white p-8">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-check-circle text-3xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold mb-2">Certificado Válido</h2>
                        <p class="text-green-100">Este certificado foi verificado e é autêntico</p>
                    </div>
                </div>

                <!-- Conteúdo Principal -->
                <div class="p-8">
                    <!-- Nome do Estudante -->
                    <div class="text-center mb-8">
                        <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $certificate->user->name }}</h3>
                        <p class="text-lg text-gray-600">concluiu com sucesso o curso</p>
                        <h4 class="text-2xl font-semibold text-green-600 mt-2">{{ $certificate->course->title }}</h4>
                    </div>

                    <!-- Estatísticas do Curso -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="text-center p-4 bg-blue-50 rounded-lg">
                            <div class="text-2xl font-bold text-blue-600">{{ $certificate->completed_lessons }}</div>
                            <div class="text-sm text-gray-600">de {{ $certificate->total_lessons }} aulas concluídas</div>
                        </div>
                        <div class="text-center p-4 bg-green-50 rounded-lg">
                            <div class="text-2xl font-bold text-green-600">{{ $certificate->passed_quizzes }}</div>
                            <div class="text-sm text-gray-600">de {{ $certificate->total_quizzes }} quizzes aprovados</div>
                        </div>
                        <div class="text-center p-4 bg-yellow-50 rounded-lg">
                            <div class="text-2xl font-bold text-yellow-600">{{ number_format($certificate->final_score, 1) }}%</div>
                            <div class="text-sm text-gray-600">nota final</div>
                        </div>
                    </div>

                    <!-- Informações do Certificado -->
                    <div class="border-t border-gray-200 pt-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h5 class="font-semibold text-gray-900 mb-3">Informações do Certificado</h5>
                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Número:</span>
                                        <span class="font-mono text-gray-900">{{ $certificate->certificate_number }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Código de Validação:</span>
                                        <span class="font-mono text-gray-900 font-bold">{{ $certificate->validation_code }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Emitido em:</span>
                                        <span class="text-gray-900">{{ $certificate->issued_at->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Status:</span>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-1"></i>Válido
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h5 class="font-semibold text-gray-900 mb-3">Detalhes do Curso</h5>
                                <div class="space-y-2">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Duração:</span>
                                        <span class="text-gray-900">{{ $certificate->course->duration_hours }}h</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Nível:</span>
                                        <span class="text-gray-900">{{ ucfirst($certificate->course->level) }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Categoria:</span>
                                        <span class="text-gray-900">{{ $certificate->course->category->name ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer do Certificado -->
                <div class="bg-gray-50 px-8 py-6 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-500">
                            <p>Este certificado foi verificado e é autêntico.</p>
                            <p class="mt-1">Verificado em {{ now()->format('d/m/Y H:i') }}</p>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-gray-500">Código de Validação</div>
                            <div class="font-mono font-bold text-gray-900">{{ $certificate->validation_code }}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Informações sobre Validação -->
        <div class="mt-8 bg-blue-50 border border-blue-200 rounded-lg p-6">
            <h3 class="text-lg font-semibold text-blue-900 mb-3">
                <i class="fas fa-info-circle mr-2"></i>Sobre a Validação de Certificados
            </h3>
            <div class="text-blue-800 space-y-2">
                <p>• Cada certificado possui um código de validação único de 8 caracteres</p>
                <p>• Este código pode ser usado para verificar a autenticidade do certificado</p>
                <p>• A validação confirma que o certificado foi emitido oficialmente</p>
                <p>• O código de validação está localizado no certificado original</p>
            </div>
        </div>
    </div>
</div>
@endsection
