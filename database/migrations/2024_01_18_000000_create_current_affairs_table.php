<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('current_affairs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_hi')->nullable();
            $table->longText('content');
            $table->longText('content_hi')->nullable();
            $table->string('category');
            $table->enum('type', ['daily', 'weekly', 'monthly']);
            $table->string('pdf_url')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamp('published_at');
            $table->boolean('is_featured')->default(false);
            $table->integer('views_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('current_affairs');
    }
};
