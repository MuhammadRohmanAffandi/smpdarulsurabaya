<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginFailedTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->post('/login', [
            'email' => 'errrrr900@gmail.com',
            'password' => 'salahsalah'
        ]);

        $response->assertStatus(302);
        $this->assertGuest();
        $response->assertSessionHasErrors();
    }
}
