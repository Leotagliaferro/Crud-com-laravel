@extends('master')

@section('content')

    <h2>create</h2>
    @if(session()->has('message'))
        {{ session()->get('message') }}

    @endif

    <form action="{{route('users.store')}}" method="post">
        @csrf
        <input type="text" name="firstname" placeholder="primeiro nome" value="alexandre">
        <input type="text" name="lastname" placeholder="ultimo nome" value="zapzap">
        <input type="text" name="email" placeholder="e-mail" value="teste@teste.com.br">
        <input type="password" name="password" placeholder="sua senha" value="123">
        <button type="submit">Enviar</button>
    </form>

@endsection
