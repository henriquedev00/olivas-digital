@extends('layouts.default')
@section('titulo', 'Erro')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/erro.css') }}">
@endsection

@section('menu')
    @component('layouts.components.menu', ['textContent' => 'Voltar', 'routeName' => 'index'])
    @endcomponent
@endsection

@section('conteudo')
    <div id="conteudo">
        <h1>Erro inesperado</h1>
        @isset($mensagem)
            <p id="mensagem">{{ $mensagem }}</p>
        @endisset
    </div>
@endsection
