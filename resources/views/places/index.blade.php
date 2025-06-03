@extends('layouts.app')

@section('title', 'Liste des lieux')

@section('content')
<div class="max-w-5xl mx-auto my-10 px-2">
    <div class="places-header">
        <h1 class="event-title">Liste des lieux</h1>
        <a href="{{ route('places.create') }}" class="btn-blue-gradient">
            Ajouter un lieu
        </a>
    </div>
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="event-table-wrapper">
        <table class="event-table">
            <thead class="event-table-head">
                <tr>
                    <th class="event-th">Nom</th>
                    <th class="event-th">Adresse</th>
                    <th class="event-th">Description</th>
                    <th class="event-th text-center" width="170">Actions</th>
                </tr>
            </thead>
            <tbody class="event-table-body">
                @foreach($places as $place)
                    <tr class="event-table-row">
                        <td class="event-td font-medium">{{ $place->name }}</td>
                        <td class="event-td">{{ $place->address }}</td>
                        <td class="event-td">{{ $place->description }}</td>
                        <td class="event-td text-center">
                            <div class="flex flex-wrap justify-center gap-2">
                                <a href="{{ route('places.show', $place) }}" class="btn-actions btn-view">
                                    Voir
                                </a>
                                <a href="{{ route('places.edit', $place) }}" class="btn-actions btn-edit">
                                    Modifier
                                </a>
                                <form action="{{ route('places.destroy', $place) }}" method="POST" onsubmit="return confirm('Supprimer ce lieu ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-actions btn-delete">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection