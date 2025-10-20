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
        Schema::table('certificates', function (Blueprint $table) {
            if (!Schema::hasColumn('certificates', 'description')) {
                $table->text('description')->nullable();
            }
            if (!Schema::hasColumn('certificates', 'final_score')) {
                $table->decimal('final_score', 5, 2)->nullable();
            }
            if (!Schema::hasColumn('certificates', 'total_lessons')) {
                $table->integer('total_lessons')->default(0);
            }
            if (!Schema::hasColumn('certificates', 'completed_lessons')) {
                $table->integer('completed_lessons')->default(0);
            }
            if (!Schema::hasColumn('certificates', 'total_quizzes')) {
                $table->integer('total_quizzes')->default(0);
            }
            if (!Schema::hasColumn('certificates', 'passed_quizzes')) {
                $table->integer('passed_quizzes')->default(0);
            }
            if (!Schema::hasColumn('certificates', 'expires_at')) {
                $table->timestamp('expires_at')->nullable();
            }
            if (!Schema::hasColumn('certificates', 'is_valid')) {
                $table->boolean('is_valid')->default(true);
            }
            if (!Schema::hasColumn('certificates', 'pdf_path')) {
                $table->string('pdf_path')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn([
                'description',
                'final_score',
                'total_lessons',
                'completed_lessons',
                'total_quizzes',
                'passed_quizzes',
                'issued_at',
                'expires_at',
                'is_valid',
                'pdf_path'
            ]);
        });
    }
};
