<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject ?? 'DevStarter Kit' }}</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            line-height: 1.6; 
            color: #333; 
            margin: 0; 
            padding: 0; 
            background: #f9fafb;
        }
        .container { 
            max-width: 600px; 
            margin: 20px auto; 
            background: white; 
            border-radius: 10px; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header { 
            background: linear-gradient(135deg, #dc2626, #ea580c, #f59e0b); 
            color: white; 
            padding: 30px; 
            text-align: center;
        }
        .content { 
            padding: 30px; 
        }
        .footer { 
            background: #f9fafb; 
            padding: 20px; 
            text-align: center; 
            color: #6b7280; 
            font-size: 12px;
            border-top: 1px solid #e5e7eb;
        }
        .unsubscribe-link { 
            color: #6b7280; 
            text-decoration: underline; 
            font-size: 11px;
        }
        .unsubscribe-link:hover { 
            color: #374151;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $title ?? 'DevStarter Kit' }}</h1>
            @if(isset($subtitle))
            <p>{{ $subtitle }}</p>
            @endif
        </div>
        
        <div class="content">
            @yield('content')
        </div>
        
        <div class="footer">
            <p><strong>DevStarter Kit</strong> - Ferramentas essenciais para desenvolvedores</p>
            <p>Este é um email automático. Não responda a esta mensagem.</p>
            <hr style="margin: 15px 0; border: none; border-top: 1px solid #e5e7eb;">
            @if(isset($email))
            <p>
                <a href="{{ route('email.unsubscribe', ['email' => $email]) }}" 
                   class="unsubscribe-link">
                    📧 Cancelar recebimento de emails
                </a>
            </p>
            @endif
        </div>
    </div>
</body>
</html>
