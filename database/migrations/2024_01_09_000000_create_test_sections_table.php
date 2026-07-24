<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('test_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_id')->constrained('tests')->cascadeOnDelete(); // Note: tests table must exist
            $table->string('name');
            $table->string('name_hi')->nullable();
            $table->integer('total_questions')->default(0);
            $table->decimal('marks_per_question', 5, 2)->default(0);
            $table->decimal('negative_marks', 5, 2)->default(0);
            $table->integer('time_limit')->nullable(); // in minutes
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('test_sections');
    }
};
