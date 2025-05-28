@extends('layouts.app')

@section('content')
    <h1>{{ $participant->name }}</h1>
    <p>Email : {{ $participant->email }}</p>
    <p>Téléphone : {{ $participant->phone }}</p>
    <a href="{{ route('participants.edit', $participant) }}" class="btn btn-warning">Modifier</a>
    <form action="{{ route('participants.destroy', $participant) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Supprimer ce participant ?')">Supprimer</button>
    </form>
    <a href="{{ route('participants.index') }}">Retour à la liste</a>
@endsection