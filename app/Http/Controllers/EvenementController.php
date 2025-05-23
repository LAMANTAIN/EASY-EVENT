<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvenementController extends Controller
{
    /**
     * Affiche la liste des événements de l’organisateur.
     */
    public function index()
    {
        return 'ok';
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('evenements.create');
    }

    /**
     * Enregistre un nouvel événement.
     */
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

    /**
     * Affiche le formulaire d’édition.
     */
    public function edit(Evenement $evenement)
    {
        $this->authorizeAccess($evenement);

        return view('evenements.edit', compact('evenement'));
    }

    /**
     * Met à jour un événement.
     */
    public function update(Request $request, Evenement $evenement)
    {
        $this->authorizeAccess($evenement);

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'lieu' => 'required|string|max:255',
        ]);

        $evenement->update($request->only('titre', 'description', 'date', 'lieu'));

        return redirect()->route('evenements.index')->with('success', 'Événement mis à jour.');
    }

    /**
     * Supprime un événement.
     */
    public function destroy(Evenement $evenement)
    {
        $this->authorizeAccess($evenement);

        $evenement->delete();

        return redirect()->route('evenements.index')->with('success', 'Événement supprimé.');
    }

    /**
     * Vérifie que l'utilisateur peut gérer cet événement.
     */
    private function authorizeAccess(Evenement $evenement)
    {
        if ($evenement->organisateur_id !== Auth::id()) {
            abort(403, 'Accès non autorisé');
        }
    }
}
