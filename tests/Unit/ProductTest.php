<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Discount;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_discount_applies_correctly()
    {

        $product = Product::factory()->create([
            'price' => 200,
        ]);


        $discount = Discount::factory()->create([
            'product_id' => $product->id,
            'percentage' => 20,
            'start_date' => now()->subDay(),
            'end_date' => now()->addDay(),
        ]);


        $product->refresh();

    
        $this->assertTrue($product->isDiscountActive());


        $expectedPrice = 200 - (200 * 0.2);
        $this->assertEquals($expectedPrice, $product->getDiscountedPrice());
    }
}
