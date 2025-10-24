<!-- Cookie Banner -->
<div id="cookie-banner" class="fixed bottom-0 left-0 right-0 bg-white border-t-2 border-gray-200 shadow-2xl z-50 transform translate-y-full transition-transform duration-500" style="display: none;">
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-4">
            <!-- Conteúdo -->
            <div class="flex-1">
                <div class="flex items-center mb-3">
                    <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                        <span class="text-white text-lg">🍪</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800">Cookies e Privacidade</h3>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Utilizamos cookies para melhorar sua experiência, analisar o uso do site e personalizar conteúdo. 
                    Ao continuar navegando, você concorda com nossa 
                    <a href="{{ route('politica') }}" class="text-blue-600 hover:text-blue-800 underline">Política de Privacidade</a>.
                </p>
            </div>

            <!-- Botões -->
            <div class="flex flex-col sm:flex-row gap-3">
                <button id="cookie-reject" class="px-6 py-2 border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium">
                    Rejeitar
                </button>
                <button id="cookie-customize" class="px-6 py-2 border-2 border-blue-500 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors font-medium">
                    Personalizar
                </button>
                <button id="cookie-accept" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors font-medium">
                    Aceitar Todos
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Personalização -->
<div id="cookie-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <!-- Header -->
            <div class="bg-linear-to-r from-blue-500 to-purple-600 text-white p-6 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-full flex items-center justify-center mr-4">
                            <span class="text-2xl">🍪</span>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold">Configurações de Cookies</h2>
                            <p class="text-blue-100 text-sm">Personalize sua experiência</p>
                        </div>
                    </div>
                    <button id="cookie-modal-close" class="text-white hover:text-gray-200 text-2xl">
                        ×
                    </button>
                </div>
            </div>

            <!-- Conteúdo -->
            <div class="p-6 space-y-6">
                <!-- Cookies Essenciais -->
                <div class="border-2 border-green-200 bg-green-50 rounded-xl p-4 cursor-not-allowed opacity-75">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white text-sm">⚙️</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Cookies Essenciais</h3>
                                <p class="text-sm text-gray-600">Necessários para o funcionamento básico</p>
                            </div>
                        </div>
                        <div class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                            Obrigatório
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">
                        Estes cookies são essenciais para o funcionamento do site e não podem ser desativados.
                    </p>
                </div>

                <!-- Cookies Analíticos -->
                <div class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer hover:border-blue-300 hover:bg-blue-50 transition-all duration-200" onclick="toggleAnalytics()">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white text-sm">📊</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Cookies Analíticos</h3>
                                <p class="text-sm text-gray-600">Para melhorar a experiência do usuário</p>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="analytics-cookies" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </div>
                    <p class="text-sm text-gray-600">
                        Coletam informações sobre como você usa o site para melhorar a experiência.
                    </p>
                </div>

                <!-- Cookies de Marketing -->
                <div class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer hover:border-purple-300 hover:bg-purple-50 transition-all duration-200" onclick="toggleMarketing()">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center mr-3">
                                <span class="text-white text-sm">🎯</span>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Cookies de Marketing</h3>
                                <p class="text-sm text-gray-600">Para personalizar ofertas e conteúdo</p>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="marketing-cookies" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-purple-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-purple-600"></div>
                        </label>
                    </div>
                    <p class="text-sm text-gray-600">
                        Permitem personalizar anúncios e conteúdo baseado em seus interesses.
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-gray-50 px-6 py-4 rounded-b-2xl">
                <div class="flex flex-col sm:flex-row gap-3">
                    <button onclick="revokeConsent()" class="px-4 py-2 text-red-600 hover:text-red-800 transition-colors text-sm font-medium">
                        <i class="fas fa-trash mr-1"></i>
                        Revogar Consentimento
                    </button>
                    <div class="flex flex-col sm:flex-row gap-3 ml-auto">
                        <button id="cookie-save-preferences" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors font-medium">
                            Salvar Preferências
                        </button>
                        <button id="cookie-accept-all-modal" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors font-medium">
                            Aceitar Todos
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const banner = document.getElementById('cookie-banner');
    const modal = document.getElementById('cookie-modal');
    const acceptBtn = document.getElementById('cookie-accept');
    const rejectBtn = document.getElementById('cookie-reject');
    const customizeBtn = document.getElementById('cookie-customize');
    const modalCloseBtn = document.getElementById('cookie-modal-close');
    const savePreferencesBtn = document.getElementById('cookie-save-preferences');
    const acceptAllModalBtn = document.getElementById('cookie-accept-all-modal');

    // Inicializando sistema de cookies

    // Verificar se já existe consentimento
    checkConsentStatus();

    // Verificar status do consentimento
    function checkConsentStatus() {
        fetch('{{ route("cookies.get") }}')
        .then(response => response.json())
        .then(data => {
            if (data.success && data.consent) {
                // Já há consentimento, esconder banner e mostrar ícone
                hideBanner();
                showCookieIcon();
                updateCardVisuals(data.consent);
            } else {
                // Não há consentimento, mostrar banner
                showBanner();
            }
        })
        .catch(error => {
            // Em caso de erro, mostrar banner
            showBanner();
        });
    }

    // Aceitar todos os cookies
    function acceptAllCookies() {
        saveConsentToServer({
            essential: true,
            analytics: true,
            marketing: true
        });
    }

    // Rejeitar cookies não essenciais
    function rejectNonEssentialCookies() {
        saveConsentToServer({
            essential: true,
            analytics: false,
            marketing: false
        });
    }

    // Salvar preferências personalizadas
    function saveCustomPreferences() {
        const analytics = document.getElementById('analytics-cookies').checked;
        const marketing = document.getElementById('marketing-cookies').checked;
        
        saveConsentToServer({
            essential: true,
            analytics: analytics,
            marketing: marketing
        });
    }

    // Salvar consentimento no servidor
    function saveConsentToServer(consent) {
        fetch('{{ route("cookies.consent") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(consent)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                hideBanner();
                hideModal();
                showSuccessMessage(data.message);
            } else {
                showErrorMessage('Erro ao salvar preferências');
            }
        })
        .catch(error => {
            showErrorMessage('Erro ao salvar preferências');
        });
    }

    // Esconder banner
    function hideBanner() {
        if (banner) {
            banner.style.transform = 'translateY(100%)';
            banner.style.transition = 'transform 0.5s ease-in-out';
            // Esconder completamente após a transição
            setTimeout(() => {
                banner.style.display = 'none';
            }, 500);
            showCookieIcon();
        }
    }

    // Mostrar banner
    function showBanner() {
        if (banner) {
            banner.style.display = 'block';
            banner.style.transform = 'translateY(0)';
            banner.style.transition = 'transform 0.5s ease-in-out';
            hideCookieIcon();
        }
    }

    // Mostrar ícone flutuante de cookies
    function showCookieIcon() {
        const existingIcon = document.getElementById('cookie-icon');
        if (existingIcon) {
            return;
        }

        const icon = document.createElement('div');
        icon.id = 'cookie-icon';
        icon.className = 'fixed bottom-4 right-4 z-50 bg-purple-600 text-white p-3 rounded-full shadow-lg hover:bg-purple-700 cursor-pointer transition-all duration-300 hover:scale-110';
        icon.innerHTML = '<i class="fas fa-cookie-bite text-lg"></i>';
        icon.title = 'Configurações de Cookies';
        icon.onclick = showModal;

        document.body.appendChild(icon);
    }

    // Esconder ícone flutuante
    function hideCookieIcon() {
        const icon = document.getElementById('cookie-icon');
        if (icon) {
            icon.remove();
        }
    }

    // Revogar consentimento
    function revokeConsent() {
        fetch('{{ route("cookies.revoke") }}', {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                hideCookieIcon();
                showBanner();
                showSuccessMessage('Consentimento revogado. Você pode reconfigurar suas preferências.');
            } else {
                showErrorMessage('Erro ao revogar consentimento');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            showErrorMessage('Erro ao revogar consentimento');
        });
    }

    // Esconder modal
    function hideModal() {
        modal.classList.add('hidden');
        showCookieIcon();
    }

    // Mostrar modal
    function showModal() {
        modal.classList.remove('hidden');
        hideCookieIcon();
    }

    // Mostrar mensagem de sucesso
    function showSuccessMessage(message) {
        const toast = document.createElement('div');
        toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
        toast.innerHTML = `
            <div class="flex items-center">
                <span class="mr-2">✅</span>
                ${message}
            </div>
        `;
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.classList.remove('translate-x-full');
        }, 100);
        
        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 300);
        }, 3000);
    }

    // Mostrar mensagem de erro
    function showErrorMessage(message) {
        const toast = document.createElement('div');
        toast.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
        toast.innerHTML = `
            <div class="flex items-center">
                <span class="mr-2">❌</span>
                ${message}
            </div>
        `;
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.classList.remove('translate-x-full');
        }, 100);
        
        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 300);
        }, 3000);
    }

    // Event listeners
    acceptBtn.addEventListener('click', acceptAllCookies);
    rejectBtn.addEventListener('click', rejectNonEssentialCookies);
    customizeBtn.addEventListener('click', showModal);
    modalCloseBtn.addEventListener('click', hideModal);
    savePreferencesBtn.addEventListener('click', saveCustomPreferences);
    acceptAllModalBtn.addEventListener('click', acceptAllCookies);

    // Fechar modal clicando fora
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            hideModal();
        }
    });

    // Carregar preferências salvas no modal
    customizeBtn.addEventListener('click', function() {
        fetch('{{ route("cookies.get") }}')
        .then(response => response.json())
        .then(data => {
            if (data.success && data.consent) {
                // Atualizar checkboxes
                document.getElementById('analytics-cookies').checked = data.consent.analytics;
                document.getElementById('marketing-cookies').checked = data.consent.marketing;
                
                // Aplicar feedback visual
                updateCardVisuals();
            }
        })
        .catch(error => {
            console.error('Erro ao carregar preferências:', error);
        });
    });

    // Atualizar feedback visual dos cards
    function updateCardVisuals() {
        const analyticsCard = document.querySelector('[onclick="toggleAnalytics()"]');
        const marketingCard = document.querySelector('[onclick="toggleMarketing()"]');
        
        // Analytics card
        if (document.getElementById('analytics-cookies').checked) {
            analyticsCard.classList.add('border-blue-400', 'bg-blue-100');
            analyticsCard.classList.remove('border-gray-200');
        } else {
            analyticsCard.classList.remove('border-blue-400', 'bg-blue-100');
            analyticsCard.classList.add('border-gray-200');
        }
        
        // Marketing card
        if (document.getElementById('marketing-cookies').checked) {
            marketingCard.classList.add('border-purple-400', 'bg-purple-100');
            marketingCard.classList.remove('border-gray-200');
        } else {
            marketingCard.classList.remove('border-purple-400', 'bg-purple-100');
            marketingCard.classList.add('border-gray-200');
        }
    }

    // Funções para toggle dos cards
    window.toggleAnalytics = function() {
        const checkbox = document.getElementById('analytics-cookies');
        checkbox.checked = !checkbox.checked;
        
        // Atualizar feedback visual
        updateCardVisuals();
    };

    window.toggleMarketing = function() {
        const checkbox = document.getElementById('marketing-cookies');
        checkbox.checked = !checkbox.checked;
        
        // Atualizar feedback visual
        updateCardVisuals();
    };
});
</script>
