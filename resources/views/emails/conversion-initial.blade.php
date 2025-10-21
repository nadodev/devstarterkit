<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transforme seus projetos em horas, não semanas!</title>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #1F2937 0%, #374151 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        .header h1 {
            font-size: 28px;
            font-weight: bold;
            margin: 0 0 10px 0;
            font-family: 'Poppins', sans-serif;
        }
        .header p {
            font-size: 16px;
            margin: 0;
            opacity: 0.9;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 18px;
            color: #1F2937;
            margin-bottom: 20px;
        }
        .highlight {
            background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
        }
        .benefits {
            background-color: #F3F4F6;
            padding: 25px;
            border-radius: 8px;
            margin: 25px 0;
        }
        .benefits h3 {
            color: #1F2937;
            font-size: 20px;
            margin: 0 0 15px 0;
            font-family: 'Poppins', sans-serif;
        }
        .benefits ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .benefits li {
            padding: 8px 0;
            color: #374151;
            font-size: 16px;
        }
        .benefits li:before {
            content: "🔥";
            margin-right: 10px;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            margin: 25px 0;
            transition: all 0.3s ease;
        }
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.3);
        }
        .footer {
            background-color: #F9FAFB;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #E5E7EB;
        }
        .footer p {
            color: #6B7280;
            font-size: 14px;
            margin: 5px 0;
        }
        .unsubscribe {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #E5E7EB;
        }
        .unsubscribe a {
            color: #6B7280;
            text-decoration: none;
            font-size: 12px;
        }
        .unsubscribe a:hover {
            color: #374151;
        }
        @media (max-width: 600px) {
            .container {
                margin: 0;
                border-radius: 0;
            }
            .header, .content, .footer {
                padding: 20px;
            }
            .header h1 {
                font-size: 24px;
            }
            .cta-button {
                display: block;
                width: 100%;
                box-sizing: border-box;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>🚀 DevStarter Kit</h1>
            <p>Transforme seus projetos em horas, não semanas!</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Olá {{ $lead->name ?? 'dev' }},
            </div>

            <p>Você já conferiu seu bônus do DevStarter Kit, agora é hora de dar o próximo passo.</p>

            <p>Imagine entregar sistemas completos e profissionais em horas, com login, dashboard e templates prontos.</p>

            <div class="highlight">
                <h3 style="margin: 0 0 15px 0; color: white;">🔥 Com o DevStarter Kit você:</h3>
                <ul style="list-style: none; padding: 0; margin: 0; color: white;">
                    <li>✅ Economiza até 40 horas de desenvolvimento por projeto</li>
                    <li>✅ Ganha uma base modular pronta para qualquer sistema</li>
                    <li>✅ Recebe suporte e acesso à comunidade de desenvolvedores</li>
                </ul>
            </div>

            <p><strong>E mais:</strong> incluímos o bônus PDF e o template GitHub totalmente gratuitos na compra.</p>

            <p>Não perca tempo, comece seu próximo projeto hoje mesmo.</p>

            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ url('/conversion') }}" class="cta-button">
                    Quero o DevStarter Kit Agora
                </a>
            </div>

            <div class="benefits">
                <h3>🎁 Bônus Inclusos (R$ 197):</h3>
                <ul>
                    <li>Guia "Como Criar Estruturas de Sistema Profissionais do Zero"</li>
                    <li>Templates prontos: Login, Dashboard e CRUD básico</li>
                    <li>Checklist rápido de setup</li>
                    <li>Suporte e comunidade exclusiva</li>
                </ul>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>DevStarter Kit</strong> - A base completa para desenvolvedores profissionais</p>
            <p>Transforme seus projetos em horas, não em semanas!</p>
            
            <div class="unsubscribe">
                <p>
                    <a href="{{ url('/unsubscribe?token=' . ($lead->unsubscribe_token ?? 'demo')) }}">Cancelar recebimento de emails</a> | 
                    <a href="{{ url('/resubscribe?token=' . ($lead->unsubscribe_token ?? 'demo')) }}">Reativar emails</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
