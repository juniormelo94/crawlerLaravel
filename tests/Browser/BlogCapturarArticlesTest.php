<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;

class BlogCapturarArticlesTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testCapturarSuccess()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', 'admin@hotmail.com')
                    ->type('password', 'admin')
                    ->press('Login')
                    ->assertPathIs('/')
                    ->type('search', 'financeiro')
                    ->press('Capturar')
                    ->assertPathIs('/search')
                    ->assertSee('Artigos relacionados a financeiro, foram salvos com sucesso!')
                    ->visit('/articles')
                    ->type("[type='search']", 'financ')
                    ->assertSee('financeiros');
        });
    }
}