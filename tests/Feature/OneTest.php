<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OneTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->getJson('/api');

        $response
            ->assertStatus(200)
            ->assertJson([
                'name' => 'Abigail',
                'state' => 'CA',
            ]);
    }
}
