@extends('layouts.default')
@section('titulo', 'Login')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('conteudo')
<div id="conteudo">
    <div class="header-login">
        <h1>Entrar no sistema</h1>
        <div class="separator"></div>
    </div>

    <form method="POST" action="{{ route('authenticate') }}" id="form-login">
        @csrf
        <div class="input-group">
            <input type="email" name="email" placeholder="E-mail:" value="{{ old('email') }}" required>
            <div class="erro">
                {{ $errors->has('email') ? $errors->first('email') : ''}}
            </div>
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Senha:" required>
            <div class="erro">
                {{ $errors->has('password') ? $errors->first('password') : ''}}
            </div>
        </div>

        <button type="submit">Entrar</button>
    </form>
</div>
@endsection
