<?php

namespace Tests\Feature;

use App\Http\Requests\OrderRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        $request = [
            'delivery_method_id' => 1,
            'address_id' => 1,
            'payment_method_id' => 1,
            'coupon_id' => 0,
            'user_id' => 4,
            'products' => [
                [
                    'product_id' => 1,
                    'quantity' => 1,
                    'product_option_id' => 1
                ]
            ],
            'pay_from_wallet'   => 0
        ];

        $response = $this->postJson('/api/order/add', $request);


        $this->assertDatabaseHas('orders', [
            'delivery_method_id' => 1,
            'address_id' => 1,
            'payment_method_id' => 1,
            'user_id' => 4,
        ]);
    }
}
