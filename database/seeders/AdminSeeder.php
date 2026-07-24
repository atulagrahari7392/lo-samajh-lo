<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@losamajhlo.com'],
            [
                'name' => 'Super Admin',
                'phone' => '9999999999',
                'password' => Hash::make('Admin@123'),
                'role' => 'admin',
                'email_verified_at' => now(),
                'phone_verified_at' => now(),
                'referral_code' => Str::random(8),
                'is_active' => true,
            ]
        );

        $admin->profile()->firstOrCreate([
            'full_name' => 'Super Admin',
        ]);
        
        // Optionally assign 'super-admin' spatie role if Roles are seeded
        // $admin->assignRole('super-admin');
    }
}
