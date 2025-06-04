<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use App\Models\Event;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    // Affiche la liste paginée des intervenants avec leur événement associé
    public function index()
    {
        $speakers = Speaker::with('event')->latest()->paginate(10);
        return view('speakers.index', compact('speakers'));
    }

    // Affiche le formulaire de création d'un nouvel intervenant
    public function create()
    {
        $events = Event::all();
        return view('speakers.create', compact('events'));
    }

    // Enregistre un nouvel intervenant dans la base de données
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'image' => 'nullable|image|max:2048', // max 2Mo
        ]);

        $imagePath = null;
        // Gestion du téléchargement et du stockage de l'image si elle est présente
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('speakers', 'public');
        }

        // Création de l'intervenant
        Speaker::create([
            'name' => $validated['name'],
            'bio' => $validated['bio'] ?? null,
            'event_id' => $validated['event_id'],
            'image' => $imagePath,
        ]);

        return redirect()->route('speakers.index')->with('success', 'Intervenant ajouté avec succès.');
    }

    // Affiche les détails d'un intervenant (avec l'événement associé)
    public function show(Speaker $speaker)
    {
        $speaker->load('event');
        return view('speakers.show', compact('speaker'));
    }

    // Affiche le formulaire d'édition d'un intervenant existant
    public function edit(Speaker $speaker)
    {
        $events = Event::all();
        return view('speakers.edit', compact('speaker', 'events'));
    }

    // Met à jour les données d'un intervenant existant
    public function update(Request $request, Speaker $speaker)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'image' => 'nullable|image|max:2048',
        ]);
    
        $imagePath = $speaker->image;
        // Gestion du téléchargement et du stockage de la nouvelle image si elle est présente
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('speakers', 'public');
        }
    
        // Mise à jour de l'intervenant
        $speaker->update([
            'name' => $validated['name'],
            'bio' => $validated['bio'] ?? null,
            'event_id' => $validated['event_id'],
            'image' => $imagePath,
        ]);
    
        return redirect()->route('speakers.index')->with('success', 'Intervenant modifié avec succès.');
    }

    // Supprime un intervenant de la base de données
    public function destroy(Speaker $speaker)
    {
        $speaker->delete();
        return redirect()->route('speakers.index')->with('success', 'Intervenant supprimé avec succès.');
    }
}