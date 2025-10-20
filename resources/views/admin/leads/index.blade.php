@extends('layouts.admin')

@section('title', 'Gerenciar Leads')
@section('page-title', 'Gerenciar Leads')
@section('page-description', 'Gerencie os leads capturados e envie emails em massa')

@section('content')

        <!-- Estatísticas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-users text-white"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Total de Leads</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $stats['total'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Pendentes</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $stats['pending'] }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-check text-white"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Emails Enviados</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $stats['sent'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ações em Massa -->
        <div class="bg-white rounded-lg shadow mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-900">Ações em Massa</h3>
                    <a href="{{ route('admin.email-templates.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                        <i class="fas fa-edit mr-2"></i>Gerenciar Templates
                    </a>
                </div>
            </div>
            <div class="p-6">
                <div class="flex flex-wrap gap-4">
                    <button id="select-all" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                        <i class="fas fa-check-square mr-2"></i>Selecionar Todos
                    </button>
                    <button id="deselect-all" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors">
                        <i class="fas fa-square mr-2"></i>Desmarcar Todos
                    </button>
                    <button id="send-bulk-email" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors" disabled>
                        <i class="fas fa-envelope mr-2"></i>Email Padrão
                    </button>
                    <button id="send-custom-email" class="px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600 transition-colors" disabled>
                        <i class="fas fa-edit mr-2"></i>Email Customizado
                    </button>
                    <button id="send-template-email" class="px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors" disabled>
                        <i class="fas fa-file-alt mr-2"></i>Email com Template
                    </button>
                </div>
            </div>
        </div>

        <!-- Lista de Leads -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Lista de Leads</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="checkbox" id="select-all-checkbox" class="rounded">
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">WhatsApp</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($leads as $lead)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" class="lead-checkbox rounded" value="{{ $lead->id }}">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $lead->name ?? 'Não informado' }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $lead->email }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $lead->whatsapp ?? 'Não informado' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($lead->email_sent)
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        <i class="fas fa-check mr-1"></i>Enviado
                                    </span>
                                @else
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-clock mr-1"></i>Pendente
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $lead->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    <button onclick="sendEmail({{ $lead->id }})" class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-envelope"></i>
                                    </button>
                                    <button onclick="viewLead({{ $lead->id }})" class="text-green-600 hover:text-green-900">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="deleteLead({{ $lead->id }})" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                Nenhum lead encontrado
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Paginação -->
        @if($leads->hasPages())
        <div class="mt-6">
            {{ $leads->links() }}
        </div>
        @endif

<script>
// Seleção de leads
document.getElementById('select-all-checkbox').addEventListener('change', function() {
    const checkboxes = document.querySelectorAll('.lead-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.checked = this.checked;
    });
    updateBulkActions();
});

document.querySelectorAll('.lead-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', updateBulkActions);
});

function updateBulkActions() {
    const selected = document.querySelectorAll('.lead-checkbox:checked');
    const bulkButton = document.getElementById('send-bulk-email');
    const customButton = document.getElementById('send-custom-email');
    const templateButton = document.getElementById('send-template-email');
    
    const hasSelection = selected.length > 0;
    
    bulkButton.disabled = !hasSelection;
    customButton.disabled = !hasSelection;
    templateButton.disabled = !hasSelection;
    
    bulkButton.textContent = `Email Padrão (${selected.length})`;
    customButton.textContent = `Email Customizado (${selected.length})`;
    templateButton.textContent = `Email com Template (${selected.length})`;
}

// Ações em massa
document.getElementById('select-all').addEventListener('click', function() {
    document.querySelectorAll('.lead-checkbox').forEach(checkbox => {
        checkbox.checked = true;
    });
    document.getElementById('select-all-checkbox').checked = true;
    updateBulkActions();
});

document.getElementById('deselect-all').addEventListener('click', function() {
    document.querySelectorAll('.lead-checkbox').forEach(checkbox => {
        checkbox.checked = false;
    });
    document.getElementById('select-all-checkbox').checked = false;
    updateBulkActions();
});

document.getElementById('send-bulk-email').addEventListener('click', function() {
    const selected = Array.from(document.querySelectorAll('.lead-checkbox:checked')).map(cb => cb.value);
    
    if (selected.length === 0) {
        alert('Selecione pelo menos um lead');
        return;
    }

    if (confirm(`Enviar email para ${selected.length} lead(s) selecionado(s)?`)) {
        fetch('{{ route("admin.leads.send-bulk-email") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                lead_ids: selected
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                location.reload();
            } else {
                alert('Erro: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao enviar emails');
        });
    }
});

// Ações individuais
function sendEmail(leadId) {
    if (confirm('Enviar email para este lead?')) {
        fetch(`/admin/leads/${leadId}/send-email`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                location.reload();
            } else {
                alert('Erro: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao enviar email');
        });
    }
}

function viewLead(leadId) {
    window.open(`/admin/leads/${leadId}`, '_blank');
}

function deleteLead(leadId) {
    if (confirm('Tem certeza que deseja excluir este lead?')) {
        fetch(`/admin/leads/${leadId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                location.reload();
            } else {
                alert('Erro: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao excluir lead');
        });
    }
    }

    // Função para obter IDs dos leads selecionados
    function getSelectedLeadIds() {
        return Array.from(document.querySelectorAll('.lead-checkbox:checked')).map(cb => cb.value);
    }

    // Email Customizado
    document.getElementById('send-custom-email').addEventListener('click', function() {
        const selectedIds = getSelectedLeadIds();
        if (selectedIds.length === 0) {
            alert('Selecione pelo menos um lead');
            return;
        }

        showCustomEmailModal(selectedIds);
    });

    function showCustomEmailModal(leadIds) {
        const modal = document.createElement('div');
        modal.className = 'fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50';
        modal.innerHTML = `
            <div class="bg-white rounded-lg w-full max-w-4xl max-h-[90vh] overflow-y-auto">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-medium text-gray-900">Email Customizado</h3>
                        <button onclick="this.closest('.fixed').remove()" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Enviando para ${leadIds.length} lead(s) selecionado(s)</p>
                </div>
                
                <div class="p-6">
                    <form id="custom-email-form">
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Assunto do Email</label>
                            <input type="text" id="email-subject" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                   placeholder="Digite o assunto do email" required>
                        </div>
                        
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Conteúdo do Email</label>
                            <div class="border border-gray-300 rounded-md">
                                <!-- Toolbar -->
                                <div class="bg-gray-50 px-3 py-2 border-b border-gray-300 flex flex-wrap gap-2">
                                    <button type="button" onclick="formatText('bold')" class="px-2 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50" title="Negrito">
                                        <i class="fas fa-bold"></i>
                                    </button>
                                    <button type="button" onclick="formatText('italic')" class="px-2 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50" title="Itálico">
                                        <i class="fas fa-italic"></i>
                                    </button>
                                    <button type="button" onclick="formatText('underline')" class="px-2 py-1 text-sm bg-white border border-gray-300 rounded hover:bg-gray-50" title="Sublinhado">
                                        <i class="fas fa-underline"></i>
                                    </button>
                                    <div class="w-px h-6 bg-gray-300 mx-1"></div>
                                    <button type="button" onclick="insertVariable('name')" class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200">
                                        @{{name}}
                                    </button>
                                    <button type="button" onclick="insertVariable('email')" class="px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200">
                                        @{{email}}
                                    </button>
                                    <div class="w-px h-6 bg-gray-300 mx-1"></div>
                                    <button type="button" onclick="insertButton()" class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded hover:bg-green-200">
                                        <i class="fas fa-link mr-1"></i>Botão
                                    </button>
                                    <button type="button" onclick="insertList()" class="px-2 py-1 text-xs bg-purple-100 text-purple-700 rounded hover:bg-purple-200">
                                        <i class="fas fa-list mr-1"></i>Lista
                                    </button>
                                </div>
                                
                                <!-- Editor -->
                                <div id="email-editor" contenteditable="true" class="min-h-[300px] p-4 focus:outline-none" 
                                     style="font-family: Arial, sans-serif; line-height: 1.6;">
                                    <p>Digite seu email aqui...</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Preview -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preview</label>
                            <div id="email-preview" class="border border-gray-200 rounded-md p-4 bg-gray-50 min-h-[200px]">
                                <p class="text-gray-500">Digite o conteúdo acima para ver o preview</p>
                            </div>
                        </div>
                        
                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="this.closest('.fixed').remove()" 
                                    class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                                Cancelar
                            </button>
                            <button type="submit" class="px-4 py-2 bg-purple-500 text-white rounded-md hover:bg-purple-600">
                                <i class="fas fa-paper-plane mr-2"></i>Enviar Email
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        `;

        document.body.appendChild(modal);

        // Event listeners
        document.getElementById('email-subject').addEventListener('input', updatePreview);
        document.getElementById('email-editor').addEventListener('input', updatePreview);
        document.getElementById('custom-email-form').addEventListener('submit', function(e) {
            e.preventDefault();
            sendCustomEmail(leadIds);
        });

        // Focus no assunto
        document.getElementById('email-subject').focus();
    }

    function formatText(command) {
        document.execCommand(command, false, null);
        document.getElementById('email-editor').focus();
        updatePreview();
    }

    function insertVariable(variable) {
        const editor = document.getElementById('email-editor');
        const selection = window.getSelection();
        const range = selection.getRangeAt(0);
        range.deleteContents();
        range.insertNode(document.createTextNode('{{' + variable + '}}'));
        editor.focus();
        updatePreview();
    }

    function insertButton() {
        const editor = document.getElementById('email-editor');
        const selection = window.getSelection();
        const range = selection.getRangeAt(0);
        range.deleteContents();
        
        const buttonHtml = `
            <p style="text-align: center; margin: 30px 0;">
                <a href="#" style="background: linear-gradient(135deg, #3B82F6 0%, #8B5CF6 100%); color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; display: inline-block;">
                    🎯 CLIQUE AQUI!
                </a>
            </p>
        `;
        
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = buttonHtml;
        range.insertNode(tempDiv.firstElementChild);
        editor.focus();
        updatePreview();
    }

    function insertList() {
        const editor = document.getElementById('email-editor');
        const selection = window.getSelection();
        const range = selection.getRangeAt(0);
        range.deleteContents();
        
        const listHtml = `
            <ul style="margin: 20px 0; padding-left: 20px;">
                <li>Item 1</li>
                <li>Item 2</li>
                <li>Item 3</li>
            </ul>
        `;
        
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = listHtml;
        range.insertNode(tempDiv.firstElementChild);
        editor.focus();
        updatePreview();
    }

    function updatePreview() {
        const subject = document.getElementById('email-subject').value;
        const content = document.getElementById('email-editor').innerHTML;
        const preview = document.getElementById('email-preview');
        
        if (subject.trim() || content.trim()) {
            let html = '';
            if (subject.trim()) {
                html += `<h3 style="font-weight: bold; font-size: 18px; margin-bottom: 16px; color: #1f2937;">${subject}</h3>`;
            }
            if (content.trim()) {
                html += content;
            }
            preview.innerHTML = html;
        } else {
            preview.innerHTML = '<p class="text-gray-500">Digite o conteúdo acima para ver o preview</p>';
        }
    }

    function sendCustomEmail(leadIds) {
        const subject = document.getElementById('email-subject').value;
        const content = document.getElementById('email-editor').innerHTML;
        
        if (!subject.trim()) {
            alert('Por favor, digite o assunto do email');
            return;
        }
        
        if (!content.trim() || content === '<p>Digite seu email aqui...</p>') {
            alert('Por favor, digite o conteúdo do email');
            return;
        }

        if (confirm(`Enviar email customizado para ${leadIds.length} lead(s)?`)) {
            fetch('{{ route("admin.leads.send-bulk-custom-email") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    lead_ids: leadIds,
                    subject: subject,
                    content: content
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert('Erro: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                alert('Erro ao enviar emails');
            });
        }
    }

    // Email com Template
    document.getElementById('send-template-email').addEventListener('click', function() {
        const selectedIds = getSelectedLeadIds();
        if (selectedIds.length === 0) {
            alert('Selecione pelo menos um lead');
            return;
        }

        // Criar modal para seleção de template
        const templateOptions = @json($templates);
        if (templateOptions.length === 0) {
            alert('Nenhum template disponível. Crie um template primeiro.');
            return;
        }

        let templateSelect = '<select id="template-select" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">';
        templateOptions.forEach(template => {
            templateSelect += `<option value="${template.id}">${template.name}</option>`;
        });
        templateSelect += '</select>';

        const modal = document.createElement('div');
        modal.className = 'fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50';
        modal.innerHTML = `
            <div class="bg-white rounded-lg p-6 w-96">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Selecionar Template</h3>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Template:</label>
                    ${templateSelect}
                </div>
                <div class="flex justify-end space-x-3">
                    <button onclick="this.closest('.fixed').remove()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                        Cancelar
                    </button>
                    <button onclick="sendTemplateEmails()" class="px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">
                        Enviar
                    </button>
                </div>
            </div>
        `;

        document.body.appendChild(modal);

        window.sendTemplateEmails = function() {
            const templateId = document.getElementById('template-select').value;
            modal.remove();

            if (confirm(`Enviar email com template para ${selectedIds.length} lead(s)?`)) {
                fetch('{{ route("admin.leads.send-bulk-template-email") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        lead_ids: selectedIds,
                        template_id: templateId
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        location.reload();
                    } else {
                        alert('Erro: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    alert('Erro ao enviar emails');
                });
            }
        };
    });
</script>
@endsection
