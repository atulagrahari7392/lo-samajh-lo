<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            
            $table->string('title');
            $table->string('title_hi')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            
            $table->enum('type', ['mock', 'live', 'topic', 'subject', 'pyq', 'practice', 'daily_quiz', 'weekly_quiz', 'monthly_quiz']);
            $table->string('exam_type')->nullable(); // graduation, pg, competitive
            
            $table->integer('total_questions')->default(0);
            $table->decimal('total_marks', 8, 2)->default(0);
            $table->decimal('passing_marks', 8, 2)->default(0);
            $table->integer('duration_minutes')->default(0);
            
            $table->boolean('negative_marking')->default(false);
            $table->decimal('negative_marks_value', 5, 2)->default(0);
            
            $table->boolean('is_free')->default(false);
            $table->boolean('is_published')->default(false);
            
            $table->text('instructions')->nullable();
            $table->text('instructions_hi')->nullable();
            
            $table->timestamp('scheduled_at')->nullable();
            $table->boolean('is_live')->default(false);
            
            $table->integer('total_attempts')->default(0);
            
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            $table->index(['type', 'is_published']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
