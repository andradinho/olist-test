<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;

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
}
