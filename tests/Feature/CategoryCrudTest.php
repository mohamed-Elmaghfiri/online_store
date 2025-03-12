<?php

namespace Tests\Feature;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CategoryCrudTest extends TestCase

{
    use RefreshDatabase;
    // use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
  
     public function test_category_index(){
        $admin = User::factory()->create(); // Create a user
        $this->actingAs($admin); 
        $response = $this->get(route('admin.categorie.index')); // Using the named route
        $response->assertStatus(200);
        $response->assertViewIs('admin.categories.index'); // Correct view name
    }
    public function test_create_category(){
        $admin = User::factory()->create(); // Create a user
        $this->actingAs($admin); 
        $Datacategory=[
            "name"=>'exemplename',
            "description"=>"exempleDescription"
        ];
        $response = $this->post(route('admin.categorie.store'),$Datacategory);
        $response->assertStatus(302);
        $response->assertRedirect();




    }
    public function test_edit_categorie(){
        $admin = User::factory()->create(); // Create a user
        $this->actingAs($admin); 
        $category = Categorie::factory()->create();
        $response = $this->get(route('admin.categorie.edit', ['id' => $category->id]));
        // Using the named route
        $response->assertStatus(200);
        $response->assertViewIs('admin.categories.edit');

    }

    public function test_update_categorie(){
        $admin = User::factory()->create(); // Create a user
        $this->actingAs($admin); 
        $category = Categorie::factory()->create();
        $updatedData = [
            'name' => 'New Name',
            'description' => 'New Description'
        ];

        $response = $this->put(route('admin.categorie.update', $category->id), $updatedData);
        $response->assertStatus(302);
        $response->assertRedirect();

    }
    public function test_delete_categorie(){
        $admin = User::factory()->create(); // Create a user
        $this->actingAs($admin); 
        $category = Categorie::factory()->create();
        $response = $this->delete(route('admin.categorie.delete', $category->id));
        $response->assertStatus(302);
        $response->assertRedirect();
    }
}