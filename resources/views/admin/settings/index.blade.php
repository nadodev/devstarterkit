@extends('layouts.admin')

@section('title', 'Configurações')
@section('page-title', 'Configurações do Sistema')
@section('page-description', 'Gerencie as configurações da plataforma')

@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}">
    @csrf
    
    <!-- Configurações do Site -->
    <div class="bg-white rounded-lg shadow mb-8">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Configurações do Site</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="site_name" class="block text-sm font-medium text-gray-700">Nome do Site</label>
                    <input type="text" name="site_name" id="site_name" value="{{ $settings['site_name'] }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div>
                    <label for="site_description" class="block text-sm font-medium text-gray-700">Descrição do Site</label>
                    <input type="text" name="site_description" id="site_description" value="{{ $settings['site_description'] }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>
    </div>

    <!-- Configurações de Email -->
    <div class="bg-white rounded-lg shadow mb-8">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Configurações de Email</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="admin_email" class="block text-sm font-medium text-gray-700">Email do Admin</label>
                    <input type="email" name="admin_email" id="admin_email" value="{{ $settings['admin_email'] }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div>
                    <label for="mail_from_name" class="block text-sm font-medium text-gray-700">Nome do Remetente</label>
                    <input type="text" name="mail_from_name" id="mail_from_name" value="{{ $settings['mail_from_name'] }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div>
                    <label for="mail_from_address" class="block text-sm font-medium text-gray-700">Email do Remetente</label>
                    <input type="email" name="mail_from_address" id="mail_from_address" value="{{ $settings['mail_from_address'] }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div>
                    <label for="mail_host" class="block text-sm font-medium text-gray-700">Servidor SMTP</label>
                    <input type="text" name="mail_host" id="mail_host" value="{{ $settings['mail_host'] }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div>
                    <label for="mail_port" class="block text-sm font-medium text-gray-700">Porta SMTP</label>
                    <input type="number" name="mail_port" id="mail_port" value="{{ $settings['mail_port'] }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div>
                    <label for="mail_username" class="block text-sm font-medium text-gray-700">Usuário SMTP</label>
                    <input type="text" name="mail_username" id="mail_username" value="{{ $settings['mail_username'] }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div>
                    <label for="mail_password" class="block text-sm font-medium text-gray-700">Senha SMTP</label>
                    <input type="password" name="mail_password" id="mail_password" placeholder="Deixe em branco para manter atual" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div>
                    <label for="mail_encryption" class="block text-sm font-medium text-gray-700">Criptografia</label>
                    <select name="mail_encryption" id="mail_encryption" 
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="tls" {{ $settings['mail_encryption'] === 'tls' ? 'selected' : '' }}>TLS</option>
                        <option value="ssl" {{ $settings['mail_encryption'] === 'ssl' ? 'selected' : '' }}>SSL</option>
                        <option value="none" {{ $settings['mail_encryption'] === 'none' ? 'selected' : '' }}>Nenhuma</option>
                    </select>
                </div>
            </div>
            
            <!-- Teste de Email -->
            <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                <h4 class="text-sm font-medium text-gray-900 mb-2">Teste de Email</h4>
                <div class="flex space-x-4">
                    <input type="email" id="test_email" placeholder="Email para teste" 
                           class="flex-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <button type="button" onclick="testEmail()" 
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        <i class="fas fa-paper-plane mr-2"></i>Enviar Teste
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Ações do Sistema -->
    <div class="bg-white rounded-lg shadow mb-8">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Ações do Sistema</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <a href="{{ route('admin.settings.backup') }}" 
                   class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-database text-green-600 text-xl mr-3"></i>
                    <div>
                        <h4 class="font-medium text-gray-900">Backup do Banco</h4>
                        <p class="text-sm text-gray-500">Download SQL</p>
                    </div>
                </a>
                
                <button type="button" onclick="clearCache()" 
                        class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-broom text-yellow-600 text-xl mr-3"></i>
                    <div>
                        <h4 class="font-medium text-gray-900">Limpar Cache</h4>
                        <p class="text-sm text-gray-500">Limpar todos os caches</p>
                    </div>
                </button>
                
                <a href="{{ route('admin.settings.system') }}" 
                   class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-info-circle text-blue-600 text-xl mr-3"></i>
                    <div>
                        <h4 class="font-medium text-gray-900">Informações do Sistema</h4>
                        <p class="text-sm text-gray-500">Detalhes técnicos</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Botões de Ação -->
    <div class="flex justify-end space-x-4">
        <a href="{{ route('dashboard') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
            Cancelar
        </a>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
            <i class="fas fa-save mr-2"></i>Salvar Configurações
        </button>
    </div>
</form>

<script>
function testEmail() {
    const email = document.getElementById('test_email').value;
    
    if (!email) {
        alert('Por favor, insira um email para teste');
        return;
    }
    
    if (!confirm('Enviar email de teste para ' + email + '?')) {
        return;
    }
    
    fetch('{{ route("admin.settings.test-email") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            test_email: email
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Email de teste enviado com sucesso!');
        } else {
            alert('Erro: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao enviar email de teste');
    });
}

function clearCache() {
    if (!confirm('Tem certeza que deseja limpar todo o cache do sistema?')) {
        return;
    }
    
    fetch('{{ route("admin.settings.clear-cache") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => {
        if (response.ok) {
            alert('Cache limpo com sucesso!');
            location.reload();
        } else {
            alert('Erro ao limpar cache');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        alert('Erro ao limpar cache');
    });
}
</script>
@endsection
