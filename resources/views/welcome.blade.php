<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/script.js"></script>
    </head>
    <body class="antialiased">
        {{-- esse é um comentário do blade --}}
        <h1>{{$nome}}</h1>
        <img src="/img/banner.jpg"/>
    </body>
</html>
