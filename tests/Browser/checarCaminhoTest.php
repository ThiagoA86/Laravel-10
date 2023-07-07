<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class checarCaminhoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExemplo()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/produtos')
                        ->click('a','Produtos')
                            ->assertPathIs('/produtos');

        });
    }
    public function testExemplo2()
    {
        $this->browse(function (Browser $browser) {
                       $browser->visit('/contato')
                                    ->click('a','Contato')
                                        ->assertPathIs('/contato');

        });
    }
    public function testExemplo3()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                        ->assertSee('a','Log in')
                            ->click('a','Login')
                                ->assertPathIs('/login');

        });
    }
    public function testExemplo4()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                        ->assertSee('a','Registrar')
                            ->click('a','Registrar')
                                ->assertPathIs('/register');

        });
    }
}
