@extends('layouts.app')

@section('content')
    <h1>{{ $sponsor->name }}</h1>
    <p>Email : {{ $sponsor->email }}</p>
    <p>Description : {{ $sponsor->description }}</p>
    <a href="{{ route('sponsors.edit', $sponsor) }}" class="btn btn-warning">Modifier</a>
    <form action="{{ route('sponsors.destroy', $sponsor) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Supprimer ce sponsor ?')">Supprimer</button>
    </form>
    <a href="{{ route('sponsors.index') }}">Retour à la liste</a>
@endsection