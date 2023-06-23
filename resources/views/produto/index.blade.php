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
       <ul>
        @foreach ($produtos as $produto)
            <li><a href="http://localhost:8000/produtos/{{$produto->id}}">
                {{$produto->titulo}}</a></li>
        @endforeach
       </ul>
   @endsection
</html>
