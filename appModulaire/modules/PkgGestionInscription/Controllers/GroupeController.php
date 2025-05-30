<?php

namespace Modules\PkgGestionInscription\Controllers;

use Modules\PkgGestionInscription\Models\Groupe;
use Modules\PkgGestionInscription\Models\Atelier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupeController extends Controller
{
    public function index()
    {
        $groupes = Groupe::all();
        return view('PkgGestionInscription::groupes.index', compact('groupes'));
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