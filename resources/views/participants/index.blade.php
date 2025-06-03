@extends('layouts.app')

@section('title', 'Liste des participants')

@section('content')
<div class="max-w-5xl mx-auto my-10 px-2">
    <div class="participants-header">
        <h1 class="event-title">Liste des participants</h1>
        <a href="{{ route('participants.create') }}" class="btn-green-gradient">
            Ajouter un participant
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
                    <th class="event-th">Utilisateur</th>
                    <th class="event-th">Email</th>
                    <th class="event-th">Événement</th>
                    <th class="event-th text-center" width="210">Actions</th>
                </tr>
            </thead>
            <tbody class="event-table-body">
                @foreach($participants as $participant)
                    <tr class="event-table-row">
                        <td class="event-td font-medium">{{ $participant->user->name ?? '-' }}</td>
                        <td class="event-td">{{ $participant->user->email ?? '-' }}</td>
                        <td class="event-td">{{ $participant->event->title ?? '-' }}</td>
                        <td class="event-td text-center">
                            <div class="flex flex-wrap justify-center gap-2">
                                <a href="{{ route('participants.show', $participant) }}" class="btn-actions btn-view">
                                    Voir
                                </a>
                                <a href="{{ route('participants.edit', $participant) }}" class="btn-actions btn-edit">
                                    Modifier
                                </a>
                                <form action="{{ route('participants.destroy', $participant) }}" method="POST" onsubmit="return confirm('Supprimer ce participant ?')">
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
        <div class="mt-6">
            {{ $participants->links() }}
        </div>
    </div>
</div>
@endsection