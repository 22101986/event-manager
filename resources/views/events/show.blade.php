@extends('layouts.app')

@section('title', 'Détail de l\'événement')

@section('content')
<div class="container">
    <div class="card mx-auto my-5 shadow" style="max-width: 800px;">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ $event->title }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Description :</strong> {{ $event->description }}</p>
            <p><strong>Lieu :</strong> {{ $event->place?->name ?? '-' }}</p>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Date début :</strong> {{ $event->start_date }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Date fin :</strong> {{ $event->end_date ?? '-' }}</p>
                </div>
            </div>
            <div class="d-flex gap-2 my-3">
                <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Modifier</a>
                <form action="{{ route('events.destroy', $event) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Supprimer</button>
                </form>
                <a href="{{ route('events.index') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Participants</h5>
                </div>
                <div class="card-body">
                    @if($event->participants->count())
                        <ul class="list-group list-group-flush">
                            @foreach($event->participants as $participant)
                                <li class="list-group-item">
                                    {{ $participant->user->name ?? '-' }}
                                    @if(isset($participant->user->email))
                                        <span class="text-muted small">({{ $participant->user->email }})</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">Aucun participant pour cet événement.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Intervenants</h5>
                </div>
                <div class="card-body">
                    @if($event->speakers->count())
                        <ul class="list-group list-group-flush">
                            @foreach($event->speakers as $speaker)
                                <li class="list-group-item"><h4>{{ $speaker->name }}</h4></li>
                                <p>{{ $speaker->bio }}</p>
                                @endforeach
                        </ul>
                        
                    @else
                        <p class="text-muted">Aucun intervenant pour cet événement.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Sponsors</h5>
                </div>
                <div class="card-body">
                    @if($event->sponsors->count())
                        <ul class="list-group list-group-flush">
                            @foreach($event->sponsors as $sponsor)
                                <li class="list-group-item">{{ $sponsor->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">Aucun sponsor pour cet événement.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection