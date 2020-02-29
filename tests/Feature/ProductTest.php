<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /** @test */
    public function a_product_can_be_added()
    {
        $response = $this->post('/products',[
            'name' => 'Test name',
            'description' => 'Test Description',
            'quantity' => 11,

        ]);
        $this->assertCount(1,Product::all());
    }
}
