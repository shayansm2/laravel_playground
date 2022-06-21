<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_signup_successful()
    {
        $response = $this->post(
            'panel/signup',
            [
                'username' => 'shayansm',
                'email' => 'shayan.ssm@gmail.com',
                'password' => '12345ab',
                'password_confirmation' => '12345ab',
            ]
        );

        $response->assertStatus(200);
    }

    public function test_signup_no_username_provided()
    {
        $response = $this->post(
            'panel/signup',
            [
                'email' => 'shayan.ssm@gmail.com',
                'password' => '12345ab',
                'password_confirmation' => '12345ab',
            ]
        );

        $response->assertStatus(422);
    }

    public function test_signup_no_email_provided()
    {
        $response = $this->post(
            'panel/signup',
            [
                'username' => 'shayansm',
                'password' => '12345ab',
                'password_confirmation' => '12345ab',
            ]
        );

        $response->assertStatus(422);
    }

    public function test_signup_no_password_provided()
    {
        $response = $this->post(
            'panel/signup',
            [
                'username' => 'shayansm',
                'email' => 'shayan.ssm@gmail.com',
                'password_confirmation' => '12345ab',
            ]
        );

        $response->assertStatus(422);
    }

    public function test_signup_no_psasword_confirmation_provided()
    {
        $this->assertTrue(true);
    }

    public function test_signup_username_already_taken()
    {
        $this->assertTrue(true);
    }

    public function test_signup_email_already_taken()
    {
        $this->assertTrue(true);
    }

    public function test_signup_password_confirmation_does_not_match()
    {
        $this->assertTrue(true);
    }

    public function test_login_successful()
    {
        $this->assertTrue(true);
    }

    public function test_login_no_username_or_email_provided()
    {
        $this->assertTrue(true);
    }

    public function test_login_no_password_provided()
    {
        $this->assertTrue(true);
    }

    public function test_login_invalid_credentials()
    {
        $this->assertTrue(true);
    }
}
