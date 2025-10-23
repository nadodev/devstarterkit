@extends('layouts.landing')

@section('title', 'Política de Privacidade - DevStarter Kit')

@section('meta')
<meta name="description" content="Política de Privacidade do DevStarter Kit - Como coletamos, usamos e protegemos suas informações pessoais.">
<meta name="robots" content="index, follow">
@endsection

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-800 mb-4 font-display">
                Política de Privacidade
            </h1>
            <p class="text-lg sm:text-xl text-gray-600">
                Última atualização: {{ date('d/m/Y') }}
            </p>
        </div>

        <!-- Content -->
        <div class="bg-white rounded-2xl shadow-lg p-6 sm:p-8 lg:p-12">
            <div class="prose prose-lg max-w-none">
                
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">1. Introdução</h2>
                    <p class="text-gray-600 mb-4">
                        Esta Política de Privacidade descreve como o DevStarter Kit ("nós", "nosso" ou "empresa") 
                        coleta, usa e protege suas informações pessoais quando você utiliza nossos serviços.
                    </p>
                    <p class="text-gray-600">
                        Ao utilizar nossos serviços, você concorda com a coleta e uso de informações de acordo 
                        com esta política.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">2. Informações que Coletamos</h2>
                    
                    <h3 class="text-xl font-semibold text-gray-700 mb-3">2.1 Informações Pessoais</h3>
                    <ul class="list-disc pl-6 text-gray-600 mb-4">
                        <li>Nome completo</li>
                        <li>Endereço de e-mail</li>
                        <li>Informações de pagamento (processadas por terceiros seguros)</li>
                        <li>Endereço de cobrança (quando necessário)</li>
                    </ul>

                    <h3 class="text-xl font-semibold text-gray-700 mb-3">2.2 Informações Técnicas</h3>
                    <ul class="list-disc pl-6 text-gray-600 mb-4">
                        <li>Endereço IP</li>
                        <li>Tipo de navegador e versão</li>
                        <li>Sistema operacional</li>
                        <li>Páginas visitadas e tempo de permanência</li>
                        <li>Data e hora de acesso</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">3. Como Usamos suas Informações</h2>
                    <ul class="list-disc pl-6 text-gray-600 mb-4">
                        <li>Fornecer e melhorar nossos serviços</li>
                        <li>Processar pagamentos e entregar produtos</li>
                        <li>Enviar comunicações importantes sobre o produto</li>
                        <li>Oferecer suporte técnico</li>
                        <li>Analisar o uso de nossos serviços para melhorias</li>
                        <li>Cumprir obrigações legais</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">4. Compartilhamento de Informações</h2>
                    <p class="text-gray-600 mb-4">
                        Não vendemos, alugamos ou compartilhamos suas informações pessoais com terceiros, 
                        exceto nas seguintes situações:
                    </p>
                    <ul class="list-disc pl-6 text-gray-600 mb-4">
                        <li>Com provedores de serviços que nos ajudam a operar nosso negócio</li>
                        <li>Quando exigido por lei ou processo legal</li>
                        <li>Para proteger nossos direitos e propriedade</li>
                        <li>Com seu consentimento explícito</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">5. Segurança dos Dados</h2>
                    <p class="text-gray-600 mb-4">
                        Implementamos medidas de segurança técnicas e organizacionais apropriadas para 
                        proteger suas informações pessoais contra acesso não autorizado, alteração, 
                        divulgação ou destruição.
                    </p>
                    <ul class="list-disc pl-6 text-gray-600 mb-4">
                        <li>Criptografia SSL/TLS para transmissão de dados</li>
                        <li>Armazenamento seguro em servidores protegidos</li>
                        <li>Acesso restrito a informações pessoais</li>
                        <li>Monitoramento regular de segurança</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">6. Cookies e Tecnologias Similares</h2>
                    <p class="text-gray-600 mb-4">
                        Utilizamos cookies e tecnologias similares para melhorar sua experiência, 
                        analisar o uso do site e personalizar conteúdo.
                    </p>
                    <p class="text-gray-600">
                        Você pode controlar o uso de cookies através das configurações do seu navegador.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">7. Seus Direitos</h2>
                    <p class="text-gray-600 mb-4">Você tem os seguintes direitos:</p>
                    <ul class="list-disc pl-6 text-gray-600 mb-4">
                        <li>Acessar suas informações pessoais</li>
                        <li>Corrigir informações incorretas</li>
                        <li>Solicitar a exclusão de seus dados</li>
                        <li>Restringir o processamento de seus dados</li>
                        <li>Portabilidade de dados</li>
                        <li>Retirar consentimento a qualquer momento</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">8. Retenção de Dados</h2>
                    <p class="text-gray-600">
                        Mantemos suas informações pessoais apenas pelo tempo necessário para cumprir 
                        os propósitos descritos nesta política, a menos que um período de retenção 
                        mais longo seja exigido ou permitido por lei.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">9. Menores de Idade</h2>
                    <p class="text-gray-600">
                        Nossos serviços não são direcionados a menores de 18 anos. Não coletamos 
                        intencionalmente informações pessoais de menores de idade.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">10. Alterações nesta Política</h2>
                    <p class="text-gray-600">
                        Podemos atualizar esta Política de Privacidade periodicamente. Notificaremos 
                        sobre mudanças significativas através de e-mail ou aviso em nosso site.
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">11. Contato</h2>
                    <p class="text-gray-600 mb-4">
                        Se você tiver dúvidas sobre esta Política de Privacidade, entre em contato conosco:
                    </p>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-gray-700"><strong>E-mail:</strong> privacidade@devstarterkit.com</p>
                        <p class="text-gray-700"><strong>Suporte:</strong> suporte@devstarterkit.com</p>
                    </div>
                </section>

            </div>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-8">
            <a href="{{ route('conversion') }}" class="bg-orange-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                ← Voltar ao Início
            </a>
        </div>
    </div>
</div>
@endsection
