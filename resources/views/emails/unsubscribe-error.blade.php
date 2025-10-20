<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro na Desinscrição - DevStarter Kit</title>
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
            background: linear-gradient(135deg, #dc2626, #b91c1c); 
            color: white; 
            padding: 40px 30px; 
            text-align: center;
        }
        .content { 
            padding: 40px 30px; 
            text-align: center;
        }
        .error-icon { 
            font-size: 64px; 
            margin-bottom: 20px; 
        }
        .message { 
            font-size: 18px; 
            margin-bottom: 30px; 
            color: #374151;
        }
        .error-box { 
            background: #fef2f2; 
            border: 2px solid #fecaca; 
            color: #dc2626; 
            padding: 20px; 
            border-radius: 10px; 
            margin: 20px 0;
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
            background: linear-gradient(135deg, #dc2626, #b91c1c); 
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
        .help-section { 
            background: #f0f9ff; 
            border: 1px solid #bae6fd; 
            color: #0c4a6e; 
            padding: 20px; 
            border-radius: 10px; 
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="error-icon">❌</div>
            <h1>Erro na Desinscrição</h1>
            <p>Não foi possível processar sua solicitação</p>
        </div>
        
        <div class="content">
            <div class="error-box">
                <strong>⚠️ Erro:</strong> {{ $message }}
            </div>
            
            <div class="message">
                <strong>O que pode ter acontecido:</strong>
            </div>
            
            <div class="help-section">
                <ul style="text-align: left; margin: 20px 0;">
                    <li>🔗 <strong>Link expirado:</strong> O link pode ter expirado ou já foi usado</li>
                    <li>📧 <strong>Email incorreto:</strong> Verifique se o email está correto</li>
                    <li>🔒 <strong>Token inválido:</strong> O token de segurança pode estar incorreto</li>
                    <li>⏰ <strong>Problema temporário:</strong> Tente novamente em alguns minutos</li>
                </ul>
            </div>
            
            <div style="margin-top: 40px;">
                <a href="{{ route('home') }}" class="btn btn-primary">
                    🏠 Voltar ao Site
                </a>
                <a href="mailto:contato@devstarterkit.com" class="btn btn-secondary">
                    📧 Contatar Suporte
                </a>
            </div>
        </div>
        
        <div class="footer">
            <p><strong>DevStarter Kit</strong> - Ferramentas essenciais para desenvolvedores</p>
            <p>Se o problema persistir, entre em contato conosco</p>
        </div>
    </div>
</body>
</html>
