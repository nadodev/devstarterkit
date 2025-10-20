@extends('layouts.admin')

@section('title', 'Editar Produto')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Editar Produto</h1>
            <p class="text-gray-600 mt-2">Atualize as informações do produto</p>
        </div>
        <a href="{{ route('admin.products.index') }}" 
           class="bg-gray-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-600 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>Voltar
        </a>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')
        
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Information -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Informações Básicas</h3>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nome do Produto *</label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tipo *</label>
                            <select name="type" required
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Selecione o tipo</option>
                                <option value="product" {{ old('type', $product->type) == 'product' ? 'selected' : '' }}>Produto</option>
                                <option value="service" {{ old('type', $product->type) == 'service' ? 'selected' : '' }}>Serviço</option>
                            </select>
                            @error('type')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Descrição Curta</label>
                        <textarea name="short_description" rows="3"
                                  class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                  placeholder="Uma breve descrição do produto...">{{ old('short_description', $product->short_description) }}</textarea>
                        @error('short_description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Descrição Completa *</label>
                        <textarea name="description" rows="6" required
                                  class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                  placeholder="Descreva detalhadamente o produto ou serviço...">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Pricing -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Preços</h3>
                    
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preço Normal *</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">R$</span>
                                <input type="number" name="price" step="0.01" min="0" value="{{ old('price', $product->price) }}" required
                                       class="w-full pl-8 pr-3 py-2 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="0,00">
                            </div>
                            @error('price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preço com Desconto</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">R$</span>
                                <input type="number" name="discount_price" step="0.01" min="0" value="{{ old('discount_price', $product->discount_price) }}"
                                       class="w-full pl-8 pr-3 py-2 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="0,00">
                            </div>
                            @error('discount_price')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Images -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Imagens</h3>
                    
                    <div class="space-y-6">
                        <!-- Current Image -->
                        @if($product->image)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Imagem Atual</label>
                            <div class="flex items-center space-x-4">
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" 
                                     class="h-20 w-20 object-cover rounded-lg">
                                <div>
                                    <p class="text-sm text-gray-600">Para alterar, selecione uma nova imagem abaixo</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nova Imagem Principal</label>
                            <input type="file" name="image" accept="image/*"
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @error('image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Current Gallery -->
                        @if($product->gallery && count($product->gallery) > 0)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Galeria Atual</label>
                            <div class="grid grid-cols-4 gap-4">
                                @foreach($product->gallery as $image)
                                <img src="{{ Storage::url($image) }}" alt="{{ $product->name }}" 
                                     class="h-16 w-16 object-cover rounded-lg">
                                @endforeach
                            </div>
                            <p class="text-sm text-gray-600 mt-2">Para alterar, selecione novas imagens abaixo</p>
                        </div>
                        @endif
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nova Galeria de Imagens</label>
                            <input type="file" name="gallery[]" accept="image/*" multiple
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <p class="text-sm text-gray-500 mt-1">Selecione múltiplas imagens para a galeria</p>
                            @error('gallery.*')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Features and Benefits -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Características e Benefícios</h3>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Características</label>
                            <div id="features-container">
                                @if($product->features && count($product->features) > 0)
                                    @foreach($product->features as $feature)
                                    <div class="flex items-center space-x-2 mb-2">
                                        <input type="text" name="features[]" value="{{ $feature }}" placeholder="Digite uma característica..."
                                               class="flex-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        <button type="button" onclick="removeFeature(this)" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    @endforeach
                                @else
                                <div class="flex items-center space-x-2 mb-2">
                                    <input type="text" name="features[]" placeholder="Digite uma característica..."
                                           class="flex-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <button type="button" onclick="removeFeature(this)" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                @endif
                            </div>
                            <button type="button" onclick="addFeature()" 
                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                <i class="fas fa-plus mr-2"></i>Adicionar Característica
                            </button>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Benefícios</label>
                            <div id="benefits-container">
                                @if($product->benefits && count($product->benefits) > 0)
                                    @foreach($product->benefits as $benefit)
                                    <div class="flex items-center space-x-2 mb-2">
                                        <input type="text" name="benefits[]" value="{{ $benefit }}" placeholder="Digite um benefício..."
                                               class="flex-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        <button type="button" onclick="removeBenefit(this)" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    @endforeach
                                @else
                                <div class="flex items-center space-x-2 mb-2">
                                    <input type="text" name="benefits[]" placeholder="Digite um benefício..."
                                           class="flex-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    <button type="button" onclick="removeBenefit(this)" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                                @endif
                            </div>
                            <button type="button" onclick="addBenefit()" 
                                    class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors">
                                <i class="fas fa-plus mr-2"></i>Adicionar Benefício
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Settings -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Configurações</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Categoria</label>
                            <input type="text" name="category" value="{{ old('category', $product->category) }}"
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Ex: Desenvolvimento, Design, Marketing">
                            @error('category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ordem de Exibição</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $product->sort_order) }}"
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @error('sort_order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label class="ml-2 text-sm text-gray-700">Produto ativo</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}
                                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label class="ml-2 text-sm text-gray-700">Produto em destaque</label>
                        </div>
                    </div>
                </div>

                <!-- Call to Action -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Botão de Ação</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Texto do Botão</label>
                            <input type="text" name="button_text" value="{{ old('button_text', $product->button_text) }}"
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            @error('button_text')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">URL do Botão</label>
                            <input type="url" name="button_url" value="{{ old('button_url', $product->button_url) }}"
                                   class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="https://exemplo.com/comprar">
                            @error('button_url')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end space-x-4">
            <a href="{{ route('admin.products.index') }}" 
               class="bg-gray-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-600 transition-colors">
                Cancelar
            </a>
            <button type="submit" 
                    class="bg-gradient-blue-purple text-white px-8 py-3 rounded-lg font-semibold hover:shadow-lg transition-all duration-300">
                <i class="fas fa-save mr-2"></i>Atualizar Produto
            </button>
        </div>
    </form>
</div>

<script>
function addFeature() {
    const container = document.getElementById('features-container');
    const div = document.createElement('div');
    div.className = 'flex items-center space-x-2 mb-2';
    div.innerHTML = `
        <input type="text" name="features[]" placeholder="Digite uma característica..."
               class="flex-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        <button type="button" onclick="removeFeature(this)" class="text-red-500 hover:text-red-700">
            <i class="fas fa-trash"></i>
        </button>
    `;
    container.appendChild(div);
}

function removeFeature(button) {
    button.parentElement.remove();
}

function addBenefit() {
    const container = document.getElementById('benefits-container');
    const div = document.createElement('div');
    div.className = 'flex items-center space-x-2 mb-2';
    div.innerHTML = `
        <input type="text" name="benefits[]" placeholder="Digite um benefício..."
               class="flex-1 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        <button type="button" onclick="removeBenefit(this)" class="text-red-500 hover:text-red-700">
            <i class="fas fa-trash"></i>
        </button>
    `;
    container.appendChild(div);
}

function removeBenefit(button) {
    button.parentElement.remove();
}
</script>
@endsection
