<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Últimas vagas para o DevStarter Kit com bônus grátis!</title>
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
            background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
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
        .urgency {
            background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
            color: white;
            padding: 25px;
            border-radius: 8px;
            margin: 25px 0;
            text-align: center;
        }
        .urgency h3 {
            color: white;
            font-size: 24px;
            margin: 0 0 15px 0;
            font-family: 'Poppins', sans-serif;
        }
        .offer {
            background-color: #FEF3C7;
            border: 2px solid #F59E0B;
            padding: 25px;
            border-radius: 8px;
            margin: 25px 0;
            text-align: center;
        }
        .offer h3 {
            color: #92400E;
            font-size: 20px;
            margin: 0 0 15px 0;
            font-family: 'Poppins', sans-serif;
        }
        .price {
            font-size: 36px;
            font-weight: bold;
            color: #DC2626;
            margin: 10px 0;
        }
        .original-price {
            font-size: 18px;
            color: #6B7280;
            text-decoration: line-through;
            margin: 5px 0;
        }
        .discount {
            background-color: #DC2626;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 16px;
            font-weight: bold;
            display: inline-block;
            margin: 10px 0;
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
            content: "🔹";
            margin-right: 10px;
        }
        .guarantee {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            margin: 25px 0;
            text-align: center;
        }
        .guarantee h3 {
            color: white;
            font-size: 18px;
            margin: 0 0 10px 0;
            font-family: 'Poppins', sans-serif;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%);
            color: white;
            padding: 18px 36px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 20px;
            text-align: center;
            margin: 25px 0;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(220, 38, 38, 0.3);
        }
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
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
            <h1>⏰ Últimas Vagas!</h1>
            <p>Oferta limitada - Só para os primeiros 50 compradores</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Olá {{ $lead->name ?? 'dev' }},
            </div>

            <div class="urgency">
                <h3>🚨 A oportunidade está quase acabando!</h3>
                <p style="font-size: 18px; margin: 0;">⏰ Oferta limitada: 50% OFF + bônus PDF e template GitHub gratuitos</p>
            </div>

            <div class="offer">
                <h3>🎁 Oferta Especial de Lançamento</h3>
                <div class="price">R$ 97</div>
                <div class="original-price">De R$ 197</div>
                <div class="discount">50% DE DESCONTO!</div>
            </div>

            <div class="benefits">
                <h3>🔹 O que você recebe:</h3>
                <ul>
                    <li>Estrutura modular pronta</li>
                    <li>Login, dashboard e página pública integrados</li>
                    <li>Suporte e comunidade inclusos</li>
                    <li>Garantia de 30 dias: se não entregar seu primeiro sistema, devolvemos 100% do valor</li>
                </ul>
            </div>

            <div class="guarantee">
                <h3>🛡️ Garantia Total de 30 Dias</h3>
                <p style="margin: 0;">Se você não conseguir entregar seu primeiro sistema, devolvemos 100% do valor. Sem perguntas, sem burocracia.</p>
            </div>

            <p><strong>Não deixe para depois.</strong> Quem agir agora sai na frente e entrega projetos profissionais em horas.</p>

            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ url('/conversion') }}" class="cta-button">
                    Quero Garantir Meu DevStarter Kit Agora
                </a>
            </div>

            <p style="text-align: center; color: #DC2626; font-weight: bold; font-size: 16px;">
                ⚠️ Apenas 50 vagas disponíveis • Oferta expira em breve
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
