@extends('layouts.landing')

@section('title', 'Contato - DevStarter Kit')

@section('meta')
<meta name="description" content="Entre em contato com a equipe do DevStarter Kit - Suporte técnico, dúvidas e parcerias.">
<meta name="robots" content="index, follow">
@endsection

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-4 font-display">
                    📞 Entre em Contato
                </h1>
                <p class="text-lg sm:text-xl text-gray-300 max-w-3xl mx-auto">
                    Estamos aqui para ajudar você a acelerar seus projetos com o DevStarter Kit
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Envie sua Mensagem</h2>
                    
                    <form id="contactForm" action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nome Completo *
                                </label>
                                <input type="text" id="name" name="name" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                    E-mail *
                                </label>
                                <input type="email" id="email" name="email" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                                    Telefone/WhatsApp
                                </label>
                                <input type="tel" id="phone" name="phone"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors">
                            </div>
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                    Assunto *
                                </label>
                                <select id="subject" name="subject" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors">
                                    <option value="">Selecione um assunto</option>
                                    <option value="suporte">Suporte Técnico</option>
                                    <option value="vendas">Dúvidas sobre Vendas</option>
                                    <option value="personalizacao">Personalização</option>
                                    <option value="parceria">Parceria</option>
                                    <option value="outro">Outro</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                Mensagem *
                            </label>
                            <textarea id="message" name="message" rows="6" required
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-colors"
                                      placeholder="Descreva sua dúvida ou solicitação..."></textarea>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" id="privacy" name="privacy" required
                                   class="w-4 h-4 text-orange-500 border-gray-300 rounded focus:ring-orange-500">
                            <label for="privacy" class="ml-2 text-sm text-gray-600">
                                Concordo com a <a href="{{ route('privacy-policy') }}" class="text-orange-500 hover:text-orange-600">Política de Privacidade</a> *
                            </label>
                        </div>

                        <button type="submit" id="submitBtn"
                                class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white py-4 rounded-lg font-semibold hover:from-orange-600 hover:to-orange-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <span id="submitText">Enviar Mensagem</span>
                            <span id="submitLoading" class="hidden">
                                <i class="fas fa-spinner fa-spin mr-2"></i>Enviando...
                            </span>
                        </button>
                    </form>

                    <div id="successMessage" class="hidden mt-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
                            <div>
                                <h3 class="text-green-800 font-semibold">Mensagem Enviada!</h3>
                                <p class="text-green-600 text-sm">Entraremos em contato em até 24 horas.</p>
                            </div>
                        </div>
                    </div>

                    <div id="errorMessage" class="hidden mt-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle text-red-500 text-xl mr-3"></i>
                            <div>
                                <h3 class="text-red-800 font-semibold">Erro ao Enviar</h3>
                                <p class="text-red-600 text-sm">Tente novamente ou entre em contato por e-mail.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="space-y-6">
                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Informações de Contato</h3>
                        
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-envelope text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">E-mail</h4>
                                    <p class="text-gray-600 text-sm">contato@leonardogeja.com.br</p>
                                    <p class="text-gray-600 text-sm">suporte@leonardogeja.com.br</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fab fa-whatsapp text-white"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800">WhatsApp</h4>
                                    <p class="text-gray-600 text-sm">(49) 99919-5407</p>
                                    <p class="text-gray-500 text-xs">Seg-Sex: 9h às 18h</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-6 border border-orange-200">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">⏱️ Tempos de Resposta</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-700">Suporte Técnico</span>
                                <span class="text-sm font-semibold text-orange-600">Até 4h</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-700">Dúvidas Gerais</span>
                                <span class="text-sm font-semibold text-orange-600">Até 24h</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-700">WhatsApp</span>
                                <span class="text-sm font-semibold text-green-600">Imediato</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">🔗 Links Úteis</h3>
                        <div class="space-y-2">
                            <a href="{{ route('help-center') }}" class="block text-sm text-orange-500 hover:text-orange-600 transition-colors">
                                <i class="fas fa-question-circle mr-2"></i>Central de Ajuda
                            </a>
                            <a href="{{ route('documentation') }}" class="block text-sm text-orange-500 hover:text-orange-600 transition-colors">
                                <i class="fas fa-book mr-2"></i>Documentação
                            </a>
                            <a href="{{ route('privacy-policy') }}" class="block text-sm text-orange-500 hover:text-orange-600 transition-colors">
                                <i class="fas fa-shield-alt mr-2"></i>Política de Privacidade
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-8">
        <div class="max-w-4xl mx-auto text-center px-4">
            <a href="{{ route('conversion') }}" class="bg-gray-800 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-900 transition-colors">
                ← Voltar ao Início
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const submitLoading = document.getElementById('submitLoading');
    const successMessage = document.getElementById('successMessage');
    const errorMessage = document.getElementById('errorMessage');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        submitBtn.disabled = true;
        submitText.classList.add('hidden');
        submitLoading.classList.remove('hidden');
        
        successMessage.classList.add('hidden');
        errorMessage.classList.add('hidden');

        const formData = new FormData(form);
        
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            submitBtn.disabled = false;
            submitText.classList.remove('hidden');
            submitLoading.classList.add('hidden');
            
            if (data.success) {
                successMessage.classList.remove('hidden');
                form.reset();
                
                successMessage.scrollIntoView({ behavior: 'smooth' });
            } else {
                errorMessage.classList.remove('hidden');
                
                if (data.errors) {
                    Object.keys(data.errors).forEach(field => {
                        const input = form.querySelector(`[name="${field}"]`);
                        if (input) {
                            input.classList.add('border-red-500');
                            input.classList.remove('border-gray-300');
                        }
                    });
                }
                
                errorMessage.scrollIntoView({ behavior: 'smooth' });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            
            submitBtn.disabled = false;
            submitText.classList.remove('hidden');
            submitLoading.classList.add('hidden');
            
            errorMessage.classList.remove('hidden');
            errorMessage.scrollIntoView({ behavior: 'smooth' });
        });
    });

    const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value.trim() === '') {
                this.classList.add('border-red-500');
                this.classList.remove('border-gray-300');
            } else {
                this.classList.remove('border-red-500');
                this.classList.add('border-gray-300');
            }
        });
    });
});
</script>
@endsection
