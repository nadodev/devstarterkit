<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado - {{ $certificate->course->title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        @media print {
            body { margin: 0; }
            .no-print { display: none !important; }
            .print-break { page-break-after: always; }
        }
        
        .certificate-border {
            border: 8px solid #1e40af;
            border-radius: 20px;
        }
        
        .certificate-pattern {
            background-image: 
                radial-gradient(circle at 20px 20px, rgba(59, 130, 246, 0.1) 1px, transparent 1px),
                radial-gradient(circle at 40px 40px, rgba(59, 130, 246, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Certificado -->
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-4xl">
            <div class="certificate-border certificate-pattern bg-white">
                <!-- Header do Certificado -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-12 text-center">
                    <div class="w-24 h-24 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-certificate text-4xl"></i>
                    </div>
                    <h1 class="text-4xl font-bold mb-4">CERTIFICADO DE CONCLUSÃO</h1>
                    <p class="text-xl text-blue-100">Este certificado atesta que</p>
                </div>

                <!-- Conteúdo Principal -->
                <div class="p-12">
                    <!-- Nome do Estudante -->
                    <div class="text-center mb-12">
                        <h2 class="text-5xl font-bold text-gray-900 mb-4">{{ $certificate->user->name }}</h2>
                        <p class="text-2xl text-gray-600 mb-4">concluiu com sucesso o curso</p>
                        <h3 class="text-3xl font-semibold text-blue-600 mb-8">{{ $certificate->course->title }}</h3>
                        
                        <!-- Linha decorativa -->
                        <div class="flex items-center justify-center mb-8">
                            <div class="w-16 h-1 bg-blue-600"></div>
                            <div class="mx-4">
                                <i class="fas fa-star text-blue-600 text-2xl"></i>
                            </div>
                            <div class="w-16 h-1 bg-blue-600"></div>
                        </div>
                    </div>

                    <!-- Estatísticas do Curso -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                        <div class="text-center p-6 bg-blue-50 rounded-lg border-2 border-blue-200">
                            <div class="text-3xl font-bold text-blue-600 mb-2">{{ $certificate->completed_lessons }}</div>
                            <div class="text-sm text-gray-600">Aulas Concluídas</div>
                            <div class="text-xs text-gray-500">de {{ $certificate->total_lessons }} total</div>
                        </div>
                        <div class="text-center p-6 bg-green-50 rounded-lg border-2 border-green-200">
                            <div class="text-3xl font-bold text-green-600 mb-2">{{ $certificate->passed_quizzes }}</div>
                            <div class="text-sm text-gray-600">Quizzes Aprovados</div>
                            <div class="text-xs text-gray-500">de {{ $certificate->total_quizzes }} total</div>
                        </div>
                        <div class="text-center p-6 bg-yellow-50 rounded-lg border-2 border-yellow-200">
                            <div class="text-3xl font-bold text-yellow-600 mb-2">{{ number_format($certificate->final_score, 1) }}%</div>
                            <div class="text-sm text-gray-600">Nota Final</div>
                            <div class="text-xs text-gray-500">Média dos Quizzes</div>
                        </div>
                    </div>

                    <!-- Informações do Certificado -->
                    <div class="border-t-2 border-gray-200 pt-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-4 text-center">Informações do Certificado</h4>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                        <span class="font-semibold text-gray-700">Número:</span>
                                        <span class="font-mono text-gray-900">{{ $certificate->certificate_number }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                        <span class="font-semibold text-gray-700">Emitido em:</span>
                                        <span class="text-gray-900">{{ $certificate->issued_at->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                        <span class="font-semibold text-gray-700">Instrutor:</span>
                                        <span class="text-gray-900">{{ $certificate->course->user->name }}</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900 mb-4 text-center">Detalhes do Curso</h4>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                        <span class="font-semibold text-gray-700">Duração:</span>
                                        <span class="text-gray-900">{{ $certificate->course->duration_hours }}h</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                        <span class="font-semibold text-gray-700">Nível:</span>
                                        <span class="text-gray-900">{{ ucfirst($certificate->course->level) }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                        <span class="font-semibold text-gray-700">Categoria:</span>
                                        <span class="text-gray-900">{{ $certificate->course->category->name ?? 'N/A' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer do Certificado -->
                <div class="bg-gray-50 px-12 py-8 border-t-2 border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="text-center">
                            <div class="w-24 h-24 bg-blue-600 rounded-lg flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-certificate text-white text-2xl"></i>
                            </div>
                            <div class="text-sm font-semibold text-gray-700">Certificado Digital</div>
                            <div class="text-xs text-gray-500">Verificado em {{ now()->format('d/m/Y') }}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-sm text-gray-500 mb-1">Este certificado foi emitido digitalmente</div>
                            <div class="text-xs text-gray-400">e pode ser verificado online</div>
                        </div>
                        <div class="text-center">
                            <div class="w-24 h-24 bg-green-600 rounded-lg flex items-center justify-center mx-auto mb-2">
                                <i class="fas fa-check text-white text-2xl"></i>
                            </div>
                            <div class="text-sm font-semibold text-gray-700">Certificado Válido</div>
                            <div class="text-xs text-gray-500">Número: {{ $certificate->certificate_number }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Botões de Ação (não aparecem na impressão) -->
    <div class="fixed bottom-4 right-4 no-print">
        <div class="flex space-x-2">
            <button onclick="window.print()" 
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-print mr-2"></i>Imprimir
            </button>
            <a href="{{ route('certificates.show', $certificate) }}" 
               class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                <i class="fas fa-arrow-left mr-2"></i>Voltar
            </a>
        </div>
    </div>
</body>
</html>
