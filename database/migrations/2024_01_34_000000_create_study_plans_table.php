<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('study_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('exam_target');
            $table->date('exam_date')->nullable();
            $table->integer('daily_hours')->default(4);
            $table->enum('current_level', ['beginner', 'intermediate', 'advanced']);
            $table->json('plan_data');
            $table->boolean('ai_generated')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('study_plans');
    }
};
