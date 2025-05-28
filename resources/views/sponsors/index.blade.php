@extends('layouts.app')

@section('content')
    <h1>Liste des sponsors</h1>
    <a href="{{ route('sponsors.create') }}" class="btn btn-primary">Ajouter un sponsor</a>
    <ul>
        @foreach($sponsors as $sponsor)
            <li>
                <a href="{{ route('sponsors.show', $sponsor) }}">{{ $sponsor->name }}</a>
                <a href="{{ route('sponsors.edit', $sponsor) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('sponsors.destroy', $sponsor) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce sponsor ?')">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection