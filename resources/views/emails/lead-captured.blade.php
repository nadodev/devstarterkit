<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Lead Capturado</title>
    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8fafc;
        }
        .container {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #DC2626 0%, #EA580C 50%, #EAB308 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 30px;
        }
        .lead-info {
            background: #f8fafc;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .label {
            font-weight: 600;
            color: #4a5568;
        }
        .value {
            color: #2d3748;
        }
        .cta {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: white;
            padding: 15px 30px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin: 20px 0;
            font-weight: 600;
        }
        .footer {
            text-align: center;
            color: #718096;
            font-size: 14px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔥 Novo Lead Capturado!</h1>
            <p>DevStarter Kit - Landing Page</p>
        </div>

        <h2>📊 Informações do Lead</h2>
        <div class="lead-info">
            <div class="info-row">
                <span class="label">Nome:</span>
                <span class="value">{{ $leadData['name'] ?: 'Não informado' }}</span>
            </div>
            <div class="info-row">
                <span class="label">Email:</span>
                <span class="value">{{ $leadData['email'] }}</span>
            </div>
            <div class="info-row">
                <span class="label">WhatsApp:</span>
                <span class="value">{{ $leadData['whatsapp'] ?: 'Não informado' }}</span>
            </div>
            <div class="info-row">
                <span class="label">IP:</span>
                <span class="value">{{ $leadData['ip_address'] }}</span>
            </div>
            <div class="info-row">
                <span class="label">Data/Hora:</span>
                <span class="value">{{ $leadData['created_at']->format('d/m/Y H:i:s') }}</span>
            </div>
        </div>

        <h3>📧 Próximos Passos</h3>
        <ul>
            <li>✅ Email de confirmação enviado para o lead</li>
            <li>📋 Adicione o lead ao seu CRM</li>
            <li>📞 Entre em contato em até 24h para melhor conversão</li>
            <li>📊 Acompanhe as métricas de conversão</li>
        </ul>

        <div style="text-align: center; margin: 30px 0;">
            <a href="mailto:{{ $leadData['email'] }}" class="cta">
                📧 Responder ao Lead
            </a>
        </div>

        <div class="footer">
            <p>Este email foi enviado automaticamente pelo sistema DevStarter Kit</p>
            <p>Data: {{ now()->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>
</body>
</html>
