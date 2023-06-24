<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        return view('produto.show',array('produto'=>$produto));
    }
    public function edit($id)
    {
        $produto = Produto::find($id);
        return view('produto.edit',array('produto'=>$produto));
    }
    public function create()
    {

        return view('produto.create');
    }
    public function store (Request $request)
    {
        $this->validate( $request, ['referencia' => 'required|unique:produtos|min:3','titulo' => 'required|min:3']);
        $produto = new Produto();
        $produto->referencia = $request->input('referencia');
        $produto->titulo = $request->input('titulo');
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');
         // //Usa o metodo do verbo Insert do SQL
        if($produto->save()){
          return redirect('produtos');
        }
    }
    public function update($id,Request $request)
    {
        $produto=Produto::find($id);
        $this->validate( $request, ['referencia' => 'required|min:3','titulo' => 'required|min:3']);
        if($request->hasFile('fotoproduto'))
        {
            $imagem = $request->file('fotoproduto');
            $nomearquivo = md5($id).".".$imagem->getClientOriginalExtension();
            $request->file('fotoproduto')->move(public_path('./img/produtos/'),$nomearquivo);
        }
        $produto->referencia = $request->input('referencia');
        $produto->titulo = $request->input('titulo');
        $produto->descricao = $request->input('descricao');
        $produto->preco = $request->input('preco');
        // //Usa o metodo do verbo UPDATE do SQL
        $produto->save();
        //Envia mensagem para Session e faz refresh.
        Session::flash('mensagem','Produto alterado com sucesso;');
        return redirect()->back();
    }
    public function destroy($id)
    {
        //Procura o ID no Model
        $produto=Produto::find($id);
        //Usa o metodo do verbo DELETE do SQL
        $produto->delete();
        //Envia mensagem para Session e faz refresh.
        Session::flash('mensagem','Produto excluído com sucesso;');
        return redirect()->back();
    }
}
