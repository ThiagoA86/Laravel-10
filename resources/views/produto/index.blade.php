<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @extends('layout.app')
        @section('title','Listagem de produtos')

    </head>
    @section('content')
        <h1>Produtos</h1>
        @if(Session::has('mensagem'))
            <div class="alert alert-success">{{Session::get('mensagem')}}</div>
        @endif
        <div class="row">
            @foreach ($produtos as $produto)
            <div class="col-md-3">
              <h4>{{$produto->titulo}}</h4>
                @if(file_exists("./img/produtos/" . md5($produto->id) . ".jpg"))
                  <a class='thumbnail' href="{{ url('produtos/'.$produto->id) }}">
                    {{Html::image(asset("img/produtos/" . md5($produto->id) . ".jpg"))}}
                  </a>
                @else
                  <a class='thumbnail' href="{{ url('produtos/'.$produto->id) }}">
                    {{$produto->titulo}}
                  </a>
                @endif
                {{Form::open(['route'=>['produtos.destroy',$produto->id],'method'=>'DELETE'])}}
                <a class='btn btn-warning' href=" {{url('produtos/'.$produto->id.'/edit')}} ">Editar</a>
                {{Form::submit('Excluir',['class'=>'btn btn-danger'])}}
                {{Form::close()}}
            </div>
            @endforeach
        </div>
        @endsection
</html>
