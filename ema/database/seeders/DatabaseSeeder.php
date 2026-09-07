<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Service;
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
        User::query()->updateOrCreate(['email' => 'sadothjosephat136@gmail.com'], [
            'name' => 'Admin',
            'password' => 'admin123',
            'is_admin' => true,
        ]);

        $defaults = [
            'site_name' => 'EMASUITE',
            'site_tagline' => 'Enterprise Management and Automation',
            'home_hero_title' => 'ERP Software Built for You',
            'home_hero_description' => 'Streamline and automate processes, creating a leaner, more accurate and efficient operation.',
            'home_primary_button_text' => 'Login',
            'home_primary_button_url' => '/login',
            'about_title' => 'EMASUITE - Enterprise Management and Automation',
            'about_description' => 'EMASUITE is Africa enterprise application software, helping companies of all sizes and in all industries run at their best on one cloud platform.',
            'about_mission' => 'To help Enterprises and their Subsidiaries transition to a modern, data-driven and productive workplace, at the country and international level.',
            'about_vision' => 'To become Africa leading intelligence enterprise by helping businesses harness their data faster and more effectively.',
            'contact_phone' => '+255 618 330 260',
            'contact_email' => 'info@emasuite.co.tz',
            'contact_address' => 'HEADQUARTERS: TANZANIA OFFICE, Kijitonyama, Millenium Tower Tower 2, 19th Floor, Room 1906, Dar es Salaam, Tanzania. GLOBAL HQ OFFICE: EMASUITE INC., Delaware, USA (@The Green, Ste A, Dover, DE 19901)',
            'footer_copyright' => '© Copyright EMA ERP All Rights Reserved',
            'footer_description' => 'Cloud ERP Suite to help SMEs automate industry specific operations including Courier, Logistics, Retail, Manufacturing and all sectors. Product of @Emasuite.',
            'facebook_url' => 'https://www.facebook.com/share/19kPXwHu9S/?mibextid=wwXIfr',
            'instagram_url' => 'https://www.instagram.com/emasuite',
            'x_url' => 'https://x.com/emasuite',
            'linkedin_url' => 'https://www.linkedin.com/company/emasuite/posts/?feedView=all',
            'youtube_url' => 'https://www.youtube.com/channel/UCgWau6SH48M9PdoR1OAw3pQ',
        ];

        foreach ($defaults as $key => $value) {
            SiteSetting::set($key, $value, 'content');
        }

        foreach ([
            'home' => ['name' => 'Home Page', 'title' => 'ERP Software Built for You', 'intro' => 'Streamline and automate processes, creating a leaner, more accurate and efficient operation.'],
            'services' => ['name' => 'Services Page', 'title' => 'Focus Industries', 'intro' => 'Industry-specific ERP Suite designed for SMEs, catering to a wide range of sectors and business workflows.'],
            'about' => ['name' => 'About Page', 'title' => 'About Us', 'intro' => 'Focus on what matters most.'],
            'contact' => ['name' => 'Contact Page', 'title' => 'Contact', 'intro' => 'Contact us using the following form.'],
            'service-details' => ['name' => 'Service Details Page', 'title' => 'Service Details'],
            'starter-page' => ['name' => 'Starter Page', 'title' => 'Starter Page'],
            'login' => ['name' => 'Login Page', 'title' => 'Login'],
            'forgotpassword' => ['name' => 'Forgot Password Page', 'title' => 'Forgot Password'],
        ] as $slug => $page) {
            $record = Page::firstOrCreate(
                ['slug' => $slug],
                ['name' => $page['name'], 'content' => array_filter(['title' => $page['title'], 'intro' => $page['intro'] ?? null]), 'is_published' => true]
            );

            if ($record->value('title') === $page['name']) {
                $record->update(['content' => ['title' => $page['title']]]);
            }
        }

        $services = [
            ['title' => 'Transportation & Logistics', 'description' => 'EMASUITE Transportation Management offers a comprehensive platform for businesses to seamlessly oversee all transportation aspects of their supply chains.', 'icon' => 'bi-truck'],
            ['title' => 'Courier Services', 'description' => 'Courier and delivery management software for courier companies and distribution industries, with reporting, billing, and operational control.', 'icon' => 'bi-box-seam'],
            ['title' => 'Restaurant & Hospitality', 'description' => 'Business systems for bars and restaurants to manage operations while responding to changing customer needs and rising expenses.', 'icon' => 'bi-cup-hot'],
            ['title' => 'Warehouse Management', 'description' => 'Warehouse management software that improves stock information, tracking, financial accuracy, and standards of handling.', 'icon' => 'bi-building'],
            ['title' => 'Clearing and Forwarding', 'description' => 'Freight forwarding software that automates freight processes, eliminates manual paperwork, and reduces operational costs.', 'icon' => 'bi-globe2'],
            ['title' => 'Manufacturing', 'description' => 'Customizable manufacturing software based on your specific requirements for manufacturing companies in Africa.', 'icon' => 'bi-gear'],
            ['title' => 'Education', 'description' => 'School and college ERP software with e-learning management and administration capabilities.', 'icon' => 'bi-mortarboard'],
            ['title' => 'Insurance', 'description' => 'Advanced insurance software created specifically for insurance professionals, agents, and brokers.', 'icon' => 'bi-shield-check'],
            ['title' => 'Retail', 'description' => 'A complete system covering inventory and order management, ecommerce, CRM and marketing, POS, business intelligence, and financials.', 'icon' => 'bi-shop'],
        ];

        foreach ($services as $sortOrder => $service) {
            Service::updateOrCreate(['title' => $service['title']], $service + ['sort_order' => $sortOrder, 'is_active' => true]);
        }
    }
}
