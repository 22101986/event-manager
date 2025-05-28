@extends('layouts.app')

@section('title', 'Liste des intervenants')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center m-5">
        <h1>Liste des intervenants</h1>
        <a href="{{ route('speakers.create') }}" class="btn btn-success">Ajouter un intervenant</a>
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
                        <th>Événement</th>
                        <th width="210">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($speakers as $speaker)
                        <tr>
                            <td>{{ $speaker->name }}</td>
                            <td>{{ $speaker->event->title ?? '-' }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('speakers.show', $speaker) }}" class="btn btn-info btn-sm">Voir</a>
                                    <a href="{{ route('speakers.edit', $speaker) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('speakers.destroy', $speaker) }}" method="POST" onsubmit="return confirm('Supprimer cet intervenant ?')">
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
                {{ $speakers->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection