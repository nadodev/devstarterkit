@extends('layouts.landing')

@section('title', 'Central de Ajuda - DevStarter Kit')

@section('meta')
<meta name="description" content="Central de Ajuda do DevStarter Kit - Encontre respostas para suas dúvidas sobre instalação, configuração e uso do sistema.">
<meta name="robots" content="index, follow">
@endsection

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-gray-800 mb-4 font-display">
                Central de Ajuda
            </h1>
            <p class="text-lg sm:text-xl text-gray-600 mb-8">
                Encontre respostas para suas dúvidas sobre o DevStarter Kit
            </p>
            
            <!-- Search Bar -->
            <div class="max-w-2xl mx-auto">
                <div class="relative">
                    <input type="text" id="searchInput" placeholder="Digite sua pergunta ou palavra-chave..." 
                           class="w-full px-6 py-4 pr-12 rounded-2xl border-2 border-gray-200 focus:border-orange-500 focus:outline-none text-lg">
                    <button id="searchBtn" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-orange-500">
                        <i class="fas fa-search text-xl"></i>
                    </button>
                </div>
                <div id="searchResults" class="mt-4 hidden"></div>
            </div>
        </div>

        <!-- Categories -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer category-card" data-category="instalacao">
                <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-download text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Instalação</h3>
                <p class="text-gray-600">Como instalar e configurar o DevStarter Kit</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer category-card" data-category="configuracao">
                <div class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-cog text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Configuração</h3>
                <p class="text-gray-600">Configurar banco de dados, autenticação e mais</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer category-card" data-category="personalizacao">
                <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-paint-brush text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Personalização</h3>
                <p class="text-gray-600">Customizar cores, layouts e funcionalidades</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer category-card" data-category="troubleshooting">
                <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-tools text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Solução de Problemas</h3>
                <p class="text-gray-600">Resolver erros e problemas comuns</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer category-card" data-category="desenvolvimento">
                <div class="w-16 h-16 bg-orange-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-code text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Desenvolvimento</h3>
                <p class="text-gray-600">Adicionar novas funcionalidades e módulos</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer category-card" data-category="deploy">
                <div class="w-16 h-16 bg-red-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-rocket text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Deploy</h3>
                <p class="text-gray-600">Como fazer deploy em produção</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 cursor-pointer category-card" data-category="suporte">
                <div class="w-16 h-16 bg-indigo-500 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-headset text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Suporte</h3>
                <p class="text-gray-600">Contato e suporte técnico</p>
            </div>
        </div>

        <!-- FAQ Section -->
        <div id="faqSection">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800">Perguntas Frequentes</h2>
                <button id="showAllBtn" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors hidden">
                    Ver Todas as Categorias
                </button>
            </div>
            
            <!-- Installation FAQ -->
            <div class="faq-category" data-category="instalacao">
                <h3 class="text-xl font-bold text-gray-700 mb-6">📥 Instalação</h3>
                <div class="space-y-4 mb-8">
                    <div class="faq-item bg-white rounded-2xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Como instalar o DevStarter Kit?</h4>
                        <div class="faq-answer text-gray-600">
                            <p class="mb-3">Para instalar o DevStarter Kit:</p>
                            <ol class="list-decimal pl-6 space-y-2">
                                <li>Baixe o arquivo ZIP após a compra</li>
                                <li>Extraia os arquivos em seu servidor web</li>
                                <li>Configure o banco de dados MySQL</li>
                                <li>Execute <code class="bg-gray-100 px-2 py-1 rounded">composer install</code></li>
                                <li>Configure o arquivo .env com suas credenciais</li>
                                <li>Execute as migrações: <code class="bg-gray-100 px-2 py-1 rounded">php artisan migrate</code></li>
                            </ol>
                        </div>
                    </div>

                    <div class="faq-item bg-white rounded-2xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Quais são os requisitos do sistema?</h4>
                        <div class="faq-answer text-gray-600">
                            <ul class="list-disc pl-6 space-y-1">
                                <li>PHP 8.3 ou superior</li>
                                <li>MySQL 5.7 ou superior</li>
                                <li>Composer</li>
                                <li>Node.js e NPM (para assets)</li>
                                <li>Servidor web (Apache/Nginx)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Configuration FAQ -->
            <div class="faq-category" data-category="configuracao">
                <h3 class="text-xl font-bold text-gray-700 mb-6">⚙️ Configuração</h3>
                <div class="space-y-4 mb-8">
                    <div class="faq-item bg-white rounded-2xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Como configurar o banco de dados?</h4>
                        <div class="faq-answer text-gray-600">
                            <p class="mb-3">Configure as credenciais do banco no arquivo .env:</p>
                            <pre class="bg-gray-100 p-4 rounded-lg text-sm overflow-x-auto"><code>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=devstarter_kit
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha</code></pre>
                        </div>
                    </div>

                    <div class="faq-item bg-white rounded-2xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Como configurar o sistema de autenticação?</h4>
                        <div class="faq-answer text-gray-600">
                            <p>O sistema de autenticação já vem pré-configurado. Você só precisa:</p>
                            <ol class="list-decimal pl-6 space-y-2 mt-3">
                                <li>Executar as migrações</li>
                                <li>Criar o primeiro usuário administrador</li>
                                <li>Configurar as rotas de autenticação</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Personalization FAQ -->
            <div class="faq-category" data-category="personalizacao">
                <h3 class="text-xl font-bold text-gray-700 mb-6">🎨 Personalização</h3>
                <div class="space-y-4 mb-8">
                    <div class="faq-item bg-white rounded-2xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Como alterar as cores do sistema?</h4>
                        <div class="faq-answer text-gray-600">
                            <p class="mb-3">Para personalizar as cores:</p>
                            <ol class="list-decimal pl-6 space-y-2">
                                <li>Edite o arquivo <code class="bg-gray-100 px-2 py-1 rounded">tailwind.config.js</code></li>
                                <li>Modifique as cores na seção <code class="bg-gray-100 px-2 py-1 rounded">theme.colors</code></li>
                                <li>Execute <code class="bg-gray-100 px-2 py-1 rounded">npm run build</code> para compilar</li>
                            </ol>
                        </div>
                    </div>

                    <div class="faq-item bg-white rounded-2xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Posso adicionar meu próprio logo?</h4>
                        <div class="faq-answer text-gray-600">
                            <p>Sim! Substitua o arquivo de logo em <code class="bg-gray-100 px-2 py-1 rounded">public/images/logo.png</code> 
                            e atualize as referências nos templates Blade.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Troubleshooting FAQ -->
            <div class="faq-category" data-category="troubleshooting">
                <h3 class="text-xl font-bold text-gray-700 mb-6">🔧 Solução de Problemas</h3>
                <div class="space-y-4 mb-8">
                    <div class="faq-item bg-white rounded-2xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Erro 500 - Internal Server Error</h4>
                        <div class="faq-answer text-gray-600">
                            <p class="mb-3">Possíveis soluções:</p>
                            <ul class="list-disc pl-6 space-y-1">
                                <li>Verifique as permissões das pastas (755 para diretórios, 644 para arquivos)</li>
                                <li>Limpe o cache: <code class="bg-gray-100 px-2 py-1 rounded">php artisan cache:clear</code></li>
                                <li>Verifique o arquivo .env</li>
                                <li>Confirme se o banco de dados está acessível</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item bg-white rounded-2xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Assets não carregam (CSS/JS)</h4>
                        <div class="faq-answer text-gray-600">
                            <p class="mb-3">Execute os seguintes comandos:</p>
                            <pre class="bg-gray-100 p-4 rounded-lg text-sm"><code>npm install
npm run build
php artisan storage:link</code></pre>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Development FAQ -->
            <div class="faq-category" data-category="desenvolvimento">
                <h3 class="text-xl font-bold text-gray-700 mb-6">💻 Desenvolvimento</h3>
                <div class="space-y-4 mb-8">
                    <div class="faq-item bg-white rounded-2xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Como adicionar uma nova página?</h4>
                        <div class="faq-answer text-gray-600">
                            <ol class="list-decimal pl-6 space-y-2">
                                <li>Crie o controller: <code class="bg-gray-100 px-2 py-1 rounded">php artisan make:controller NomeController</code></li>
                                <li>Adicione a rota em <code class="bg-gray-100 px-2 py-1 rounded">routes/web.php</code></li>
                                <li>Crie a view em <code class="bg-gray-100 px-2 py-1 rounded">resources/views/</code></li>
                                <li>Estenda o layout principal</li>
                            </ol>
                        </div>
                    </div>

                    <div class="faq-item bg-white rounded-2xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Como criar um novo módulo CRUD?</h4>
                        <div class="faq-answer text-gray-600">
                            <p class="mb-3">Use o comando do Laravel:</p>
                            <pre class="bg-gray-100 p-4 rounded-lg text-sm"><code>php artisan make:model NomeModel -mcr</code></pre>
                            <p class="mt-3">Isso criará o Model, Migration e Controller automaticamente.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deploy FAQ -->
            <div class="faq-category" data-category="deploy">
                <h3 class="text-xl font-bold text-gray-700 mb-6">🚀 Deploy</h3>
                <div class="space-y-4 mb-8">
                    <div class="faq-item bg-white rounded-2xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Como fazer deploy na Hostinger?</h4>
                        <div class="faq-answer text-gray-600">
                            <p class="mb-3">Para fazer deploy na Hostinger:</p>
                            <ol class="list-decimal pl-6 space-y-2">
                                <li>Suba seu projeto para o GitHub</li>
                                <li>Acesse o painel da Hostinger via SSH</li>
                                <li>Configure o banco de dados no painel</li>
                                <li>Clone o repositório no servidor</li>
                                <li>Configure .htaccess e index.php</li>
                                <li>Execute composer install e npm run build</li>
                                <li>Configure o arquivo .env para produção</li>
                            </ol>
                        </div>
                    </div>

                    <div class="faq-item bg-white rounded-2xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Erro ao compilar assets (npm run build)</h4>
                        <div class="faq-answer text-gray-600">
                            <p class="mb-3">Se encontrar erro de Node.js, execute:</p>
                            <pre class="bg-gray-100 p-4 rounded-lg text-sm"><code>export RAYON_NUM_THREADS=1
export UV_THREADPOOL_SIZE=1
npm run build</code></pre>
                        </div>
                    </div>

                    <div class="faq-item bg-white rounded-2xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Como configurar o .htaccess para Laravel?</h4>
                        <div class="faq-answer text-gray-600">
                            <p class="mb-3">Crie um arquivo .htaccess na raiz com:</p>
                            <pre class="bg-gray-100 p-4 rounded-lg text-sm"><code>&lt;IfModule mod_rewrite.c&gt;
    RewriteEngine On
    RewriteCond %{REQUEST_URI} !^/public/
    RewriteRule ^(.*)$ public/$1 [L]
&lt;/IfModule&gt;
Options -Indexes</code></pre>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Support FAQ -->
            <div class="faq-category" data-category="suporte">
                <h3 class="text-xl font-bold text-gray-700 mb-6">🎧 Suporte</h3>
                <div class="space-y-4 mb-8">
                    <div class="faq-item bg-white rounded-2xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Como entrar em contato com o suporte?</h4>
                        <div class="faq-answer text-gray-600">
                            <p class="mb-3">Você pode nos contatar através de:</p>
                            <ul class="list-disc pl-6 space-y-1">
                                <li><strong>E-mail:</strong> suporte@devstarterkit.com</li>
                                <li><strong>WhatsApp:</strong> (11) 99999-9999</li>
                                <li><strong>Discord:</strong> Comunidade DevStarter Kit</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item bg-white rounded-2xl p-6 shadow-lg">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Qual o tempo de resposta do suporte?</h4>
                        <div class="faq-answer text-gray-600">
                            <p>Respondemos em até 24 horas úteis. Para clientes com suporte prioritário, 
                            o tempo de resposta é de até 4 horas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl p-8 text-white text-center">
            <h3 class="text-2xl font-bold mb-4">Não encontrou o que procurava?</h3>
            <p class="text-orange-100 mb-6">Entre em contato conosco e teremos prazer em ajudar!</p>
            <a href="{{ route(name: 'contact') }}" class="bg-white text-orange-500 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Entrar em Contato
            </a>
        </div>

        <!-- Back to Home -->
        <div class="text-center mt-8">
            <a href="{{ route('conversion') }}" class="bg-gray-800 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-900 transition-colors">
                ← Voltar ao Início
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    const categoryCards = document.querySelectorAll('.category-card');
    const faqCategories = document.querySelectorAll('.faq-category');
    const faqItems = document.querySelectorAll('.faq-item');

    // Search functionality
    function searchFAQ(query) {
        const results = [];
        const searchTerm = query.toLowerCase();

        faqItems.forEach(item => {
            const question = item.querySelector('h4').textContent.toLowerCase();
            const answer = item.querySelector('.faq-answer').textContent.toLowerCase();
            
            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                results.push(item);
            }
        });

        return results;
    }

    function displaySearchResults(results) {
        if (results.length === 0) {
            searchResults.innerHTML = '<p class="text-gray-600 text-center">Nenhum resultado encontrado.</p>';
        } else {
            let html = '<div class="space-y-4">';
            results.forEach(item => {
                html += `
                    <div class="bg-white rounded-lg p-4 shadow-md">
                        <h4 class="font-semibold text-gray-800 mb-2">${item.querySelector('h4').textContent}</h4>
                        <div class="text-gray-600 text-sm">${item.querySelector('.faq-answer').textContent.substring(0, 150)}...</div>
                    </div>
                `;
            });
            html += '</div>';
            searchResults.innerHTML = html;
        }
        searchResults.classList.remove('hidden');
    }

    // Search event listeners
    searchInput.addEventListener('input', function() {
        const query = this.value.trim();
        if (query.length > 2) {
            const results = searchFAQ(query);
            displaySearchResults(results);
        } else {
            searchResults.classList.add('hidden');
        }
    });

    document.getElementById('searchBtn').addEventListener('click', function() {
        const query = searchInput.value.trim();
        if (query.length > 2) {
            const results = searchFAQ(query);
            displaySearchResults(results);
        }
    });

    // Category filtering
    categoryCards.forEach(card => {
        card.addEventListener('click', function() {
            const category = this.dataset.category;
            filterByCategory(category);
        });
    });

    function filterByCategory(category) {
        // Hide all categories
        faqCategories.forEach(cat => {
            cat.style.display = 'none';
        });

        // Show selected category
        const selectedCategory = document.querySelector(`.faq-category[data-category="${category}"]`);
        if (selectedCategory) {
            selectedCategory.style.display = 'block';
            selectedCategory.scrollIntoView({ behavior: 'smooth' });
            
            // Show "Show All" button
            document.getElementById('showAllBtn').classList.remove('hidden');
        } else {
            console.log('Category not found:', category);
        }
    }

    function showAllCategories() {
        // Show all categories
        faqCategories.forEach(cat => {
            cat.style.display = 'block';
        });
        
        // Hide "Show All" button
        document.getElementById('showAllBtn').classList.add('hidden');
    }

    // Show all categories button
    document.getElementById('showAllBtn').addEventListener('click', showAllCategories);

    // FAQ item toggle (if you want to add expand/collapse functionality)
    faqItems.forEach(item => {
        const question = item.querySelector('h4');
        const answer = item.querySelector('.faq-answer');
        
        question.addEventListener('click', function() {
            if (answer.style.display === 'none') {
                answer.style.display = 'block';
            } else {
                answer.style.display = 'none';
            }
        });
    });
});
</script>
@endsection

