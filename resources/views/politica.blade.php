@extends('layouts.landing')

@section('title', 'Política de Privacidade - Laravel ProStarter')

@section('content')
<section class="py-16 md:py-24 min-h-screen" style="background: linear-gradient(135deg, #F3E8FF 0%, #DBEAFE 50%, #E0E7FF 100%);">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center text-purple-800 px-6 py-3 rounded-full text-sm font-semibold mb-6 shadow-lg" style="background: linear-gradient(135deg, #F3E8FF 0%, #DBEAFE 100%);">
                <i class="fas fa-shield-alt mr-2"></i>
                Proteção de Dados Garantida
            </div>
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-6 leading-tight">
                Política de <span style="background: linear-gradient(45deg, #7C3AED, #1D4ED8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Privacidade</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 mb-8 max-w-3xl mx-auto leading-relaxed">
                Transparência total sobre como protegemos e utilizamos seus dados pessoais
            </p>
            <div class="inline-flex items-center bg-white text-gray-700 px-6 py-3 rounded-full text-sm font-medium shadow-lg border border-gray-200">
                <i class="fas fa-calendar-alt mr-2 text-blue-500"></i>
                Última atualização: {{ date('d/m/Y') }}
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
            <!-- Header -->
            <div class="text-white p-8 md:p-12" style="background: linear-gradient(135deg, #7C3AED 0%, #1D4ED8 50%, #4F46E5 100%);">
                <div class="max-w-4xl mx-auto">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-16 h-16 bg-white bg-opacity-30 rounded-full flex items-center justify-center mr-4 shadow-lg">
                            <i class="fas fa-shield-alt text-2xl text-white"></i>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-white">Compromisso com sua Privacidade</h2>
                    </div>
                    <p class="text-xl text-white text-center max-w-3xl mx-auto leading-relaxed opacity-90">
                        Protegemos seus dados pessoais com o mais alto nível de segurança e transparência. 
                        Sua confiança é nossa prioridade.
                    </p>
                </div>
            </div>

            <!-- Conteúdo -->
            <div class="p-8 md:p-12 lg:p-16">
                <div class="space-y-12 md:space-y-16">
                    <!-- 1. Informações que Coletamos -->
                    <div class="rounded-2xl p-8 md:p-10 border border-purple-100" style="background: linear-gradient(135deg, #F3E8FF 0%, #DBEAFE 100%);">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-linear-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                                1
                            </div>
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-800">
                                Informações que Coletamos
                            </h3>
                        </div>
                        <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                            Coletamos apenas as informações necessárias para fornecer nossos serviços de forma eficiente e segura.
                        </p>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="bg-white rounded-xl p-6 shadow-xl border-2 border-purple-200 hover:shadow-2xl transition-all duration-300 hover:border-purple-300">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center mr-3">
                                        <span class="text-white font-bold">👤</span>
                                    </div>
                                    <h4 class="text-lg font-bold text-gray-800">Informações Pessoais</h4>
                                </div>
                                <ul class="text-gray-600 space-y-2">
                                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Nome completo</li>
                                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Endereço de e-mail</li>
                                    <li class="flex items-center"><i class="fas fa-check text-green-500 mr-2"></i>Informações de contato</li>
                                </ul>
                            </div>
                            <div class="bg-white rounded-xl p-6 shadow-xl border-2 border-blue-200 hover:shadow-2xl transition-all duration-300 hover:border-blue-300">
                                <div class="flex items-center mb-4">
                                    <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                                        <span class="text-white font-bold">💳</span>
                                    </div>
                                    <h4 class="text-lg font-bold text-gray-800">Informações de Pagamento</h4>
                                </div>
                                <ul class="text-gray-600 space-y-2">
                                    <li class="flex items-center"><i class="fas fa-shield-alt text-green-500 mr-2"></i>Processadas de forma segura</li>
                                    <li class="flex items-center"><i class="fas fa-shield-alt text-green-500 mr-2"></i>Não armazenamos dados sensíveis</li>
                                    <li class="flex items-center"><i class="fas fa-shield-alt text-green-500 mr-2"></i>Usamos gateways seguros</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Como Usamos suas Informações -->
                    <div class="rounded-2xl p-8 md:p-10 border border-blue-100" style="background: linear-gradient(135deg, #DBEAFE 0%, #DCFCE7 100%);">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-linear-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                                2
                            </div>
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-800">
                                Como Usamos suas Informações
                            </h3>
                        </div>
                        <div class="grid md:grid-cols-3 gap-6">
                            <div class="bg-white rounded-xl p-6 shadow-xl text-center hover:shadow-2xl transition-all duration-300 border-2 border-blue-200 hover:border-blue-300">
                                <div class="w-16 h-16 bg-linear-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <span class="text-white text-2xl">🛒</span>
                                </div>
                                <h4 class="text-lg font-bold text-gray-800 mb-3">Processar Pedidos</h4>
                                <p class="text-gray-600">Para entregar nossos produtos e serviços de forma eficiente</p>
                            </div>
                            <div class="bg-white rounded-xl p-6 shadow-xl text-center hover:shadow-2xl transition-all duration-300 border-2 border-green-200 hover:border-green-300">
                                <div class="w-16 h-16 bg-linear-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <span class="text-white text-2xl">📧</span>
                                </div>
                                <h4 class="text-lg font-bold text-gray-800 mb-3">Comunicação</h4>
                                <p class="text-gray-600">Enviar atualizações importantes e suporte técnico</p>
                            </div>
                            <div class="bg-white rounded-xl p-6 shadow-xl text-center hover:shadow-2xl transition-all duration-300 border-2 border-purple-200 hover:border-purple-300">
                                <div class="w-16 h-16 bg-linear-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <span class="text-white text-2xl">📈</span>
                                </div>
                                <h4 class="text-lg font-bold text-gray-800 mb-3">Melhorias</h4>
                                <p class="text-gray-600">Aprimorar continuamente nossos serviços</p>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Compartilhamento -->
                    <div class="rounded-2xl p-8 md:p-10 border border-green-100" style="background: linear-gradient(135deg, #DCFCE7 0%, #D1FAE5 100%);">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-linear-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                                3
                            </div>
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-800">
                                Compartilhamento de Informações
                            </h3>
                        </div>
                        
                        
                        <p class="text-lg text-gray-600 mb-6">Compartilhamos informações apenas quando:</p>
                        <div class="bg-white rounded-xl p-6 shadow-lg">
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mr-4 mt-1">
                                        <i class="fas fa-check text-white text-sm"></i>
                                    </div>
                                    <span class="text-gray-700">Você nos dá consentimento explícito</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mr-4 mt-1">
                                        <i class="fas fa-check text-white text-sm"></i>
                                    </div>
                                    <span class="text-gray-700">É necessário para cumprir obrigações legais</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mr-4 mt-1">
                                        <i class="fas fa-check text-white text-sm"></i>
                                    </div>
                                    <span class="text-gray-700">Com prestadores de serviços confiáveis (sob acordos de confidencialidade)</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- 4. Segurança -->
                    <div class="rounded-2xl p-8 md:p-10 border border-orange-100" style="background: linear-gradient(135deg, #FED7AA 0%, #FECACA 100%);">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-linear-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                                4
                            </div>
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-800">
                                Segurança dos Dados
                            </h3>
                        </div>
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="bg-white rounded-xl p-8 shadow-xl border-2 border-orange-200 hover:shadow-2xl transition-all duration-300 hover:border-orange-300">
                                <div class="flex items-center mb-6">
                                    <div class="w-12 h-12 bg-linear-to-br from-orange-500 to-orange-600 rounded-lg flex items-center justify-center mr-4">
                                        <span class="text-white text-lg">🔒</span>
                                    </div>
                                    <h4 class="text-xl font-bold text-gray-800">Medidas Técnicas</h4>
                                </div>
                                <ul class="space-y-3">
                                    <li class="flex items-center">
                                        <i class="fas fa-shield-alt text-orange-500 mr-3"></i>
                                        <span class="text-gray-700">Criptografia SSL/TLS</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-shield-alt text-orange-500 mr-3"></i>
                                        <span class="text-gray-700">Firewalls avançados</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-shield-alt text-orange-500 mr-3"></i>
                                        <span class="text-gray-700">Monitoramento 24/7</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-shield-alt text-orange-500 mr-3"></i>
                                        <span class="text-gray-700">Backups seguros</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="bg-white rounded-xl p-8 shadow-xl border-2 border-blue-200 hover:shadow-2xl transition-all duration-300 hover:border-blue-300">
                                <div class="flex items-center mb-6">
                                    <div class="w-12 h-12 bg-linear-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center mr-4">
                                        <span class="text-white text-lg">👥</span>
                                    </div>
                                    <h4 class="text-xl font-bold text-gray-800">Medidas Organizacionais</h4>
                                </div>
                                <ul class="space-y-3">
                                    <li class="flex items-center">
                                        <i class="fas fa-user-shield text-blue-500 mr-3"></i>
                                        <span class="text-gray-700">Acesso restrito aos dados</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-user-shield text-blue-500 mr-3"></i>
                                        <span class="text-gray-700">Treinamento da equipe</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-user-shield text-blue-500 mr-3"></i>
                                        <span class="text-gray-700">Políticas internas rigorosas</span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-user-shield text-blue-500 mr-3"></i>
                                        <span class="text-gray-700">Auditorias regulares</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- 5. Seus Direitos -->
                    <div class="rounded-2xl p-8 md:p-10 border border-indigo-100" style="background: linear-gradient(135deg, #E0E7FF 0%, #F3E8FF 100%);">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-linear-to-br from-indigo-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                                5
                            </div>
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-800">
                                Seus Direitos (LGPD)
                            </h3>
                        </div>
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-6">
                                <div class="bg-white rounded-xl p-6 shadow-xl border-2 border-indigo-200 hover:shadow-2xl transition-all duration-300 hover:border-indigo-300">
                                    <div class="flex items-start">
                                        <div class="w-12 h-12 bg-linear-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center mr-4">
                                            <span class="text-white text-lg">👁️</span>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-bold text-gray-800 mb-2">Acesso</h4>
                                            <p class="text-gray-600">Solicitar acesso aos seus dados pessoais</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white rounded-xl p-6 shadow-xl border-2 border-indigo-200 hover:shadow-2xl transition-all duration-300 hover:border-indigo-300">
                                    <div class="flex items-start">
                                        <div class="w-12 h-12 bg-linear-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center mr-4">
                                            <span class="text-white text-lg">✏️</span>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-bold text-gray-800 mb-2">Correção</h4>
                                            <p class="text-gray-600">Corrigir dados incorretos ou incompletos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-6">
                                <div class="bg-white rounded-xl p-6 shadow-xl border-2 border-indigo-200 hover:shadow-2xl transition-all duration-300 hover:border-indigo-300">
                                    <div class="flex items-start">
                                        <div class="w-12 h-12 bg-linear-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center mr-4">
                                            <span class="text-white text-lg">🗑️</span>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-bold text-gray-800 mb-2">Exclusão</h4>
                                            <p class="text-gray-600">Solicitar a exclusão dos seus dados</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white rounded-xl p-6 shadow-xl border-2 border-indigo-200 hover:shadow-2xl transition-all duration-300 hover:border-indigo-300">
                                    <div class="flex items-start">
                                        <div class="w-12 h-12 bg-linear-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center mr-4">
                                            <span class="text-white text-lg">🚫</span>
                                        </div>
                                        <div>
                                            <h4 class="text-lg font-bold text-gray-800 mb-2">Revogação</h4>
                                            <p class="text-gray-600">Retirar consentimento a qualquer momento</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 6. Cookies -->
                    <div class="rounded-2xl p-8 md:p-10 border border-pink-100" style="background: linear-gradient(135deg, #FCE7F3 0%, #FDF2F8 100%);">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-linear-to-br from-pink-500 to-pink-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                                6
                            </div>
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-800">
                                Cookies e Tecnologias Similares
                            </h3>
                        </div>
                        <div class="bg-white rounded-xl p-8 shadow-lg border border-pink-100">
                            <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                                Utilizamos cookies para melhorar sua experiência, analisar o uso do site e personalizar conteúdo.
                            </p>
                            <div class="grid md:grid-cols-3 gap-6">
                                <div class="text-center bg-pink-50 rounded-xl p-6 hover:shadow-xl transition-all duration-300 border-2 border-pink-200 hover:border-pink-300">
                                    <div class="w-16 h-16 bg-linear-to-br from-pink-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <span class="text-white text-2xl">⚙️</span>
                                    </div>
                                    <h4 class="text-lg font-bold text-gray-800 mb-2">Essenciais</h4>
                                    <p class="text-gray-600">Funcionamento básico do site</p>
                                </div>
                                <div class="text-center bg-pink-50 rounded-xl p-6 hover:shadow-xl transition-all duration-300 border-2 border-pink-200 hover:border-pink-300">
                                    <div class="w-16 h-16 bg-linear-to-br from-pink-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <span class="text-white text-2xl">📊</span>
                                    </div>
                                    <h4 class="text-lg font-bold text-gray-800 mb-2">Analíticos</h4>
                                    <p class="text-gray-600">Melhorar experiência do usuário</p>
                                </div>
                                <div class="text-center bg-pink-50 rounded-xl p-6 hover:shadow-xl transition-all duration-300 border-2 border-pink-200 hover:border-pink-300">
                                    <div class="w-16 h-16 bg-linear-to-br from-pink-500 to-pink-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <span class="text-white text-2xl">🎯</span>
                                    </div>
                                    <h4 class="text-lg font-bold text-gray-800 mb-2">Marketing</h4>
                                    <p class="text-gray-600">Personalizar ofertas e conteúdo</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 7. Alterações -->
                    <div class="rounded-2xl p-8 md:p-10 border border-teal-100" style="background: linear-gradient(135deg, #CCFBF1 0%, #CFFAFE 100%);">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-linear-to-br from-teal-500 to-teal-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                                7
                            </div>
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-800">
                                Alterações nesta Política
                            </h3>
                        </div>
                        <div class="bg-white rounded-xl p-8 shadow-lg border border-teal-100">
                            <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                                Podemos atualizar esta política periodicamente. Mudanças significativas serão comunicadas através de:
                            </p>
                            <div class="flex flex-wrap gap-4">
                                <div class="bg-teal-100 text-teal-800 px-6 py-3 rounded-full text-sm font-semibold flex items-center">
                                    <i class="fas fa-envelope mr-2"></i>
                                    E-mail
                                </div>
                                <div class="bg-teal-100 text-teal-800 px-6 py-3 rounded-full text-sm font-semibold flex items-center">
                                    <i class="fas fa-bell mr-2"></i>
                                    Notificação no site
                                </div>
                                <div class="bg-teal-100 text-teal-800 px-6 py-3 rounded-full text-sm font-semibold flex items-center">
                                    <i class="fas fa-share-alt mr-2"></i>
                                    Redes sociais
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 8. Contato -->
                    <div class="rounded-2xl p-8 md:p-10 border border-gray-100" style="background: linear-gradient(135deg, #F9FAFB 0%, #DBEAFE 100%);">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-linear-to-br from-gray-500 to-gray-600 rounded-full flex items-center justify-center text-white font-bold text-lg mr-4">
                                8
                            </div>
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-800">
                                Contato e Dúvidas
                            </h3>
                        </div>
                        <div class="bg-white rounded-xl p-8 shadow-lg border border-gray-100">
                            <p class="text-lg text-gray-600 mb-8 leading-relaxed">Para questões sobre privacidade ou exercer seus direitos:</p>
                            <div class="grid md:grid-cols-2 gap-8">
                                <div class="flex items-center bg-blue-50 rounded-xl p-6 hover:shadow-xl transition-all duration-300 border-2 border-blue-200 hover:border-blue-300">
                                    <div class="w-16 h-16 bg-linear-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mr-6">
                                        <span class="text-white text-2xl">📧</span>
                                    </div>
                                    <div>
                                        <p class="text-xl font-bold text-gray-800 mb-1">Email</p>
                                        <p class="text-gray-600">privacidade@laravelprostarter.com</p>
                                    </div>
                                </div>
                                <div class="flex items-center bg-green-50 rounded-xl p-6 hover:shadow-xl transition-all duration-300 border-2 border-green-200 hover:border-green-300">
                                    <div class="w-16 h-16 bg-linear-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mr-6">
                                        <span class="text-white text-2xl">📱</span>
                                    </div>
                                    <div>
                                        <p class="text-xl font-bold text-gray-800 mb-1">WhatsApp</p>
                                        <p class="text-gray-600">+55 (49) 99919-5407</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-gray-100 px-8 py-6 text-center">
                <p class="text-gray-600 text-sm">
                    Esta política está em conformidade com a <strong>Lei Geral de Proteção de Dados (LGPD)</strong> e 
                    <strong>Regulamento Geral sobre a Proteção de Dados (GDPR)</strong>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
