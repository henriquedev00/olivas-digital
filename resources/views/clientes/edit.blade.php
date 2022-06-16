@extends('layouts.default')
@section('titulo', 'Editar cliente')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/clientes/edit.css') }}">
@endsection

@section('menu')
    @component('layouts.components.menu', ['textContent' => 'Cancelar', 'routeName' => 'index'])
    @endcomponent
@endsection

@section('conteudo')
<div id="conteudo">
    <div id="headerEditarCliente">
        <h1>Editar cliente</h1>
        <div id="separator"></div>
    </div>

    <form method="POST" action="{{ route('admin.cliente.update', ['id' => $cliente->id]) }}" enctype="multipart/form-data" id="formEditCliente">
        @csrf
        @method('PUT')

        <div id="imagemClienteContainer">
            <img src="{{ asset("storage/{$cliente->imagem}") }}" alt="imagem cliente" id="imagemCliente">
        </div>

        <div class="input-group">
            <input type="nome" name="nome" placeholder="Nome:" value="{{ $cliente->nome ?? old('nome') }}">
            <div class="erro">
                {{ $errors->has('nome') ? $errors->first('nome') : ''}}
            </div>
        </div>

        <div class="input-group">
            <input type="email" name="email" placeholder="E-mail:" value="{{ $cliente->email ?? old('email') }}">
            <div class="erro">
                {{ $errors->has('email') ? $errors->first('email') : ''}}
            </div>
        </div>

        @component('layouts.components.buttonAnexarImagem', ['imagem' => $cliente->imagem])
        @endcomponent

        <div id="telefonesAll">
            @forelse($cliente->getTelefones as $key => $telefone)
            <div class="input-group telefone">
                <input type="text" name="telefone[{{ $telefone->id }}]" placeholder="Telefone" value="{{ $telefone->telefone }}" class="telefone-item">
                <div class="erro">
                    {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}
                </div>
            </div>
            @empty
            @endforelse
        </div>

        <div class="actions-telefone">
            <div class="add-telefone" title="adicionar mais um telefone">
                <span>+</span>
            </div>
        </div>
        

        <div class="input-group">
            <select name="tipoCliente">
                <option>Tipo de cliente</option>
                @forelse($tiposCliente as $tipoCliente)
                    <option value="{{ $tipoCliente->id }}" {{ (($cliente->getTipoCliente->id ?? old('tipoCliente')) == $tipoCliente->id ? 'selected' : '') }}>{{ $tipoCliente->tipoCliente }}</option>
                @empty
                @endforelse
            </select>
            <div class="erro">
                {{ $errors->has('tipoCliente') ? $errors->first('tipoCliente') : ''}}
            </div>
        </div>

        <button type="submit">Salvar</button>
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('js/edit-telefone.js') }}"></script>
@endsection
