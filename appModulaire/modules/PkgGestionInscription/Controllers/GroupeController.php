<?php

namespace Modules\PkgGestionInscription\Controllers;

use Modules\PkgGestionInscription\Models\Groupe;
use Modules\PkgGestionInscription\Models\Atelier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupeController extends Controller
{
    public function index(Request $request)
    {
        $query = Groupe::query();
    
        // Filtrage par nom
        if ($request->filled('search')) {
            $query->where('nom', 'like', '%' . $request->search . '%');
        }
    
        // Filtrage par atelier
        if ($request->filled('atelierId')) {
            $query->where('atelierId', $request->atelierId);
        }
    
        $groupes = $query->with('atelier')->get();
        $ateliers = Atelier::all(); // Récupérer tous les ateliers pour le filtre
    
        return view('PkgGestionInscription::groupes.index', compact('groupes', 'ateliers'));
    }

    public function create()
    {
        $ateliers = Atelier::all();
        return view('PkgGestionInscription::groupes.create', compact('ateliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'atelierId' => 'required|exists:ateliers,id',
            'maxParticipants' => 'required|integer',
        ]);

        Groupe::create($request->all());
        return redirect()->route('groupes.index')->with('success', 'Groupe ajouté avec succès.');
    }

    public function edit(Groupe $groupe)
    {
        $ateliers = Atelier::all();
        return view('PkgGestionInscription::groupes.edit', compact('groupe', 'ateliers'));
    }

    public function update(Request $request, Groupe $groupe)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'atelierId' => 'required|exists:ateliers,id',
            'maxParticipants' => 'required|integer',
        ]);

        $groupe->update($request->all());
        return redirect()->route('groupes.index')->with('success', 'Groupe mis à jour avec succès.');
    }

    public function destroy(Groupe $groupe)
    {
        $groupe->delete();
        return redirect()->route('groupes.index')->with('success', 'Groupe supprimé avec succès.');
    }
}