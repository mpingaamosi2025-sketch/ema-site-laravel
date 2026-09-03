<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('site_settings')) {
            $defaultValues = [
                'site_name' => 'EMASUITE',
                'site_tagline' => 'ERP software built for growth',
                'home_hero_title' => "ERP Software Built for Africa's Growth",
                'home_hero_description' => 'Streamline and automate your operations with a cloud ERP solution designed for businesses across Tanzania and Africa.',
                'home_primary_button_text' => 'Login',
                'home_primary_button_url' => '/login',
                'about_title' => 'Cloud ERP suite built for smarter, leaner operations',
                'about_description' => 'EMASUITE helps businesses streamline operations across logistics, retail, manufacturing, education, and more using affordable, modern technology.',
                'contact_phone' => '+255 618 330 260',
                'contact_email' => 'info@emasuite.co.tz',
                'contact_address' => 'Kijitonyama, Millennium Tower, Dar es Salaam, Tanzania',
                'footer_copyright' => '© Copyright EMA ERP All Rights Reserved',
                'footer_description' => 'Cloud ERP Suite to help SMEs automate industry-specific operations for businesses across Africa.',
            ];

            foreach ($defaultValues as $key => $value) {
                if (! SiteSetting::query()->where('key', $key)->exists()) {
                    SiteSetting::set($key, $value, 'content');
                }
            }
        }
    }
}
