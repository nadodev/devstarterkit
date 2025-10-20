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
                <h3 class="text-lg font-medium text-gray-900">Ações em Massa</h3>
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
                        <i class="fas fa-envelope mr-2"></i>Enviar Email para Selecionados
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
    bulkButton.disabled = selected.length === 0;
    bulkButton.textContent = `Enviar Email para ${selected.length} Selecionado(s)`;
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
</script>
@endsection
