<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;

class LoginTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testLoginFail()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@donotexist.com')
                    ->type('password', 'admin')
                    ->press('Login')
                    ->assertPathIs('/login');
        });
    }

    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testLoginSuccess()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@hotmail.com')
                    ->type('password', 'admin')
                    ->press('Login')
                    ->assertPathIs('/');
        });
    }
}