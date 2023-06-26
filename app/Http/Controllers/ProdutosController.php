<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;

class ProdutosController extends Controller
{
    //Controller dos Produtos Metodos Desenvolvidos no Cap 3.
    public function index()
    {
        $produtos = Produto::paginate(4);
        return view('produto.index',array('produtos'=>$produtos,'busca'=>null));
    }
    public function show($id)
    {
        $produto = Produto::find($id);
        return view('produto.show',array('produto'=>$produto));
    }
    public function edit($id)
    {
        if(Auth::check())
        {
            $produto = Produto::find($id);
            return view('produto.edit',array('produto'=>$produto));
        }
        else{
            return redirect('login');
        }
    }
    public function create()
    {
        if(Auth::check()){
            return view('produto.create');
        }
        else{
            return redirect('login');
        }

    }
    public function store (Request $request)
    {
        if(Auth::check()){
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
        else{
            return redirect('login');
        }
    }
    public function update($id,Request $request)
    {
        if(Auth::check())
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
        else{
            return redirect('login');
        }
    }
    public function destroy($id)
    {
        if(Auth::check())
        {
            //Procura o ID no Model
            $produto=Produto::find($id);
            //Usa o metodo do verbo DELETE do SQL
            $produto->delete();
            //Envia mensagem para Session e faz refresh.
            Session::flash('mensagem','Produto excluído com sucesso;');
            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }

    public function buscar(Request $request)
    {
        //Procura o Retorna o titulo e descrição parecida na classe no Model Produto
        $produtos=Produto::where('titulo','LIKE',
        '%'.$request->input('busca').'%')->
        orwhere('descricao','LIKE','%'.$request->input('busca').'%')->paginate(4);
        //Retorna a view com o resultado
        return view('produto.index',array('produtos'=>$produtos,'busca'=>$request->input('busca')));

    }
}
