<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    @hasSection('css')
        @yield('css')
    @endif

    <title>@yield('titulo') | Olivas Digital</title>
</head>
<body>
    @auth
        @include('layouts.header')
    @endauth

    @hasSection('menu')
        <menu id="menu">
            @yield('menu')
        </menu>
    @endif

    @hasSection('conteudo')
        <main id="main">
            @yield('conteudo')
        </main>
    @endif

    @hasSection('js')
        @yield('js')
    @endif
</body>
</html>
