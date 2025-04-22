<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Categorie;
use App\Models\Fournisseur;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_discount_applies_correctly(): void
    {
        // Create required related models
        $categorie   = Categorie::factory()->create();
        $fournisseur = Fournisseur::factory()->create();

        // Create a product with known price and valid foreign keys
        $product = Product::factory()->create([
            'price'           => 200,
            'categorie_id'    => $categorie->id,
            'fournisseur_id'  => $fournisseur->id,
        ]);

        // Directly create a Discount (no factory)
        $discount = Discount::create([
            'product_id' => $product->id,
            'percentage' => 20,
            'start_date' => now()->subDay(),
            'end_date'   => now()->addDay(),
        ]);

        $product->refresh();

        $this->assertTrue(
            $product->isDiscountActive(),
            'Expected isDiscountActive() to return true when discount is in date range.'
        );

        $expected = 200 * (1 - 0.20);
        $this->assertEquals($expected, $product->getDiscountedPrice());
    }
}
