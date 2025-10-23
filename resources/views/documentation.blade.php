@extends('layouts.landing')

@section('title', 'Documentação - DevStarter Kit')

@section('title', 'DevStarter Kit - Crie Sistemas Completos em Horas | Laravel + Blade + Tailwind')

@section('meta')
    <meta name="description"
        content="DevStarter Kit: Sistema base completo que já ajudou +127 desenvolvedores a acelerar projetos com Laravel + Blade + Tailwind. Crie sistemas em horas, não em semanas!">
    <meta name="keywords"
        content="devstarter kit, laravel, Blade, tailwind, sistema base, desenvolvedor, projeto completo, dashboard, login, crud">
    <meta name="author" content="DevStarter Kit">
    <meta name="robots" content="index, follow">
    <meta name="language" content="pt-BR">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:title" content="DevStarter Kit - Crie Sistemas Completos em Horas">
    <meta property="og:description"
        content="Sistema base completo que já ajudou +127 desenvolvedores a acelerar projetos com Laravel + Blade + Tailwind.">
    <meta property="og:image" content="{{ asset('images/devstarter-kit-og.jpg') }}">
    <meta property="og:site_name" content="DevStarter Kit">
    <meta property="og:locale" content="pt_BR">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ request()->url() }}">
    <meta property="twitter:title" content="DevStarter Kit - Crie Sistemas Completos em Horas">
    <meta property="twitter:description"
        content="Sistema base completo que já ajudou +127 desenvolvedores a acelerar projetos com Laravel + Blade + Tailwind.">
    <meta property="twitter:image" content="{{ asset('images/devstarter-kit-og.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ request()->url() }}">
@endsection

@section('content')
    <div class="min-h-screen bg-gray-50">
         <!-- Header -->
         <div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12 sm:py-16">
             <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                 <div class="text-center">
                     <h1 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-3 sm:mb-4 font-display">
                         📚 Documentação DevStarter Kit
                     </h1>
                     <p class="text-sm sm:text-base lg:text-lg text-gray-300 max-w-3xl mx-auto">
                         Guias completos para instalar, configurar e personalizar seu sistema
                     </p>
                 </div>
             </div>
         </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 w-full">
            <div class="grid lg:grid-cols-4 gap-6 lg:gap-8 w-full">
                <!-- Sidebar Navigation -->
                <div class="lg:col-span-1">
                    <div class="sticky top-4 sm:top-8">
                        <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6">
                            <h3 class="text-base sm:text-lg font-bold text-gray-800 mb-3 sm:mb-4">Índice</h3>
                            <nav class="space-y-1 sm:space-y-2">
                                <a href="#instalacao"
                                    class="block text-xs sm:text-sm text-gray-600 hover:text-orange-500 transition-colors py-1.5 sm:py-2 border-l-2 border-transparent hover:border-orange-500 pl-3 sm:pl-4">
                                    🚀 Instalação
                                </a>
                                <a href="#configuracao"
                                    class="block text-xs sm:text-sm text-gray-600 hover:text-orange-500 transition-colors py-1.5 sm:py-2 border-l-2 border-transparent hover:border-orange-500 pl-3 sm:pl-4">
                                    ⚙️ Configuração
                                </a>
                                <a href="#personalizacao"
                                    class="block text-xs sm:text-sm text-gray-600 hover:text-orange-500 transition-colors py-1.5 sm:py-2 border-l-2 border-transparent hover:border-orange-500 pl-3 sm:pl-4">
                                    🎨 Personalização
                                </a>
                                <a href="#desenvolvimento"
                                    class="block text-xs sm:text-sm text-gray-600 hover:text-orange-500 transition-colors py-1.5 sm:py-2 border-l-2 border-transparent hover:border-orange-500 pl-3 sm:pl-4">
                                    💻 Desenvolvimento
                                </a>
                                <a href="#api"
                                    class="block text-xs sm:text-sm text-gray-600 hover:text-orange-500 transition-colors py-1.5 sm:py-2 border-l-2 border-transparent hover:border-orange-500 pl-3 sm:pl-4">
                                    🔌 API
                                </a>
                                <a href="#deploy"
                                    class="block text-xs sm:text-sm text-gray-600 hover:text-orange-500 transition-colors py-1.5 sm:py-2 border-l-2 border-transparent hover:border-orange-500 pl-3 sm:pl-4">
                                    🚀 Deploy
                                </a>
                                <a href="#troubleshooting"
                                    class="block text-xs sm:text-sm text-gray-600 hover:text-orange-500 transition-colors py-1.5 sm:py-2 border-l-2 border-transparent hover:border-orange-500 pl-3 sm:pl-4">
                                    🔧 Solução de Problemas
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-3">
                    <!-- Installation Section -->
                    <section id="instalacao" class="mb-8 sm:mb-12">
                        <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8">
                            <div class="flex items-center mb-4 sm:mb-6">
                                <div class="w-8 h-8 sm:w-10 sm:h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                    <i class="fas fa-rocket text-white text-sm sm:text-lg"></i>
                                </div>
                                <h2 class="text-lg sm:text-xl font-bold text-gray-800">Instalação</h2>
                            </div>

                            <div class="prose prose-sm sm:prose-lg max-w-none">
                                <h3 class="text-base sm:text-lg font-semibold text-gray-700 mb-3 sm:mb-4">Requisitos do Sistema</h3>
                                <div class="bg-gray-50 rounded-lg p-4 sm:p-6 mb-4 sm:mb-6">
                                    <ul class="list-disc pl-4 sm:pl-6 space-y-1 sm:space-y-2 text-sm sm:text-base text-gray-700">
                                        <li><strong>PHP:</strong> 8.0 ou superior</li>
                                        <li><strong>Composer:</strong> Última versão</li>
                                        <li><strong>Node.js:</strong> 16.x ou superior</li>
                                        <li><strong>NPM:</strong> 8.x ou superior</li>
                                        <li><strong>MySQL:</strong> 5.7 ou superior</li>
                                        <li><strong>Servidor Web:</strong> Apache/Nginx</li>
                                    </ul>
                                </div>

                                <h3 class="text-base sm:text-lg font-semibold text-gray-700 mb-3 sm:mb-4">Passo a Passo</h3>

                                <div class="space-y-4 sm:space-y-6">
                                    <div class="border-l-4 border-blue-500 pl-4 sm:pl-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2">1. Download e Extração</h4>
                                        <p class="text-sm sm:text-base text-gray-600 mb-3">Após a compra, você receberá um link para download do
                                            arquivo ZIP.</p>
                                        <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code># Extrair o arquivo ZIP no diretório do seu servidor
    unzip devstarter-kit.zip
    cd devstarter-kit</code></pre>
                                    </div>

                                    <div class="border-l-4 border-green-500 pl-4 sm:pl-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2">2. Instalar Dependências</h4>
                                        <p class="text-sm sm:text-base text-gray-600 mb-3">Instale as dependências do PHP e Node.js:</p>
                                        <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code># Instalar dependências PHP
    composer install

    # Instalar dependências Node.js
    npm install</code></pre>
                                    </div>

                                    <div class="border-l-4 border-orange-500 pl-4 sm:pl-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2">3. Configurar Ambiente</h4>
                                        <p class="text-sm sm:text-base text-gray-600 mb-3">Configure o arquivo .env com suas credenciais:</p>
                                        <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code># Copiar arquivo de exemplo
    cp .env.example .env

    # Gerar chave da aplicação
    php artisan key:generate</code></pre>
                                    </div>

                                    <div class="border-l-4 border-purple-500 pl-4 sm:pl-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2">4. Configurar Banco de Dados
                                        </h4>
                                        <p class="text-sm sm:text-base text-gray-600 mb-3">Configure as credenciais do banco no arquivo .env:</p>
                                        <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code>DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=devstarter_kit
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha</code></pre>
                                    </div>

                                    <div class="border-l-4 border-red-500 pl-4 sm:pl-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2">5. Executar Migrações</h4>
                                        <p class="text-sm sm:text-base text-gray-600 mb-3">Crie as tabelas do banco de dados:</p>
                                        <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code># Executar migrações
    php artisan migrate

    # Executar seeders (dados iniciais)
    php artisan db:seed</code></pre>
                                    </div>

                                    <div class="border-l-4 border-indigo-500 pl-4 sm:pl-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2">6. Compilar Assets</h4>
                                        <p class="text-sm sm:text-base text-gray-600 mb-3">Compile os arquivos CSS e JavaScript:</p>
                                        <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code># Compilar assets para produção
    npm run build

    # Ou para desenvolvimento
    npm run dev</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                     <!-- Configuration Section -->
                     <section id="configuracao" class="mb-8 sm:mb-12">
                         <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8">
                             <div class="flex items-center mb-4 sm:mb-6">
                                 <div class="w-8 h-8 sm:w-10 sm:h-10 bg-green-500 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                     <i class="fas fa-cog text-white text-sm sm:text-lg"></i>
                                 </div>
                                 <h2 class="text-lg sm:text-xl font-bold text-gray-800">Configuração</h2>
                             </div>

                            <div class="prose prose-sm sm:prose-lg max-w-none">
                                <h3 class="text-base sm:text-lg font-semibold text-gray-700 mb-3 sm:mb-4">Configurações Básicas</h3>

                                <div class="space-y-4 sm:space-y-6">
                                    <div class="bg-blue-50 rounded-lg p-4 sm:p-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2 sm:mb-3">Configuração de E-mail</h4>
                                        <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">Configure o envio de e-mails no arquivo .env:</p>
                                        <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code>MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=seu_email@gmail.com
    MAIL_PASSWORD=sua_senha_app
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=noreply@seudominio.com
    MAIL_FROM_NAME="DevStarter Kit"</code></pre>
                                    </div>

                                    <div class="bg-green-50 rounded-lg p-4 sm:p-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2 sm:mb-3">Configuração de Cache</h4>
                                        <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">Para melhor performance, configure o cache:</p>
                                        <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code># Limpar cache
    php artisan cache:clear
    php artisan config:clear
    php artisan route:clear
    php artisan view:clear

    # Otimizar para produção
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache</code></pre>
                                    </div>

                                    <div class="bg-orange-50 rounded-lg p-4 sm:p-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2 sm:mb-3">Configuração de Storage</h4>
                                        <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">Criar link simbólico para arquivos:</p>
                                        <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code># Criar link simbólico
    php artisan storage:link</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                     <!-- Personalization Section -->
                     <section id="personalizacao" class="mb-8 sm:mb-12">
                         <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8">
                             <div class="flex items-center mb-4 sm:mb-6">
                                 <div class="w-8 h-8 sm:w-10 sm:h-10 bg-purple-500 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                     <i class="fas fa-paint-brush text-white text-sm sm:text-lg"></i>
                                 </div>
                                 <h2 class="text-lg sm:text-xl font-bold text-gray-800">Personalização</h2>
                             </div>

                            <div class="prose prose-sm sm:prose-lg max-w-none">
                                <h3 class="text-base sm:text-lg font-semibold text-gray-700 mb-3 sm:mb-4">Alterando Cores</h3>

                                <div class="bg-purple-50 rounded-lg p-4 sm:p-6 mb-4 sm:mb-6">
                                    <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">Edite o arquivo <code
                                            class="bg-gray-200 px-2 py-1 rounded text-xs sm:text-sm">tailwind.config.js</code> para
                                        personalizar as cores:</p>
                                    <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code>module.exports = {
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#fef7ee',
              500: '#f97316',
              600: '#ea580c',
              700: '#c2410c',
            },
            secondary: {
              50: '#f0f9ff',
              500: '#3b82f6',
              600: '#2563eb',
            }
          }
        }
      }
    }</code></pre>
                                </div>

                                <h3 class="text-base sm:text-lg font-semibold text-gray-700 mb-3 sm:mb-4">Alterando Logo</h3>
                                <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                                    <ol class="list-decimal pl-4 sm:pl-6 space-y-1 sm:space-y-2 text-sm sm:text-base text-gray-700">
                                        <li>Substitua o arquivo <code
                                                class="bg-gray-200 px-2 py-1 rounded text-xs sm:text-sm">public/images/logo.png</code></li>
                                        <li>Atualize as referências nos templates Blade</li>
                                        <li>Recompile os assets: <code
                                                class="bg-gray-200 px-2 py-1 rounded text-xs sm:text-sm">npm run build</code></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </section>

                     <!-- Development Section -->
                     <section id="desenvolvimento" class="mb-8 sm:mb-12">
                         <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8">
                             <div class="flex items-center mb-4 sm:mb-6">
                                 <div class="w-8 h-8 sm:w-10 sm:h-10 bg-indigo-500 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                     <i class="fas fa-code text-white text-sm sm:text-lg"></i>
                                 </div>
                                 <h2 class="text-lg sm:text-xl font-bold text-gray-800">Desenvolvimento</h2>
                             </div>

                            <div class="prose prose-sm sm:prose-lg max-w-none">
                                <h3 class="text-base sm:text-lg font-semibold text-gray-700 mb-3 sm:mb-4">Criando Novas Páginas</h3>

                                <div class="space-y-4 sm:space-y-6">
                                    <div class="bg-indigo-50 rounded-lg p-4 sm:p-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2 sm:mb-3">1. Criar Controller</h4>
                                        <pre
                                            class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code>php artisan make:controller NomeController</code></pre>
                                    </div>

                                    <div class="bg-indigo-50 rounded-lg p-4 sm:p-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2 sm:mb-3">2. Adicionar Rota</h4>
                                        <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code>// routes/web.php
    Route::get('/minha-pagina', [NomeController::class, 'index']);</code></pre>
                                    </div>

                                    <div class="bg-indigo-50 rounded-lg p-4 sm:p-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2 sm:mb-3">3. Criar View</h4>
                                        <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code>// resources/views/minha-pagina.blade.php
   </code></pre>
                                    </div>
                                </div>

                                <h3 class="text-base sm:text-lg font-semibold text-gray-700 mb-3 sm:mb-4 mt-6 sm:mt-8">Criando CRUD Completo</h3>
                                <div class="bg-gray-50 rounded-lg p-4 sm:p-6">
                                    <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code># Criar Model, Migration e Controller
    php artisan make:model Produto -mcr

    # Executar migration
    php artisan migrate

    # Criar views
    php artisan make:view produtos.index
    php artisan make:view produtos.create
    php artisan make:view produtos.edit</code></pre>
                                </div>
                            </div>
                        </div>
                    </section>

                     <!-- API Section -->
                     <section id="api" class="mb-8 sm:mb-12">
                         <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8">
                             <div class="flex items-center mb-4 sm:mb-6">
                                 <div class="w-8 h-8 sm:w-10 sm:h-10 bg-teal-500 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                     <i class="fas fa-plug text-white text-sm sm:text-lg"></i>
                                 </div>
                                 <h2 class="text-lg sm:text-xl font-bold text-gray-800">API</h2>
                             </div>

                            <div class="prose prose-sm sm:prose-lg max-w-none">
                                <h3 class="text-base sm:text-lg font-semibold text-gray-700 mb-3 sm:mb-4">Endpoints Disponíveis</h3>

                                <div class="space-y-3 sm:space-y-4">
                                    <div class="bg-teal-50 rounded-lg p-3 sm:p-4">
                                        <h4 class="text-sm sm:text-base font-semibold text-gray-800 mb-2">Autenticação</h4>
                                        <div class="space-y-1 sm:space-y-2 text-xs sm:text-sm">
                                            <div class="flex items-center space-x-2">
                                                <span class="bg-green-500 text-white px-1.5 sm:px-2 py-0.5 sm:py-1 rounded text-xs">POST</span>
                                                <code class="text-xs sm:text-sm">/api/login</code>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span class="bg-red-500 text-white px-1.5 sm:px-2 py-0.5 sm:py-1 rounded text-xs">POST</span>
                                                <code class="text-xs sm:text-sm">/api/logout</code>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-blue-50 rounded-lg p-3 sm:p-4">
                                        <h4 class="text-sm sm:text-base font-semibold text-gray-800 mb-2">Usuários</h4>
                                        <div class="space-y-1 sm:space-y-2 text-xs sm:text-sm">
                                            <div class="flex items-center space-x-2">
                                                <span class="bg-blue-500 text-white px-1.5 sm:px-2 py-0.5 sm:py-1 rounded text-xs">GET</span>
                                                <code class="text-xs sm:text-sm">/api/users</code>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span class="bg-yellow-500 text-white px-1.5 sm:px-2 py-0.5 sm:py-1 rounded text-xs">PUT</span>
                                                <code class="text-xs sm:text-sm">/api/users/{id}</code>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                     <!-- Deploy Section -->
                     <section id="deploy" class="mb-8 sm:mb-12">
                         <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8">
                             <div class="flex items-center mb-4 sm:mb-6">
                                 <div class="w-8 h-8 sm:w-10 sm:h-10 bg-red-500 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                     <i class="fas fa-rocket text-white text-sm sm:text-lg"></i>
                                 </div>
                                 <h2 class="text-lg sm:text-xl font-bold text-gray-800">Deploy</h2>
                             </div>

                            <div class="prose prose-sm sm:prose-lg max-w-none">
                                <h3 class="text-base sm:text-lg font-semibold text-gray-700 mb-3 sm:mb-4">Deploy em Produção</h3>

                                <div class="space-y-4 sm:space-y-6">
                                    <div class="bg-red-50 rounded-lg p-4 sm:p-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2 sm:mb-3">1. Configurações de Produção
                                        </h4>
                                        <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code># Configurar .env para produção
    APP_ENV=production
    APP_DEBUG=false
    APP_URL=https://seudominio.com</code></pre>
                                    </div>

                                    <div class="bg-red-50 rounded-lg p-4 sm:p-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2 sm:mb-3">2. Otimizar Aplicação</h4>
                                        <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code># Otimizar para produção
    composer install --optimize-autoloader --no-dev
    npm run build
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache</code></pre>
                                    </div>

                                    <div class="bg-red-50 rounded-lg p-4 sm:p-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2 sm:mb-3">3. Configurar Servidor Web</h4>
                                        <p class="text-sm sm:text-base text-gray-600 mb-3">Configure o Apache/Nginx para apontar para a pasta
                                            <code class="bg-gray-200 px-2 py-1 rounded text-xs sm:text-sm">public</code></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                     <!-- Troubleshooting Section -->
                     <section id="troubleshooting" class="mb-8 sm:mb-12">
                         <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8">
                             <div class="flex items-center mb-4 sm:mb-6">
                                 <div class="w-8 h-8 sm:w-10 sm:h-10 bg-yellow-500 rounded-full flex items-center justify-center mr-3 sm:mr-4">
                                     <i class="fas fa-tools text-white text-sm sm:text-lg"></i>
                                 </div>
                                 <h2 class="text-lg sm:text-xl font-bold text-gray-800">Solução de Problemas</h2>
                             </div>

                            <div class="prose prose-sm sm:prose-lg max-w-none">
                                <div class="space-y-4 sm:space-y-6">
                                    <div class="bg-yellow-50 rounded-lg p-4 sm:p-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2 sm:mb-3">Erro 500 - Internal Server
                                            Error</h4>
                                        <ul class="list-disc pl-4 sm:pl-6 space-y-1 sm:space-y-2 text-sm sm:text-base text-gray-700">
                                            <li>Verificar permissões das pastas (755 para diretórios, 644 para arquivos)
                                            </li>
                                            <li>Executar: <code
                                                    class="bg-gray-200 px-2 py-1 rounded text-xs sm:text-sm">php artisan cache:clear</code>
                                            </li>
                                            <li>Verificar arquivo .env</li>
                                            <li>Confirmar se o banco de dados está acessível</li>
                                        </ul>
                                    </div>

                                    <div class="bg-yellow-50 rounded-lg p-4 sm:p-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2 sm:mb-3">Assets não carregam</h4>
                                        <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code>npm install
    npm run build
    php artisan storage:link</code></pre>
                                    </div>

                                    <div class="bg-yellow-50 rounded-lg p-4 sm:p-6">
                                        <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2 sm:mb-3">Erro de Permissão</h4>
                                        <pre class="bg-gray-900 text-green-400 p-3 sm:p-4 rounded-lg text-xs sm:text-sm overflow-x-auto"><code># Definir permissões corretas
    chmod -R 755 storage
    chmod -R 755 bootstrap/cache
    chown -R www-data:www-data storage
    chown -R www-data:www-data bootstrap/cache</code></pre>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

         <!-- Contact Section -->
         <div class="bg-gradient-to-r from-orange-500 to-orange-600 py-12 sm:py-16">
             <div class="max-w-4xl mx-auto text-center px-4">
                 <h2 class="text-xl sm:text-2xl font-bold text-white mb-3 sm:mb-4">Precisa de Ajuda?</h2>
                 <p class="text-orange-100 mb-6 sm:mb-8 text-sm sm:text-base lg:text-lg">
                     Nossa equipe está pronta para ajudar você a configurar e personalizar seu DevStarter Kit
                 </p>
                 <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
                     <a href="{{ route('help-center') }}"
                         class="bg-white text-orange-500 px-6 sm:px-8 py-2.5 sm:py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors text-sm sm:text-base">
                         Central de Ajuda
                     </a>
                     <a href="mailto:suporte@devstarterkit.com"
                         class="bg-orange-600 text-white px-6 sm:px-8 py-2.5 sm:py-3 rounded-lg font-semibold hover:bg-orange-700 transition-colors text-sm sm:text-base">
                         Contato Direto
                     </a>
                 </div>
             </div>
         </div>

        <!-- Back to Home -->
        <div class="bg-gray-50 py-6 sm:py-8">
            <div class="max-w-4xl mx-auto text-center px-4">
                <a href="{{ route('conversion') }}"
                    class="bg-gray-800 text-white px-6 sm:px-8 py-2.5 sm:py-3 rounded-lg font-semibold hover:bg-gray-900 transition-colors text-sm sm:text-base">
                    ← Voltar ao Início
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Smooth scrolling for navigation links
            document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('nav a[href^="#"]');

            window.addEventListener('scroll', () => {
                let current = '';
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    if (scrollY >= (sectionTop - 200)) {
                        current = section.getAttribute('id');
                    }
                });

                navLinks.forEach(link => {
                    link.classList.remove('border-orange-500', 'text-orange-500');
                    link.classList.add('border-transparent', 'text-gray-600');
                    if (link.getAttribute('href') === '#' + current) {
                        link.classList.remove('border-transparent', 'text-gray-600');
                        link.classList.add('border-orange-500', 'text-orange-500');
                    }
                });
            });
        });
     </script>

     <style>
         /* Garantir que os cards não ultrapassem o container */
         .prose {
             max-width: 100% !important;
             width: 100%;
         }
         
         .prose pre {
             max-width: 100%;
             overflow-x: auto;
             width: 100%;
         }
         
         .prose code {
             word-break: break-all;
             white-space: pre-wrap;
             max-width: 100%;
         }
         
         /* Garantir que todos os elementos respeitem o container */
         .bg-white {
             max-width: 100%;
             overflow: hidden;
         }
         
         .bg-blue-50, .bg-green-50, .bg-orange-50, .bg-purple-50, .bg-indigo-50, .bg-teal-50, .bg-red-50, .bg-yellow-50 {
             max-width: 100%;
             overflow: hidden;
         }
         
         /* Ajustar largura dos cards em mobile */
         @media (max-width: 640px) {
             .prose {
                 font-size: 14px;
             }
             
             .prose h3 {
                 font-size: 16px;
             }
             
             .prose h4 {
                 font-size: 14px;
             }
             
             .bg-white {
                 padding: 1rem;
             }
         }
         
         /* Garantir que o grid não quebre */
         .grid {
             display: grid;
         }
         
         /* Ajustar espaçamento em mobile */
         @media (max-width: 768px) {
             .space-y-4 > * + * {
                 margin-top: 1rem;
             }
             
             .space-y-6 > * + * {
                 margin-top: 1.5rem;
             }
         }
         
         /* Forçar quebra de linha em textos longos */
         .prose p, .prose li {
             word-wrap: break-word;
             overflow-wrap: break-word;
         }
         
         /* Ajustar código inline */
         .prose code:not(pre code) {
             white-space: nowrap;
             overflow: hidden;
             text-overflow: ellipsis;
             max-width: 100%;
             display: inline-block;
         }
     </style>
 @endsection