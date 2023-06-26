<!DOCTYPE html>
<html>
     <!--View do Formalario de Criação de Novos Produtos. Recebe App.Blade.PHP-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @extends('layout.app')
        @section('title','Adicionar um produto')

    </head>
    @section('content')
        <h1>Criar um novo produto</h1>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>

                @endforeach
            </ul>
        </div>
        @endif
        {{Form::open(['method'=>'post'])}}
        {{Form::label('referencia','Referência')}}
        {{Form::text('referencia','',['class'=>'form-control','required','placeholder'=>'Referência'])}}
        {{Form::label('titulo', 'Título')}}
        {{Form::text('titulo','',['class'=>'form-control','required','placeholder'=>'Título'])}}
        {{Form::label('descricao', 'Descrição')}}
        {{Form::textarea('descricao','',['rows'=>3,'class'=>'form-control','required','placeholder'=>'Descrição'])}}
        {{Form::label('preco', 'Preço')}}
        {{Form::text('preco','',['class'=>'form-control','required','placeholder'=>'Preço'])}}
        <br/>
        {{Form::submit('Cadastrar!',['class'=>'btn btn-primary'])}}
        {{Form::close()}}
   @endsection
</html>
