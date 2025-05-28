<?php

namespace Modules\PkgGestionInscription\Controllers;

use Illuminate\Http\Request;
use Modules\Core\Controllers\Controller;
use Modules\PkgGestionInscription\Models\Atelier;

class AtelierController extends Controller
{
    /**
     * Display a paginated list of ateliers.
     */
    public function index()
    {
        $ateliers = Atelier::latest()->paginate(10);
        return view('PkgGestionInscription::ateliers.index', compact('ateliers'));
    }

    /**
     * Show the form to create a new atelier.
     */
    public function create()
    {
        return view('PkgGestionInscription::ateliers.create');
    }

    /**
     * Validate and store a new atelier.
     */
    public function store(Request $request)
    {
        $validated = $this->validateAtelier($request);

        Atelier::create($validated);

        return redirect()
            ->route('ateliers.index')
            ->with('success', 'Atelier créé avec succès !');
    }

    /**
     * Show the form for editing an existing atelier.
     */
    
    public function edit(Atelier $atelier)
    {
        // dd(request()->route('atelier'), $atelier);

        return view('PkgGestionInscription::ateliers.edit', compact('atelier'));
    }
        
    /**
     * Validate and update the given atelier.
     */
    public function update(Request $request, Atelier $atelier)
    {
        $validated = $this->validateAtelier($request);

        $atelier->update($validated);

        return redirect()
            ->route('ateliers.index')
            ->with('success', 'Atelier mis à jour avec succès !');
    }

    /**
     * Delete the given atelier.
     */
    public function destroy(Atelier $atelier)
    {
        $atelier->delete();

        return redirect()
            ->route('ateliers.index')
            ->with('success', 'Atelier supprimé avec succès !');
    }

    /**
     * Extract validation logic to reuse in store and update.
     */
    protected function validateAtelier(Request $request): array
    {
        return $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after_or_equal:dateDebut',
        ]);
    }
}
