<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_hi')->nullable();
            $table->text('description');
            $table->text('description_hi')->nullable();
            $table->string('icon');
            $table->string('color')->default('#38BDF8');
            $table->enum('type', ['badge', 'streak', 'rank', 'score', 'course']);
            $table->json('criteria');
            $table->integer('points')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
