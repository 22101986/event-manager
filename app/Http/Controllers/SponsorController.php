<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\Event;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    // Affiche la liste paginée des sponsors avec leur événement associé
    public function index()
    {
        $sponsors = Sponsor::with('event')->latest()->paginate(10);
        return view('sponsors.index', compact('sponsors'));
    }

    // Affiche le formulaire de création d'un nouveau sponsor
    public function create()
    {
        $events = Event::all();
        return view('sponsors.create', compact('events'));
    }

    // Enregistre un nouveau sponsor dans la base de données
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048', // max 2Mo
        ]);
        $imagePath = null;
        // Gestion du téléchargement et du stockage du logo si présent
        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('sponsors', 'public');
        }

        // Création du sponsor
        Sponsor::create([
            'name' => $validated['name'],
            'logo' => $imagePath ?? null,
            'event_id' => $validated['event_id'],
        ]);

        return redirect()->route('sponsors.index')->with('success', 'Sponsor ajouté avec succès.');
    }

    // Affiche les détails d'un sponsor (avec l'événement associé)
    public function show(Sponsor $sponsor)
    {
        $sponsor->load('event');
        return view('sponsors.show', compact('sponsor'));
    }

    // Affiche le formulaire d'édition d'un sponsor existant
    public function edit(Sponsor $sponsor)
    {
        $events = Event::all();
        return view('sponsors.edit', compact('sponsor', 'events'));
    }

    // Met à jour les données d'un sponsor existant
    public function update(Request $request, Sponsor $sponsor)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
        ]);
        
        $imagePath = $sponsor->logo;
        // Gestion du téléchargement et du stockage du nouveau logo si présent
        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('sponsors', 'public');
        }
    
        // Mise à jour du sponsor
        $sponsor->update([
            'name' => $validated['name'],
            'logo' => $imagePath ?? null,
            'event_id' => $validated['event_id'],
        ]);

        return redirect()->route('sponsors.index')->with('success', 'Sponsor modifié avec succès.');
    }

    // Supprime un sponsor de la base de données
    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();
        return redirect()->route('sponsors.index')->with('success', 'Sponsor supprimé avec succès.');
    }
}