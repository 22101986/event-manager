@extends('layouts.app')

@section('content')
    <h1>Liste des participants</h1>
    <a href="{{ route('participants.create') }}" class="btn btn-primary">Ajouter un participant</a>
    <ul>
        @foreach($participants as $participant)
            <li>
                <a href="{{ route('participants.show', $participant) }}">{{ $participant->name }}</a>
                <a href="{{ route('participants.edit', $participant) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('participants.destroy', $participant) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce participant ?')">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection