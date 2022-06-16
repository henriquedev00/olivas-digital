@extends('layouts.default')
@section('titulo', 'Ver cliente')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/clientes/show.css') }}">
@endsection

@section('menu')
    @component('layouts.components.menu', ['textContent' => 'Voltar', 'routeName' => 'index'])
    @endcomponent
@endsection

@section('conteudo')
<div id="conteudo">
    <div id="headerShowCliente">
        <h1>Ver cliente</h1>
        <div id="separator"></div>
    </div>

    <form action="#" id="formShowCliente">
        @csrf

        <div id="imagemClienteContainer">
            <img src="{{ asset("storage/{$cliente->imagem}") }}" alt="imagem cliente" id="imagemCliente">
        </div>

        <input type="nome" value="{{ $cliente->nome ?? old('nome') }}" disabled>

        <input type="email" value="{{ $cliente->email ?? old('email') }}" disabled>

        @forelse($cliente->getTelefones as $key => $telefone)
        <div class="input-group">
            <input type="text" name="telefone[{{ $key }}]" placeholder="Telefone" value="{{ $telefone->telefone }}" disabled>
            <div class="erro">
                {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}
            </div>
        </div>
        @empty
        @endforelse

        <select disabled>
            <option>{{ $cliente->getTipoCliente->tipoCliente }}</option>
        </select>

        <a href="{{ route('admin.cliente.edit', ['id' => $cliente->id]) }}">Editar</a>
    </form>
</div>
@endsection
