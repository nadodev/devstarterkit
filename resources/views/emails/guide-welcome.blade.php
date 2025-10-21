<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu guia está aqui 🚀</title>
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
            font-size: 28px;
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
            background: #f0f9ff;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .benefits ul {
            margin: 0;
            padding-left: 20px;
        }
        .benefits li {
            margin-bottom: 8px;
            color: #1e40af;
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
        
        <h1 class="title">Seu guia está aqui 🚀</h1>
        
        <p>Olá, dev 👋</p>
        
        <p>Aqui é o Leonardo, criador do DevStarter Kit.</p>
        
        <p>Como prometido, aqui está seu acesso ao mini-guia gratuito:</p>
        
        <div style="text-align: center;">
            <a href="{{ asset('Domine-Estruturas-Laravel-Do-Zero-ao-Sistema-Profissional.pdf') }}" class="cta-button" target="_blank">
                📘 Baixar "Como Criar Estruturas de Sistema Profissionais do Zero"
            </a>
        </div>
        
        <div style="text-align: center; margin: 20px 0;">
            <a href="https://github.com/nadodev/templates-login-dashboard-CRUD-basico" class="cta-button" target="_blank" style="background: linear-gradient(135deg, #24292e 0%, #586069 100%);">
                💻 Acessar Templates no GitHub
            </a>
        </div>
        
        <div class="benefits">
            <p><strong>Nesse guia você vai aprender:</strong></p>
            <ul>
                <li>Os 5 erros que travam o início de qualquer projeto</li>
                <li>Como planejar a base de um sistema moderno</li>
                <li>E um exercício prático para montar sua estrutura ideal</li>
            </ul>
        </div>
        
        <p>Esse é o mesmo método que uso no DevStarter Kit, nossa base completa em Laravel + Blade para criar sistemas profissionais em horas.</p>
        
        <p>Aproveite o material — e amanhã te envio um e-mail mostrando como aplicar isso na prática com o Kit.</p>
        
        <div class="signature">
            <p>Bons códigos,<br>
            Leonardo Geja<br>
            DevStarter Kit</p>
        </div>
        
        <div class="footer">
            <div class="unsubscribe">
                <p>🔒 Sem spam. Você pode <a href="{{ $unsubscribeLink }}">sair da lista a qualquer momento</a>.</p>
            </div>
        </div>
    </div>
</body>
</html>
