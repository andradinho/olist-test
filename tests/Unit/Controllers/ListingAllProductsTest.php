<?php

namespace Tests\Unit\Controllers;

use PHPUnit\Framework\TestCase;

class ListingAllProductsTest extends TestCase
{

    public function testListingAllProductsSuccessfully()
    {
        $this->assertStatus(200);
    }
}
