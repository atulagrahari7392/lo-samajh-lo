<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        $achievements = [
            ['name' => 'First Test', 'description' => 'Completed your first test', 'type' => 'badge', 'points' => 10],
            ['name' => 'Score 90%+', 'description' => 'Scored 90% or above in a test', 'type' => 'score', 'points' => 50],
            ['name' => '7-day Streak', 'description' => 'Maintained a 7-day learning streak', 'type' => 'streak', 'points' => 20],
            ['name' => '30-day Streak', 'description' => 'Maintained a 30-day learning streak', 'type' => 'streak', 'points' => 100],
            ['name' => 'Enroll First Course', 'description' => 'Enrolled in your first course', 'type' => 'course', 'points' => 10],
            ['name' => 'Complete Course', 'description' => 'Completed a course', 'type' => 'course', 'points' => 50],
            ['name' => 'Top 10 Rank', 'description' => 'Achieved a top 10 rank in leaderboard', 'type' => 'rank', 'points' => 200],
        ];

        foreach ($achievements as $ach) {
            DB::table('achievements')->insert([
                'name' => $ach['name'],
                'description' => $ach['description'],
                'icon' => 'default_icon.png',
                'type' => $ach['type'],
                'criteria' => json_encode(['required' => 1]),
                'points' => $ach['points'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
