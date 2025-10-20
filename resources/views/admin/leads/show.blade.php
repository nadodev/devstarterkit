@extends('layouts.admin')

@section('title', 'Detalhes do Lead')
@section('page-title', 'Detalhes do Lead')
@section('page-description', 'Informações completas sobre o lead')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div class="flex space-x-4">
        <a href="{{ route('admin.leads.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>Voltar
        </a>
        <button onclick="sendEmail({{ $lead->id }})" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
            <i class="fas fa-envelope mr-2"></i>Enviar Email
        </button>
    </div>
</div>

        <!-- Informações do Lead -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Informações Pessoais</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nome</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $lead->name ?? 'Não informado' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $lead->email }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">WhatsApp</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $lead->whatsapp ?? 'Não informado' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status do Email</label>
                        <div class="mt-1">
                            @if($lead->email_sent)
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    <i class="fas fa-check mr-1"></i>Email Enviado
                                </span>
                                @if($lead->email_sent_at)
                                    <p class="text-xs text-gray-500 mt-1">Enviado em: {{ $lead->email_sent_at->format('d/m/Y H:i') }}</p>
                                @endif
                            @else
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    <i class="fas fa-clock mr-1"></i>Pendente
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informações Técnicas -->
        <div class="bg-white rounded-lg shadow mt-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Informações Técnicas</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">IP Address</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $lead->ip_address ?? 'Não disponível' }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Data de Cadastro</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $lead->created_at->format('d/m/Y H:i:s') }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">User Agent</label>
                        <p class="mt-1 text-sm text-gray-900 break-all">{{ $lead->user_agent ?? 'Não disponível' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ações -->
        <div class="bg-white rounded-lg shadow mt-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900">Ações</h3>
            </div>
            <div class="p-6">
                <div class="flex flex-wrap gap-4">
                    <button onclick="sendEmail({{ $lead->id }})" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                        <i class="fas fa-envelope mr-2"></i>Enviar Email
                    </button>
                    <a href="mailto:{{ $lead->email }}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
                        <i class="fas fa-external-link-alt mr-2"></i>Abrir no Cliente de Email
                    </a>
                    @if($lead->whatsapp)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->whatsapp) }}" target="_blank" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                        <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                    </a>
                    @endif
                    <button onclick="deleteLead({{ $lead->id }})" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                        <i class="fas fa-trash mr-2"></i>Excluir Lead
                    </button>
                </div>
            </div>
        </div>

<script>
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

function deleteLead(leadId) {
    if (confirm('Tem certeza que deseja excluir este lead? Esta ação não pode ser desfeita.')) {
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
                window.location.href = '{{ route("admin.leads.index") }}';
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
