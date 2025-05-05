@extends('layouts.app')

@section('title', 'Níveis')

@section('content')

<h1>INDEX NIVEIS</h1>

<a href="{{ route('nivels.create') }}" class="btn btn-primary">Add Nível</a>

<table class="table table-white mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
        </tr>
    </thead>
    <tbody>
        @foreach($nivels as $nivel)
        <tr>
            <td>{{ $nivel->id }}</td>
            <td>{{ $nivel->nome }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection