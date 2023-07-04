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
    public function extras(Request $request){
        try
        {
            $produto=Produto::with('comComentarios')->find(13);
            echo "<h2>$produto->titulo</h2>";
            echo "<p>$produto->descricao<p>";
            echo "<h3>Comentarios</h3>";
            foreach($produto->comComentarios as $comentario)
            {
                echo "<h4>$comentario->usuario</h4>";
                echo "<p>$comentario->comentario</p>";
                echo "<p>Classificacao: $comentario->classificassao</p>";
                echo "<p>".date('d/m/Y h:i:s',strtotime($comentario->update_at))."</p>";
                echo "<hr>";
            }
        }
        catch(\Exception $e){
            dd($e);
        }
        /*
        //First e FirstOrFail
        try{
            $produto = Produto::where(function($buscar)use ($request){
                $buscar->where('titulo','like','%Nobreak%');
                $buscar->where('descricao','like','%Nobreak%');
            })->FirstOrFail();
            echo "<h2>".$produto->titulo. " - R$ ".number_format($produto->preco,2,",",".")."</h2>";
        }
        catch(\Exception $e){
            dd($e);
        }
        /*
        //Inspeção do SQL gerada
        try{
            $produtos = Produto::where(function($buscar)use ($request){
                $buscar->where('titulo','like','%Nobreak%');
                $buscar->orwhere('descricao','like','%Nobreak%');
            })->toSql();
            echo($produtos);
        }
        catch(\Exception $e){
            dd($e);
        }

        /*
         //Filtro de Busca
         $produtos=Produto::where('titulo','like','%Nobreak%')->orWhere('descricao','like','%Nobreak%')->get();
         foreach($produtos as $produto)
         {
              echo "<h2>".$produto->titulo. " - R$ ".number_format($produto->preco,2,",",".")."</h2>";
         }
         /*

        //Acessando atributos especificos
        $produtos=Produto::orderBy('id','DESC')->get(array('titulo','preco'));
       foreach($produtos as $produto)
       {
            echo "<h2>".$produto->titulo. " - R$ ".number_format($produto->preco,2,",",".")."</h2>";
       }
       /*
       //Query de conta mais complexa
       $contar = Produto::where('preco','>',1000)->count();
       echo $contar . " produtos maior que R$1000,00";
       //Funçoes do Eloquent
       /*
       $menor_preco=Produto::all()->min('preco');
       $maior_preco=Produto::all()->max('preco');
       $media_preco=Produto::all()->avg('preco');
       $contar=Produto::all()->count();
       $soma=Produto::all()->sum('preco');
       echo "Prodito de menor preço R$".number_format($menor_preco,2,",",".")."</br>";
       echo "Produto de mais caro preço R$".number_format($maior_preco,2,",",".")."</br>";
       echo "Produto de medio preço R$".number_format($media_preco,2,",",".")."</br>";
       echo "Para ".$contar. " produtos.</br>";
       echo "Soma dos preços R$".number_format($soma,2,",",".")."</br>";
       /*
       //Produtos na Ordem do Eloquent Extra
       /*$produtos=Produto::orderBy('id','DESC')->get();
       foreach($produtos as $produto)
       {
            echo "<h2>".$produto->id. " - ".$produto->titulo."</h2>";
       }
       */

    }
}
