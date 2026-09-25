<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $defaults = [
            'site_name' => 'Stackify Studio',
            'footer_tagline' => 'Engineering high-impact AI agents, LLM integrations, and modern intelligent software platforms.',
            'footer_address' => 'Islamabad, Pakistan',
            'footer_phone' => '+92 312 7535263',
            'footer_email' => 'info@stackifystudio.com',
            'whatsapp_number' => '+923127535263',
            'footer_hours' => 'Mon–Fri, 9am – 6pm PKT',
            'copyright_owner' => 'Stackify Studio',
            'default_meta_description' => 'Stackify Studio is a premier AI development & software engineering agency specializing in custom AI agents, LLM integrations, and modern platforms.',
            'public_site_label' => 'stackifystudio.com',
        ];

        foreach ($defaults as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
