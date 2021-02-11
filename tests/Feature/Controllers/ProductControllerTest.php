<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testUrl()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testAllProductList()
    {
        $response = $this->get('/api/products');

        $response->assertStatus(200);
    }

    public function testProductById()
    {
        $product = Product::factory()->create();

        $response = $this->get("/api/products/{$product->id}");
       
        $response->assertStatus(200);
    }

    public function testCreateNewProduct()
    {
        $category = Category::factory()->create();

        $newProduct = [
            'name' => 'New Product',
            'category_id' => $category->id,
            'price' => 10.90,
        ];

        $response = $this->post('/api/products', $newProduct);

        $response->assertStatus(201);

        $this->assertDatabaseHas('products', $newProduct);
    }
}
