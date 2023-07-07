<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class novoUsarioTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')


                            ->type("name", 'Iago')
                            ->type('input#email.form-control','tapgordo@gmail.com')
                            ->type('input#password.form-control','12345')
                            ->type('input#password-confirme.form-control','12345')
                                ->press('Register')
                                    ->assertPathIs('/home');

        });
    }
}
