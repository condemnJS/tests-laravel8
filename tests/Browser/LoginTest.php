<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_login()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Логин')
                ->assertTitle('Логин')
                ->type('email', 'gizat.sultan@mail.ru')
                ->type('password', '123123')
                ->check('remember_token')
                ->press('Авторизироваться')
                ->assertPathIs('/');
        });
    }
}
