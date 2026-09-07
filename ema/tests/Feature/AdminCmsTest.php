<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class AdminCmsTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_from_admin_dashboard(): void
    {
        $response = $this->get('/admin/dashboard');

        $response->assertRedirect('/admin/login');
    }

    public function test_public_login_form_redirects_admin_to_dashboard(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => 'admin123',
            'is_admin' => true,
        ]);

        $this->post('/admin/login', [
            'email' => $user->email,
            'password' => 'admin123',
        ])->assertRedirect('/admin/dashboard');
    }

    public function test_admin_can_request_and_complete_password_reset(): void
    {
        Notification::fake();
        $user = User::factory()->create(['email' => 'admin@example.com', 'is_admin' => true]);

        $this->post('/forgotpassword', ['email' => $user->email])
            ->assertRedirect()
            ->assertSessionHas('status');
        Notification::assertSentTo($user, ResetPassword::class);

        $token = Password::broker()->createToken($user);

        $this->get('/reset-password/'.$token.'?email='.urlencode($user->email))
            ->assertOk()
            ->assertSee('Create a new password');

        $this->post('/reset-password', [
            'token' => $token,
            'email' => $user->email,
            'password' => 'new-admin-password',
            'password_confirmation' => 'new-admin-password',
        ])->assertRedirect('/login');

        $this->assertTrue(Hash::check('new-admin-password', $user->fresh()->password));
    }

    public function test_non_admin_cannot_request_a_password_reset(): void
    {
        $user = User::factory()->create(['email' => 'user@example.com', 'is_admin' => false]);

        $this->post('/forgotpassword', ['email' => $user->email])
            ->assertRedirect()
            ->assertSessionHas('status');

        $this->assertDatabaseCount('password_reset_tokens', 0);
    }

    public function test_legacy_public_login_post_also_redirects_admin_to_dashboard(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => 'admin123',
            'is_admin' => true,
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'admin123',
        ])->assertRedirect('/admin/dashboard');
    }

    public function test_authenticated_admin_cannot_be_sent_to_home_from_admin_login(): void
    {
        $user = User::factory()->create([
            'is_admin' => true,
        ]);

        $this->actingAs($user)
            ->get('/admin/login')
            ->assertRedirect('/admin/dashboard');
    }

    public function test_admin_can_manage_custom_page_sections(): void
    {
        $user = User::factory()->create(['is_admin' => true]);
        $page = Page::create(['slug' => 'about', 'name' => 'About', 'content' => ['title' => 'About']]);

        $response = $this->actingAs($user)->postJson('/admin/pages/about/visual', [
            'action' => 'add-section',
            'title' => 'New section',
            'body' => 'Custom page content.',
        ]);

        $response->assertOk();
        $sectionId = $page->fresh()->value('custom_sections.0.id');

        $this->actingAs($user)->postJson('/admin/pages/about/visual', [
            'action' => 'update-section',
            'section_id' => $sectionId,
            'title' => 'Updated section',
            'body' => 'Updated content.',
        ])->assertOk();

        $this->get('/about')->assertSee('Updated section')->assertSee('Updated content.');

        $this->actingAs($user)->postJson('/admin/pages/about/visual', [
            'action' => 'delete-section',
            'section_id' => $sectionId,
        ])->assertOk();

        $this->get('/about')->assertDontSee('Updated section');
    }

    public function test_admin_can_save_visual_overrides_for_public_content(): void
    {
        $user = User::factory()->create(['is_admin' => true]);
        Page::create(['slug' => 'about', 'name' => 'About', 'content' => ['title' => 'About']]);

        $this->actingAs($user)->postJson('/admin/pages/about/visual', [
            'action' => 'override-element',
            'selector' => 'body > main > section',
            'text' => 'Updated public content',
            'background_color' => '#123456',
            'text_color' => '#abcdef',
        ])->assertOk();

        $this->get('/about')
            ->assertSee('visual-overrides')
            ->assertSee('Updated public content')
            ->assertSee('#123456');
    }

    public function test_visual_page_editor_renders_for_each_public_page(): void
    {
        $user = User::factory()->create(['is_admin' => true]);

        foreach (['home', 'services', 'about', 'contact', 'service-details', 'starter-page', 'login', 'forgotpassword'] as $slug) {
            Page::create(['slug' => $slug, 'name' => ucfirst($slug), 'content' => ['title' => ucfirst($slug)]]);
        }

        foreach (['home', 'services', 'about', 'contact', 'service-details', 'starter-page', 'login', 'forgotpassword'] as $slug) {
            $this->actingAs($user)
                ->get('/admin/pages/'.$slug.'/visual')
                ->assertOk()
                ->assertSee('website-preview')
                ->assertSee('element-value');
        }
    }

    public function test_admin_can_view_dashboard_and_dynamic_site_content(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'is_admin' => true,
        ]);

        SiteSetting::set('home_hero_title', 'My New Hero Title');
        SiteSetting::set('home_hero_description', 'Updated home description');
        SiteSetting::set('about_title', 'Our updated story');

        Service::create([
            'title' => 'Inventory Control',
            'description' => 'Keep stock accurate and visible.',
            'icon' => 'bi-box-seam',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        $this->actingAs($user)
            ->get('/admin/dashboard')
            ->assertOk();

        $this->get('/')
            ->assertSee('My New Hero Title')
            ->assertSee('Updated home description')
            ->assertSee('Our updated story')
            ->assertSee('Inventory Control');
    }
}
