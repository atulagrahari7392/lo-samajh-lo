<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'Lo Samajh Lo', 'type' => 'text', 'label' => 'Site Name'],
            ['key' => 'site_tagline', 'value' => 'India\'s Next-Gen Educational Platform', 'type' => 'text', 'label' => 'Site Tagline'],
            ['key' => 'contact_email', 'value' => 'support@losamajhlo.com', 'type' => 'text', 'label' => 'Contact Email'],
            ['key' => 'support_phone', 'value' => '+91-9876543210', 'type' => 'text', 'label' => 'Support Phone'],
            ['key' => 'gst_number', 'value' => '22AAAAA0000A1Z5', 'type' => 'text', 'label' => 'GST Number'],
            ['key' => 'razorpay_mode', 'value' => 'sandbox', 'type' => 'text', 'label' => 'Razorpay Mode'],
        ];

        foreach ($settings as $setting) {
            DB::table('settings')->updateOrInsert(
                ['key' => $setting['key']],
                [
                    'value' => $setting['value'],
                    'type' => $setting['type'],
                    'label' => $setting['label'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
