<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(['email' => 'admin@example.com'], [
            'name' => 'Admin User',
            'password' => 'admin123',
            'is_admin' => true,
        ]);

        $defaults = [
            'site_name' => 'EMASUITE',
            'site_tagline' => 'ERP software built for growth',
            'home_hero_title' => "ERP Software Built for Africa's Growth",
            'home_hero_description' => 'Streamline and automate your operations with a cloud ERP solution designed for businesses across Tanzania and Africa.',
            'home_primary_button_text' => 'Login',
            'home_primary_button_url' => '/login',
            'about_title' => 'Cloud ERP suite built for smarter, leaner operations',
            'about_description' => 'EMASUITE helps businesses streamline operations across logistics, retail, manufacturing, education, and more using affordable, modern technology.',
            'about_mission' => 'To help African businesses grow with digital innovation.',
            'about_vision' => 'A connected future for modern business operations across Africa.',
            'contact_phone' => '+255 618 330 260',
            'contact_email' => 'info@emasuite.co.tz',
            'contact_address' => 'Kijitonyama, Millennium Tower, Dar es Salaam, Tanzania',
            'footer_copyright' => '© Copyright EMA ERP All Rights Reserved',
            'footer_description' => 'Cloud ERP Suite to help SMEs automate industry-specific operations for businesses across Africa.',
            'facebook_url' => '#',
            'instagram_url' => '#',
            'x_url' => '#',
            'linkedin_url' => '#',
            'youtube_url' => '#',
        ];

        foreach ($defaults as $key => $value) {
            SiteSetting::set($key, $value, 'content');
        }

        foreach ([
            'home' => ['name' => 'Home Page', 'title' => "ERP Software Built for Africa's Growth"],
            'services' => ['name' => 'Services Page', 'title' => 'Our Services'],
            'about' => ['name' => 'About Page', 'title' => 'Why EMASUITE?'],
            'contact' => ['name' => 'Contact Page', 'title' => 'Contact EMASUITE'],
            'service-details' => ['name' => 'Service Details Page', 'title' => 'Service Details'],
            'starter-page' => ['name' => 'Starter Page', 'title' => 'Starter Page'],
            'login' => ['name' => 'Login Page', 'title' => 'Login'],
            'forgotpassword' => ['name' => 'Forgot Password Page', 'title' => 'Forgot Password'],
        ] as $slug => $page) {
            $record = Page::firstOrCreate(
                ['slug' => $slug],
                ['name' => $page['name'], 'content' => ['title' => $page['title']], 'is_published' => true]
            );

            if ($record->value('title') === $page['name']) {
                $record->update(['content' => ['title' => $page['title']]]);
            }
        }
    }
}
