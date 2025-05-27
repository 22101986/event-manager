@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des événements</h1>
        <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Créer un événement</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Lieu</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->place?->name }}</td>
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->end_date ?? '-' }}</td>
                    <td>
                        <a href="{{ route('events.show', $event) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $events->links() }}
    </div>
@endsection