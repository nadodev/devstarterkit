<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao DevStarter Kit!</title>
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
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 30px;
        }
        .welcome {
            background: #f0f9ff;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #3b82f6;
        }
        .guide-section {
            background: #f8fafc;
            padding: 25px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .cta-button {
            background: linear-gradient(135deg, #DC2626 0%, #EA580C 50%, #EAB308 100%);
            color: white;
            padding: 15px 30px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin: 20px 0;
            font-weight: 600;
            text-align: center;
        }
        .benefits {
            background: #f0fdf4;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .footer {
            text-align: center;
            color: #718096;
            font-size: 14px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e2e8f0;
        }
        .social-links {
            margin: 20px 0;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #4a5568;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Parabéns, {{ $leadData['name'] ?: 'Futuro Desenvolvedor' }}!</h1>
            <p>Você acaba de dar o primeiro passo para acelerar seus projetos!</p>
        </div>

        <div class="welcome">
            <h2>🚀 Bem-vindo ao DevStarter Kit!</h2>
            <p>Obrigado por se interessar pelo DevStarter Kit! Você está prestes a descobrir como criar sistemas completos em horas, não em semanas.</p>
        </div>

        <div class="guide-section">
            <h3>📚 Seu Guia Gratuito Está Aqui!</h3>
            <p><strong>"Como Criar Estruturas de Sistema Profissionais do Zero"</strong></p>
            
            <h4>🎯 O que você vai aprender:</h4>
            <ul>
                <li>✅ Os 5 erros que travam o início de qualquer projeto</li>
                <li>✅ Como planejar a base de um sistema moderno</li>
                <li>✅ Um exercício prático para estruturar seus módulos</li>
                <li>✅ Como o DevStarter Kit elimina essas barreiras automaticamente</li>
            </ul>

            <div style="text-align: center;">
                <a href="#" class="cta-button">
                    📥 Baixar Guia Gratuito
                </a>
            </div>
        </div>

        <div class="benefits">
            <h3>💡 Por que o DevStarter Kit é perfeito para você:</h3>
            <ul>
                <li>🧩 <strong>Estrutura pronta e modular</strong> - Tudo organizado e pronto para usar</li>
                <li>🔐 <strong>Login, registro e painel administrativo integrados</strong> - Sistema de autenticação completo</li>
                <li>🎨 <strong>Layout profissional com Tailwind + Vue</strong> - Design moderno e responsivo</li>
                <li>🌐 <strong>Página pública e sistema conectados</strong> - Landing page e painel integrados</li>
                <li>🚀 <strong>Pronto para personalizar e lançar</strong> - Base sólida para qualquer projeto</li>
            </ul>
        </div>

        <div style="background: #fef3c7; padding: 20px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #f59e0b;">
            <h3>🔥 Oferta Especial de Lançamento!</h3>
            <p><strong>De R$ 197 por apenas R$ 97</strong> - 50% de desconto!</p>
            <p>⏰ Oferta válida apenas por tempo limitado!</p>
            <div style="text-align: center;">
                <a href="#" class="cta-button">
                    🚀 QUERO O DEVSTARTER KIT AGORA
                </a>
            </div>
        </div>

        <div class="social-links">
            <h3>📱 Siga-nos nas redes sociais:</h3>
            <a href="#">🐦 Twitter</a>
            <a href="#">💼 LinkedIn</a>
            <a href="#">🐙 GitHub</a>
        </div>

        <div class="footer">
            <p><strong>DevStarter Kit</strong> - Aprenda, crie e entregue projetos completos de forma simples.</p>
            <p>Este email foi enviado para {{ $leadData['email'] }}</p>
            <p>Se você não solicitou este email, pode ignorá-lo com segurança.</p>
            <p>Data: {{ now()->format('d/m/Y H:i:s') }}</p>
            <hr style="margin: 15px 0; border: none; border-top: 1px solid #e5e7eb;">
            <p style="font-size: 12px; color: #9ca3af;">
                <a href="{{ route('email.unsubscribe', ['email' => $leadData['email']]) }}" 
                   style="color: #6b7280; text-decoration: underline;">
                    📧 Cancelar recebimento de emails
                </a>
            </p>
        </div>
    </div>
</body>
</html>
