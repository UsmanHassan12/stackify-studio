<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'test@admin.com'],
            [
                'name' => 'Administrator',
                'username' => 'Admin',
                'password' => '123123',
            ]
        );

        $this->call([
            ProjectSeeder::class,
            PostSeeder::class,
            ServiceSeeder::class,
            FaqSeeder::class,
            ContactCardSeeder::class,
            SocialLinkSeeder::class,
            SettingsSeeder::class,
        ]);
    }
}
