@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto my-10 px-2">
        <h1 class="event-title">Liste des événements</h1>
        <a href="{{ route('events.create') }}" class="btn-primary-gradient inline-block mb-6">
            Créer un événement
        </a>
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="event-table-wrapper">
            <table class="event-table">
                <thead class="event-table-head">
                    <tr>
                        <th class="event-th">Titre</th>
                        <th class="event-th">Lieu</th>
                        <th class="event-th">Date début</th>
                        <th class="event-th">Date fin</th>
                        <th class="event-th text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="event-table-body">
                @foreach($events as $event)
                    <tr class="event-table-row">
                        <td class="event-td font-semibold text-indigo-900">{{ $event->title }}</td>
                        <td class="event-td">{{ $event->place?->name ?? '-' }}</td>
                        <td class="event-td">
                            {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('d/m/Y \à H:i') }}
                        </td>
                        <td class="event-td">
                            {{ $event->end_date ? \Carbon\Carbon::parse($event->end_date)->translatedFormat('d/m/Y \à H:i') : '-' }}
                        </td>
                        <td class="event-td text-center">
                            <a href="{{ route('events.show', $event) }}" class="btn-actions btn-view">
                                Voir
                            </a>
                            <a href="{{ route('events.edit', $event) }}" class="btn-actions btn-edit">
                                Modifier
                            </a>
                            <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Confirmer la suppression ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-actions btn-delete">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $events->links() }}
        </div>
    </div>
@endsection