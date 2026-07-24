<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('test_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('test_id')->constrained('tests')->cascadeOnDelete();
            $table->timestamp('started_at');
            $table->timestamp('submitted_at')->nullable();
            $table->enum('status', ['in_progress', 'submitted', 'abandoned'])->default('in_progress');
            $table->integer('total_attempted')->default(0);
            $table->integer('total_correct')->default(0);
            $table->integer('total_wrong')->default(0);
            $table->integer('total_unattempted')->default(0);
            $table->decimal('score', 8, 2)->default(0);
            $table->decimal('percentage', 5, 2)->default(0);
            $table->integer('rank')->nullable();
            $table->integer('time_taken_seconds')->default(0);
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('test_attempts');
    }
};
