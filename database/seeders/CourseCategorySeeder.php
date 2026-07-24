<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'BA/BSc/BCom',
            'MA/MSc/MCom',
            'UGC NET',
            'SSC',
            'Banking',
            'Railway',
            'UPSC',
            'CUET',
            'Teaching',
            'Police',
            'State PCS'
        ];

        foreach ($categories as $category) {
            DB::table('course_categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
