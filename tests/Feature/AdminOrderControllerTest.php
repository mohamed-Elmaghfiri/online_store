<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminOrderControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_see_order_list(): void
    {
        $admin = User::create([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'password' => bcrypt('password'),
            'role'     => 'admin',
        ]);

        // Create an order (status must match your DB enum/allowed values)
        Order::create([
            'user_id' => $admin->id,
            'total'   => 100.00,
            'status'  => 'Packed',
        ]);

        $response = $this->actingAs($admin)
            ->get('/admin/orders');

        $response->assertStatus(200)
            ->assertSee('Packed');
    }

    public function test_admin_can_update_order_status(): void
    {
        $admin = User::create([
            'name'     => 'Admin',
            'email'    => 'admin2@example.com',
            'password' => bcrypt('password'),
            'role'     => 'admin',
        ]);

        $order = Order::create([
            'user_id' => $admin->id,
            'total'   => 150.00,
            'status'  => 'Packed',
        ]);

        $response = $this->actingAs($admin)
            ->put("/orders/{$order->id}/status", [
                'status' => 'Packed',
            ]);

        // Should redirect back to the orders index
        $response->assertRedirect('/admin/orders');
        $this->assertDatabaseHas('orders', [
            'id'     => $order->id,
            'status' => 'Packed',
        ]);
    }
}
