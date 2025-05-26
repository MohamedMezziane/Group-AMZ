<?php

namespace  Modules\PkgGestionInscription\Controllers;

use Modules\Core\Controllers\Controller;


use Illuminate\Http\Request;
use Modules\PkgApprenants\models\Apprenant;
use Modules\PkgGestionInscription\models\Atelier;
use Modules\PkgGestionInscription\models\Groupe;
use Modules\PkgGestionInscription\models\Inscription;

class InscriptionController extends Controller
{
    public function index()
    {
        $apprenants = Apprenant::paginate(5);
        $ateliers = Atelier::paginate(5);
        $groupes = Groupe::paginate(5);
        $inscriptions = Inscription::with(['apprenant', 'atelier', 'groupe'])->get();

        return view('PkgGestionInscription::dashboard', compact('apprenants', 'ateliers', 'groupes', 'inscriptions'));
    }

    public function Table(){
        $inscriptions = Inscription::with(['apprenant', 'atelier', 'groupe'])->get();
        return view('PkgGestionInscription::table', compact('inscriptions'));
    }
}
