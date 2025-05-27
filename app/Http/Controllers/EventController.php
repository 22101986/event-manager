<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        // Liste tous les événements
        $events = Event::with('place')->latest()->paginate(10);
        return view('events.index', compact('events'));
    }

    public function create()
    {
        // Affiche le formulaire de création
        return view('events.create');
    }

    public function store(Request $request)
    {
        // Valide et enregistre un nouvel événement
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'place_id' => 'nullable|exists:places,id',
        ]);
        $validated['user_id'] = auth()->id();
        Event::create($validated);
        return redirect()->route('events.index')->with('success', 'Événement créé');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'place_id' => 'nullable|exists:places,id',
        ]);
        $event->update($validated);
        return redirect()->route('events.index')->with('success', 'Événement mis à jour');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Événement supprimé');
    }
}