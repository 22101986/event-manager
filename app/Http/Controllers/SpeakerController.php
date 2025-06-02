<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use App\Models\Event;
use Illuminate\Http\Request;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::with('event')->latest()->paginate(10);
        return view('speakers.index', compact('speakers'));
    }

    public function create()
    {
        $events = Event::all();
        return view('speakers.create', compact('events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
        ]);
        Speaker::create($validated);
        return redirect()->route('speakers.index')->with('success', 'Intervenant ajouté avec succès.');
    }

    public function show(Speaker $speaker)
    {
        $speaker->load('event');
        return view('speakers.show', compact('speaker'));
    }

    public function edit(Speaker $speaker)
    {
        $events = Event::all();
        return view('speakers.edit', compact('speaker', 'events'));
    }

    public function update(Request $request, Speaker $speaker)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
        ]);
        $speaker->update($validated);
        return redirect()->route('speakers.index')->with('success', 'Intervenant modifié avec succès.');
    }

    public function destroy(Speaker $speaker)
    {
        $speaker->delete();
        return redirect()->route('speakers.index')->with('success', 'Intervenant supprimé avec succès.');
    }
}