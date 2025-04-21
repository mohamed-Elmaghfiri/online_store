<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Fournisseur;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function public_users_can_view_the_product_index(): void
    {
        $response = $this->get(route('product.index'));

        $response->assertStatus(200)
            ->assertViewIs('product.index');
    }

    /** @test */
    public function authenticated_users_can_view_the_product_index(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get(route('product.index'));

        $response->assertStatus(200)
            ->assertViewIs('product.index');
    }

    /** @test */
    public function public_users_can_view_a_single_product(): void
    {
        // Ensure valid foreign keys
        $categorie   = Categorie::factory()->create();
        $fournisseur = Fournisseur::factory()->create();

        $product = Product::factory()->create([
            'categorie_id'   => $categorie->id,
            'fournisseur_id' => $fournisseur->id,
        ]);

        $response = $this->get(route('product.show', ['id' => $product->id]));

        $response->assertStatus(200)
            ->assertViewIs('product.show')
            ->assertViewHas('viewData', function (array $viewData) use ($product) {
                return isset($viewData['product'])
                    && $viewData['product']->id === $product->id;
            });
    }

    /** @test */
    public function authenticated_users_can_view_a_single_product(): void
    {
        $user = User::factory()->create();

        // Ensure valid foreign keys
        $categorie   = Categorie::factory()->create();
        $fournisseur = Fournisseur::factory()->create();

        $product = Product::factory()->create([
            'categorie_id'   => $categorie->id,
            'fournisseur_id' => $fournisseur->id,
        ]);

        $response = $this->actingAs($user)
            ->get(route('product.show', ['id' => $product->id]));

        $response->assertStatus(200)
            ->assertViewIs('product.show')
            ->assertViewHas('viewData', function (array $viewData) use ($product) {
                return isset($viewData['product'])
                    && $viewData['product']->id === $product->id;
            });
    }
}
