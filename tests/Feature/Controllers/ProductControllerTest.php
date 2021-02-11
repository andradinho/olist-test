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

    public function testUpdatingProductName()
    {
        $product = Product::factory()->create();

        $newProduct = $product->toArray();
        $newProduct['name'] = 'New Product';

        $response = $this->put("/api/products/{$product->id}", $newProduct);
        $response->assertStatus(200);

        $this->assertDatabaseHas('products', ['name' => $newProduct['name']]);
    }

    public function testUpdatingProductPrice()
    {
        $product = Product::factory()->create();

        $newProduct = $product->toArray();
        $newProduct['price'] = 25;

        $response = $this->put("/api/products/{$product->id}", $newProduct);
        $response->assertStatus(200);

        $this->assertDatabaseHas('products', ['price' => $newProduct['price']]);
    }

    public function testDestroyProduct()
    {
        $product = Product::factory()->create();

        $response = $this->delete("/api/products/{$product->id}");
        $response->assertStatus(200);

        $this->assertDatabaseMissing('products', $product->toArray());
    }
}
