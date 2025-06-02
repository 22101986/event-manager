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
            'image' => 'nullable|image|max:2048', // max 2Mo
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('speakers', 'public');
        }

        Speaker::create([
            'name' => $validated['name'],
            'bio' => $validated['bio'] ?? null,
            'event_id' => $validated['event_id'],
            'image' => $imagePath,
        ]);

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
            'image' => 'nullable|image|max:2048',
        ]);
    
        $imagePath = $speaker->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('speakers', 'public');
        }
    
        $speaker->update([
            'name' => $validated['name'],
            'bio' => $validated['bio'] ?? null,
            'event_id' => $validated['event_id'],
            'image' => $imagePath,
        ]);
    
        return redirect()->route('speakers.index')->with('success', 'Intervenant modifié avec succès.');
    }

    public function destroy(Speaker $speaker)
    {
        $speaker->delete();
        return redirect()->route('speakers.index')->with('success', 'Intervenant supprimé avec succès.');
    }
}