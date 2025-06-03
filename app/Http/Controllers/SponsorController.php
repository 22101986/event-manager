<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Models\Event;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::with('event')->latest()->paginate(10);
        return view('sponsors.index', compact('sponsors'));
    }

    public function create()
    {
        $events = Event::all();
        return view('sponsors.create', compact('events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:4096',
        ]);
        $imagePath = null;
        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('sponsors', 'public');
        }

        Sponsor::create([
            'name' => $validated['name'],
            'logo' => $imagePath ?? null,
            'event_id' => $validated['event_id'],
        ]);

        return redirect()->route('sponsors.index')->with('success', 'Sponsor ajouté avec succès.');
    }

    public function show(Sponsor $sponsor)
    {
        $sponsor->load('event');
        return view('sponsors.show', compact('sponsor'));
    }

    public function edit(Sponsor $sponsor)
    {
        $events = Event::all();
        return view('sponsors.edit', compact('sponsor', 'events'));
    }

    public function update(Request $request, Sponsor $sponsor)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:4096',
        ]);
        
        $imagePath = $sponsor->logo;
        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('sponsors', 'public');
        }
    
        $sponsor->update([
            'name' => $validated['name'],
            'logo' => $imagePath ?? null,
            'event_id' => $validated['event_id'],
        ]);

        return redirect()->route('sponsors.index')->with('success', 'Sponsor modifié avec succès.');
    }

    public function destroy(Sponsor $sponsor)
    {
        $sponsor->delete();
        return redirect()->route('sponsors.index')->with('success', 'Sponsor supprimé avec succès.');
    }
}