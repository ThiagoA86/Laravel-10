<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Produtos</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <h1>Produtos</h1>
       <ul>
        @foreach ($produtos as $produto)
            <li><a href="http://localhost:8000/produtos/{{$produto->id}}">
                {{$produto->titulo}}</a></li>
        @endforeach
       </ul>
    </body>
</html>
