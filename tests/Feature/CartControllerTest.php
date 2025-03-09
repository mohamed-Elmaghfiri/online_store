<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CartControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_cart_index()
    {
        $response = $this->get('/cart');
        $response->assertStatus(200);
        $response->assertViewIs('cart.index');
    }

    public function test_add_to_cart()
    {
        $product = Product::factory()->create();
        $response = $this->post('/cart/add/' . $product->id, ['quantity' => 1]);
        $response->assertRedirect('/cart');
        $this->assertEquals(1, session('products')[$product->id]);
    }

    public function test_delete_cart()
    {
        $product = Product::factory()->create();
        session(['products' => [$product->id => 1]]);
        $response = $this->post('/cart/delete');
        $response->assertRedirect();
        $this->assertEmpty(session('products'));
    }

    public function test_purchase()
    {
        $user = User::factory()->create(['balance' => 1000]);
        $product = Product::factory()->create(['price' => 100, 'quantity_store' => 10]);
        session(['products' => [$product->id => 1]]);
        $this->actingAs($user);

        $response = $this->get('/cart/purchase');
        $response->assertStatus(200);
        $response->assertViewIs('cart.purchase');
        $this->assertDatabaseHas('orders', ['user_id' => $user->id, 'total' => 100]);
        $this->assertDatabaseHas('items', ['product_id' => $product->id, 'quantity' => 1]);
        $this->assertEquals(900, $user->fresh()->balance);
        $this->assertEquals(9, $product->fresh()->quantity_store);
    }
}
