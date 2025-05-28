@extends('layouts.app')

@section('title', 'Liste des lieux')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center m-5">
        <h1>Liste des lieux</h1>
        <a href="{{ route('places.create') }}" class="btn btn-success">Ajouter un lieu</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success m-5">{{ session('success') }}</div>
    @endif
    <div class="card m-5">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Description</th>
                        <th width="170">Actions</th>
                    </tr>
                </thead>
                <tbody>
    @foreach($places as $place)
        <tr>
            <td>{{ $place->name }}</td>
            <td>{{ $place->address }}</td>
            <td>{{ $place->description }}</td>
            <td>
                <div class="d-flex gap-1">
                    <a href="{{ route('places.show', $place) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('places.edit', $place) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('places.destroy', $place) }}" method="POST" onsubmit="return confirm('Supprimer ce lieu ?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</tbody>
            </table>
        </div>
    </div>
</div>    
@endsection