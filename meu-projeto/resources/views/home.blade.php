@extends('layouts.app')

@section('title', 'SIGAC - Home')

@section('content')
    <h1>HOME</h1>

    @if(session('success'))
        <x-alert tipo="success">
            <strong>Sucesso!</strong> {{ session('success') }}
        </x-alert>
    @endif
@endsection
