<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    // Affiche la liste paginée des lieux
    public function index()
    {
        $places = Place::latest()->paginate(10);
        return view('places.index', compact('places'));
    }

    // Affiche le formulaire de création d'un nouveau lieu
    public function create()
    {
        return view('places.create');
    }

    // Enregistre un nouveau lieu dans la base de données
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);
        // Création du lieu
        Place::create($validated);
        return redirect()->route('places.index')->with('success', 'Lieu créé avec succès.');
    }

    // Affiche les détails d'un lieu, incluant ses événements associés
    public function show(Place $place)
    {
        $place->load('events');
        return view('places.show', compact('place'));
    }

    // Affiche le formulaire d'édition d'un lieu existant
    public function edit(Place $place)
    {
        return view('places.edit', compact('place'));
    }

    // Met à jour les informations d'un lieu existant
    public function update(Request $request, Place $place)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);
        // Mise à jour du lieu
        $place->update($validated);
        return redirect()->route('places.index')->with('success', 'Lieu modifié avec succès.');
    }

    // Supprime un lieu de la base de données
    public function destroy(Place $place)
    {
        $place->delete();
        return redirect()->route('places.index')->with('success', 'Lieu supprimé avec succès.');
    }
}