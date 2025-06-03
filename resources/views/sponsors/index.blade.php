@extends('layouts.app')

@section('title', 'Liste des sponsors')

@section('content')
<div class="max-w-5xl mx-auto my-10 px-2">
    <div class="sponsors-header">
        <h1 class="event-title">Liste des sponsors</h1>
        <a href="{{ route('sponsors.create') }}" class="btn-green-gradient">
            Ajouter un sponsor
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
                @foreach($sponsors as $sponsor)
                    <tr class="event-table-row">
                        <td class="event-td font-medium">{{ $sponsor->name }}</td>
                        <td class="event-td">{{ $sponsor->event->title ?? '-' }}</td>
                        <td class="event-td text-center">
                            <div class="flex flex-wrap justify-center gap-2">
                                <a href="{{ route('sponsors.show', $sponsor) }}" class="btn-actions btn-view">
                                    Voir
                                </a>
                                <a href="{{ route('sponsors.edit', $sponsor) }}" class="btn-actions btn-edit">
                                    Modifier
                                </a>
                                <form action="{{ route('sponsors.destroy', $sponsor) }}" method="POST" onsubmit="return confirm('Supprimer ce sponsor ?')">
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
            {{ $sponsors->links() }}
        </div>
    </div>
</div>
@endsection