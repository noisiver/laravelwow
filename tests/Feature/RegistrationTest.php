<?php

namespace Tests\Feature;

use Anhskohbo\NoCaptcha\Facades\NoCaptcha;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    /**
     * Can view registration form
     *
     * @return void
     */
    public function test_registration_form_can_be_rendered()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Can create account
     *
     * @return void
     */

    public function test_new_players_can_register()
    {
        // prevent validation error on captcha
        NoCaptcha::shouldReceive('verifyResponse')
            ->once()
            ->andReturn(true);

        // provide hidden input for your 'required' validation
        NoCaptcha::shouldReceive('display')
            ->zeroOrMoreTimes()
            ->andReturn('<input type="hidden" name="g-recaptcha-response" value="1" />');

        $response = $this->json('POST','/register', [
            'username' => 'testerr',
            'email' => 'testerr@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'g-recaptcha-response' => '1',
        ]);

        $this->assertTrue(true);

        $response->assertRedirect('/');
    }
}
