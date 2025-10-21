<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>+127 desenvolvedores já aceleraram seus projetos</title>
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
        .testimonials {
            background-color: #F9FAFB;
            padding: 30px;
            border-radius: 12px;
            margin: 25px 0;
            border-left: 4px solid #F59E0B;
        }
        .testimonial {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            margin: 15px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .testimonial-text {
            font-style: italic;
            color: #374151;
            font-size: 16px;
            margin-bottom: 10px;
        }
        .testimonial-author {
            font-weight: bold;
            color: #1F2937;
            font-size: 14px;
        }
        .testimonial-role {
            color: #6B7280;
            font-size: 14px;
        }
        .benefits {
            background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
            color: white;
            padding: 25px;
            border-radius: 8px;
            margin: 25px 0;
        }
        .benefits h3 {
            color: white;
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
            color: white;
            font-size: 16px;
        }
        .benefits li:before {
            content: "✅";
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
            <h1>💬 +127 Desenvolvedores</h1>
            <p>Já aceleraram seus projetos com o DevStarter Kit</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Olá {{ $lead->name ?? 'dev' }},
            </div>

            <p>Não precisa acreditar só na nossa palavra. Veja o que outros desenvolvedores estão dizendo:</p>

            <div class="testimonials">
                <div class="testimonial">
                    <div class="testimonial-text">
                        💬 "Com o DevStarter Kit, em 30 minutos já tinha tudo rodando. Economizei 25 horas!" 
                    </div>
                    <div class="testimonial-author">Lucas Pereira</div>
                    <div class="testimonial-role">Freelancer Full Stack</div>
                </div>

                <div class="testimonial">
                    <div class="testimonial-text">
                        💬 "Reduzimos o tempo de entrega de 2 semanas para 3 dias. Clientes impressionados!" 
                    </div>
                    <div class="testimonial-author">Carlos Lima</div>
                    <div class="testimonial-role">Agência Digital</div>
                </div>
            </div>

            <p><strong>Imagine replicar isso nos seus projetos.</strong></p>

            <div class="benefits">
                <h3>✅ O que você recebe:</h3>
                <ul>
                    <li>Base pronta para Laravel + Vue + Tailwind</li>
                    <li>Templates de login, dashboard e CRUD</li>
                    <li>Acesso imediato e suporte completo</li>
                </ul>
            </div>

            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ url('/conversion') }}" class="cta-button">
                    Aproveitar Oferta e Começar Agora
                </a>
            </div>
            
            <div style="text-align: center; margin: 20px 0;">
                <a href="{{ asset('Domine-Estruturas-Laravel-Do-Zero-ao-Sistema-Profissional.pdf') }}" class="cta-button" target="_blank" style="background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);">
                    📘 Baixar Guia PDF
                </a>
            </div>
            
            <div style="text-align: center; margin: 20px 0;">
                <a href="https://github.com/nadodev/templates-login-dashboard-CRUD-basico" class="cta-button" target="_blank" style="background: linear-gradient(135deg, #24292e 0%, #586069 100%);">
                    💻 Acessar Templates no GitHub
                </a>
            </div>

            <p style="text-align: center; color: #6B7280; font-size: 14px;">
                🛡️ Garantia de 30 dias • Acesso imediato • Suporte completo
            </p>
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
