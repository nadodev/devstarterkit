@extends('layouts.app')

@section('title', 'Certificado - ' . $certificate->course->title)

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">
                        <i class="fas fa-certificate mr-3 text-yellow-500"></i>Certificado de Conclusão
                    </h1>
                    <p class="mt-2 text-gray-600">
                        {{ $certificate->course->title }}
                    </p>
                </div>
                <div class="flex items-center space-x-4">
                    @if($certificate->is_valid)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            <i class="fas fa-check-circle mr-2"></i>Certificado Válido
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                            <i class="fas fa-times-circle mr-2"></i>Certificado Inválido
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Certificado -->
        <div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden">
            <!-- Header do Certificado -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-8">
                <div class="text-center">
                    <div class="w-20 h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-certificate text-3xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold mb-2">Certificado de Conclusão</h2>
                    <p class="text-blue-100">Este certificado atesta que</p>
                </div>
            </div>

            <!-- Conteúdo Principal -->
            <div class="p-8">
                <!-- Nome do Estudante -->
                <div class="text-center mb-8">
                    <h3 class="text-3xl font-bold text-gray-900 mb-2">{{ $certificate->user->name }}</h3>
                    <p class="text-lg text-gray-600">concluiu com sucesso o curso</p>
                    <h4 class="text-2xl font-semibold text-blue-600 mt-2">{{ $certificate->course->title }}</h4>
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
                                    <span class="text-gray-600">Emitido em:</span>
                                    <span class="text-gray-900">{{ $certificate->issued_at->format('d/m/Y') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Código de Validação:</span>
                                    <span class="font-mono text-gray-900 font-bold">{{ $certificate->validation_code }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Instrutor:</span>
                                    <span class="text-gray-900">{{ $certificate->course->user->name }}</span>
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

                <!-- Descrição -->
                @if($certificate->description)
                    <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                        <h5 class="font-semibold text-gray-900 mb-2">Descrição</h5>
                        <p class="text-gray-700">{{ $certificate->description }}</p>
                    </div>
                @endif
            </div>

            <!-- Footer do Certificado -->
            <div class="bg-gray-50 px-8 py-6 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-500">
                        <p>Este certificado foi emitido digitalmente e pode ser verificado online.</p>
                        <p class="mt-1">Para mais informações, entre em contato conosco.</p>
                    </div>
                    <div class="text-right">
                        <div class="text-sm text-gray-500">Verificado em</div>
                        <div class="font-semibold text-gray-900">{{ now()->format('d/m/Y H:i') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ações -->
        <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('certificates.download', $certificate) }}" 
               class="inline-flex items-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                <i class="fas fa-download mr-2"></i>Download PDF
            </a>
            <button onclick="shareOnLinkedIn()" 
                    class="inline-flex items-center px-6 py-3 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition">
                <i class="fab fa-linkedin mr-2"></i>Compartilhar no LinkedIn
            </button>
            <button onclick="copyCertificateLink()" 
                    class="inline-flex items-center px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                <i class="fas fa-link mr-2"></i>Copiar Link
            </button>
            <button onclick="copyValidationCode()" 
                    class="inline-flex items-center px-6 py-3 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition">
                <i class="fas fa-key mr-2"></i>Copiar Código
            </button>
            <button onclick="window.print()" 
                    class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-print mr-2"></i>Imprimir
            </button>
            <a href="{{ route('certificates.index') }}" 
               class="inline-flex items-center px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                <i class="fas fa-arrow-left mr-2"></i>Voltar aos Certificados
            </a>
        </div>
    </div>
</div>

<!-- Estilos para impressão -->
<style>
@media print {
    .no-print {
        display: none !important;
    }
    
    body {
        background: white !important;
    }
    
    .bg-gray-50 {
        background: white !important;
    }
    
    .shadow-lg {
        box-shadow: none !important;
    }
}
</style>

<!-- JavaScript para compartilhamento no LinkedIn -->
<script>
function shareOnLinkedIn() {
    try {
        // Texto personalizado para o LinkedIn
        const certificateTitle = "{{ $certificate->course->title }}";
        const studentName = "{{ $certificate->user->name }}";
        const finalScore = "{{ number_format($certificate->final_score, 1) }}%";
        const issuedDate = "{{ $certificate->issued_at->format('d/m/Y') }}";
        const completedLessons = "{{ $certificate->completed_lessons }}";
        const passedQuizzes = "{{ $certificate->passed_quizzes }}";
        
        // Texto do post
        const postText = `🎓 Acabei de concluir o curso "${certificateTitle}" com ${finalScore} de aproveitamento! 

✅ ${completedLessons} aulas concluídas
✅ ${passedQuizzes} quizzes aprovados
📅 Certificado emitido em ${issuedDate}

#Educação #Desenvolvimento #Certificação #Aprendizado`;

        // URL do LinkedIn para compartilhamento
        const linkedInUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(window.location.href)}&title=${encodeURIComponent(certificateTitle)}&summary=${encodeURIComponent(postText)}`;
        
        // Abrir em nova janela
        window.open(linkedInUrl, '_blank', 'width=600,height=400,scrollbars=yes,resizable=yes');
    } catch (error) {
        console.error('Erro ao compartilhar no LinkedIn:', error);
        alert('Erro ao abrir o LinkedIn. Tente novamente.');
    }
}

// Função alternativa para copiar link
function copyCertificateLink() {
    try {
        const certificateUrl = window.location.href;
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(certificateUrl).then(function() {
                alert('Link do certificado copiado para a área de transferência!');
            }).catch(function() {
                fallbackCopyTextToClipboard(certificateUrl);
            });
        } else {
            fallbackCopyTextToClipboard(certificateUrl);
        }
    } catch (error) {
        console.error('Erro ao copiar link:', error);
        alert('Erro ao copiar link. Tente selecionar e copiar manualmente.');
    }
}

// Função para copiar código de validação
function copyValidationCode() {
    try {
        const validationCode = "{{ $certificate->validation_code }}";
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(validationCode).then(function() {
                alert('Código de validação copiado para a área de transferência!');
            }).catch(function() {
                fallbackCopyTextToClipboard(validationCode);
            });
        } else {
            fallbackCopyTextToClipboard(validationCode);
        }
    } catch (error) {
        console.error('Erro ao copiar código:', error);
        alert('Erro ao copiar código. Tente selecionar e copiar manualmente.');
    }
}

// Função de fallback para copiar texto
function fallbackCopyTextToClipboard(text) {
    const textArea = document.createElement("textarea");
    textArea.value = text;
    textArea.style.top = "0";
    textArea.style.left = "0";
    textArea.style.position = "fixed";
    document.body.appendChild(textArea);
    textArea.focus();
    textArea.select();
    
    try {
        const successful = document.execCommand('copy');
        if (successful) {
            alert('Texto copiado para a área de transferência!');
        } else {
            alert('Erro ao copiar. Tente selecionar e copiar manualmente.');
        }
    } catch (err) {
        alert('Erro ao copiar. Tente selecionar e copiar manualmente.');
    }
    
    document.body.removeChild(textArea);
}
</script>
@endsection
