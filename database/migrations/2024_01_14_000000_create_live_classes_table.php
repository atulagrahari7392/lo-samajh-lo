<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('live_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('course_id')->nullable()->constrained('courses')->cascadeOnDelete();
            
            $table->string('title');
            $table->string('title_hi')->nullable();
            $table->text('description')->nullable();
            
            $table->enum('platform', ['zoom', 'youtube', 'google_meet', 'custom'])->default('zoom');
            $table->string('meeting_id')->nullable();
            $table->text('meeting_link')->nullable();
            $table->string('meeting_password')->nullable();
            
            $table->timestamp('scheduled_at');
            $table->integer('duration_minutes')->default(60);
            
            $table->boolean('is_recorded')->default(false);
            $table->string('recording_url')->nullable();
            $table->string('thumbnail')->nullable();
            
            $table->boolean('is_free')->default(false);
            $table->enum('status', ['scheduled', 'live', 'ended', 'cancelled'])->default('scheduled');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('live_classes');
    }
};
