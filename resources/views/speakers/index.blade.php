@extends('layouts.app')

@section('title', 'Liste des intervenants')

@section('content')
<div class="max-w-5xl mx-auto my-10 px-2">
    <div class="speakers-header">
        <h1 class="section-title text-indigo-700 text-left mb-0">Liste des intervenants</h1>
        <a href="{{ route('speakers.create') }}" class="btn-green-gradient">
            Ajouter un intervenant
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
                    <th class="event-th">Événement</th>
                    <th class="event-th text-center" width="210">Actions</th>
                </tr>
            </thead>
            <tbody class="event-table-body">
                @foreach($speakers as $speaker)
                    <tr class="event-table-row">
                        <td class="event-td font-medium">{{ $speaker->name }}</td>
                        <td class="event-td">{{ $speaker->event->title ?? '-' }}</td>
                        <td class="event-td text-center">
                            <div class="flex flex-wrap justify-center gap-2">
                                <a href="{{ route('speakers.show', $speaker) }}" class="btn-actions btn-view">
                                    Voir
                                </a>
                                <a href="{{ route('speakers.edit', $speaker) }}" class="btn-actions btn-edit">
                                    Modifier
                                </a>
                                <form action="{{ route('speakers.destroy', $speaker) }}" method="POST" onsubmit="return confirm('Supprimer cet intervenant ?')">
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
            {{ $speakers->links() }}
        </div>
    </div>
</div>
@endsection