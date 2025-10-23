<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensagem Recebida - DevStarter Kit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: white;
            padding: 30px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .content {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 8px 8px;
            border: 1px solid #e9ecef;
        }
        .success-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .highlight {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .info-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #f97316;
            margin: 20px 0;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
            font-size: 12px;
            color: #666;
            text-align: center;
        }
        .btn {
            display: inline-block;
            background: #f97316;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 5px;
        }
        .btn-secondary {
            background: #6c757d;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="success-icon">✅</div>
        <h1>Mensagem Recebida!</h1>
        <p>Obrigado por entrar em contato conosco</p>
    </div>
    
    <div class="content">
        <h2>Olá, {{ $name }}!</h2>
        
        <p>Recebemos sua mensagem e agradecemos pelo contato. Nossa equipe analisará sua solicitação e retornaremos em breve.</p>
        
        <div class="highlight">
            <strong>📋 Resumo da sua mensagem:</strong><br>
            <strong>Assunto:</strong> {{ $subject }}<br>
            <strong>Data:</strong> {{ $timestamp }}
        </div>
        
        <div class="info-box">
            <h3>⏱️ Tempo de Resposta</h3>
            <ul>
                <li><strong>Suporte Técnico:</strong> Até 4 horas</li>
                <li><strong>Dúvidas Gerais:</strong> Até 24 horas</li>
                <li><strong>WhatsApp:</strong> Resposta imediata</li>
            </ul>
        </div>
        
        <h3>🔗 Links Úteis</h3>
        <p>Enquanto aguarda nossa resposta, você pode:</p>
        
        <a href="{{ route('help-center') }}" class="btn">Central de Ajuda</a>
        <a href="{{ route('documentation') }}" class="btn btn-secondary">Documentação</a>
        
        <div class="info-box">
            <h3>📞 Outras Formas de Contato</h3>
            <p><strong>WhatsApp:</strong> (11) 99999-9999<br>
            <strong>E-mail:</strong> suporte@devstarterkit.com<br>
            <strong>Discord:</strong> Comunidade DevStarter</p>
        </div>
    </div>
    
    <div class="footer">
        <p>Esta é uma mensagem automática do DevStarter Kit.</p>
        <p>Se você não enviou esta mensagem, por favor ignore este e-mail.</p>
        <p>© 2025 DevStarter Kit - Todos os direitos reservados.</p>
    </div>
</body>
</html>
