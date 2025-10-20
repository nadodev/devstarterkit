@extends('layouts.admin')

@section('title', 'Editar Template de Email')
@section('page-title', 'Editar Template de Email')
@section('page-description', 'Edite o template de email marketing')

@section('content')
<form method="POST" action="{{ route('admin.email-templates.update', $emailTemplate) }}">
    @csrf
    @method('PUT')
    
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Informações do Template</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome do Template</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $emailTemplate->name) }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-300 @enderror" 
                           placeholder="Ex: Boas-vindas, Promoção, Newsletter">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700">Assunto do Email</label>
                    <input type="text" name="subject" id="subject" value="{{ old('subject', $emailTemplate->subject) }}" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('subject') border-red-300 @enderror" 
                           placeholder="Ex: Bem-vindo ao DevStarter Kit!">
                    @error('subject')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Conteúdo do Email</label>
                    <textarea name="content" id="content" rows="15" 
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('content') border-red-300 @enderror" 
                              placeholder="Digite o conteúdo do email aqui. HTML é permitido.">{{ old('content', $emailTemplate->content) }}</textarea>
                    <p class="mt-1 text-sm text-gray-500">
                        Você pode usar HTML para formatação. Variáveis disponíveis: {{name}}, {{email}}
                    </p>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" 
                           {{ old('is_active', $emailTemplate->is_active) ? 'checked' : '' }}
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
                <h3 class="font-bold text-lg mb-4">{{ $emailTemplate->subject }}</h3>
                <div>{{ $emailTemplate->content }}</div>
            </div>
        </div>
    </div>

    <!-- Botões de Ação -->
    <div class="flex justify-between mt-6">
        <div>
            <button type="button" onclick="deleteTemplate()" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                <i class="fas fa-trash mr-2"></i>Excluir Template
            </button>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('admin.email-templates.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                Cancelar
            </a>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                <i class="fas fa-save mr-2"></i>Salvar Alterações
            </button>
        </div>
    </div>
</form>

<!-- Formulário de Exclusão -->
<form id="delete-form" method="POST" action="{{ route('admin.email-templates.destroy', $emailTemplate) }}" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script>
// Preview em tempo real
document.getElementById('content').addEventListener('input', function() {
    updatePreview();
});

document.getElementById('subject').addEventListener('input', function() {
    updatePreview();
});

function updatePreview() {
    const subject = document.getElementById('subject').value;
    const content = document.getElementById('content').value;
    const preview = document.getElementById('preview-content');
    
    if (subject.trim() || content.trim()) {
        let html = '';
        if (subject.trim()) {
            html += `<h3 class="font-bold text-lg mb-4">${subject}</h3>`;
        }
        if (content.trim()) {
            html += content.replace(/\n/g, '<br>');
        }
        preview.innerHTML = html;
    } else {
        preview.innerHTML = '<p class="text-gray-500">Digite o conteúdo acima para ver o preview</p>';
    }
}

function deleteTemplate() {
    if (confirm('Tem certeza que deseja excluir este template? Esta ação não pode ser desfeita.')) {
        document.getElementById('delete-form').submit();
    }
}
</script>
@endsection
