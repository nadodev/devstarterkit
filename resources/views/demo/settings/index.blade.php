@extends('layouts.demo')

@section('title', 'Configurações - DevStarter Kit Demo')
@section('page-title', 'Configurações')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Configurações do Sistema</h1>
        <p class="text-gray-600 mt-1">Gerencie as configurações gerais da aplicação</p>
    </div>

    <form action="{{ route('demo.settings.update') }}" method="POST">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- General Settings -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                    <i class="fas fa-cog text-blue-600 mr-3"></i>
                    Configurações Gerais
                </h3>
                
                <div class="space-y-6">
                    <div>
                        <label for="app_name" class="block text-sm font-medium text-gray-700 mb-2">
                            Nome da Aplicação
                        </label>
                        <input type="text" 
                               id="app_name" 
                               name="app_name" 
                               value="{{ $settings['app_name'] }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="app_email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email de Contato
                        </label>
                        <input type="email" 
                               id="app_email" 
                               name="app_email" 
                               value="{{ $settings['app_email'] }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="app_phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Telefone
                        </label>
                        <input type="text" 
                               id="app_phone" 
                               name="app_phone" 
                               value="{{ $settings['app_phone'] }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label for="app_address" class="block text-sm font-medium text-gray-700 mb-2">
                            Endereço
                        </label>
                        <textarea id="app_address" 
                                  name="app_address" 
                                  rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ $settings['app_address'] }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Appearance Settings -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                    <i class="fas fa-palette text-purple-600 mr-3"></i>
                    Aparência
                </h3>
                
                <div class="space-y-6">
                    <div>
                        <label for="theme_color" class="block text-sm font-medium text-gray-700 mb-2">
                            Cor do Tema
                        </label>
                        <div class="flex items-center space-x-4">
                            <input type="color" 
                                   id="theme_color" 
                                   name="theme_color" 
                                   value="{{ $settings['theme_color'] }}"
                                   class="w-16 h-12 border border-gray-300 rounded-lg">
                            <input type="text" 
                                   value="{{ $settings['theme_color'] }}"
                                   class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <div>
                        <label for="logo_url" class="block text-sm font-medium text-gray-700 mb-2">
                            URL do Logo
                        </label>
                        <input type="url" 
                               id="logo_url" 
                               name="logo_url" 
                               value="{{ $settings['logo_url'] }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" 
                               id="maintenance_mode" 
                               name="maintenance_mode" 
                               value="1"
                               {{ $settings['maintenance_mode'] ? 'checked' : '' }}
                               class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="maintenance_mode" class="ml-3 text-sm text-gray-700">
                            Modo de Manutenção
                        </label>
                    </div>
                </div>
            </div>

            <!-- Notification Settings -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                    <i class="fas fa-bell text-yellow-600 mr-3"></i>
                    Notificações
                </h3>
                
                <div class="space-y-6">
                    <div class="flex items-center">
                        <input type="checkbox" 
                               id="email_notifications" 
                               name="email_notifications" 
                               value="1"
                               {{ $settings['email_notifications'] ? 'checked' : '' }}
                               class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="email_notifications" class="ml-3 text-sm text-gray-700">
                            Notificações por Email
                        </label>
                    </div>

                    <div>
                        <label for="backup_frequency" class="block text-sm font-medium text-gray-700 mb-2">
                            Frequência de Backup
                        </label>
                        <select id="backup_frequency" 
                                name="backup_frequency"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="daily" {{ $settings['backup_frequency'] === 'daily' ? 'selected' : '' }}>Diário</option>
                            <option value="weekly" {{ $settings['backup_frequency'] === 'weekly' ? 'selected' : '' }}>Semanal</option>
                            <option value="monthly" {{ $settings['backup_frequency'] === 'monthly' ? 'selected' : '' }}>Mensal</option>
                        </select>
                    </div>

                    <div>
                        <label for="max_file_size" class="block text-sm font-medium text-gray-700 mb-2">
                            Tamanho Máximo de Arquivo
                        </label>
                        <select id="max_file_size" 
                                name="max_file_size"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="5MB" {{ $settings['max_file_size'] === '5MB' ? 'selected' : '' }}>5MB</option>
                            <option value="10MB" {{ $settings['max_file_size'] === '10MB' ? 'selected' : '' }}>10MB</option>
                            <option value="25MB" {{ $settings['max_file_size'] === '25MB' ? 'selected' : '' }}>25MB</option>
                            <option value="50MB" {{ $settings['max_file_size'] === '50MB' ? 'selected' : '' }}>50MB</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- System Info -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-6 flex items-center">
                    <i class="fas fa-info-circle text-green-600 mr-3"></i>
                    Informações do Sistema
                </h3>
                
                <div class="space-y-4">
                    <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-sm font-medium text-gray-600">Versão do Sistema</span>
                        <span class="text-sm text-gray-900">v1.0.0</span>
                    </div>
                    
                    <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-sm font-medium text-gray-600">Última Atualização</span>
                        <span class="text-sm text-gray-900">15/01/2024</span>
                    </div>
                    
                    <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-sm font-medium text-gray-600">Espaço em Disco</span>
                        <span class="text-sm text-gray-900">2.5GB / 10GB</span>
                    </div>
                    
                    <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-sm font-medium text-gray-600">Status do Servidor</span>
                        <span class="text-sm text-green-600 font-medium">Online</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end space-x-4 mt-8">
            <button type="button" 
                    class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                <i class="fas fa-undo mr-2"></i>Restaurar Padrões
            </button>
            <button type="submit" 
                    class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-save mr-2"></i>Salvar Configurações
            </button>
        </div>
    </form>
</div>
@endsection
