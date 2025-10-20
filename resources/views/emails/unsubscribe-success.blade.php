<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desinscrição Confirmada - DevStarter Kit</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            line-height: 1.6; 
            color: #333; 
            margin: 0; 
            padding: 0; 
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
        }
        .container { 
            max-width: 600px; 
            margin: 50px auto; 
            background: white; 
            border-radius: 15px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .header { 
            background: linear-gradient(135deg, #dc2626, #ea580c, #f59e0b); 
            color: white; 
            padding: 40px 30px; 
            text-align: center;
        }
        .content { 
            padding: 40px 30px; 
            text-align: center;
        }
        .success-icon { 
            font-size: 64px; 
            margin-bottom: 20px; 
        }
        .message { 
            font-size: 18px; 
            margin-bottom: 30px; 
            color: #374151;
        }
        .user-info { 
            background: #f9fafb; 
            padding: 20px; 
            border-radius: 10px; 
            margin: 20px 0; 
            border-left: 4px solid #10b981;
        }
        .resubscribe-section { 
            background: #fef3c7; 
            padding: 25px; 
            border-radius: 10px; 
            margin: 30px 0; 
            border: 2px solid #f59e0b;
        }
        .btn { 
            display: inline-block; 
            padding: 12px 30px; 
            text-decoration: none; 
            border-radius: 8px; 
            font-weight: bold; 
            margin: 10px; 
            transition: all 0.3s;
        }
        .btn-primary { 
            background: linear-gradient(135deg, #dc2626, #ea580c); 
            color: white; 
        }
        .btn-primary:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 5px 15px rgba(220, 38, 38, 0.3);
        }
        .btn-secondary { 
            background: #6b7280; 
            color: white; 
        }
        .btn-secondary:hover { 
            background: #4b5563;
        }
        .footer { 
            background: #f9fafb; 
            padding: 20px; 
            text-align: center; 
            color: #6b7280; 
            font-size: 14px;
        }
        .warning { 
            background: #fef2f2; 
            border: 1px solid #fecaca; 
            color: #dc2626; 
            padding: 15px; 
            border-radius: 8px; 
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="success-icon">✅</div>
            <h1>Desinscrição Confirmada</h1>
            <p>Você foi removido da nossa lista de emails</p>
        </div>
        
        <div class="content">
            <div class="message">
                <strong>Olá {{ $user->name }}!</strong><br>
                Sua desinscrição foi processada com sucesso.
            </div>
            
            <div class="user-info">
                <h3>📧 Informações da Conta</h3>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Desinscrito em:</strong> {{ now()->format('d/m/Y H:i') }}</p>
            </div>
            
            <div class="warning">
                <strong>⚠️ Importante:</strong> Você não receberá mais emails promocionais, mas ainda receberá emails essenciais como confirmações de compra e atualizações de conta.
            </div>
            
            @if(!isset($is_lead) || !$is_lead)
            <div class="resubscribe-section">
                <h3>🔄 Mudou de ideia?</h3>
                <p>Se você quiser voltar a receber nossos emails com novidades e ofertas especiais, clique no botão abaixo:</p>
                
                @if($resubscribe_token)
                <a href="{{ route('email.resubscribe', ['token' => $resubscribe_token]) }}" 
                   class="btn btn-primary">
                    📧 Reativar Emails
                </a>
                @else
                <a href="{{ route('email.resubscribe', ['email' => $user->email]) }}" 
                   class="btn btn-primary">
                    📧 Reativar Emails
                </a>
                @endif
            </div>
            @else
            <div class="resubscribe-section">
                <h3>🔄 Mudou de ideia?</h3>
                <p>Se você quiser voltar a receber nossos emails com novidades e ofertas especiais, clique no botão abaixo:</p>
                
                <a href="{{ route('email.resubscribe', ['email' => $user->email]) }}" 
                   class="btn btn-primary">
                    📧 Reativar Emails
                </a>
            </div>
            @endif
            
            <div style="margin-top: 40px;">
                <a href="{{ route('home') }}" class="btn btn-secondary">
                    🏠 Voltar ao Site
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    🛍️ Ver Produtos
                </a>
            </div>
        </div>
        
        <div class="footer">
            <p><strong>DevStarter Kit</strong> - Ferramentas essenciais para desenvolvedores</p>
            <p>Esta ação foi solicitada por você em {{ now()->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</body>
</html>
