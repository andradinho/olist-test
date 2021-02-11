<?php

namespace Tests\Feature\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
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
}
