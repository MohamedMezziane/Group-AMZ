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
        $apprenantsTotal = Apprenant::All();
        $ateliers = Atelier::paginate(5);
        $groupes = Groupe::paginate(5);
        $inscriptions = Inscription::with(['apprenant', 'atelier', 'groupe'])->get();
        $statut1Count = Apprenant::where('statut', 'Statut 1')->count();
        $statut2Count = Apprenant::where('statut', 'Statut 2')->count();

        return view('PkgGestionInscription::dashboard', compact('apprenants', 'ateliers', 'groupes', 'inscriptions',"apprenantsTotal" , 'statut1Count', 'statut2Count'));
    }

    public function Table(){
        $inscriptions = Inscription::with(['apprenant', 'atelier', 'groupe'])->get();
        return view('PkgGestionInscription::table', compact('inscriptions'));
    }
}