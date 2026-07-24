<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Platform Identity
    |--------------------------------------------------------------------------
    */
    'name'     => env('APP_NAME', 'Lo Samajh Lo'),
    'tagline'  => 'Learn Smarter, Score Higher | स्मार्ट पढ़ें, ऊंचा स्कोर करें',
    'version'  => '1.0.0',
    'locale'   => env('APP_LOCALE', 'en'),
    'currency' => 'INR',
    'gst_rate' => 18, // percentage

    /*
    |--------------------------------------------------------------------------
    | AI Configuration
    |--------------------------------------------------------------------------
    */
    'ai' => [
        'provider'      => env('AI_PROVIDER', 'openai'),   // openai | gemini
        'openai_model'  => env('OPENAI_MODEL', 'gpt-4o'),
        'gemini_model'  => env('GEMINI_MODEL', 'gemini-1.5-pro'),
        'max_tokens'    => env('OPENAI_MAX_TOKENS', 2048),

        // Rate limits (requests per minute per user)
        'rate_limits' => [
            'free'  => 10,
            'paid'  => 100,
            'admin' => 1000,
        ],

        // AI feature toggles
        'features' => [
            'tutor'            => true,
            'doubt_solver'     => true,
            'study_planner'    => true,
            'quiz_generator'   => true,
            'notes_generator'  => true,
            'performance_coach'=> true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Test Engine Configuration
    |--------------------------------------------------------------------------
    */
    'test_engine' => [
        'auto_save_interval'  => 30,    // seconds
        'warning_time'        => 300,   // seconds before end to show warning (5 min)
        'tab_switch_limit'    => 3,     // max tab switches before warning
        'max_attempts'        => null,  // null = unlimited (can override per test)
        'default_negative'    => 0.25,  // default negative marking fraction
    ],

    /*
    |--------------------------------------------------------------------------
    | Payment Configuration
    |--------------------------------------------------------------------------
    */
    'payment' => [
        'gateway'         => env('PAYMENT_GATEWAY', 'razorpay'), // razorpay | phonepe
        'currency'        => 'INR',
        'min_amount'      => 1,      // minimum order amount in INR
        'free_threshold'  => 0,      // orders below this are free
        'gst_inclusive'   => false,  // false = GST added on top
        'commission'      => [
            'teacher_default' => 70, // percentage teacher gets
            'platform_cut'    => 30,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Notification Channels
    |--------------------------------------------------------------------------
    */
    'notifications' => [
        'channels' => [
            'email'    => true,
            'sms'      => env('MSG91_API_KEY') ? true : false,
            'whatsapp' => env('MSG91_API_KEY') ? true : false,
            'push'     => env('FIREBASE_SERVER_KEY') ? true : false,
            'in_app'   => true,
        ],
        'class_reminder_minutes' => 30, // remind X minutes before class
    ],

    /*
    |--------------------------------------------------------------------------
    | Live Classes
    |--------------------------------------------------------------------------
    */
    'live_classes' => [
        'platforms'          => ['zoom', 'youtube'],
        'default_platform'   => 'zoom',
        'recording_enabled'  => true,
        'max_duration_hours' => 3,
        'early_join_minutes' => 10, // allow join X minutes before start
    ],

    /*
    |--------------------------------------------------------------------------
    | Leaderboard Configuration
    |--------------------------------------------------------------------------
    */
    'leaderboard' => [
        'top_n'        => 100,       // number of entries to show
        'reset_day'    => 'monday',  // weekly reset day
        'periods'      => ['weekly', 'monthly', 'all_time'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Referral System
    |--------------------------------------------------------------------------
    */
    'referral' => [
        'enabled'        => true,
        'reward_amount'  => 50,   // INR credit for referrer on first paid enrollment
        'code_length'    => 8,
    ],

    /*
    |--------------------------------------------------------------------------
    | Achievements / Gamification
    |--------------------------------------------------------------------------
    */
    'achievements' => [
        'enabled'      => true,
        'streak_bonus' => [7 => 'Weekly Warrior', 30 => 'Monthly Master', 100 => 'Centurion'],
    ],

    /*
    |--------------------------------------------------------------------------
    | File Upload Limits (MB)
    |--------------------------------------------------------------------------
    */
    'uploads' => [
        'avatar'     => 2,
        'pdf'        => 50,
        'video'      => 500,
        'image'      => 5,
        'ppt'        => 50,
        'allowed_mimes' => [
            'pdf'   => ['application/pdf'],
            'image' => ['image/jpeg', 'image/png', 'image/webp'],
            'video' => ['video/mp4', 'video/webm'],
            'ppt'   => ['application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.presentationml.presentation'],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | SEO Defaults
    |--------------------------------------------------------------------------
    */
    'seo' => [
        'default_title'       => 'Lo Samajh Lo - India\'s #1 Learning Platform',
        'default_description' => 'Best online platform for UGC NET, SSC, Banking, UPSC, Teaching Exams and University Courses. Study smarter with AI-powered tools.',
        'default_keywords'    => 'online education, UGC NET, SSC preparation, banking exam, UPSC, teaching exam, BA BSc BCom notes, competitive exam',
        'og_image'            => '/images/og-image.jpg',
        'twitter_handle'      => '@LoSamajhLo',
    ],

    /*
    |--------------------------------------------------------------------------
    | Cache TTL (seconds)
    |--------------------------------------------------------------------------
    */
    'cache' => [
        'home_page'      => 300,   // 5 minutes
        'course_list'    => 600,   // 10 minutes
        'leaderboard'    => 1800,  // 30 minutes
        'settings'       => 3600,  // 1 hour
        'current_affairs'=> 86400, // 1 day
    ],

    /*
    |--------------------------------------------------------------------------
    | Exam Categories (used for filtering and categorization)
    |--------------------------------------------------------------------------
    */
    'exam_categories' => [
        'graduation'   => ['BA', 'BSc', 'BCom', 'BEd', 'DElEd', 'CUET'],
        'pg'           => ['MA', 'MSc', 'MCom', 'MEd'],
        'competitive'  => [
            'UGC NET', 'JRF', 'UPPSC', 'SSC CGL', 'SSC CHSL', 'SSC MTS',
            'IBPS PO', 'IBPS Clerk', 'SBI PO', 'SBI Clerk',
            'RRB NTPC', 'RRB Group D', 'RRB JE',
            'CTET', 'UPTET', 'Super TET', 'KVS', 'NVS',
            'UPPSC', 'BPSC', 'RPSC', 'MPPSC', 'HPSC',
            'UP Police', 'Delhi Police', 'Rajasthan Police',
        ],
    ],

];
