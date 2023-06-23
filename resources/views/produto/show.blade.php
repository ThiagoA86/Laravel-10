<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @extends('layout.app')
        @section('title',$produto->titulo)
    </head>
    @section('content')
        <h1>Produto {{$produto->titulo}}</h1>
       <ul>

            <li>Referência: {{$produto->referencia}}</li>
            <li>Preço: {{$produto->preco}}</li>
            <li>Adicionado em: {{$produto->created_at}}</li>
       </ul>
       <p>{{$produto->descricao}}</p>
       <a href="javascript:history.go(-1)">Voltar</a>
    @endsection
</html>
