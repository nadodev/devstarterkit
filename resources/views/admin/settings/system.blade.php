@extends('layouts.admin')

@section('title', 'Informações do Sistema')
@section('page-title', 'Informações do Sistema')
@section('page-description', 'Detalhes técnicos da plataforma')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Informações do PHP -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Informações do PHP</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500">Versão do PHP</span>
                    <span class="text-sm text-gray-900">{{ $info['php_version'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500">Limite de Memória</span>
                    <span class="text-sm text-gray-900">{{ $info['memory_limit'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500">Tempo Máximo de Execução</span>
                    <span class="text-sm text-gray-900">{{ $info['max_execution_time'] }}s</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500">Upload Máximo</span>
                    <span class="text-sm text-gray-900">{{ $info['upload_max_filesize'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500">POST Máximo</span>
                    <span class="text-sm text-gray-900">{{ $info['post_max_size'] }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Informações do Laravel -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Informações do Laravel</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500">Versão do Laravel</span>
                    <span class="text-sm text-gray-900">{{ $info['laravel_version'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500">Driver do Banco</span>
                    <span class="text-sm text-gray-900">{{ $info['database_driver'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500">Driver do Cache</span>
                    <span class="text-sm text-gray-900">{{ $info['cache_driver'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500">Driver da Queue</span>
                    <span class="text-sm text-gray-900">{{ $info['queue_driver'] }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Informações do Servidor -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Informações do Servidor</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500">Software do Servidor</span>
                    <span class="text-sm text-gray-900">{{ $info['server_software'] }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm font-medium text-gray-500">Espaço Livre</span>
                    <span class="text-sm text-gray-900">{{ $info['disk_free_space'] }}</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Status dos Serviços -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Status dos Serviços</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-500">Banco de Dados</span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        <i class="fas fa-check mr-1"></i>Conectado
                    </span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-500">Sistema de Email</span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        <i class="fas fa-check mr-1"></i>Configurado
                    </span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-500">Sistema de Cache</span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        <i class="fas fa-check mr-1"></i>Ativo
                    </span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-500">Sistema de Sessões</span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        <i class="fas fa-check mr-1"></i>Funcionando
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ações do Sistema -->
<div class="mt-8">
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Ações do Sistema</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <button onclick="clearCache()" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-broom text-yellow-600 text-xl mr-3"></i>
                    <div>
                        <h4 class="font-medium text-gray-900">Limpar Cache</h4>
                        <p class="text-sm text-gray-500">Limpar todos os caches</p>
                    </div>
                </button>
                
                <button onclick="optimizeDatabase()" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-database text-blue-600 text-xl mr-3"></i>
                    <div>
                        <h4 class="font-medium text-gray-900">Otimizar Banco</h4>
                        <p class="text-sm text-gray-500">Otimizar tabelas</p>
                    </div>
                </button>
                
                <a href="{{ route('admin.settings.backup') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-download text-green-600 text-xl mr-3"></i>
                    <div>
                        <h4 class="font-medium text-gray-900">Backup</h4>
                        <p class="text-sm text-gray-500">Download do banco</p>
                    </div>
                </a>
                
                <button onclick="checkUpdates()" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-sync text-purple-600 text-xl mr-3"></i>
                    <div>
                        <h4 class="font-medium text-gray-900">Verificar Atualizações</h4>
                        <p class="text-sm text-gray-500">Composer update</p>
                    </div>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
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

function optimizeDatabase() {
    if (!confirm('Tem certeza que deseja otimizar o banco de dados?')) {
        return;
    }
    
    alert('Funcionalidade em desenvolvimento');
}

function checkUpdates() {
    alert('Funcionalidade em desenvolvimento');
}
</script>
@endsection
