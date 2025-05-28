@extends('layouts.app')

@section('title', 'Liste des sponsors')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center m-5">
        <h1>Liste des sponsors</h1>
        <a href="{{ route('sponsors.create') }}" class="btn btn-success">Ajouter un sponsor</a>
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
                    @foreach($sponsors as $sponsor)
                        <tr>
                            <td>{{ $sponsor->name }}</td>
                            <td>{{ $sponsor->event->title ?? '-' }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('sponsors.show', $sponsor) }}" class="btn btn-info btn-sm">Voir</a>
                                    <a href="{{ route('sponsors.edit', $sponsor) }}" class="btn btn-warning btn-sm">Modifier</a>
                                    <form action="{{ route('sponsors.destroy', $sponsor) }}" method="POST" onsubmit="return confirm('Supprimer ce sponsor ?')">
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
                {{ $sponsors->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>
@endsection