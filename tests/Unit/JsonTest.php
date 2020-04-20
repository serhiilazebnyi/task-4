<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JsonTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testProductsList()
    {
        $response = $this->postJson('/api/products/new', ['data' => '{"name":"Mega"}']);

        $response->assertStatus(200);
    }
}
