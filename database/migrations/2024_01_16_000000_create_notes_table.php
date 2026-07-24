<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('course_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('subject_id')->nullable()->constrained('course_subjects')->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('course_categories')->nullOnDelete();
            $table->string('title');
            $table->string('title_hi')->nullable();
            $table->text('description')->nullable();
            $table->enum('type', ['pdf', 'ppt', 'mindmap', 'handwritten', 'infographic']);
            $table->string('file_url');
            $table->bigInteger('file_size')->default(0);
            $table->integer('pages')->default(0);
            $table->string('thumbnail')->nullable();
            $table->boolean('is_free')->default(false);
            $table->boolean('is_published')->default(true);
            $table->integer('downloads_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
