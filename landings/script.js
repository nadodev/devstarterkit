// DevStarter Kit Landing Page - JavaScript
document.addEventListener('DOMContentLoaded', function() {
    
    // Configuração carregada do JSON
    let config = {};
    
    // Carregar configuração
    async function loadConfig() {
        try {
            const response = await fetch('config.json');
            config = await response.json();
        } catch (error) {
            console.log('Configuração não encontrada, usando padrões');
        }
    }
    
    // Inicializar
    loadConfig();
    
    // FAQ Accordion
    const faqButtons = document.querySelectorAll('.faq-button');
    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            const content = this.nextElementSibling;
            const icon = this.querySelector('i');
            
            // Fechar outros FAQs
            faqButtons.forEach(otherButton => {
                if (otherButton !== this) {
                    const otherContent = otherButton.nextElementSibling;
                    const otherIcon = otherButton.querySelector('i');
                    otherContent.classList.add('hidden');
                    otherIcon.classList.remove('fa-chevron-up');
                    otherIcon.classList.add('fa-chevron-down');
                }
            });
            
            // Toggle atual
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            } else {
                content.classList.add('hidden');
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            }
        });
    });
    
    // Formulário de captura de leads
    const leadForm = document.getElementById('lead-form');
    if (leadForm) {
        leadForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const whatsapp = document.getElementById('whatsapp').value.trim();
            
            // Validação
            if (!email) {
                showErrorMessage('Por favor, insira seu email.');
                return;
            }
            
            if (!isValidEmail(email)) {
                showErrorMessage('Por favor, insira um email válido.');
                return;
            }
            
            if (whatsapp && !isValidWhatsApp(whatsapp)) {
                showErrorMessage('Por favor, insira um WhatsApp válido (apenas números).');
                return;
            }
            
            // Simular envio do formulário
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;
            
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Enviando...';
            submitButton.disabled = true;
            
            // Simular delay de envio
            setTimeout(() => {
                // Simular sucesso
                showSuccessMessage();
                this.reset();
                submitButton.innerHTML = originalText;
                submitButton.disabled = false;
            }, 2000);
        });
    }
    
    // Mostrar mensagem de sucesso
    function showSuccessMessage() {
        const successDiv = document.createElement('div');
        successDiv.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg z-50 animate-slide-up';
        successDiv.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-3"></i>
                <span>Obrigado! Confira seu email para acessar o guia completo do DevStarter Kit.</span>
            </div>
        `;
        
        document.body.appendChild(successDiv);
        
        setTimeout(() => {
            successDiv.remove();
        }, 5000);
    }
    
    // Mostrar mensagem de erro
    function showErrorMessage(message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg z-50 animate-slide-up';
        errorDiv.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-3"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(errorDiv);
        
        setTimeout(() => {
            errorDiv.remove();
        }, 4000);
    }
    
    // Smooth scroll para links internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
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
    
    // Animações de entrada
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);
    
    // Observar elementos para animação
    document.querySelectorAll('section').forEach(section => {
        observer.observe(section);
    });
    
    // CTAs principais
    const heroCta = document.getElementById('hero-cta');
    const finalCta = document.getElementById('final-cta');
    
    [heroCta, finalCta].forEach(cta => {
        if (cta) {
            cta.addEventListener('click', function() {
                // Scroll para o formulário
                const formSection = document.querySelector('section.bg-blue-dark');
                if (formSection) {
                    formSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            });
        }
    });
    
    // Botão de demonstração
    const demoButton = document.querySelector('button:contains("Ver Demonstração")');
    if (demoButton) {
        demoButton.addEventListener('click', function() {
            // Scroll para seção de demonstração
            const demoSection = document.querySelector('section:contains("Como Funciona")');
            if (demoSection) {
                demoSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    }
    
    // Efeitos hover melhorados
    document.querySelectorAll('.hover-scale').forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
    
    // Validação de email
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
    
    // Validação de WhatsApp
    function isValidWhatsApp(whatsapp) {
        // Remove todos os caracteres não numéricos
        const cleanNumber = whatsapp.replace(/\D/g, '');
        // Verifica se tem entre 10 e 15 dígitos (formato internacional)
        return cleanNumber.length >= 10 && cleanNumber.length <= 15;
    }
    
    // Formatar WhatsApp para exibição
    function formatWhatsApp(whatsapp) {
        const cleanNumber = whatsapp.replace(/\D/g, '');
        if (cleanNumber.length === 11 && cleanNumber.startsWith('11')) {
            // Formato brasileiro: (11) 99999-9999
            return `(${cleanNumber.slice(0, 2)}) ${cleanNumber.slice(2, 7)}-${cleanNumber.slice(7)}`;
        } else if (cleanNumber.length >= 10) {
            // Formato internacional: +55 11 99999-9999
            return `+${cleanNumber}`;
        }
        return whatsapp;
    }
    
    // Validação em tempo real
    const emailInput = document.getElementById('email');
    if (emailInput) {
        emailInput.addEventListener('blur', function() {
            if (this.value && !isValidEmail(this.value)) {
                this.classList.add('border-red-500', 'border-2');
                this.classList.remove('focus:ring-yellow-vibrant');
                this.classList.add('focus:ring-red-500');
            } else {
                this.classList.remove('border-red-500', 'border-2');
                this.classList.remove('focus:ring-red-500');
                this.classList.add('focus:ring-yellow-vibrant');
            }
        });
        
        emailInput.addEventListener('input', function() {
            if (this.classList.contains('border-red-500')) {
                this.classList.remove('border-red-500', 'border-2');
                this.classList.remove('focus:ring-red-500');
                this.classList.add('focus:ring-yellow-vibrant');
            }
        });
    }
    
    // Validação em tempo real para WhatsApp
    const whatsappInput = document.getElementById('whatsapp');
    if (whatsappInput) {
        whatsappInput.addEventListener('blur', function() {
            if (this.value && !isValidWhatsApp(this.value)) {
                this.classList.add('border-red-500', 'border-2');
                this.classList.remove('focus:ring-yellow-vibrant');
                this.classList.add('focus:ring-red-500');
            } else {
                this.classList.remove('border-red-500', 'border-2');
                this.classList.remove('focus:ring-red-500');
                this.classList.add('focus:ring-yellow-vibrant');
            }
        });
        
        whatsappInput.addEventListener('input', function() {
            if (this.classList.contains('border-red-500')) {
                this.classList.remove('border-red-500', 'border-2');
                this.classList.remove('focus:ring-red-500');
                this.classList.add('focus:ring-yellow-vibrant');
            }
        });
        
        // Formatação automática do WhatsApp
        whatsappInput.addEventListener('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value.length > 0) {
                if (value.length <= 11) {
                    // Formato brasileiro: (11) 99999-9999
                    if (value.length <= 2) {
                        this.value = value;
                    } else if (value.length <= 7) {
                        this.value = `(${value.slice(0, 2)}) ${value.slice(2)}`;
                    } else {
                        this.value = `(${value.slice(0, 2)}) ${value.slice(2, 7)}-${value.slice(7, 11)}`;
                    }
                } else {
                    // Formato internacional: +55 11 99999-9999
                    this.value = `+${value}`;
                }
            }
        });
    }
    
    // Contador de caracteres para campos de texto
    const nameInput = document.getElementById('name');
    if (nameInput) {
        nameInput.addEventListener('input', function() {
            if (this.value.length > 50) {
                this.value = this.value.substring(0, 50);
            }
        });
    }
    
    // Lazy loading para imagens (se houver)
    const images = document.querySelectorAll('img[data-src]');
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
    
    // Performance: Debounce para eventos de scroll
    let scrollTimeout;
    window.addEventListener('scroll', function() {
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => {
            // Lógica de scroll aqui se necessário
        }, 100);
    });
    
    // Acessibilidade: Navegação por teclado
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            // Fechar modais ou dropdowns se houver
            document.querySelectorAll('.faq-content:not(.hidden)').forEach(content => {
                content.classList.add('hidden');
                const button = content.previousElementSibling;
                const icon = button.querySelector('i');
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            });
        }
    });
    
    // Analytics/Tracking (placeholder)
    function trackEvent(eventName, eventData = {}) {
        console.log('Event tracked:', eventName, eventData);
        // Aqui você pode integrar com Google Analytics, Facebook Pixel, etc.
    }
    
    // Track CTA clicks
    document.querySelectorAll('button[id*="cta"], button:contains("Quero")').forEach(button => {
        button.addEventListener('click', function() {
            trackEvent('cta_click', {
                button_text: this.textContent.trim(),
                button_id: this.id || 'unnamed'
            });
        });
    });
    
    // Track form submissions
    if (leadForm) {
        leadForm.addEventListener('submit', function() {
            trackEvent('form_submit', {
                form_type: 'lead_capture'
            });
        });
    }
    
    // Console welcome message
    console.log('%c🚀 DevStarter Kit Landing Page', 'color: #8B5CF6; font-size: 20px; font-weight: bold;');
    console.log('%cDesenvolvido com ❤️ para desenvolvedores iniciantes', 'color: #3B82F6; font-size: 14px;');
    
});
