@extends('layouts.landing')

@section('title', 'DevStarter Kit - Teste')

@section('meta')
<meta name="description" content="Teste da landing page">
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-br from-red-500 via-orange-500 to-yellow-400 flex items-center justify-center">
    <div class="text-center text-white">
        <h1 class="text-6xl font-bold mb-8">🚀 DevStarter Kit</h1>
        <p class="text-2xl mb-8">Sistema base completo para desenvolvedores</p>
        <button class="bg-white text-red-600 px-8 py-4 rounded-xl font-bold text-xl hover:bg-gray-100 transition-all">
            QUERO AGORA
        </button>
    </div>
</div>
@endsection
