<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ProdutosController;
use GuzzleHttp\Psr7\Uri;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Rota que passaram pelo ContatoController e acionaram os metodos CAP 2.
Route::get('/contato',[ContatoController::class, 'Index']);
//Rota que passaram pelo ContatoController Enviar e acionaram os metodos CAP 6.
Route::post('/contato/enviar',[ContatoController::class, 'enviar']);
//Rota que passaram pelo ProdutoController e acionaram os metodos CAP 3.
Route::get('/adicionar-produtos', [ProdutosController::class, 'create']);
Route::post('/adicionar-produtos', [ProdutosController::class, 'store']);
Route::get('/produtos/{id}/editar', [ProdutosController::class, 'edit']);
Route::resource('/produtos', ProdutosController::class);
//Route::post('produtos/create', [ProdutosController::class, 'store']);
Route::post('produtos/buscar', [ProdutosController::class, 'buscar']);

Route::auth();

Route::get('/home', [HomeController::class, 'Index']);

//Rota Extra
Route::get('/extras', [ProdutosController::class, 'extras']);

