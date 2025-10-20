@extends('layouts.app')

@section('title', 'Meu Perfil - EduPlatform')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    <!-- Header do Perfil -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-blue-600-purple-600 opacity-90"></div>
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <div class="text-center lg:text-left mb-8 lg:mb-0">
                    <div class="flex items-center justify-center lg:justify-start mb-6">
                        <div class="relative">
                            @if($user->avatar)
                                <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}" 
                                     class="w-32 h-32 rounded-full border-4 border-white shadow-2xl object-cover">
                            @else
                                <div class="w-32 h-32 rounded-full border-4 border-white shadow-2xl bg-gradient-blue-purple flex items-center justify-center">
                                    <i class="fas fa-user text-white text-4xl"></i>
                                </div>
                            @endif
                            <div class="absolute -bottom-2 -right-2 w-12 h-12 bg-green-500 rounded-full border-4 border-white flex items-center justify-center">
                                <i class="fas fa-check text-white text-lg"></i>
                            </div>
                        </div>
                    </div>
                    
                    <h1 class="text-4xl lg:text-5xl font-bold text-white mb-2">
                        {{ $user->name }}
                    </h1>
                    <p class="text-xl text-white mb-4">{{ $user->email }}</p>
                    @if($user->phone)
                        <p class="text-lg text-white mb-4">
                            <i class="fas fa-phone mr-2"></i>{{ $user->phone }}
                        </p>
                    @endif
                    @if($user->bio)
                        <p class="text-lg text-white max-w-2xl">{{ $user->bio }}</p>
                    @endif
                </div>
                
                <!-- Estatísticas do Usuário -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center bg-white/20 backdrop-blur-sm rounded-2xl p-6">
                        <div class="text-3xl font-bold text-white">{{ $stats['total_courses'] }}</div>
                        <div class="text-white text-sm font-medium">Cursos</div>
                    </div>
                    <div class="text-center bg-white/20 backdrop-blur-sm rounded-2xl p-6">
                        <div class="text-3xl font-bold text-white">{{ $stats['completed_courses'] }}</div>
                        <div class="text-white text-sm font-medium">Concluídos</div>
                    </div>
                    <div class="text-center bg-white/20 backdrop-blur-sm rounded-2xl p-6">
                        <div class="text-3xl font-bold text-white">{{ $stats['certificates_count'] }}</div>
                        <div class="text-white text-sm font-medium">Certificados</div>
                    </div>
                    <div class="text-center bg-white/20 backdrop-blur-sm rounded-2xl p-6">
                        <div class="text-3xl font-bold text-white">{{ $stats['total_hours'] }}h</div>
                        <div class="text-white text-sm font-medium">Estudadas</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-16">
        <!-- Botões de Ação -->
        <div class="flex flex-wrap gap-4 mb-8">
            <a href="{{ route('profile.edit') }}" 
               class="bg-gradient-blue-purple text-white px-6 py-3 rounded-2xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                <i class="fas fa-edit mr-2"></i>Editar Perfil
            </a>
            <a href="{{ route('dashboard') }}" 
               class="bg-white border-2 border-blue-500 text-blue-600 px-6 py-3 rounded-2xl font-semibold hover:bg-blue-50 transform hover:scale-105 transition-all duration-300">
                <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
            </a>
        </div>

        <!-- Conteúdo Principal -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Meus Cursos -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-blue-600-purple-600 px-8 py-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold text-white">Meus Cursos</h2>
                                <p class="text-white mt-1 font-medium">Cursos em que você está inscrito</p>
                            </div>
                            <a href="{{ route('student.courses.index') }}" class="bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-xl font-medium hover:bg-white/30 transition-all duration-300">
                                Ver todos
                            </a>
                        </div>
                    </div>
                    <div class="p-8">
                        @if($enrollments->count() > 0)
                            <div class="space-y-6">
                                @foreach($enrollments->take(3) as $enrollment)
                                <div class="group relative bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl p-6 hover:shadow-lg transition-all duration-300 border border-gray-200">
                                    <div class="flex items-start space-x-4">
                                        <div class="flex-shrink-0">
                                            <div class="w-16 h-16 bg-gradient-blue-purple rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                                <i class="fas fa-play text-white text-xl"></i>
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-300">
                                                {{ $enrollment->course->title }}
                                            </h3>
                                            <p class="text-gray-600 mb-4">{{ $enrollment->course->category->name }} • {{ $enrollment->course->duration_hours }}h</p>
                                            
                                            <!-- Progress Bar -->
                                            <div class="mb-4">
                                                <div class="flex items-center justify-between mb-2">
                                                    <span class="text-sm font-medium text-gray-700">Progresso</span>
                                                    <span class="text-sm font-bold text-gray-900">{{ $enrollment->progress_percentage ?? 0 }}%</span>
                                                </div>
                                                <div class="w-full bg-gray-200 rounded-full h-3 overflow-hidden">
                                                    <div class="bg-gradient-blue-purple h-3 rounded-full transition-all duration-1000 ease-out" 
                                                         style="width: {{ $enrollment->progress_percentage ?? 0 }}%"></div>
                                                </div>
                                            </div>
                                            
                                            <!-- Status Badge -->
                                            <div class="flex items-center justify-between">
                                                @if($enrollment->status === 'completed')
                                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                        <i class="fas fa-check mr-2"></i>Concluído
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                                        <i class="fas fa-play mr-2"></i>Em andamento
                                                    </span>
                                                @endif
                                                
                                                <a href="{{ route('student.courses.show', $enrollment->course) }}" 
                                                   class="bg-gradient-blue-purple text-white px-6 py-2 rounded-xl font-medium hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                                                    {{ $enrollment->status === 'completed' ? 'Refazer' : 'Continuar' }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="fas fa-book-open text-blue-500 text-3xl"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-4">Nenhum curso encontrado</h3>
                                <p class="text-gray-600 mb-8 text-lg">Você ainda não está inscrito em nenhum curso.</p>
                                <a href="{{ route('courses.index') }}" class="bg-gradient-blue-purple text-white px-8 py-4 rounded-2xl font-bold hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                                    Explorar Cursos
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <!-- Certificados -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-yellow-orange-500 px-6 py-4">
                        <h3 class="text-xl font-bold text-white">Certificados</h3>
                        <p class="text-white text-sm font-medium">Suas conquistas profissionais</p>
                    </div>
                    <div class="p-6">
                        @if($certificates->count() > 0)
                            <div class="space-y-4">
                                @foreach($certificates->take(3) as $certificate)
                                <div class="group bg-gradient-to-r from-yellow-50 to-orange-50 rounded-2xl p-4 hover:shadow-lg transition-all duration-300 border border-yellow-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <div class="w-12 h-12 bg-gradient-yellow-orange-500 rounded-2xl flex items-center justify-center shadow-lg">
                                                <i class="fas fa-certificate text-white"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <p class="text-lg font-semibold text-gray-900">{{ $certificate->course->title }}</p>
                                            <p class="text-sm text-gray-600">{{ $certificate->issued_at->format('d/m/Y') }}</p>
                                        </div>
                                        <a href="{{ route('certificates.show', $certificate) }}" 
                                           class="text-yellow-600 hover:text-yellow-700 transform hover:scale-110 transition-all duration-300">
                                            <i class="fas fa-external-link-alt text-lg"></i>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="mt-6">
                                <a href="{{ route('certificates.index') }}" 
                                   class="w-full bg-gradient-yellow-orange-500 text-white px-6 py-3 rounded-2xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300 text-center block">
                                    Ver todos os certificados
                                </a>
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="w-20 h-20 bg-gradient-to-br from-yellow-100 to-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-certificate text-yellow-500 text-2xl"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-900 mb-2">Nenhum certificado ainda</h4>
                                <p class="text-gray-600 text-sm">Complete cursos para obter certificados</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Informações da Conta -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-green px-6 py-4">
                        <h3 class="text-xl font-bold text-white">Informações da Conta</h3>
                        <p class="text-white text-sm font-medium">Detalhes da sua conta</p>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Membro desde:</span>
                                <span class="font-semibold text-gray-900">{{ $user->created_at->format('d/m/Y') }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Tipo de conta:</span>
                                <span class="font-semibold text-gray-900 capitalize">{{ $user->role }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Email verificado:</span>
                                <span class="font-semibold text-green-600">
                                    <i class="fas fa-check-circle"></i> Sim
                                </span>
                            </div>
                        </div>
                        
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <button onclick="confirmDelete()" 
                                    class="w-full bg-red-500 text-white px-4 py-2 rounded-xl font-medium hover:bg-red-600 transition-colors duration-300">
                                <i class="fas fa-trash mr-2"></i>Deletar Conta
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmação para Deletar Conta -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl p-8 max-w-md mx-4">
        <div class="text-center">
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-exclamation-triangle text-red-600 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Deletar Conta</h3>
            <p class="text-gray-600 mb-6">Esta ação não pode ser desfeita. Todos os seus dados serão permanentemente removidos.</p>
            
            <div class="flex space-x-4">
                <button onclick="closeDeleteModal()" 
                        class="flex-1 bg-gray-200 text-gray-800 px-4 py-2 rounded-xl font-medium hover:bg-gray-300 transition-colors duration-300">
                    Cancelar
                </button>
                <form method="POST" action="{{ route('profile.destroy') }}" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="w-full bg-red-500 text-white px-4 py-2 rounded-xl font-medium hover:bg-red-600 transition-colors duration-300">
                        Deletar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete() {
    document.getElementById('deleteModal').classList.remove('hidden');
    document.getElementById('deleteModal').classList.add('flex');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    document.getElementById('deleteModal').classList.remove('flex');
}
</script>
@endsection
