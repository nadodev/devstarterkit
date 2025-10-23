<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Mensagem de Contato</title>
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
            padding: 20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .content {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 0 0 8px 8px;
            border: 1px solid #e9ecef;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #f97316;
            display: inline-block;
            width: 100px;
        }
        .value {
            color: #333;
        }
        .message-box {
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
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>📧 Nova Mensagem de Contato</h1>
        <p>DevStarter Kit - Sistema de Contato</p>
    </div>
    
    <div class="content">
        <h2>Detalhes da Mensagem</h2>
        
        <div class="field">
            <span class="label">Nome:</span>
            <span class="value">{{ $name }}</span>
        </div>
        
        <div class="field">
            <span class="label">E-mail:</span>
            <span class="value">{{ $email }}</span>
        </div>
        
        @if($phone)
        <div class="field">
            <span class="label">Telefone:</span>
            <span class="value">{{ $phone }}</span>
        </div>
        @endif
        
        <div class="field">
            <span class="label">Assunto:</span>
            <span class="value">{{ $subject }}</span>
        </div>
        
        <div class="message-box">
            <h3>Mensagem:</h3>
            <p>{{ $message }}</p>
        </div>
        
        <div class="field">
            <span class="label">Data/Hora:</span>
            <span class="value">{{ $timestamp }}</span>
        </div>
        
        <div class="field">
            <span class="label">IP:</span>
            <span class="value">{{ $ip }}</span>
        </div>
        
        <a href="mailto:{{ $email }}?subject=Re: {{ $subject }}" class="btn">
            Responder por E-mail
        </a>
    </div>
    
    <div class="footer">
        <p>Esta mensagem foi enviada através do formulário de contato do DevStarter Kit.</p>
        <p>Para responder, clique no botão acima ou responda diretamente para: {{ $email }}</p>
    </div>
</body>
</html>
