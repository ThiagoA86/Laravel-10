<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class checarCaminhoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/produtos')->press('Buscar');

        $response->assertStatus(200);
        /*
        $response = $this->get('/produtos'); // Rota ou caminho da view que você deseja verificar

        $response->assertViewHas('index'); // Substitua 'nome_da_view' pelo nome da view que você espera encontrar
        */
    }
    public function test_example2()
    {
        $response = $this->get('/contato');

        $response->assertStatus(200);

    }
    public function test_example3()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);

    }
    public function test_example4()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);

    }
}
