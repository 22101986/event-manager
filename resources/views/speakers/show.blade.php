@extends('layouts.app')

@section('content')
    <h1>{{ $speaker->name }}</h1>
    <p>Email : {{ $speaker->email }}</p>
    <p>Bio : {{ $speaker->bio }}</p>
    <a href="{{ route('speakers.edit', $speaker) }}" class="btn btn-warning">Modifier</a>
    <form action="{{ route('speakers.destroy', $speaker) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Supprimer cet intervenant ?')">Supprimer</button>
    </form>
    <a href="{{ route('speakers.index') }}">Retour à la liste</a>
@endsection