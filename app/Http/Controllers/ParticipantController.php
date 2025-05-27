<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index()
    {
        $participants = Participant::with(['user', 'event'])->latest()->paginate(10);
        return view('participants.index', compact('participants'));
    }

    public function create()
    {
        $users = User::all();
        $events = Event::all();
        return view('participants.create', compact('users', 'events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
        ]);
        Participant::create($validated);
        return redirect()->route('participants.index')->with('success', 'Participant ajouté avec succès.');
    }

    public function show(Participant $participant)
    {
        $participant->load(['user', 'event']);
        return view('participants.show', compact('participant'));
    }

    public function edit(Participant $participant)
    {
        $users = User::all();
        $events = Event::all();
        return view('participants.edit', compact('participant', 'users', 'events'));
    }

    public function update(Request $request, Participant $participant)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
        ]);
        $participant->update($validated);
        return redirect()->route('participants.index')->with('success', 'Participant modifié avec succès.');
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();
        return redirect()->route('participants.index')->with('success', 'Participant supprimé avec succès.');
    }
}