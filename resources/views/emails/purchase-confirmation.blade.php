<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Confirmada - DevStarter Kit</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }
        .header p {
            margin: 10px 0 0 0;
            font-size: 16px;
            opacity: 0.9;
        }
        .content {
            padding: 40px 30px;
        }
        .success-icon {
            text-align: center;
            margin-bottom: 30px;
        }
        .success-icon .icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #28a745, #20c997);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: white;
        }
        .purchase-info {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 25px;
            margin: 30px 0;
            border-left: 4px solid #28a745;
        }
        .purchase-info h3 {
            margin: 0 0 15px 0;
            color: #28a745;
            font-size: 18px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: #495057;
        }
        .info-value {
            color: #212529;
            font-weight: 500;
        }
        .access-code {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            padding: 25px;
            border-radius: 8px;
            text-align: center;
            margin: 30px 0;
        }
        .access-code h3 {
            margin: 0 0 15px 0;
            font-size: 20px;
        }
        .code {
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 2px;
            background: rgba(255,255,255,0.2);
            padding: 15px;
            border-radius: 6px;
            display: inline-block;
            margin: 10px 0;
        }
        .steps {
            margin: 30px 0;
        }
        .step {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #007bff;
        }
        .step-number {
            background: #007bff;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 15px;
            flex-shrink: 0;
        }
        .step-content h4 {
            margin: 0 0 8px 0;
            color: #212529;
            font-size: 16px;
        }
        .step-content p {
            margin: 0;
            color: #6c757d;
            font-size: 14px;
        }
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            transition: transform 0.2s;
        }
        .cta-button:hover {
            transform: translateY(-2px);
        }
        .products {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 25px;
            margin: 30px 0;
        }
        .products h3 {
            margin: 0 0 20px 0;
            color: #212529;
            font-size: 18px;
        }
        .product-item {
            display: flex;
            align-items: center;
            padding: 15px;
            background: white;
            border-radius: 6px;
            margin-bottom: 10px;
            border: 1px solid #e9ecef;
        }
        .product-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #007bff, #0056b3);
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 15px;
            font-size: 18px;
        }
        .product-info h4 {
            margin: 0 0 5px 0;
            color: #212529;
            font-size: 14px;
        }
        .product-info p {
            margin: 0;
            color: #6c757d;
            font-size: 12px;
        }
        .support {
            background: #e3f2fd;
            border-radius: 8px;
            padding: 25px;
            margin: 30px 0;
            border-left: 4px solid #2196f3;
        }
        .support h3 {
            margin: 0 0 15px 0;
            color: #1976d2;
            font-size: 16px;
        }
        .support p {
            margin: 0 0 15px 0;
            color: #424242;
            font-size: 14px;
        }
        .support-contact {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        .support-link {
            background: #2196f3;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
        }
        .footer {
            background: #f8f9fa;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
        .footer p {
            margin: 0 0 10px 0;
            color: #6c757d;
            font-size: 14px;
        }
        .social-links {
            margin: 20px 0;
        }
        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 50%;
            line-height: 40px;
            text-align: center;
            margin: 0 5px;
        }
        @media (max-width: 600px) {
            .container {
                margin: 0;
                border-radius: 0;
            }
            .content {
                padding: 20px;
            }
            .header {
                padding: 30px 20px;
            }
            .info-row {
                flex-direction: column;
            }
            .step {
                flex-direction: column;
                text-align: center;
            }
            .step-number {
                margin: 0 auto 15px auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>🎉 Compra Confirmada!</h1>
            <p>Seu DevStarter Kit está pronto para download</p>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Success Icon -->
            <div class="success-icon">
                <div class="icon">✅</div>
            </div>

            <!-- Greeting -->
            <h2>Olá, {{ $customerName }}!</h2>
            <p>Parabéns! Sua compra foi confirmada com sucesso. Você agora tem acesso completo ao <strong>DevStarter Kit</strong>.</p>

            <!-- Purchase Information -->
            <div class="purchase-info">
                <h3>📋 Informações da Compra</h3>
                <div class="info-row">
                    <span class="info-label">Número do Pedido:</span>
                    <span class="info-value">#DSK-{{ date('Y') }}-{{ str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Data da Compra:</span>
                    <span class="info-value">{{ $purchaseDate }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Valor Pago:</span>
                    <span class="info-value">R$ {{ number_format($productValue, 2, ',', '.') }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Status:</span>
                    <span class="info-value" style="color: #28a745; font-weight: bold;">✅ Aprovado</span>
                </div>
            </div>

            <!-- Access Code -->
            <div class="access-code">
                <h3>🔑 Seu Código de Acesso</h3>
                <p>Use este código para acessar o DevStarter Kit:</p>
                <div class="code">{{ $purchaseCode }}</div>
                <p style="margin: 15px 0 0 0; font-size: 14px; opacity: 0.9;">
                    Guarde este código em local seguro!
                </p>
            </div>

            <!-- Next Steps -->
            <div class="steps">
                <h3 style="margin-bottom: 20px; color: #212529;">🚀 Próximos Passos</h3>
                
                <div class="step">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h4>Verificar Compra</h4>
                        <p>Acesse o link abaixo e digite seu código de acesso para confirmar a compra</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h4>Baixar o Kit</h4>
                        <p>Após a verificação, você terá acesso ao download completo do DevStarter Kit</p>
                    </div>
                </div>

                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h4>Começar a Desenvolver</h4>
                        <p>Siga o guia de instalação e comece seu projeto imediatamente</p>
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            <div style="text-align: center; margin: 30px 0;">
                <a href="{{ url('/verify-purchase') }}" class="cta-button">
                    🔍 Verificar Compra e Acessar Kit
                </a>
            </div>

            <!-- Products Included -->
            <div class="products">
                <h3>📦 O que você recebeu:</h3>
                
                <div class="product-item">
                    <div class="product-icon">🔐</div>
                    <div class="product-info">
                        <h4>Sistema de Autenticação Completo</h4>
                        <p>Login, registro, recuperação de senha e middleware de segurança</p>
                    </div>
                </div>

                <div class="product-item">
                    <div class="product-icon">📊</div>
                    <div class="product-info">
                        <h4>Dashboard Administrativo</h4>
                        <p>Painel moderno com métricas, gráficos e gerenciamento completo</p>
                    </div>
                </div>

                <div class="product-item">
                    <div class="product-icon">🎨</div>
                    <div class="product-info">
                        <h4>Layout Responsivo</h4>
                        <p>Design moderno com Tailwind CSS e componentes reutilizáveis</p>
                    </div>
                </div>

                <div class="product-item">
                    <div class="product-icon">⚡</div>
                    <div class="product-info">
                        <h4>Estrutura Modular</h4>
                        <p>Base sólida em Laravel para qualquer tipo de projeto</p>
                    </div>
                </div>

                <div class="product-item">
                    <div class="product-icon">👥</div>
                    <div class="product-info">
                        <h4>Sistema de Usuários</h4>
                        <p>Gestão de usuários, roles e permissões avançadas</p>
                    </div>
                </div>

                <div class="product-item">
                    <div class="product-icon">📚</div>
                    <div class="product-info">
                        <h4>Documentação Completa</h4>
                        <p>Guia passo a passo para instalação e personalização</p>
                    </div>
                </div>
            </div>

            <!-- Support -->
            <div class="support">
                <h3>🆘 Precisa de Ajuda?</h3>
                <p>Nossa equipe está pronta para te ajudar com qualquer dúvida sobre a instalação ou uso do DevStarter Kit.</p>
                <div class="support-contact">
                    <a href="mailto:contato@leonardogeja.com.br" class="support-link">
                        📧 Enviar E-mail
                    </a>
                    <a href="{{ url('/verify-purchase') }}" class="support-link">
                        🔍 Verificar Compra
                    </a>
                </div>
            </div>

            <!-- Important Notice -->
            <div style="background: #fff3cd; border: 1px solid #ffeaa7; border-radius: 8px; padding: 20px; margin: 30px 0;">
                <h4 style="margin: 0 0 10px 0; color: #856404;">⚠️ Importante</h4>
                <p style="margin: 0; color: #856404; font-size: 14px;">
                    <strong>Não recebeu o código?</strong> Verifique sua caixa de spam ou lixo eletrônico. 
                    Se ainda não encontrou, entre em contato conosco imediatamente.
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <h3 style="margin: 0 0 15px 0; color: #212529;">DevStarter Kit</h3>
            <p>Obrigado por escolher o DevStarter Kit! Agora você pode economizar até 40 horas em cada projeto.</p>
            
            <div class="social-links">
                <a href="#">📧</a>
                <a href="#">💬</a>
                <a href="#">🐙</a>
            </div>
            
            <p style="font-size: 12px; color: #adb5bd;">
                © 2025 DevStarter Kit – Economize tempo, desenvolva mais rápido.
            </p>
        </div>
    </div>
</body>
</html>
