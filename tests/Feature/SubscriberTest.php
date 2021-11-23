<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriberTest extends TestCase
{
//    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->post('/api/test1');

        $response->assertStatus(200);
    }
    public function test_example2()
    {
        $response = $this->post('/api/test2');

        $response->assertStatus(200);
    }
}
