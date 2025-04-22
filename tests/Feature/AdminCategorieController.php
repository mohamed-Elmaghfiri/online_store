<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Categorie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminCategorieControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_categories_for_authenticated_admin()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        Categorie::factory()->count(5)->create();

        $response = $this->actingAs($admin)->get(route('admin.categorie.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.categories.index');
        $response->assertViewHas('viewData');
        $this->assertCount(5, $response->viewData('viewData')['categories']);
    }

    public function test_index_redirects_unauthenticated_users()
    {
        $response = $this->get(route('admin.categorie.index'));

        $response->assertRedirect(route('login'));
    }
}
