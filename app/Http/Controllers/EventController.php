<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Place;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('place')->latest()->paginate(10);
        return view('events.index', compact('events'));
    }

    public function create()
    {
        $places = Place::all();
        return view('events.create', compact('places'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'place_id' => 'nullable|exists:places,id',
            'poster' => 'nullable|image|max:4096',
        ]);
        $validated['user_id'] = auth()->id();

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('events', 'public');
        }

        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Événement créé avec succès.');
    }

    public function show(Event $event)
    {
        $event->load(['place', 'participants', 'speakers', 'sponsors']);
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $places = Place::all();
        return view('events.edit', compact('event', 'places'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'place_id' => 'nullable|exists:places,id',
            'poster' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('events', 'public');
        }

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Événement modifié avec succès.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Événement supprimé avec succès.');
    }
}