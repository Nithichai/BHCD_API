<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserIDTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json('POST', '/userid/new', ['id' => 'xxx', 'esp' => '32']);
        $response
            ->assertStatus(201)
            ->assertJson([
                'status' => 'OK'
            ]);
    }
}
