<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leaderboard_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('test_id')->nullable()->constrained()->nullOnDelete();
            $table->string('category')->nullable();
            $table->decimal('score', 8, 2);
            $table->integer('rank');
            $table->decimal('percentile', 5, 2)->default(0);
            $table->tinyInteger('month');
            $table->smallInteger('year');
            $table->timestamps();

            $table->index(['user_id', 'month', 'year']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leaderboard_entries');
    }
};
