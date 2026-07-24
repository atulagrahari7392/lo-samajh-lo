<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_id')->constrained('tests')->cascadeOnDelete();
            $table->foreignId('section_id')->nullable()->constrained('test_sections')->nullOnDelete();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->string('topic')->nullable();
            
            $table->enum('type', ['single', 'multiple', 'numerical', 'true_false', 'match', 'assertion_reason', 'paragraph', 'image']);
            $table->text('question_text');
            $table->text('question_text_hi')->nullable();
            $table->string('image_url')->nullable();
            
            $table->enum('difficulty', ['easy', 'medium', 'hard'])->default('medium');
            $table->decimal('marks', 5, 2)->default(1);
            $table->decimal('negative_marks', 5, 2)->default(0);
            
            $table->text('explanation')->nullable();
            $table->text('explanation_hi')->nullable();
            $table->json('tags')->nullable();
            
            $table->integer('pyq_year')->nullable();
            $table->string('pyq_exam')->nullable();
            
            $table->foreignId('created_by')->constrained('users');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
