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
        Schema::create('quiz_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('lesson_id')->constrained()->onDelete('cascade');
            $table->json('answers'); // Respostas do usuário
            $table->json('results'); // Resultados detalhados
            $table->integer('score'); // Pontuação obtida
            $table->boolean('passed'); // Se passou ou não
            $table->integer('time_spent_minutes')->nullable(); // Tempo gasto
            $table->timestamp('started_at'); // Quando começou
            $table->timestamp('completed_at'); // Quando terminou
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_attempts');
    }
};
