@extends('layouts.default')
@section('titulo', 'Cadastrar cliente')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/clientes/create.css') }}">
@endsection

@section('menu')
    @component('layouts.components.menu', ['textContent' => 'Cancelar', 'routeName' => 'index'])
    @endcomponent
@endsection

@section('conteudo')
<div id="conteudo">
    <div id="headerCadastrarCliente">
        <h1>Cadastrar novo cliente</h1>
        <div id="separator"></div>
    </div>

    <form method="POST" action="{{ route('admin.cliente.store') }}" enctype="multipart/form-data" id="formCreateCliente">
        @csrf

        <div class="input-group">
            <input type="nome" name="nome" placeholder="Nome:" value="{{ old('nome')}}">
            <div class="erro">
                {{ $errors->has('nome') ? $errors->first('nome') : ''}}
            </div>
        </div>

        <div class="input-group">
            <input type="email" name="email" placeholder="E-mail:" value="{{ old('email')}}">
            <div class="erro">
                {{ $errors->has('email') ? $errors->first('email') : ''}}
            </div>
        </div>

        @component('layouts.components.buttonAnexarImagem')
        @endcomponent

        <div class="input-group telefone">
            <input type="text" name="telefone[]" placeholder="Telefone" value="{{ $cliente->telefone ?? old('telefone') }}">
            <div class="erro">
                {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}
            </div>
        </div>
        <div class="add-telefone" title="adicionar mais um telefone">
            <span>+</span>
        </div>

        <div class="input-group">
            <select name="tipoCliente">
                <option selected>Tipo de cliente</option>
                @forelse($tiposCliente as $tipoCliente)
                <option value="{{ $tipoCliente->id }}" {{ old('tipoCliente') == $tipoCliente->id ? 'selected' : '' }}>{{ $tipoCliente->tipoCliente }}</option>
                @empty
                @endforelse
            </select>
            <div class="erro">
                {{ $errors->has('tipoCliente') ? $errors->first('tipoCliente') : ''}}
            </div>
        </div>

        <button type="submit">Cadastrar</button>
    </form>
</div>
@endsection

@section('js')
<script>
    let input = document.getElementById('imagem');
    let fileName = document.getElementById('filename');

    input.addEventListener('change', function() {
        fileName.textContent = input.files.item('name').name;
    });
</script>

<script src="{{ asset('js/sendForm.js') }}"></script>
<script src="{{ asset('js/add-telefone.js') }}"></script>
@endsection
