@extends('layouts.admin')

@section('title', 'Gerenciar Produtos')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Produtos & Serviços</h1>
            <p class="text-gray-600 mt-2">Gerencie todos os produtos e serviços da sua plataforma</p>
        </div>
        <a href="{{ route('admin.products.create') }}" 
           class="bg-gradient-blue-purple text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition-all duration-300">
            <i class="fas fa-plus mr-2"></i>Novo Produto
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center">
                <div class="bg-gradient-blue-purple text-white rounded-full p-3">
                    <i class="fas fa-box text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total de Produtos</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $products->total() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center">
                <div class="bg-gradient-green text-white rounded-full p-3">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Ativos</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $products->where('is_active', true)->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center">
                <div class="bg-gradient-yellow-orange text-white rounded-full p-3">
                    <i class="fas fa-star text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Destaques</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $products->where('is_featured', true)->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center">
                <div class="bg-gradient-purple text-white rounded-full p-3">
                    <i class="fas fa-tags text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Categorias</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $products->pluck('category')->filter()->unique()->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Lista de Produtos</h3>
        </div>
        
        @if($products->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produto</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Preço</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if($product->image)
                                <div class="h-12 w-12 flex-shrink-0">
                                    <img class="h-12 w-12 rounded-lg object-cover" 
                                         src="{{ Storage::url($product->image) }}" 
                                         alt="{{ $product->name }}">
                                </div>
                                @else
                                <div class="h-12 w-12 bg-gradient-blue-purple rounded-lg flex items-center justify-center">
                                    <i class="fas fa-box text-white"></i>
                                </div>
                                @endif
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                    @if($product->short_description)
                                    <div class="text-sm text-gray-500 line-clamp-1">{{ $product->short_description }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="bg-gradient-blue-purple text-white px-3 py-1 rounded-full text-xs font-medium">
                                {{ ucfirst($product->type) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                @if($product->discount_price)
                                <div class="flex items-center space-x-2">
                                    <span class="font-bold">{{ $product->formatted_discount_price }}</span>
                                    <span class="text-gray-500 line-through text-sm">{{ $product->formatted_price }}</span>
                                </div>
                                @else
                                <span class="font-bold">{{ $product->formatted_price }}</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                @if($product->is_active)
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                    Ativo
                                </span>
                                @else
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-medium">
                                    Inativo
                                </span>
                                @endif
                                
                                @if($product->is_featured)
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-medium">
                                    Destaque
                                </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('products.show', $product->slug) }}" target="_blank"
                                   class="text-blue-600 hover:text-blue-900" title="Ver no site">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <a href="{{ route('admin.products.edit', $product) }}"
                                   class="text-indigo-600 hover:text-indigo-900" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" 
                                      class="inline" onsubmit="return confirm('Tem certeza que deseja excluir este produto?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" title="Excluir">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $products->links() }}
        </div>
        @else
        <div class="text-center py-12">
            <div class="text-6xl mb-4">📦</div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Nenhum produto cadastrado</h3>
            <p class="text-gray-600 mb-6">Comece criando seu primeiro produto</p>
            <a href="{{ route('admin.products.create') }}" 
               class="bg-gradient-blue-purple text-white px-6 py-3 rounded-lg font-semibold hover:shadow-lg transition-all duration-300">
                <i class="fas fa-plus mr-2"></i>Criar Primeiro Produto
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
