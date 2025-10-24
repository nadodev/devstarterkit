@extends('layouts.landing')

@section('title', 'Suporte - Laravel ProStarter')

@section('content')
<section class="py-24 bg-linear-to-br from-blue-50 to-purple-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">Central de Suporte</h1>
            <p class="text-xl text-gray-600 mb-4">Sua jornada de sucesso começa aqui</p>
            <p class="text-lg text-gray-500">Respostas rápidas, soluções eficazes e suporte especializado para acelerar seus projetos</p>
        </div>

        <!-- Recursos Rápidos -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
           <a href="{{ route('help-center') }}" class="group block">
            <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 group-hover:scale-105 border border-blue-100 relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-linear-to-br from-blue-100 to-blue-200 rounded-full -translate-y-16 translate-x-16 opacity-20"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-linear-to-br from-blue-200 to-blue-300 rounded-full translate-y-12 -translate-x-12 opacity-20"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-linear-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="fas fa-lightbulb text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-blue-700 transition-colors">Soluções Rápidas</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">Respostas instantâneas para os problemas mais comuns</p>
                    <div class="flex items-center text-blue-600 font-semibold group-hover:text-blue-700 transition-colors">
                        <span>Acessar agora</span>
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>
            </div>
           </a>

           <a href="{{ route('documentation') }}" class="group block">
            <div class="bg-white rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-500 group-hover:scale-105 border border-green-100 relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-linear-to-br from-green-100 to-green-200 rounded-full -translate-y-16 translate-x-16 opacity-20"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-linear-to-br from-green-200 to-green-300 rounded-full translate-y-12 -translate-x-12 opacity-20"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-linear-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-green-700 transition-colors">Academia de Conhecimento</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">Tutoriais avançados e guias especializados</p>
                    <div class="flex items-center text-green-600 font-semibold group-hover:text-green-700 transition-colors">
                        <span>Explorar</span>
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>
            </div>
           </a>

           <div class="bg-white rounded-2xl p-8 shadow-xl border border-purple-100 relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-linear-to-br from-purple-100 to-purple-200 rounded-full -translate-y-16 translate-x-16 opacity-20"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-linear-to-br from-purple-200 to-purple-300 rounded-full translate-y-12 -translate-x-12 opacity-20"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-linear-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-headset text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Suporte Premium</h3>
                    <p class="text-gray-600 mb-6 leading-relaxed">Atendimento especializado em até 24h</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center text-purple-600 font-semibold">
                            <i class="fas fa-clock mr-2"></i>
                            <span>Disponível 24/7</span>
                        </div>
                        <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Mensagens de Feedback -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid lg:grid-cols-2 gap-12">
            <!-- FAQ -->
            <div class="bg-white rounded-2xl p-8 shadow-xl">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Perguntas Frequentes</h2>
                
                <div class="space-y-4">
                    <details class="border border-gray-200 rounded-lg p-4">
                        <summary class="font-semibold text-gray-800 cursor-pointer">Como instalar o Laravel ProStarter?</summary>
                        <p class="mt-3 text-gray-600">Siga o guia de instalação que vem com o download. É um processo simples que leva menos de 10 minutos.</p>
                    </details>

                    <details class="border border-gray-200 rounded-lg p-4">
                        <summary class="font-semibold text-gray-800 cursor-pointer">Preciso saber Laravel para usar?</summary>
                        <p class="mt-3 text-gray-600">Não! O ProStarter vem com documentação completa e exemplos práticos para iniciantes.</p>
                    </details>

                    <details class="border border-gray-200 rounded-lg p-4">
                        <summary class="font-semibold text-gray-800 cursor-pointer">Funciona em qualquer hospedagem?</summary>
                        <p class="mt-3 text-gray-600">Sim! Compatível com PHP 8+ e MySQL. Funciona em hospedagens compartilhadas e VPS.</p>
                    </details>

                    <details class="border border-gray-200 rounded-lg p-4">
                        <summary class="font-semibold text-gray-800 cursor-pointer">Posso personalizar o sistema?</summary>
                        <p class="mt-3 text-gray-600">Totalmente! O código é seu para modificar como quiser. Incluímos guias de personalização.</p>
                    </details>

                    <details class="border border-gray-200 rounded-lg p-4">
                        <summary class="font-semibold text-gray-800 cursor-pointer">E se eu tiver problemas?</summary>
                        <p class="mt-3 text-gray-600">Oferecemos suporte por 30 dias após a compra. Respondemos em até 24h.</p>
                    </details>
                </div>
            </div>

            <!-- Contato de Suporte -->
            <div class="space-y-8">
                <!-- Ticket de Suporte -->
                <div class="bg-white rounded-2xl p-8 shadow-xl">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Ticket de Suporte</h2>
                    <p class="text-gray-600 mb-6">Abra um ticket para questões mais complexas</p>
                    
                    <form action="{{ route('suporte.ticket') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Nome</label>
                            <input type="text" name="nome" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Seu nome completo">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Email</label>
                            <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="seu@email.com">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Assunto</label>
                            <input type="text" name="assunto" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Descreva brevemente o problema">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Prioridade</label>
                            <select name="prioridade" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="Baixa">Baixa</option>
                                <option value="Média">Média</option>
                                <option value="Alta">Alta</option>
                                <option value="Urgente">Urgente</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-2">Descrição</label>
                            <textarea name="descricao" rows="4" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Descreva detalhadamente o problema..."></textarea>
                        </div>

                        <button type="submit" id="submit-ticket" class="w-full bg-blue-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-600 transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                            <span id="button-text">
                                <i class="fas fa-ticket-alt mr-2"></i>
                                Abrir Ticket
                            </span>
                            <span id="loading-spinner" class="hidden">
                                <i class="fas fa-spinner fa-spin mr-2"></i>
                                Enviando...
                            </span>
                        </button>
                    </form>
                </div>

                <!-- Informações de Contato -->
                <div class="bg-white rounded-2xl p-8 shadow-xl">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Outros Contatos</h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Email</p>
                                <p class="text-gray-600">suporte@laravelprostarter.com</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center mr-4">
                                <i class="fab fa-whatsapp text-white"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">WhatsApp</p>
                                <p class="text-gray-600">+55 (49) 99919-5407</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center mr-4">
                                <i class="fas fa-clock text-white"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Horário</p>
                                <p class="text-gray-600">Segunda a Sexta: 9h às 18h</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action="{{ route('suporte.ticket') }}"]');
    const submitButton = document.getElementById('submit-ticket');
    const buttonText = document.getElementById('button-text');
    const loadingSpinner = document.getElementById('loading-spinner');

    if (form && submitButton) {
        form.addEventListener('submit', function(e) {
            // Verificar se todos os campos obrigatórios estão preenchidos
            const requiredFields = form.querySelectorAll('input[required], textarea[required], select[required]');
            let allFieldsFilled = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    allFieldsFilled = false;
                    field.classList.add('border-red-500');
                } else {
                    field.classList.remove('border-red-500');
                }
            });

            if (!allFieldsFilled) {
                e.preventDefault();
                alert('Por favor, preencha todos os campos obrigatórios.');
                return;
            }

            // Mostrar loading
            submitButton.disabled = true;
            buttonText.classList.add('hidden');
            loadingSpinner.classList.remove('hidden');
            
            // Adicionar uma pequena animação de pulse no botão
            submitButton.classList.add('animate-pulse');
            
            // Mostrar mensagem de confirmação
            const confirmationDiv = document.createElement('div');
            confirmationDiv.className = 'fixed top-4 right-4 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
            confirmationDiv.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Enviando ticket...';
            document.body.appendChild(confirmationDiv);

            // Remover a mensagem após 3 segundos (caso não redirecione)
            setTimeout(() => {
                if (confirmationDiv.parentNode) {
                    confirmationDiv.parentNode.removeChild(confirmationDiv);
                }
            }, 3000);
        });
    }
});
</script>
@endsection
