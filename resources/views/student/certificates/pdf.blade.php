<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado - {{ $certificate->course->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 5px;
            background-color: #f8f9fa;
        }
        
        .certificate-container {
            max-width: 100%;
            margin: 0 auto;
            background: white;
            border: 6px solid #1e40af;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .certificate-header {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: white;
            padding: 15px;
            text-align: center;
            position: relative;
        }
        
        .logo-section {
            position: absolute;
            top: 15px;
            left: 20px;
            text-align: left;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            margin-bottom: 2px;
        }
        
        .logo-subtitle {
            font-size: 10px;
            color: #bfdbfe;
        }
        
        .certificate-icon {
            width: 50px;
            height: 50px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            font-size: 20px;
        }
        
        .certificate-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .certificate-subtitle {
            font-size: 12px;
            color: #bfdbfe;
        }
        
        .certificate-content {
            padding: 15px;
        }
        
        .student-name {
            font-size: 28px;
            font-weight: bold;
            color: #1f2937;
            text-align: center;
            margin-bottom: 15px;
        }
        
        .course-description {
            font-size: 16px;
            color: #6b7280;
            text-align: center;
            margin-bottom: 15px;
        }
        
        .course-title {
            font-size: 20px;
            font-weight: 600;
            color: #1e40af;
            text-align: center;
            margin-bottom: 20px;
        }
        
        .decorative-line {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 20px 0;
        }
        
        .line {
            width: 40px;
            height: 2px;
            background: #1e40af;
        }
        
        .star {
            margin: 0 15px;
            font-size: 18px;
            color: #1e40af;
        }
        
        .simple-stats {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
            padding: 15px;
            background: #f8fafc;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        
        .stat-item {
            text-align: center;
            flex: 1;
        }
        
        .stat-label {
            display: block;
            font-size: 11px;
            color: #6b7280;
            margin-bottom: 4px;
        }
        
        .stat-value {
            display: block;
            font-size: 14px;
            font-weight: bold;
            color: #1e40af;
        }
        
        .info-section {
            border-top: 2px solid #e5e7eb;
            padding-top: 20px;
            margin-top: 20px;
        }
        
        .info-grid {
            display: flex;
            justify-content: space-between;
        }
        
        .info-column {
            flex: 1;
            margin: 0 15px;
        }
        
        .info-title {
            font-size: 14px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 10px;
            text-align: center;
        }
        
        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 6px 0;
            border-bottom: 1px solid #f3f4f6;
        }
        
        .info-label {
            font-weight: 600;
            color: #374151;
            font-size: 12px;
        }
        
        .info-value {
            color: #1f2937;
            font-family: monospace;
            font-size: 11px;
        }
        
        .certificate-footer {
            background: #f9fafb;
            padding: 15px 25px;
            border-top: 2px solid #e5e7eb;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .footer-section {
            text-align: center;
        }
        
        .footer-text {
            font-size: 11px;
            color: #6b7280;
        }
        
        .validation-code {
            font-family: monospace;
            font-weight: bold;
            color: #1f2937;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <!-- Header do Certificado -->
        <div class="certificate-header">
            <div class="logo-section">
                <div class="logo">EDU</div>
                <div class="logo-subtitle">Plataforma de Ensino</div>
            </div>
            <div class="certificate-icon">🏆</div>
            <h1 class="certificate-title">CERTIFICADO DE CONCLUSÃO</h1>
            <p class="certificate-subtitle">Este certificado atesta que</p>
        </div>

        <!-- Conteúdo Principal -->
        <div class="certificate-content">
            <!-- Nome do Estudante -->
            <h2 class="student-name">{{ $certificate->user->name }}</h2>
            <p class="course-description">concluiu com sucesso o curso</p>
            <h3 class="course-title">{{ $certificate->course->title }}</h3>
            
            <!-- Linha decorativa -->
          

            <!-- Estatísticas Simplificadas -->
            <div class="simple-stats">
                <div class="stat-item">
                    <span class="stat-label">Aulas Concluídas:</span>
                    <span class="stat-value">{{ $certificate->completed_lessons }}/{{ $certificate->total_lessons }}</span>
                </div>
                <div class="stat-item">
                    <span class="stat-label">Quizzes Aprovados:</span>
                    <span class="stat-value">{{ $certificate->passed_quizzes }}/{{ $certificate->total_quizzes }}</span>
                </div>
                <div class="stat-item">
                    <span class="stat-label">Nota Final:</span>
                    <span class="stat-value">{{ number_format($certificate->final_score, 1) }}%</span>
                </div>
            </div>

            <!-- Informações do Certificado -->
            <div class="info-section">
                <div class="info-grid">
                    <div class="info-column">
                        <h4 class="info-title">Informações do Certificado</h4>
                        <div class="info-item">
                            <span class="info-label">Número:</span>
                            <span class="info-value">{{ $certificate->certificate_number }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Código de Validação:</span>
                            <span class="info-value validation-code">{{ $certificate->validation_code }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Emitido em:</span>
                            <span class="info-value">{{ $certificate->issued_at->format('d/m/Y') }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Instrutor:</span>
                            <span class="info-value">{{ $certificate->course->user->name }}</span>
                        </div>
                    </div>
                    <div class="info-column">
                        <h4 class="info-title">Detalhes do Curso</h4>
                        <div class="info-item">
                            <span class="info-label">Duração:</span>
                            <span class="info-value">{{ $certificate->course->duration_hours }}h</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Nível:</span>
                            <span class="info-value">{{ ucfirst($certificate->course->level) }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">Categoria:</span>
                            <span class="info-value">{{ $certificate->course->category->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer do Certificado -->
        <div class="certificate-footer">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-text">Certificado Digital - Verificado em {{ now()->format('d/m/Y') }}</div>
                </div>
                <div class="footer-section">
                    <div class="footer-text">Código de Validação: <span class="validation-code">{{ $certificate->validation_code }}</span></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
