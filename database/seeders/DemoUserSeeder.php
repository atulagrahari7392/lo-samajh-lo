<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DemoUserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name'              => 'Super Admin',
                'email'             => 'admin@test.com',
                'password'          => Hash::make('password'),
                'role'              => 'admin',
                'is_active'         => true,
                'email_verified_at' => now(),
                'phone'             => '9999900001',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Test Teacher',
                'email'             => 'teacher@test.com',
                'password'          => Hash::make('password'),
                'role'              => 'teacher',
                'is_active'         => true,
                'email_verified_at' => now(),
                'phone'             => '9999900002',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'name'              => 'Test Student',
                'email'             => 'student@test.com',
                'password'          => Hash::make('password'),
                'role'              => 'student',
                'is_active'         => true,
                'email_verified_at' => now(),
                'phone'             => '9999900003',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ];

        foreach ($users as $user) {
            $exists = DB::table('users')->where('email', $user['email'])->first();
            if ($exists) {
                DB::table('users')->where('email', $user['email'])->update([
                    'password'          => $user['password'],
                    'role'              => $user['role'],
                    'is_active'         => true,
                    'email_verified_at' => now(),
                    'updated_at'        => now(),
                ]);
                $this->command->info("✅ Updated: {$user['email']} (role: {$user['role']})");
            } else {
                DB::table('users')->insert($user);
                $this->command->info("✅ Created: {$user['email']} (role: {$user['role']})");
            }
        }

        $this->command->info('');
        $this->command->info('🎉 Demo users ready! Login credentials:');
        $this->command->info('   Admin   → admin@test.com / password');
        $this->command->info('   Teacher → teacher@test.com / password');
        $this->command->info('   Student → student@test.com / password');
    }
}
