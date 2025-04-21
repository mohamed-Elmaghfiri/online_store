<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\Fournisseur;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CartControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_calculate_total_price(): void
    {
        // Prepare related models
        $categorie   = Categorie::factory()->create();
        $fournisseur = Fournisseur::factory()->create();

        // Create three products with explicit prices & foreign keys
        $p1 = Product::factory()->create([
            'id'              => 1,
            'price'           => 10.00,
            'categorie_id'    => $categorie->id,
            'fournisseur_id'  => $fournisseur->id,
        ]);
        $p2 = Product::factory()->create([
            'id'              => 2,
            'price'           => 20.00,
            'categorie_id'    => $categorie->id,
            'fournisseur_id'  => $fournisseur->id,
        ]);
        $p3 = Product::factory()->create([
            'id'              => 3,
            'price'           => 30.00,
            'categorie_id'    => $categorie->id,
            'fournisseur_id'  => $fournisseur->id,
        ]);

        $products = collect([$p1, $p2, $p3]);

        $quantities = [
            1 => 2,
            2 => 1,
            3 => 3,
        ];

        $expectedTotal = (10.00 * 2) + (20.00 * 1) + (30.00 * 3);

        $calculatedTotal = Product::sumPricesByQuantities($products, $quantities);

        $this->assertEquals($expectedTotal, $calculatedTotal);
    }
}
