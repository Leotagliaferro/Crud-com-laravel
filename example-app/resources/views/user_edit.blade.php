@extends('master')

@section('content')

    <h2>edit</h2>
    @if(session()->has('message'))
        {{ session()->get('message') }}

    @endif

    <form action="{{route('users.update', ['user' => $user->id])}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="firstname" value="{{$user->firstname }}">
        <input type="text" name="lastName" value="{{$user->lastname }}">
        <input type="text" name="email" value="{{$user->email }}">
        <button type="submit">Enviar</button>
    </form>

@endsection
