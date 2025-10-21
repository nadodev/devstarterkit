<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Última chance! Oferta do DevStarter Kit expira hoje</title>
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
            background: linear-gradient(135deg, #DC2626 0%, #7F1D1D 100%);
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
        .final-warning {
            background: linear-gradient(135deg, #DC2626 0%, #7F1D1D 100%);
            color: white;
            padding: 30px;
            border-radius: 12px;
            margin: 25px 0;
            text-align: center;
            border: 3px solid #FEF3C7;
        }
        .final-warning h3 {
            color: white;
            font-size: 24px;
            margin: 0 0 15px 0;
            font-family: 'Poppins', sans-serif;
        }
        .final-warning p {
            font-size: 18px;
            margin: 0;
            font-weight: bold;
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
            content: "🚀";
            margin-right: 10px;
        }
        .guarantee {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            color: white;
            padding: 25px;
            border-radius: 8px;
            margin: 25px 0;
            text-align: center;
        }
        .guarantee h3 {
            color: white;
            font-size: 20px;
            margin: 0 0 15px 0;
            font-family: 'Poppins', sans-serif;
        }
        .guarantee ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .guarantee li {
            padding: 5px 0;
            color: white;
            font-size: 16px;
        }
        .guarantee li:before {
            content: "✅";
            margin-right: 10px;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #DC2626 0%, #7F1D1D 100%);
            color: white;
            padding: 20px 40px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 22px;
            text-align: center;
            margin: 25px 0;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
            animation: pulse 2s infinite;
        }
        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(220, 38, 38, 0.5);
        }
        @keyframes pulse {
            0% { box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4); }
            50% { box-shadow: 0 6px 20px rgba(220, 38, 38, 0.6); }
            100% { box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4); }
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
            <h1>⚠️ Última Chance!</h1>
            <p>Oferta do DevStarter Kit expira hoje</p>
        </div>

        <!-- Content -->
        <div class="content">
            <div class="greeting">
                Olá {{ $lead->name ?? 'dev' }},
            </div>

            <div class="final-warning">
                <h3>🚨 Esta é sua última oportunidade!</h3>
                <p>de garantir o DevStarter Kit com 50% de desconto e bônus exclusivos.</p>
            </div>

            <div class="benefits">
                <h3>🚀 Com ele você terá:</h3>
                <ul>
                    <li>Templates prontos e base modular para qualquer projeto</li>
                    <li>Dashboard, login e CRUD funcionando imediatamente</li>
                    <li>PDF e template GitHub gratuitos</li>
                    <li>Garantia total de 30 dias</li>
                </ul>
            </div>

            <div class="guarantee">
                <h3>🛡️ Garantia Total de 30 Dias</h3>
                <ul>
                    <li>Se não conseguir entregar seu primeiro sistema, devolvemos 100% do valor</li>
                    <li>Sem perguntas, sem burocracia</li>
                    <li>Acesso imediato após pagamento</li>
                </ul>
            </div>

            <p style="text-align: center; font-size: 18px; color: #DC2626; font-weight: bold;">
                <strong>Não perca a chance de acelerar seus projetos e entregar sistemas profissionais antes de todo mundo.</strong>
            </p>

            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ url('/conversion') }}" class="cta-button">
                    Quero Comprar Agora – Última Chance
                </a>
            </div>
            
            <div style="text-align: center; margin: 20px 0;">
                <a href="{{ asset('Domine-Estruturas-Laravel-Do-Zero-ao-Sistema-Profissional.pdf') }}" class="cta-button" target="_blank" style="background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);">
                    📘 Baixar Guia PDF (R$197)
                </a>
            </div>
            
            <div style="text-align: center; margin: 20px 0;">
                <a href="https://github.com/nadodev/templates-login-dashboard-CRUD-basico" class="cta-button" target="_blank" style="background: linear-gradient(135deg, #24292e 0%, #586069 100%);">
                    💻 Acessar Templates no GitHub
                </a>
            </div>
            <p style="text-align: center; color: #6B7280; font-size: 14px;">
                🎁 Bônus inclusos • 🛡️ Garantia de 30 dias • ⚡ Acesso imediato
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

    <script>
        // Countdown timer
        function updateCountdown() {
            const countdownElement = document.getElementById('countdown');
            if (countdownElement) {
                const now = new Date().getTime();
                const endTime = now + (24 * 60 * 60 * 1000); // 24 horas
                
                const timer = setInterval(function() {
                    const now = new Date().getTime();
                    const distance = endTime - now;
                    
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                    countdownElement.innerHTML = hours.toString().padStart(2, '0') + ":" + 
                                              minutes.toString().padStart(2, '0') + ":" + 
                                              seconds.toString().padStart(2, '0');
                    
                    if (distance < 0) {
                        clearInterval(timer);
                        countdownElement.innerHTML = "EXPIRADO!";
                    }
                }, 1000);
            }
        }
        
        // Iniciar countdown
        updateCountdown();
    </script>
</body>
</html>
