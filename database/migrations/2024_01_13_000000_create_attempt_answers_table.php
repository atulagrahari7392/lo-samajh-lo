<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attempt_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attempt_id')->constrained('test_attempts')->cascadeOnDelete();
            $table->foreignId('question_id')->constrained('questions')->cascadeOnDelete();
            $table->json('selected_options')->nullable();
            $table->decimal('numerical_answer', 10, 4)->nullable();
            $table->boolean('is_correct')->default(false);
            $table->boolean('is_marked_review')->default(false);
            $table->integer('time_spent_seconds')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attempt_answers');
    }
};
