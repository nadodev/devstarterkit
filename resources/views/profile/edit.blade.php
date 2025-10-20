@extends('layouts.app')

@section('title', 'Editar Perfil - EduPlatform')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    <!-- Header -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-blue-600-purple-600 opacity-90"></div>
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                    Editar Perfil
                </h1>
                <p class="text-xl text-white">Atualize suas informações pessoais</p>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-16">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="p-8">
                @csrf
                @method('PUT')

                <!-- Avatar Section -->
                <div class="text-center mb-8">
                    <div class="relative inline-block">
                        @if($user->avatar)
                            <img id="avatarPreview" src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}" 
                                 class="w-32 h-32 rounded-full border-4 border-gray-200 shadow-lg object-cover">
                        @else
                            <div id="avatarPreview" class="w-32 h-32 rounded-full border-4 border-gray-200 shadow-lg bg-gradient-blue-purple flex items-center justify-center">
                                <i class="fas fa-user text-white text-4xl"></i>
                            </div>
                        @endif
                        <label for="avatar" class="absolute -bottom-2 -right-2 w-12 h-12 bg-blue-500 rounded-full border-4 border-white flex items-center justify-center cursor-pointer hover:bg-blue-600 transition-colors duration-300">
                            <i class="fas fa-camera text-white text-lg"></i>
                        </label>
                        <input type="file" id="avatar" name="avatar" accept="image/*" class="hidden" onchange="previewAvatar(this)">
                    </div>
                    <p class="text-sm text-gray-600 mt-2">Clique na câmera para alterar sua foto</p>
                </div>

                <!-- Informações Básicas -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nome Completo *
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('name') border-red-500 @enderror" 
                               required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email *
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('email') border-red-500 @enderror" 
                               required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                            Telefone
                        </label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('phone') border-red-500 @enderror">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">
                            Tipo de Conta
                        </label>
                        <input type="text" id="role" value="{{ ucfirst($user->role) }}" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl bg-gray-100 text-gray-600" 
                               disabled>
                    </div>
                </div>

                <!-- Bio -->
                <div class="mb-8">
                    <label for="bio" class="block text-sm font-semibold text-gray-700 mb-2">
                        Biografia
                    </label>
                    <textarea id="bio" name="bio" rows="4" 
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('bio') border-red-500 @enderror" 
                              placeholder="Conte um pouco sobre você...">{{ old('bio', $user->bio) }}</textarea>
                    @error('bio')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alterar Senha -->
                <div class="border-t border-gray-200 pt-8 mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Alterar Senha</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="current_password" class="block text-sm font-semibold text-gray-700 mb-2">
                                Senha Atual
                            </label>
                            <input type="password" id="current_password" name="current_password" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('current_password') border-red-500 @enderror">
                            @error('current_password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nova Senha
                            </label>
                            <input type="password" id="password" name="password" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 @error('password') border-red-500 @enderror">
                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                            Confirmar Nova Senha
                        </label>
                        <input type="password" id="password_confirmation" name="password_confirmation" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    </div>
                </div>

                <!-- Botões -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button type="submit" 
                            class="flex-1 bg-gradient-blue-purple text-white px-8 py-4 rounded-2xl font-semibold hover:shadow-lg transform hover:scale-105 transition-all duration-300">
                        <i class="fas fa-save mr-2"></i>Salvar Alterações
                    </button>
                    
                    <a href="{{ route('profile.index') }}" 
                       class="flex-1 bg-gray-200 text-gray-800 px-8 py-4 rounded-2xl font-semibold hover:bg-gray-300 transition-all duration-300 text-center">
                        <i class="fas fa-times mr-2"></i>Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewAvatar(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const preview = document.getElementById('avatarPreview');
            if (preview.tagName === 'IMG') {
                preview.src = e.target.result;
            } else {
                // Se for uma div, substituir por uma img
                const newImg = document.createElement('img');
                newImg.id = 'avatarPreview';
                newImg.src = e.target.result;
                newImg.className = 'w-32 h-32 rounded-full border-4 border-gray-200 shadow-lg object-cover';
                preview.parentNode.replaceChild(newImg, preview);
            }
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
