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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users')->cascadeOnDelete();
            // Assuming category table exists, in a real scenario we'd create it first
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title');
            $table->string('title_hi')->nullable();
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('description_hi')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('preview_video')->nullable();
            $table->string('language')->default('en');
            $table->string('level')->default('beginner');
            $table->decimal('price', 8, 2)->default(0);
            $table->decimal('discounted_price', 8, 2)->nullable();
            $table->decimal('duration_hours', 5, 2)->nullable();
            $table->integer('total_lessons')->default(0);
            $table->boolean('is_free')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(false);
            $table->enum('exam_type', ['graduation', 'pg', 'competitive'])->nullable();
            $table->json('requirements')->nullable();
            $table->json('what_you_learn')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->decimal('ratings_avg', 3, 2)->default(0);
            $table->integer('ratings_count')->default(0);
            $table->integer('enrollments_count')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
