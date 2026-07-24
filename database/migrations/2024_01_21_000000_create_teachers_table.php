<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('qualification');
            $table->string('expertise')->nullable();
            $table->integer('experience_years')->default(0);
            $table->text('bio')->nullable();
            $table->text('bio_hi')->nullable();
            $table->json('subject_specialization')->nullable();
            $table->decimal('rating', 3, 2)->default(0);
            $table->integer('total_students')->default(0);
            $table->integer('total_courses')->default(0);
            $table->json('bank_account')->nullable();
            $table->decimal('commission_percentage', 5, 2)->default(70.00);
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
