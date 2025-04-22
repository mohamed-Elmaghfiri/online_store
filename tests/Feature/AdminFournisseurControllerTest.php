<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Fournisseur;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminFournisseurControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_see_fournisseur_list(): void
    {
        $admin = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'password' => bcrypt('password'),
            'role'     => 'admin',
        ]);

        // Must include every non-nullable column
        Fournisseur::create([
            'raison_social' => 'Company X',
            'description'   => 'Company X Description',
            'adresse'       => '123 Street',
            'tele'          => '0600000000',
            'email'         => 'companyx@example.com',
        ]);

        $response = $this->actingAs($admin)
            ->get('/admin/fournisseurs');

        $response->assertStatus(200)
            ->assertSee('Company X');
    }

    public function test_admin_can_create_fournisseur(): void
    {
        $admin = User::create([
            'name'     => 'Admin',
            'email'    => 'admin2@example.com',
            'password' => bcrypt('password'),
            'role'     => 'admin',
        ]);

        $data = [
            'raison_social' => 'New Fournisseur',
            'description'   => 'New Fournisseur Description',
            'adresse'       => '456 Av. Test',
            'tele'          => '0700000000',
            'email'         => 'newfournisseur@example.com',
        ];

        $response = $this->actingAs($admin)
            ->post('/admin/fournisseurs', $data);

        $response->assertRedirect('/admin/fournisseurs');
        $this->assertDatabaseHas('fournisseurs', [
            'raison_social' => 'New Fournisseur',
            'email'         => 'newfournisseur@example.com',
        ]);
    }
}
