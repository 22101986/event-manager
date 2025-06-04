<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    // Affiche la liste paginée des participants avec leurs utilisateurs et événements liés
    public function index()
    {
        $participants = Participant::with(['user', 'event'])->latest()->paginate(10);
        return view('participants.index', compact('participants'));
    }

    // Affiche le formulaire de création d'un participant
    public function create()
    {
        $users = User::all();
        $events = Event::all();
        return view('participants.create', compact('users', 'events'));
    }

    // Enregistre un nouveau participant dans la base de données
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
        ]);
        // Création du participant
        Participant::create($validated);
        return redirect()->route('participants.index')->with('success', 'Participant ajouté avec succès.');
    }

    // Affiche les détails d'un participant (avec utilisateur et événement liés)
    public function show(Participant $participant)
    {
        $participant->load(['user', 'event']);
        return view('participants.show', compact('participant'));
    }

    // Affiche le formulaire d'édition d'un participant existant
    public function edit(Participant $participant)
    {
        $users = User::all();
        $events = Event::all();
        return view('participants.edit', compact('participant', 'users', 'events'));
    }

    // Met à jour les données d'un participant existant
    public function update(Request $request, Participant $participant)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
        ]);
        // Mise à jour du participant
        $participant->update($validated);
        return redirect()->route('participants.index')->with('success', 'Participant modifié avec succès.');
    }

    // Supprime un participant de la base de données
    public function destroy(Participant $participant)
    {
        $participant->delete();
        return redirect()->route('participants.index')->with('success', 'Participant supprimé avec succès.');
    }
}