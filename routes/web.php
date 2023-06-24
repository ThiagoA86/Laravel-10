<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ProdutosController;
use GuzzleHttp\Psr7\Uri;
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
Route::get('/contato',[ContatoController::class, 'Index']);
Route::resource('/produtos', ProdutosController::class);
Route::post('produtos/create', [ProdutosController::class, 'store']);
