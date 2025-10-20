@extends('layouts.app')

@section('title', 'Sobre - EduPlatform')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-blue-900-purple-900 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 py-24 lg:py-32">
        <div class="text-center">
            <div class="inline-flex items-center bg-white/10 backdrop-blur-sm rounded-full px-4 py-2 mb-6 text-sm font-medium">
                <i class="fas fa-info-circle text-yellow-400 mr-2"></i>
                Conheça nossa história
            </div>
            
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                Sobre a
                    <span class="text-gradient-yellow-orange">
                    EduPlatform
                </span>
            </h1>
            
            <p class="text-xl md:text-2xl mb-8 text-blue-100 leading-relaxed max-w-4xl mx-auto">
                Transformando vidas através da educação online de qualidade
            </p>
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="inline-flex items-center bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold mb-6">
                    <i class="fas fa-bullseye mr-2"></i>
                    Nossa Missão
                </div>
                
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Democratizando o acesso à educação</h2>
                
                <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                    Acreditamos que o conhecimento é a chave para transformar vidas e construir um futuro melhor. 
                    Nossa missão é democratizar o acesso à educação de qualidade, oferecendo cursos online 
                    ministrados pelos melhores especialistas do Brasil.
                </p>
                
                <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                    Nossa plataforma conecta estudantes apaixonados por aprender com instrutores experientes, 
                    criando uma comunidade educacional vibrante e colaborativa.
                </p>
                
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center bg-green-50 px-4 py-2 rounded-full">
                        <i class="fas fa-check-circle text-green-600 mr-2"></i>
                        <span class="text-green-800 font-medium">Educação Acessível</span>
                    </div>
                    <div class="flex items-center bg-blue-50 px-4 py-2 rounded-full">
                        <i class="fas fa-users text-blue-600 mr-2"></i>
                        <span class="text-blue-800 font-medium">Comunidade Ativa</span>
                    </div>
                    <div class="flex items-center bg-purple-50 px-4 py-2 rounded-full">
                        <i class="fas fa-star text-purple-600 mr-2"></i>
                        <span class="text-purple-800 font-medium">Qualidade Garantida</span>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="bg-gradient-blue-purple rounded-3xl p-8 shadow-2xl">
                    <div class="text-center text-white">
                        <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6 backdrop-blur-sm">
                            <i class="fas fa-graduation-cap text-4xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Educação Transformadora</h3>
                        <p class="text-blue-100 leading-relaxed">
                            Cursos de alta qualidade a preços justos, com opções gratuitas para todos. 
                            Nossa missão é tornar o aprendizado acessível para todos os brasileiros.
                        </p>
                    </div>
                </div>
                
                <!-- Floating Cards -->
                <div class="absolute -top-4 -left-4 bg-white rounded-2xl p-4 shadow-xl">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-heart text-white"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Paixão</div>
                            <div class="text-sm text-gray-600">Pela educação</div>
                        </div>
                    </div>
                </div>
                
                <div class="absolute -bottom-4 -right-4 bg-white rounded-2xl p-4 shadow-xl">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-rocket text-white"></i>
                        </div>
                        <div>
                            <div class="font-bold text-gray-900">Inovação</div>
                            <div class="text-sm text-gray-600">Tecnológica</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <div class="inline-flex items-center bg-purple-100 text-purple-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-star mr-2"></i>
                Por que escolher a EduPlatform?
            </div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Recursos que fazem a diferença</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Descubra os recursos que tornam nossa plataforma única no mercado
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-blue-purple rounded-2xl flex items-center justify-center mb-6 hover-scale-110 transition-transform duration-300">
                    <i class="fas fa-video text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Conteúdo Multimídia</h3>
                <p class="text-gray-600 leading-relaxed">
                    Vídeos, textos, PDFs, apresentações e áudios para uma experiência 
                    de aprendizado completa e envolvente.
                </p>
            </div>

            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-green rounded-2xl flex items-center justify-center mb-6 hover-scale-110 transition-transform duration-300">
                    <i class="fas fa-certificate text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Certificados Reconhecidos</h3>
                <p class="text-gray-600 leading-relaxed">
                    Receba certificados de conclusão que comprovam suas habilidades 
                    e conhecimentos adquiridos.
                </p>
            </div>

            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-purple rounded-2xl flex items-center justify-center mb-6 hover-scale-110 transition-transform duration-300">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Comunidade Ativa</h3>
                <p class="text-gray-600 leading-relaxed">
                    Conecte-se com outros estudantes, participe de fóruns e 
                    construa sua rede profissional.
                </p>
            </div>

            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-yellow-orange-500 rounded-2xl flex items-center justify-center mb-6 hover-scale-110 transition-transform duration-300">
                    <i class="fas fa-mobile-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Acesso Mobile</h3>
                <p class="text-gray-600 leading-relaxed">
                    Estude em qualquer lugar, a qualquer hora, com nossa 
                    plataforma totalmente responsiva.
                </p>
            </div>

            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-red-pink rounded-2xl flex items-center justify-center mb-6 hover-scale-110 transition-transform duration-300">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Acompanhamento de Progresso</h3>
                <p class="text-gray-600 leading-relaxed">
                    Monitore seu progresso, defina metas e acompanhe sua 
                    evolução em tempo real.
                </p>
            </div>

            <div class="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="w-16 h-16 bg-gradient-indigo-blue rounded-2xl flex items-center justify-center mb-6 hover-scale-110 transition-transform duration-300">
                    <i class="fas fa-headset text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Suporte 24/7</h3>
                <p class="text-gray-600 leading-relaxed">
                    Nossa equipe está sempre disponível para ajudar você 
                    em sua jornada de aprendizado.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-gradient-blue-600-purple-600 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <div class="inline-flex items-center bg-white/10 backdrop-blur-sm rounded-full px-4 py-2 mb-4 text-sm font-medium">
                <i class="fas fa-chart-bar mr-2"></i>
                Números que impressionam
            </div>
            <h2 class="text-4xl font-bold mb-4">Resultados que comprovam nossa excelência</h2>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                Dados reais que mostram o impacto da nossa plataforma na educação brasileira
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center group">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-users text-white text-3xl"></i>
                </div>
                <div class="text-5xl font-bold mb-2">50K+</div>
                <div class="text-blue-100 text-lg">Estudantes Ativos</div>
            </div>
            
            <div class="text-center group">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-book text-white text-3xl"></i>
                </div>
                <div class="text-5xl font-bold mb-2">500+</div>
                <div class="text-blue-100 text-lg">Cursos Disponíveis</div>
            </div>
            
            <div class="text-center group">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-chalkboard-teacher text-white text-3xl"></i>
                </div>
                <div class="text-5xl font-bold mb-2">200+</div>
                <div class="text-blue-100 text-lg">Instrutores Especialistas</div>
            </div>
            
            <div class="text-center group">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-star text-white text-3xl"></i>
                </div>
                <div class="text-5xl font-bold mb-2">98%</div>
                <div class="text-blue-100 text-lg">Satisfação dos Alunos</div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <div class="inline-flex items-center bg-green-100 text-green-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                <i class="fas fa-users mr-2"></i>
                Nossa Equipe
            </div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Profissionais apaixonados por educação</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Conheça as pessoas por trás da EduPlatform
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group text-center">
                <div class="relative mb-6">
                    <div class="w-32 h-32 bg-gradient-to-br from-blue-500 to-purple-600 rounded-3xl mx-auto flex items-center justify-center shadow-2xl group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-code text-white text-4xl"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-check text-white text-sm"></i>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Equipe de Desenvolvimento</h3>
                <p class="text-gray-600 mb-4">Especialistas em tecnologia educacional</p>
                <div class="flex justify-center space-x-2">
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Laravel</span>
                    <span class="bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-sm">React</span>
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">AI</span>
                </div>
            </div>

            <div class="group text-center">
                <div class="relative mb-6">
                    <div class="w-32 h-32 bg-gradient-to-br from-green-500 to-blue-600 rounded-3xl mx-auto flex items-center justify-center shadow-2xl group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-chalkboard-teacher text-white text-4xl"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-star text-white text-sm"></i>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Instrutores Especialistas</h3>
                <p class="text-gray-600 mb-4">Profissionais com anos de experiência</p>
                <div class="flex justify-center space-x-2">
                    <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm">Expert</span>
                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm">Mentor</span>
                    <span class="bg-indigo-100 text-indigo-800 px-3 py-1 rounded-full text-sm">Certificado</span>
                </div>
            </div>

            <div class="group text-center">
                <div class="relative mb-6">
                    <div class="w-32 h-32 bg-gradient-to-br from-purple-500 to-pink-600 rounded-3xl mx-auto flex items-center justify-center shadow-2xl group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-heart text-white text-4xl"></i>
                    </div>
                    <div class="absolute -top-2 -right-2 w-8 h-8 bg-pink-500 rounded-full flex items-center justify-center">
                        <i class="fas fa-heart text-white text-sm"></i>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Suporte ao Cliente</h3>
                <p class="text-gray-600 mb-4">Sempre prontos para ajudar você</p>
                <div class="flex justify-center space-x-2">
                    <span class="bg-pink-100 text-pink-800 px-3 py-1 rounded-full text-sm">24/7</span>
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">Rápido</span>
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">Amigável</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-gray-900 to-blue-900 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <div class="relative max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">
            Pronto para transformar sua carreira?
        </h2>
        <p class="text-xl md:text-2xl mb-8 text-gray-300">
            Junte-se a milhares de pessoas que já transformaram suas vidas através da educação
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
            <a href="{{ route('register') }}" 
               class="bg-white text-blue-600 px-8 py-4 rounded-2xl font-bold text-lg hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-2xl">
                <i class="fas fa-rocket mr-2"></i>
                Começar Agora - Grátis
            </a>
            <a href="{{ route('courses.index') }}" 
               class="border-2 border-white/30 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-white/10 transition-all duration-300 backdrop-blur-sm">
                <i class="fas fa-search mr-2"></i>
                Explorar Cursos
            </a>
        </div>
        
        <div class="flex flex-wrap items-center justify-center gap-8 text-gray-300">
            <div class="flex items-center">
                <i class="fas fa-shield-alt text-2xl mr-3"></i>
                <span class="font-semibold">100% Seguro</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-credit-card text-2xl mr-3"></i>
                <span class="font-semibold">Pagamento Seguro</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-undo text-2xl mr-3"></i>
                <span class="font-semibold">Garantia de 30 dias</span>
            </div>
        </div>
    </div>
</section>
@endsection