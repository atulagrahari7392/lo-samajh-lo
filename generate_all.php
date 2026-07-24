<?php

$dir = __DIR__;
@mkdir("$dir/database/migrations", 0777, true);
@mkdir("$dir/app/Models", 0777, true);

$files = [];

// ==========================================
// MIGRATIONS
// ==========================================

$files['database/migrations/2024_01_04_000000_create_course_categories_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('course_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_hi');
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->string('color')->default('#38BDF8');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('course_categories'); }
};
PHP;

$files['database/migrations/2024_01_05_000000_create_course_subjects_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('course_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->string('name');
            $table->string('name_hi');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('course_subjects'); }
};
PHP;

$files['database/migrations/2024_01_06_000000_create_lessons_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->foreignId('subject_id')->nullable()->constrained('course_subjects')->nullOnDelete();
            $table->foreignId('teacher_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('title');
            $table->string('title_hi');
            $table->string('slug');
            $table->enum('type', ['video','pdf','quiz','live','text']);
            $table->string('video_url')->nullable();
            $table->integer('video_duration')->nullable(); // in seconds
            $table->string('pdf_url')->nullable();
            $table->longText('content')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('description')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_free_preview')->default(false);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('lessons'); }
};
PHP;

$files['database/migrations/2024_01_07_000000_create_lesson_progress_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('lesson_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('lesson_id')->constrained('lessons')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->integer('watched_seconds')->default(0);
            $table->boolean('is_completed')->default(false);
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            
            $table->unique(['user_id', 'lesson_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('lesson_progress'); }
};
PHP;

$files['database/migrations/2024_01_08_000000_create_enrollments_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();
            $table->foreignId('order_id')->nullable()->constrained('orders')->nullOnDelete();
            $table->timestamp('enrolled_at');
            $table->timestamp('expires_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->unique(['user_id', 'course_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('enrollments'); }
};
PHP;

$files['database/migrations/2024_01_09_000000_create_test_sections_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('test_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_id')->constrained('tests')->cascadeOnDelete();
            $table->string('name');
            $table->string('name_hi');
            $table->integer('total_questions');
            $table->decimal('marks_per_question', 5, 2)->default(1);
            $table->decimal('negative_marks', 5, 2)->default(0);
            $table->integer('time_limit_minutes')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('test_sections'); }
};
PHP;

$files['database/migrations/2024_01_10_000000_create_questions_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_id')->nullable()->constrained('tests')->cascadeOnDelete();
            $table->foreignId('section_id')->nullable()->constrained('test_sections')->cascadeOnDelete();
            $table->foreignId('course_id')->nullable()->constrained('courses')->nullOnDelete();
            $table->foreignId('subject_id')->nullable()->constrained('course_subjects')->nullOnDelete();
            $table->string('topic')->nullable();
            $table->enum('type', ['single','multiple','numerical','true_false','match','assertion_reason','paragraph','image']);
            $table->longText('question_text');
            $table->longText('question_text_hi')->nullable();
            $table->string('image_url')->nullable();
            $table->enum('difficulty', ['easy','medium','hard'])->default('medium');
            $table->decimal('marks', 5, 2)->default(1);
            $table->decimal('negative_marks', 5, 2)->default(0);
            $table->longText('explanation')->nullable();
            $table->longText('explanation_hi')->nullable();
            $table->string('solution_video_url')->nullable();
            $table->json('tags')->nullable();
            $table->smallInteger('pyq_year')->nullable();
            $table->string('pyq_exam')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('questions'); }
};
PHP;

$files['database/migrations/2024_01_11_000000_create_question_options_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('question_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('questions')->cascadeOnDelete();
            $table->text('option_text');
            $table->text('option_text_hi')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('is_correct')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('question_options'); }
};
PHP;

$files['database/migrations/2024_01_12_000000_create_test_attempts_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('test_attempts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('test_id')->constrained('tests')->cascadeOnDelete();
            $table->timestamp('started_at');
            $table->timestamp('submitted_at')->nullable();
            $table->enum('status', ['in_progress','submitted','abandoned'])->default('in_progress');
            $table->integer('total_attempted')->default(0);
            $table->integer('total_correct')->default(0);
            $table->integer('total_wrong')->default(0);
            $table->integer('total_unattempted')->default(0);
            $table->decimal('score', 8, 2)->default(0);
            $table->decimal('max_score', 8, 2)->default(0);
            $table->decimal('percentage', 5, 2)->default(0);
            $table->integer('rank')->nullable();
            $table->integer('time_taken_seconds')->default(0);
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->integer('tab_switches')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('test_attempts'); }
};
PHP;

$files['database/migrations/2024_01_13_000000_create_attempt_answers_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('attempt_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attempt_id')->constrained('test_attempts')->cascadeOnDelete();
            $table->foreignId('question_id')->constrained('questions')->cascadeOnDelete();
            $table->json('selected_options')->nullable();
            $table->decimal('numerical_answer', 10, 4)->nullable();
            $table->boolean('is_correct')->nullable();
            $table->boolean('is_marked_review')->default(false);
            $table->integer('time_spent_seconds')->default(0);
            $table->timestamps();
            
            $table->unique(['attempt_id', 'question_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('attempt_answers'); }
};
PHP;

$files['database/migrations/2024_01_14_000000_create_live_classes_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('live_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('course_id')->nullable()->constrained('courses')->nullOnDelete();
            $table->string('title');
            $table->string('title_hi')->nullable();
            $table->text('description')->nullable();
            $table->enum('platform', ['zoom','youtube'])->default('zoom');
            $table->string('meeting_id')->nullable();
            $table->string('meeting_link')->nullable();
            $table->string('meeting_password')->nullable();
            $table->string('youtube_stream_id')->nullable();
            $table->timestamp('scheduled_at');
            $table->integer('duration_minutes')->default(60);
            $table->boolean('is_recorded')->default(false);
            $table->string('recording_url')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('is_free')->default(false);
            $table->enum('status', ['scheduled','live','ended','cancelled'])->default('scheduled');
            $table->integer('max_students')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('live_classes'); }
};
PHP;

$files['database/migrations/2024_01_15_000000_create_live_class_attendance_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('live_class_attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('live_class_id')->constrained('live_classes')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamp('joined_at');
            $table->timestamp('left_at')->nullable();
            $table->integer('duration_seconds')->default(0);
            $table->timestamps();
            
            $table->unique(['live_class_id', 'user_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('live_class_attendance'); }
};
PHP;

$files['database/migrations/2024_01_16_000000_create_notes_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('course_id')->nullable()->constrained('courses')->nullOnDelete();
            $table->foreignId('subject_id')->nullable()->constrained('course_subjects')->nullOnDelete();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title');
            $table->string('title_hi')->nullable();
            $table->text('description')->nullable();
            $table->enum('type', ['pdf','ppt','mindmap','handwritten','infographic']);
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
    public function down(): void { Schema::dropIfExists('notes'); }
};
PHP;

$files['database/migrations/2024_01_17_000000_create_note_bookmarks_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('note_bookmarks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('note_id')->constrained('notes')->cascadeOnDelete();
            $table->timestamps();
            
            $table->unique(['user_id', 'note_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('note_bookmarks'); }
};
PHP;

$files['database/migrations/2024_01_18_000000_create_current_affairs_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('current_affairs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_hi')->nullable();
            $table->longText('content');
            $table->longText('content_hi')->nullable();
            $table->string('category');
            $table->enum('type', ['daily','weekly','monthly']);
            $table->string('pdf_url')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamp('published_at');
            $table->boolean('is_featured')->default(false);
            $table->integer('views_count')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('current_affairs'); }
};
PHP;

$files['database/migrations/2024_01_19_000000_create_blog_categories_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_hi')->nullable();
            $table->string('slug')->unique();
            $table->string('color')->default('#38BDF8');
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('blog_categories'); }
};
PHP;

$files['database/migrations/2024_01_20_000000_create_blogs_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('blog_categories')->nullOnDelete();
            $table->string('title');
            $table->string('title_hi')->nullable();
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->text('excerpt_hi')->nullable();
            $table->longText('content');
            $table->longText('content_hi')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('tags')->nullable();
            $table->boolean('is_published')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->integer('views_count')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void { Schema::dropIfExists('blogs'); }
};
PHP;

$files['database/migrations/2024_01_21_000000_create_teachers_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users')->cascadeOnDelete();
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
            $table->decimal('commission_percentage', 5, 2)->default(70);
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('teachers'); }
};
PHP;

$files['database/migrations/2024_01_22_000000_create_coupons_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->text('description')->nullable();
            $table->enum('type', ['percentage','fixed']);
            $table->decimal('value', 10, 2);
            $table->decimal('min_order_amount', 10, 2)->default(0);
            $table->decimal('max_discount', 10, 2)->nullable();
            $table->integer('usage_limit')->nullable();
            $table->integer('used_count')->default(0);
            $table->timestamp('valid_from');
            $table->timestamp('valid_until');
            $table->boolean('is_active')->default(true);
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->json('applicable_courses')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('coupons'); }
};
PHP;

$files['database/migrations/2024_01_23_000000_create_orders_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('course_id')->nullable()->constrained('courses')->nullOnDelete();
            $table->foreignId('coupon_id')->nullable()->constrained('coupons')->nullOnDelete();
            $table->decimal('subtotal', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('tax', 10, 2)->default(0);
            $table->decimal('total', 10, 2);
            $table->enum('status', ['pending','paid','failed','cancelled','refunded'])->default('pending');
            $table->string('gst_number')->nullable();
            $table->string('billing_name');
            $table->string('billing_email');
            $table->string('billing_phone');
            $table->json('billing_address')->nullable();
            $table->string('invoice_number')->unique()->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('orders'); }
};
PHP;

$files['database/migrations/2024_01_24_000000_create_payments_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->enum('gateway', ['razorpay','phonepe','free']);
            $table->string('gateway_order_id')->nullable();
            $table->string('gateway_payment_id')->nullable();
            $table->string('gateway_signature')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('currency')->default('INR');
            $table->enum('status', ['pending','success','failed','refunded']);
            $table->string('payment_method')->nullable();
            $table->string('error_code')->nullable();
            $table->text('error_description')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('payments'); }
};
PHP;

$files['database/migrations/2024_01_25_000000_create_certificates_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('course_id')->nullable()->constrained('courses')->cascadeOnDelete();
            $table->foreignId('test_id')->nullable()->constrained('tests')->cascadeOnDelete();
            $table->enum('type', ['course_completion','test_achievement','excellence','participation']);
            $table->string('certificate_number')->unique();
            $table->timestamp('issued_at');
            $table->string('pdf_url')->nullable();
            $table->boolean('is_verified')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('certificates'); }
};
PHP;

$files['database/migrations/2024_01_26_000000_create_achievements_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_hi')->nullable();
            $table->text('description');
            $table->text('description_hi')->nullable();
            $table->string('icon');
            $table->string('color')->default('#38BDF8');
            $table->enum('type', ['badge','streak','rank','score','course']);
            $table->json('criteria');
            $table->integer('points')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('achievements'); }
};
PHP;

$files['database/migrations/2024_01_27_000000_create_user_achievements_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('user_achievements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('achievement_id')->constrained('achievements')->cascadeOnDelete();
            $table->timestamp('earned_at');
            $table->timestamps();
            
            $table->unique(['user_id', 'achievement_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('user_achievements'); }
};
PHP;

$files['database/migrations/2024_01_28_000000_create_discussions_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('discussions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('question_id')->nullable()->constrained('questions')->cascadeOnDelete();
            $table->foreignId('course_id')->nullable()->constrained('courses')->cascadeOnDelete();
            $table->foreignId('lesson_id')->nullable()->constrained('lessons')->cascadeOnDelete();
            $table->string('title');
            $table->longText('content');
            $table->integer('upvotes')->default(0);
            $table->integer('downvotes')->default(0);
            $table->integer('views')->default(0);
            $table->boolean('is_resolved')->default(false);
            $table->boolean('is_pinned')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void { Schema::dropIfExists('discussions'); }
};
PHP;

$files['database/migrations/2024_01_29_000000_create_discussion_replies_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('discussion_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('discussion_id')->constrained('discussions')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->longText('content');
            $table->boolean('is_answer')->default(false);
            $table->integer('upvotes')->default(0);
            $table->foreignId('parent_id')->nullable()->constrained('discussion_replies')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down(): void { Schema::dropIfExists('discussion_replies'); }
};
PHP;

$files['database/migrations/2024_01_30_000000_create_notifications_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('notifiable_type');
            $table->unsignedBigInteger('notifiable_id');
            $table->string('type');
            $table->text('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
            
            $table->index(['notifiable_type', 'notifiable_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('notifications'); }
};
PHP;

$files['database/migrations/2024_01_31_000000_create_announcements_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->enum('type', ['info','warning','success','error'])->default('info');
            $table->enum('target_role', ['all','student','teacher'])->default('all');
            $table->boolean('is_active')->default(true);
            $table->timestamp('expires_at')->nullable();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('announcements'); }
};
PHP;

$files['database/migrations/2024_01_32_000000_create_referrals_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('referrer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('referred_id')->unique()->constrained('users')->cascadeOnDelete();
            $table->enum('status', ['pending','completed'])->default('pending');
            $table->decimal('reward_amount', 8, 2)->default(0);
            $table->timestamp('rewarded_at')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('referrals'); }
};
PHP;

$files['database/migrations/2024_01_33_000000_create_leaderboard_entries_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('leaderboard_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('test_id')->nullable()->constrained('tests')->cascadeOnDelete();
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
    public function down(): void { Schema::dropIfExists('leaderboard_entries'); }
};
PHP;

$files['database/migrations/2024_01_34_000000_create_study_plans_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('study_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('exam_target');
            $table->date('exam_date')->nullable();
            $table->integer('daily_hours')->default(4);
            $table->enum('current_level', ['beginner','intermediate','advanced']);
            $table->json('plan_data');
            $table->boolean('ai_generated')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('study_plans'); }
};
PHP;

$files['database/migrations/2024_01_35_000000_create_bookmarks_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('bookmarkable_type');
            $table->unsignedBigInteger('bookmarkable_id');
            $table->timestamps();
            
            $table->unique(['user_id', 'bookmarkable_type', 'bookmarkable_id'], 'user_bookmark_unique');
        });
    }
    public function down(): void { Schema::dropIfExists('bookmarks'); }
};
PHP;

$files['database/migrations/2024_01_36_000000_create_downloads_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('note_id')->nullable()->constrained('notes')->nullOnDelete();
            $table->string('file_name');
            $table->string('file_url');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('downloads'); }
};
PHP;

$files['database/migrations/2024_01_37_000000_create_settings_table.php'] = <<<'PHP'
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->enum('type', ['text','textarea','boolean','number','json','file'])->default('text');
            $table->string('label');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('settings'); }
};
PHP;

// ==========================================
// MODELS
// ==========================================

$files['app/Models/UserProfile.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
PHP;

$files['app/Models/CourseCategory.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseCategory extends Model
{
    protected $guarded = [];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(CourseCategory::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(CourseCategory::class, 'parent_id');
    }
}
PHP;

$files['app/Models/CourseSubject.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseSubject extends Model
{
    protected $guarded = [];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'subject_id');
    }
}
PHP;

$files['app/Models/Lesson.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    protected $guarded = [];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(CourseSubject::class);
    }

    public function progress(): HasMany
    {
        return $this->hasMany(LessonProgress::class);
    }
}
PHP;

$files['app/Models/LessonProgress.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LessonProgress extends Model
{
    protected $guarded = [];
    protected $casts = ['completed_at' => 'datetime'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
PHP;

$files['app/Models/Enrollment.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Enrollment extends Model
{
    protected $guarded = [];
    protected $casts = [
        'enrolled_at' => 'datetime',
        'expires_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)
                     ->where(function($q) {
                         $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
                     });
    }
}
PHP;

$files['app/Models/TestSection.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestSection extends Model
{
    protected $guarded = [];

    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class, 'section_id');
    }
}
PHP;

$files['app/Models/Question.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Question extends Model
{
    protected $guarded = [];
    protected $casts = [
        'tags' => 'array',
        'is_active' => 'boolean',
    ];

    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(TestSection::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function scopeByDifficulty(Builder $query, string $difficulty): Builder
    {
        return $query->where('difficulty', $difficulty);
    }

    public function scopeByType(Builder $query, string $type): Builder
    {
        return $query->where('type', $type);
    }
}
PHP;

$files['app/Models/QuestionOption.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class QuestionOption extends Model
{
    protected $guarded = [];
    protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function scopeCorrect(Builder $query): Builder
    {
        return $query->where('is_correct', true);
    }
}
PHP;

$files['app/Models/TestAttempt.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class TestAttempt extends Model
{
    protected $guarded = [];
    protected $casts = [
        'started_at' => 'datetime',
        'submitted_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(AttemptAnswer::class, 'attempt_id');
    }

    public function scopeSubmitted(Builder $query): Builder
    {
        return $query->where('status', 'submitted');
    }

    public function scopeInProgress(Builder $query): Builder
    {
        return $query->where('status', 'in_progress');
    }
}
PHP;

$files['app/Models/AttemptAnswer.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttemptAnswer extends Model
{
    protected $guarded = [];
    protected $casts = [
        'selected_options' => 'array',
        'is_correct' => 'boolean',
        'is_marked_review' => 'boolean',
    ];

    public function attempt(): BelongsTo
    {
        return $this->belongsTo(TestAttempt::class, 'attempt_id');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
PHP;

$files['app/Models/LiveClass.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class LiveClass extends Model
{
    protected $guarded = [];
    protected $casts = [
        'scheduled_at' => 'datetime',
        'is_recorded' => 'boolean',
        'is_free' => 'boolean',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function attendance(): HasMany
    {
        return $this->hasMany(LiveClassAttendance::class);
    }

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->where('status', 'scheduled')->where('scheduled_at', '>', now());
    }

    public function scopeLive(Builder $query): Builder
    {
        return $query->where('status', 'live');
    }

    public function scopeFree(Builder $query): Builder
    {
        return $query->where('is_free', true);
    }
}
PHP;

$files['app/Models/LiveClassAttendance.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LiveClassAttendance extends Model
{
    protected $guarded = [];
    protected $casts = [
        'joined_at' => 'datetime',
        'left_at' => 'datetime',
    ];

    public function liveClass(): BelongsTo
    {
        return $this->belongsTo(LiveClass::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
PHP;

$files['app/Models/Note.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Note extends Model
{
    protected $guarded = [];
    protected $casts = [
        'is_free' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(CourseSubject::class);
    }

    public function scopeFree(Builder $query): Builder
    {
        return $query->where('is_free', true);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }
}
PHP;

$files['app/Models/CurrentAffair.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class CurrentAffair extends Model
{
    protected $guarded = [];
    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];

    public function scopeDaily(Builder $query): Builder
    {
        return $query->where('type', 'daily');
    }

    public function scopeWeekly(Builder $query): Builder
    {
        return $query->where('type', 'weekly');
    }

    public function scopeMonthly(Builder $query): Builder
    {
        return $query->where('type', 'monthly');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }
}
PHP;

$files['app/Models/Blog.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class Blog extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $casts = [
        'tags' => 'array',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)->where('published_at', '<=', now());
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }
}
PHP;

$files['app/Models/BlogCategory.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BlogCategory extends Model
{
    protected $guarded = [];

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
}
PHP;

$files['app/Models/Teacher.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Teacher extends Model
{
    protected $guarded = [];
    protected $casts = [
        'subject_specialization' => 'array',
        'bank_account' => 'array',
        'is_verified' => 'boolean',
        'is_featured' => 'boolean',
        'verified_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function courses(): HasManyThrough
    {
        return $this->hasManyThrough(Course::class, User::class, 'id', 'created_by', 'user_id', 'id');
    }
}
PHP;

$files['app/Models/Payment.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $guarded = [];
    protected $casts = [
        'metadata' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
PHP;

$files['app/Models/Order.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $guarded = [];
    protected $casts = [
        'billing_address' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
PHP;

$files['app/Models/Coupon.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Coupon extends Model
{
    protected $guarded = [];
    protected $casts = [
        'valid_from' => 'datetime',
        'valid_until' => 'datetime',
        'is_active' => 'boolean',
        'applicable_courses' => 'array',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function isValid(): bool
    {
        if (!$this->is_active) return false;
        if ($this->valid_from > now() || $this->valid_until < now()) return false;
        if ($this->usage_limit !== null && $this->used_count >= $this->usage_limit) return false;
        
        return true;
    }
}
PHP;

$files['app/Models/Certificate.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificate extends Model
{
    protected $guarded = [];
    protected $casts = [
        'issued_at' => 'datetime',
        'is_verified' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
PHP;

$files['app/Models/Achievement.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Achievement extends Model
{
    protected $guarded = [];
    protected $casts = [
        'criteria' => 'array',
    ];

    public function userAchievements(): HasMany
    {
        return $this->hasMany(UserAchievement::class);
    }
}
PHP;

$files['app/Models/UserAchievement.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAchievement extends Model
{
    protected $guarded = [];
    protected $casts = [
        'earned_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function achievement(): BelongsTo
    {
        return $this->belongsTo(Achievement::class);
    }
}
PHP;

$files['app/Models/Discussion.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discussion extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $casts = [
        'is_resolved' => 'boolean',
        'is_pinned' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(DiscussionReply::class);
    }
}
PHP;

$files['app/Models/DiscussionReply.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DiscussionReply extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $casts = [
        'is_answer' => 'boolean',
    ];

    public function discussion(): BelongsTo
    {
        return $this->belongsTo(Discussion::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(DiscussionReply::class, 'parent_id');
    }
}
PHP;

$files['app/Models/Announcement.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Announcement extends Model
{
    protected $guarded = [];
    protected $casts = [
        'is_active' => 'boolean',
        'expires_at' => 'datetime',
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)
                     ->where(function ($q) {
                         $q->whereNull('expires_at')
                           ->orWhere('expires_at', '>', now());
                     });
    }

    public function scopeForRole(Builder $query, string $role): Builder
    {
        return $query->whereIn('target_role', ['all', $role]);
    }
}
PHP;

$files['app/Models/Referral.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Referral extends Model
{
    protected $guarded = [];
    protected $casts = [
        'rewarded_at' => 'datetime',
    ];

    public function referrer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function referred(): BelongsTo
    {
        return $this->belongsTo(User::class, 'referred_id');
    }
}
PHP;

$files['app/Models/LeaderboardEntry.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeaderboardEntry extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }
}
PHP;

$files['app/Models/StudyPlan.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudyPlan extends Model
{
    protected $guarded = [];
    protected $casts = [
        'exam_date' => 'date',
        'plan_data' => 'array',
        'ai_generated' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
PHP;

$files['app/Models/Bookmark.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Bookmark extends Model
{
    protected $guarded = [];

    public function bookmarkable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
PHP;

$files['app/Models/Download.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Download extends Model
{
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function note(): BelongsTo
    {
        return $this->belongsTo(Note::class);
    }
}
PHP;

$files['app/Models/Setting.php'] = <<<'PHP'
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = [];

    public static function get(string $key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }
}
PHP;


foreach ($files as $path => $content) {
    file_put_contents("$dir/$path", trim($content) . "\n");
    echo "Created: $path\n";
}
echo "All files generated successfully!\n";
