@extends('layouts.app')

@section('content')
    <h1>Liste des intervenants</h1>
    <a href="{{ route('speakers.create') }}" class="btn btn-primary">Ajouter un intervenant</a>
    <ul>
        @foreach($speakers as $speaker)
            <li>
                <a href="{{ route('speakers.show', $speaker) }}">{{ $speaker->name }}</a>
                <a href="{{ route('speakers.edit', $speaker) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('speakers.destroy', $speaker) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cet intervenant ?')">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection