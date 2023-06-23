<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produto.index',array('produtos'=>$produtos));
    }
    public function show($id)
    {
        $produto = Produto::find($id);
        echo "<pre>";
        print_r($produto);
        echo "</pre>";
    }
}
