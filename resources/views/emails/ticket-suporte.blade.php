<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo Ticket de Suporte</title>
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
            background: linear-gradient(135deg, #6B21A8, #1D4ED8);
            color: white;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .content {
            background: #f8f9fa;
            padding: 20px;
            border: 1px solid #dee2e6;
        }
        .ticket-info {
            background: white;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            border-left: 4px solid #6B21A8;
        }
        .priority {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .priority-baixa { background: #28a745; color: white; }
        .priority-media { background: #ffc107; color: black; }
        .priority-alta { background: #fd7e14; color: white; }
        .priority-urgente { background: #dc3545; color: white; }
        .footer {
            background: #6c757d;
            color: white;
            padding: 15px;
            border-radius: 0 0 8px 8px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎫 Novo Ticket de Suporte</h1>
        <p>Laravel ProStarter</p>
    </div>

    <div class="content">
        <h2>Informações do Ticket</h2>
        
        <div class="ticket-info">
            <p><strong>Nome:</strong> {{ $nome }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Assunto:</strong> {{ $assunto }}</p>
            <p><strong>Prioridade:</strong> 
                <span class="priority priority-{{ strtolower($prioridade) }}">{{ $prioridade }}</span>
            </p>
            <p><strong>Data:</strong> {{ $data }}</p>
        </div>

        <h3>Descrição do Problema:</h3>
        <div style="background: white; padding: 15px; border-radius: 5px; border: 1px solid #dee2e6;">
            {{ nl2br(e($descricao)) }}
        </div>

        <div style="margin-top: 20px; padding: 15px; background: #e3f2fd; border-radius: 5px;">
            <h4>📋 Próximos Passos:</h4>
            <ul>
                <li>Responder ao cliente em até 24 horas</li>
                <li>Usar o email: <strong>{{ $email }}</strong></li>
                <li>Manter o cliente informado sobre o progresso</li>
            </ul>
        </div>
    </div>

    <div class="footer">
        <p>Este ticket foi enviado através do sistema de suporte do Laravel ProStarter</p>
        <p>Para responder, use o email: {{ $email }}</p>
    </div>
</body>
</html>
