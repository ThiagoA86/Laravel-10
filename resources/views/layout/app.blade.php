<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Olá Laravel - @yield('title')</title>
        {{Html::style('css/bootstrap.min.css')}}
        {{Html::style('css/bootstrap-theme.min.css')}}


    </head>
        <body>
            <div class="container">
               @yield('content')
            </div>

        {{Html::script('js/jquery-3.7.0.min.js')}}
        {{Html::script('js/bootstrap.min.js')}}
        </body>
</html>
