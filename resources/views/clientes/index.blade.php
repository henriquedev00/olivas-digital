@extends('layouts.default')
@section('titulo', 'Ver clientes')

@section('css')
<link rel="stylesheet" href="{{ asset('css/clientes/index.css') }}">
@endsection

@section('menu')
    @component('layouts.components.menu', ['textContent' => 'Cadastrar cliente', 'routeName' => 'create'])
    @endcomponent
@endsection

@section('conteudo')
<div id="conteudo">
    <ul id="header">
        <li id="headerClienteImagem">Imagem</li>
        <li>Nome</li>
        <li>E-mail</li>
        <li>Tipo de cliente</li>
        <li>Telefone</li>
        <li id="headerClienteAcoes">Ações</li>
    </ul>
    @forelse($clientes as $cliente)
        <ul class="rowCliente">
            <li class="rowClienteImagem">
                <img src="{{ asset("storage/{$cliente->imagem}") }}" alt="imagem cliente" class="imgClienteImagem">
            </li>

            <li>{{ $cliente->nome }}</li>

            <li>{{ $cliente->email }}</li>

            <li>{{ $cliente->getTipoCliente->tipoCliente }}</li>

            <li>
                {{-- {{ $cliente->getTelefones->first()->telefone }} --}}
                <a class="modal-open" data-route={{ route("admin.telefones.index", ['clienteId' => $cliente->id]) }} data-id="{{ $cliente->id }}"  href="#">Ver Mais</a>
            </li>

            <li class="rowClienteAcoes">
                <a href="{{ route('admin.cliente.edit', ['id' => $cliente->id]) }}">Editar</a>
                <form method="POST" action="{{ route('admin.cliente.destroy', ['id' => $cliente->id]) }}" id="deleteCliente{{ $cliente->id }}">
                    @csrf
                    @method('DELETE')
                    <a href="#" onclick="deleteCliente({{ $cliente->id }})">Excluir</a>
                </form>
            </li>
        </ul>
        <div class="row-cliente-mobile">
            <div class="rowClienteImagem">
                <img src="{{ asset("storage/{$cliente->imagem}") }}" alt="imagem cliente" class="imgClienteImagem">
            </div>
            <div>
                <span>Nome:</span> {{ $cliente->nome }}
            </div>
            <div>
                <span>E-mail:</span> {{ $cliente->email }}
            </div>
            <div>
                <span>Tipo de cliente:</span> {{ $cliente->getTipoCliente->tipoCliente }}
            </div>
            <div>
                <span>Telefone:</span> <a class="modal-open" data-route={{ route("admin.telefones.index", ['clienteId' => $cliente->id]) }} data-id="{{ $cliente->id }}"  href="#">Ver Mais</a>
            </div>
            <div class="row-cliente-mobile-acoes">
                <a href="{{ route('admin.cliente.edit', ['id' => $cliente->id]) }}">Editar</a>
                <form method="POST" action="{{ route('admin.cliente.destroy', ['id' => $cliente->id]) }}" id="deleteCliente{{ $cliente->id }}">
                    @csrf
                    @method('DELETE')
                    <a href="#" onclick="deleteCliente({{ $cliente->id }})">Excluir</a>
                </form>
            </div>
        </div>

        <div class="modal-telefone" id="modal-telefone">
            <div class="modal-container"  id="modal">
                <button class="close">X</button>
                <h1 class="title">Telefone</h1>
                <div class="conteudoModal">
                </div>
            </div>
        </div>
    @empty
    @endforelse
</div>



@endsection

@section('js')
<script>
    function deleteCliente(id) {
        event.preventDefault();
        const form = document.getElementById('deleteCliente' + id)
        form.submit();;
    }
</script>

<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/modal-telefone.js') }}"></script>
@endsection