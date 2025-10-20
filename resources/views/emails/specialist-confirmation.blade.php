<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mensagem recebida - DevStarter Kit</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #dc2626, #ea580c, #f59e0b); color: white; padding: 30px; border-radius: 10px 10px 0 0; text-align: center; }
        .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 10px 10px; }
        .success-icon { font-size: 48px; margin-bottom: 20px; }
        .highlight { background: #fff3cd; padding: 15px; border-left: 4px solid #f59e0b; margin: 20px 0; border-radius: 5px; }
        .cta-button { display: inline-block; background: linear-gradient(135deg, #dc2626, #ea580c); color: white; padding: 15px 30px; text-decoration: none; border-radius: 8px; font-weight: bold; margin: 20px 0; }
        .footer { text-align: center; margin-top: 30px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="success-icon">✅</div>
            <h2>Mensagem Recebida com Sucesso!</h2>
            <p>Olá {{ $name }}, recebemos sua mensagem e entraremos em contato em breve!</p>
        </div>
        
        <div class="content">
            <h3>📋 Resumo da sua mensagem:</h3>
            <div class="highlight">
                <strong>Assunto:</strong> {{ $subject_text }}<br>
                <strong>Enviado em:</strong> {{ $timestamp }}
            </div>
            
            <h3>⏰ O que acontece agora?</h3>
            <ul>
                <li>✅ Sua mensagem foi recebida e registrada</li>
                <li>📧 Nossa equipe analisará sua solicitação</li>
                <li>💬 Entraremos em contato em até 24 horas</li>
                <li>🎯 Forneceremos uma resposta personalizada</li>
            </ul>
            
            <h3>🚀 Enquanto isso, que tal conhecer nossos produtos?</h3>
            <p>Explore nossa seleção de ferramentas e recursos para desenvolvedores:</p>
            
            <a href="{{ route('products.index') }}" class="cta-button">
                🛍️ Ver Produtos Disponíveis
            </a>
            
            <h3>📞 Precisa de ajuda urgente?</h3>
            <p>Se sua dúvida for urgente, você também pode:</p>
            <ul>
                <li>📱 Enviar um WhatsApp para: <strong>+55 (11) 99999-9999</strong></li>
                <li>📧 Enviar um email direto para: <strong>contato@devstarterkit.com</strong></li>
            </ul>
        </div>
        
        <div class="footer">
            <p><strong>DevStarter Kit</strong> - Ferramentas essenciais para desenvolvedores</p>
            <p>Este é um email automático. Não responda a esta mensagem.</p>
            <hr style="margin: 20px 0; border: none; border-top: 1px solid #e5e7eb;">
            <p style="font-size: 12px; color: #9ca3af;">
                <a href="{{ route('email.unsubscribe', ['email' => $email]) }}" 
                   style="color: #6b7280; text-decoration: underline;">
                    📧 Cancelar recebimento de emails
                </a>
            </p>
        </div>
    </div>
</body>
</html>
