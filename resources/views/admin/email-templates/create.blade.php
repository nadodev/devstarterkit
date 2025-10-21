@extends('layouts.admin')

@section('title', 'Criar Template de Email')
@section('page-title', 'Criar Template de Email')
@section('page-description', 'Crie um novo template de email marketing')

@section('content')
<form method="POST" action="{{ route('admin.email-templates.store') }}">
    @csrf
    
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Informações do Template</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome do Template</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-300 @enderror" 
                           placeholder="Ex: Boas-vindas, Promoção, Newsletter">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700">Assunto do Email</label>
                    <input type="text" name="subject" id="subject" value="{{ old('subject') }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('subject') border-red-300 @enderror" 
                           placeholder="Ex: Bem-vindo ao DevStarter Kit!">
                    @error('subject')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Conteúdo do Email</label>
                    <div class="mt-1">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm text-gray-500">Use HTML para formatação. Variáveis: @{{name}}, @{{email}}</span>
                            <div class="flex space-x-2">
                                <button type="button" onclick="insertVariable('name')" class="px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded hover:bg-gray-200">
                                    Inserir @{{name}}
                                </button>
                                <button type="button" onclick="insertVariable('email')" class="px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded hover:bg-gray-200">
                                    Inserir @{{email}}
                                </button>
                                <button type="button" onclick="insertButton()" class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200">
                                    Inserir Botão
                                </button>
                            </div>
                        </div>
                        <textarea name="content" id="content" rows="15" 
                                  class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('content') border-red-300 @enderror" 
                                  placeholder="Digite o conteúdo do email aqui. HTML é permitido.">{{ old('content') }}</textarea>
                    </div>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" 
                           {{ old('is_active', true) ? 'checked' : '' }}
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-900">
                        Template ativo (disponível para uso)
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview -->
    <div class="bg-white rounded-lg shadow mt-6">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Preview do Template</h3>
        </div>
        <div class="p-6">
            <div id="preview-content" class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                <p class="text-gray-500">Digite o conteúdo acima para ver o preview</p>
            </div>
        </div>
    </div>

    <!-- Botões de Ação -->
    <div class="flex justify-end space-x-4 mt-6">
        <a href="{{ route('admin.email-templates.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
            Cancelar
        </a>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
            <i class="fas fa-save mr-2"></i>Salvar Template
        </button>
    </div>
</form>

<script>
// Funções para inserir elementos
function insertVariable(variable) {
    const textarea = document.getElementById('content');
    const cursorPos = textarea.selectionStart;
    const textBefore = textarea.value.substring(0, cursorPos);
    const textAfter = textarea.value.substring(cursorPos);
    
    textarea.value = textBefore + '{{' + variable + '}}' + textAfter;
    textarea.focus();
    textarea.setSelectionRange(cursorPos + ('{{' + variable + '}}').length, cursorPos + ('{{' + variable + '}}').length);
    updatePreview();
}

function insertButton() {
    const textarea = document.getElementById('content');
    const cursorPos = textarea.selectionStart;
    const textBefore = textarea.value.substring(0, cursorPos);
    const textAfter = textarea.value.substring(cursorPos);
    
    const buttonHtml = `
<p style="text-align: center; margin: 30px 0;">
    <a href="#" style="background: linear-gradient(135deg, #3B82F6 0%, #8B5CF6 100%); color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; display: inline-block;">
        🎯 CLIQUE AQUI!
    </a>
</p>`;
    
    textarea.value = textBefore + buttonHtml + textAfter;
    textarea.focus();
    textarea.setSelectionRange(cursorPos + buttonHtml.length, cursorPos + buttonHtml.length);
    updatePreview();
}

// Preview em tempo real
document.getElementById('content').addEventListener('input', updatePreview);
document.getElementById('subject').addEventListener('input', updatePreview);

function updatePreview() {
    const subject = document.getElementById('subject').value;
    const content = document.getElementById('content').value;
    const preview = document.getElementById('preview-content');
    
    if (subject.trim() || content.trim()) {
        let html = '';
        if (subject.trim()) {
            html += '<h3 class="font-bold text-lg mb-4">' + subject + '</h3>';
        }
        if (content.trim()) {
            html += content.replace(/\n/g, '<br>');
        }
        preview.innerHTML = html;
    } else {
        preview.innerHTML = '<p class="text-gray-500">Digite o conteúdo acima para ver o preview</p>';
    }
}
</script>
@endsection
