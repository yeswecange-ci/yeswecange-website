<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/admin')->assertRedirect('/login');
    }

    public function test_non_admin_user_is_forbidden(): void
    {
        $user = User::factory()->create(); // is_admin = false par défaut

        $this->actingAs($user)->get('/admin')->assertForbidden();
    }

    public function test_admin_user_reaches_the_dashboard(): void
    {
        $admin = User::factory()->admin()->create();

        $this->assertTrue($admin->is_admin, 'Le flag is_admin doit être persisté (régression seeder).');

        $this->actingAs($admin)->get('/admin')->assertOk();
    }

    public function test_non_admin_cannot_reach_leads(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->get('/admin/leads')->assertForbidden();
    }

    public function test_all_back_office_pages_render_for_an_admin(): void
    {
        $admin = User::factory()->admin()->create();

        $pages = [
            '/admin',
            '/admin/leads',
            '/admin/services',
            '/admin/services/create',
            '/admin/certifications',
            '/admin/certifications/create',
            '/admin/values',
            '/admin/values/create',
            '/admin/legal',
        ];

        foreach ($pages as $page) {
            $this->actingAs($admin)->get($page)->assertOk();
        }
    }
}
