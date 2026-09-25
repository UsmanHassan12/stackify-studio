<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'label' => 'Facebook',
                'url' => '#',
                'icon_class' => 'fa fa-facebook',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'label' => 'Twitter',
                'url' => '#',
                'icon_class' => 'fa fa-twitter',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'label' => 'LinkedIn',
                'url' => '#',
                'icon_class' => 'fa fa-linkedin',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'label' => 'Instagram',
                'url' => '#',
                'icon_class' => 'fa fa-instagram',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($rows as $row) {
            SocialLink::updateOrCreate(
                ['label' => $row['label']],
                $row
            );
        }
    }
}
