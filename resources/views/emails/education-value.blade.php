<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Como eu economizo 40h por projeto</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
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
            padding: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #3b82f6;
            margin-bottom: 10px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 20px;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 18px;
            margin: 20px 0;
            text-align: center;
        }
        .cta-button:hover {
            background: linear-gradient(135deg, #2563eb, #7c3aed);
        }
        .benefits {
            background: #f0fdf4;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #22c55e;
        }
        .benefits ul {
            margin: 0;
            padding-left: 20px;
        }
        .benefits li {
            margin-bottom: 8px;
            color: #166534;
        }
        .highlight {
            background: #fef3c7;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #f59e0b;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            font-size: 14px;
            color: #6b7280;
        }
        .signature {
            margin-top: 30px;
            font-weight: bold;
            color: #1f2937;
        }
        .unsubscribe {
            margin-top: 20px;
            font-size: 12px;
            color: #9ca3af;
        }
        .unsubscribe a {
            color: #6b7280;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">🚀 DevStarter Kit</div>
        </div>
        
        <h1 class="title">Como eu economizo 40h por projeto (sem começar do zero)</h1>
        
        <p>Fala, dev! 👋</p>
        
        <p>Ontem você recebeu o guia com a estrutura profissional de sistemas.<br>
        Hoje quero te mostrar como isso se aplica na prática.</p>
        
        <p>Sempre que começo um novo projeto, em vez de configurar autenticação, layout, rotas e permissões do zero, eu uso a base do DevStarter Kit.</p>
        
        <div class="benefits">
            <p><strong>Resultado?</strong></p>
            <ul>
                <li>Login e painel prontos ✅</li>
                <li>Layout moderno com Tailwind ✅</li>
                <li>Estrutura modular em Laravel ✅</li>
            </ul>
        </div>
        
        <div class="highlight">
            <p><strong>Em média, isso me economiza mais de 40 horas por projeto.</strong></p>
            <p>E o melhor: qualquer dev pode usar, mesmo começando agora.</p>
        </div>
        
        <div style="text-align: center;">
            <a href="{{ $demoLink }}" class="cta-button">
                👉 Veja a demo do DevStarter Kit em ação
            </a>
        </div>
        
        <p>Amanhã te mando um bônus especial que normalmente vendo por R$197, mas quero liberar pra você de graça.</p>
        
        <div class="signature">
            <p>Até lá 👋<br>
            Leonardo Geja</p>
        </div>
        
        <div class="footer">
            <div class="unsubscribe">
                <p>🔒 Sem spam. Você pode <a href="{{ $unsubscribeLink }}">sair da lista a qualquer momento</a>.</p>
            </div>
        </div>
    </div>
</body>
</html>
