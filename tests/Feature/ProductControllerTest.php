<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_index()
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
        $response->assertViewIs('product.index');
    }

    public function test_product_show()
    {
        $product = Product::factory()->create();
        $response = $this->get('/products/' . $product->id);
        $response->assertStatus(200);
        $response->assertViewIs('product.show');
        $response->assertViewHas('viewData', function ($viewData) use ($product) {
            return $viewData['product']->id === $product->id;
        });
    }
}
