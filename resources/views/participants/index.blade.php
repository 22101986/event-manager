@extends('layouts.app')

@section('title', 'Liste des participants')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center m-5">
        <h1>Liste des participants</h1>
        <a href="{{ route('participants.create') }}" class="btn btn-success">Ajouter un participant</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success m-5">{{ session('success') }}</div>
    @endif
    <div class="card m-5">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Utilisateur</th>
                        <th>Email</th>
                        <th>Événement</th>
                        <th width="210">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($participants as $participant)
                        <tr>
                            <td>{{ $participant->user->name ?? '-' }}</td>
                            <td>{{ $participant->user->email ?? '-' }}</td>
                            <td>{{ $participant->event->title ?? '-' }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('participants.show', $participant) }}" class="btn btn-info btn-sm">Voir</a>
                                    <a href="{{ route('participants.edit', $participant) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('participants.destroy', $participant) }}" method="POST" onsubmit="return confirm('Supprimer ce participant ?')">
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
            <div class="m-3">
                {{ $participants->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection