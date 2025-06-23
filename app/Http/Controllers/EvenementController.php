<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class EvenementController extends Controller
{
    use AuthorizesRequests;
    
    public function index()
    {
        $evenements = Evenement::where('organisateur_id', Auth::id())->get();

        return view('evenements.index', compact('evenements'));
    }

    public function create()
    {
        return view('evenements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'lieu' => 'required|string|max:255',
        ]);

        Evenement::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'date' => $request->date,
            'lieu' => $request->lieu,
            'organisateur_id' => Auth::id(),
        ]);

        return redirect()->route('evenements.index')->with('success', 'Événement créé.');
    }

    public function edit(Evenement $evenement)
    {
        $this->authorize('update', $evenement);

        return view('evenements.edit', compact('evenement'));
    }

    public function update(Request $request, Evenement $evenement)
    {
        $this->authorize('update', $evenement);

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'lieu' => 'required|string|max:255',
        ]);

        $evenement->update($request->only('titre', 'description', 'date', 'lieu'));

        return redirect()->route('evenements.index')->with('success', 'Événement mis à jour.');
    }

    public function destroy(Evenement $evenement)
    {
        $this->authorize('delete', $evenement);

        $evenement->delete();

        return redirect()->route('evenements.index')->with('success', 'Événement supprimé.');
    }
}
