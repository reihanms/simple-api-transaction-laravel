<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TransactionControllerTest extends TestCase
{
    public function testTransactionCreation()
    {
        // Prepare the request data
        $data = [
            'id' => 1,
            'customer_name' => 'Ahmad',
            'address_id' => 1,
            'product_id' => 1,
            'price' => 10000,
            'quantity' => 3,
            'payment_method_id' => 1,
        ];

        // Send a POST request to the API endpoint
        $response = $this->post('/api/transaction', $data);

        // Assert that the response has a status code of 201 (Created)
        $response->assertStatus(201);

        // Assert that the response contains the expected JSON data
        $response->assertJson([
            'message' => 'Transaction created successfully',
        ]);
    }
}
