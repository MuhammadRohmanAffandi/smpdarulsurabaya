<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginSuccessSiswaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->post('/login', [
            'email' => 'test@gmail.com',
            'password' => 'asdfasdf',
        ]);

        $response->assertStatus(302);
        $this->assertAuthenticated();
        $response->assertRedirect('/pembayaranspp');
    }
}
