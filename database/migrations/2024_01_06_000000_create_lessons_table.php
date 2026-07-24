<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subject_id')->nullable()->constrained('course_subjects')->nullOnDelete();
            $table->foreignId('teacher_id')->constrained('users')->cascadeOnDelete();
            $table->string('title');
            $table->string('title_hi')->nullable();
            $table->string('slug')->unique();
            $table->enum('type', ['video', 'pdf', 'quiz', 'live']);
            $table->string('video_url')->nullable();
            $table->integer('video_duration')->default(0);
            $table->string('pdf_url')->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_free_preview')->default(false);
            $table->boolean('is_published')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
