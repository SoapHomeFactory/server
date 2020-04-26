<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Hash;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogingANewUserWithoutCsrf()
    {
        $user = factory(\App\User::class)->create([
          'password' => Hash::make('MySecret')
        ]);

        $response = $this->withHeaders([
            "X-Web-App" => 'test'
          ])->json('POST', '/login', [
            'email' => $user->email,
            'password' => 'MySecret'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure(['user', 'token']);
    }


    public function testRegisteringNewUser()
    {
        $headers = [
          'X-Web-App' => 'test'
        ];

        $payload = [
          'name' => 'New user',
          'email' => 'user@me.com',
          'password' => 'MySecret',
          'password_confirmation' => 'MySecret'
        ];

        $response = $this->withHeaders($headers)
          ->json('POST', '/register', $payload);

        $response->assertStatus(201);
        $response->assertJsonStructure(['user', 'token']);
        $this->assertDatabaseHas('users', [
          'name' => $payload['name']
        ]);
    }
}
