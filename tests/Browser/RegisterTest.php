<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class RegisterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_register()
    {
        $user = User::factory()->make();
        $this->browse(function (Browser $browser) use ($user){
            $browser->visit('/register')
                ->assertSee('Регистрация')
                ->type('name', $user->name)
                ->type('email', $user->email)
                ->type('password', $user->password)
                ->type('password_confirmation', $user->password)
                ->press('Зарегистрироваться')
                ->assertPathIs('/');
        });
    }
}
