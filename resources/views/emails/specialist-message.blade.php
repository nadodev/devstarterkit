<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nova mensagem de especialista</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #dc2626, #ea580c, #f59e0b); color: white; padding: 20px; border-radius: 10px 10px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border-radius: 0 0 10px 10px; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #dc2626; }
        .value { margin-top: 5px; }
        .message-box { background: white; padding: 15px; border-left: 4px solid #dc2626; margin: 15px 0; }
        .footer { text-align: center; margin-top: 20px; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>💬 Nova Mensagem de Especialista</h2>
            <p>Alguém está solicitando ajuda através do site!</p>
        </div>
        
        <div class="content">
            <div class="field">
                <div class="label">👤 Nome:</div>
                <div class="value">{{ $name }}</div>
            </div>
            
            <div class="field">
                <div class="label">📧 Email:</div>
                <div class="value">{{ $email }}</div>
            </div>
            
            @if($whatsapp)
            <div class="field">
                <div class="label">📱 WhatsApp:</div>
                <div class="value">{{ $whatsapp }}</div>
            </div>
            @endif
            
            <div class="field">
                <div class="label">📋 Assunto:</div>
                <div class="value">{{ $subject_text }}</div>
            </div>
            
            <div class="field">
                <div class="label">💬 Mensagem:</div>
                <div class="message-box">{{ $message }}</div>
            </div>
            
            <div class="field">
                <div class="label">🌐 Informações Técnicas:</div>
                <div class="value">
                    <strong>IP:</strong> {{ $ip_address }}<br>
                    <strong>Data/Hora:</strong> {{ $timestamp }}
                </div>
            </div>
        </div>
        
        <div class="footer">
            <p>Esta mensagem foi enviada através do formulário "Falar com Especialista" do site DevStarter Kit.</p>
            <p>Para responder, use o email: {{ $email }}</p>
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
