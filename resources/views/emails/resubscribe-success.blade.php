<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reativação Confirmada - DevStarter Kit</title>
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
            background: linear-gradient(135deg, #10b981, #059669, #047857); 
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
            background: #f0fdf4; 
            padding: 20px; 
            border-radius: 10px; 
            margin: 20px 0; 
            border-left: 4px solid #10b981;
        }
        .benefits-section { 
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
            background: linear-gradient(135deg, #10b981, #059669); 
            color: white; 
        }
        .btn-primary:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
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
        .success { 
            background: #f0fdf4; 
            border: 1px solid #bbf7d0; 
            color: #166534; 
            padding: 15px; 
            border-radius: 8px; 
            margin: 20px 0;
        }
        .benefits-list { 
            text-align: left; 
            margin: 20px 0;
        }
        .benefits-list li { 
            margin: 10px 0; 
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="success-icon">🎉</div>
            <h1>Reativação Confirmada!</h1>
            <p>Bem-vindo de volta à nossa comunidade!</p>
        </div>
        
        <div class="content">
            <div class="message">
                <strong>Olá {{ $user->name }}!</strong><br>
                Sua reativação foi processada com sucesso.
            </div>
            
            <div class="user-info">
                <h3>📧 Informações da Conta</h3>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Reativado em:</strong> {{ now()->format('d/m/Y H:i') }}</p>
                @if(isset($is_lead) && $is_lead)
                <p><strong>Tipo:</strong> Lead (não cadastrado)</p>
                @endif
            </div>
            
            <div class="success">
                <strong>✅ Perfeito!</strong> Agora você voltará a receber nossos emails com novidades, ofertas especiais e conteúdo exclusivo.
            </div>
            
            <div class="benefits-section">
                <h3>🎁 O que você vai receber:</h3>
                <div class="benefits-list">
                    <ul>
                        <li>📧 <strong>Novidades:</strong> Lançamentos de produtos e atualizações</li>
                        <li>💰 <strong>Ofertas especiais:</strong> Descontos exclusivos para assinantes</li>
                        <li>📚 <strong>Conteúdo exclusivo:</strong> Dicas e tutoriais avançados</li>
                        <li>🎯 <strong>Primeiro acesso:</strong> Seja o primeiro a saber sobre novos recursos</li>
                        <li>🏆 <strong>Eventos especiais:</strong> Webinars e workshops gratuitos</li>
                    </ul>
                </div>
            </div>
            
            <div style="margin-top: 40px;">
                <a href="{{ route('home') }}" class="btn btn-primary">
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
