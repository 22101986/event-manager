@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $event->title }}</h1>
    <p><strong>Description : </strong>{{ $event->description }}</p>
    <p><strong>Lieu : </strong>{{ $event->place?->name ?? '-' }}</p>
    <p><strong>Date début : </strong>{{ $event->start_date }}</p>
    <p><strong>Date fin : </strong>{{ $event->end_date ?? '-' }}</p>
    <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Modifier</a>
    <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline"
          onsubmit="return confirm('Confirmer la suppression ?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Supprimer</button>
    </form>
    <a href="{{ route('events.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection