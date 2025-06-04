<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Place;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Affiche la liste paginée des événements avec leur lieu
    public function index()
    {
        $events = Event::with('place')->latest()->paginate(10);
        return view('events.index', compact('events'));
    }

    // Affiche le formulaire de création d'un événement
    public function create()
    {
        $places = Place::all();
        return view('events.create', compact('places'));
    }

    // Enregistre un nouvel événement dans la base de données
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'place_id' => 'nullable|exists:places,id',
            'poster' => 'nullable|image|max:4096',
        ]);
        $validated['user_id'] = auth()->id();

        // Gestion de l'image d'affiche si elle est présente
        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('events', 'public');
        }

        // Création de l'événement
        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'Événement créé avec succès.');
    }

    // Affiche les détails d'un événement (avec lieu, participants, intervenants et sponsors)
    public function show(Event $event)
    {
        $event->load(['place', 'participants', 'speakers', 'sponsors']);
        return view('events.show', compact('event'));
    }

    // Affiche le formulaire d'édition d'un événement existant
    public function edit(Event $event)
    {
        $places = Place::all();
        return view('events.edit', compact('event', 'places'));
    }

    // Met à jour les données d'un événement existant
    public function update(Request $request, Event $event)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'place_id' => 'nullable|exists:places,id',
            'poster' => 'nullable|image|max:4096', // max 4Mo
        ]);

        // Gestion de l'image d'affiche si elle est présente
        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('events', 'public');
        }

        // Mise à jour de l'événement
        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Événement modifié avec succès.');
    }

    // Supprime un événement de la base de données
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Événement supprimé avec succès.');
    }
}