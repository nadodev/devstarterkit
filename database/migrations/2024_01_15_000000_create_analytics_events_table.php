<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('analytics_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_type'); // cta_click, video_click, page_view, etc.
            $table->string('event_name'); // Nome do evento
            $table->json('event_data')->nullable(); // Dados adicionais do evento
            $table->string('session_id')->nullable(); // ID da sessão
            $table->string('user_agent')->nullable(); // User agent
            $table->string('ip_address')->nullable(); // IP do usuário
            $table->string('page_url')->nullable(); // URL da página
            $table->timestamps();
            
            $table->index(['event_type', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics_events');
    }
};
