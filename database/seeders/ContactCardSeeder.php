<?php

namespace Database\Seeders;

use App\Models\ContactCard;
use Illuminate\Database\Seeder;

class ContactCardSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'title' => 'Visit Our Office',
                'line_primary' => 'Islamabad, Pakistan',
                'line_secondary' => 'Engineering & AI Operations HQ',
                'icon_class' => 'fa fa-map-marker',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Call Us',
                'line_primary' => '+92 312 7535263',
                'line_secondary' => 'Mon–Fri, 9am – 6pm PKT',
                'icon_class' => 'fa fa-phone',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Email Us',
                'line_primary' => 'info@stackifystudio.com',
                'line_secondary' => 'We reply within 24 hours',
                'icon_class' => 'fa fa-envelope',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($rows as $row) {
            ContactCard::updateOrCreate(
                ['title' => $row['title']],
                $row
            );
        }
    }
}
