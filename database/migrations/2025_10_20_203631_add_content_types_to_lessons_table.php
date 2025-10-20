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
        Schema::table('lessons', function (Blueprint $table) {
            // Adicionar campos para múltiplos tipos de conteúdo
            $table->boolean('has_video')->default(false)->after('type');
            $table->boolean('has_text')->default(false)->after('has_video');
            $table->boolean('has_file')->default(false)->after('has_text');
            
            // Renomear type para content_type (opcional, para manter compatibilidade)
            $table->string('content_type')->default('mixed')->after('has_file');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn(['has_video', 'has_text', 'has_file', 'content_type']);
        });
    }
};