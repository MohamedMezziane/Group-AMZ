<?php

namespace  modules\PkgGestionInscription\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\PkgApprenants\models\Apprenant;
use Modules\PkgGestionInscription\models\Atelier;
use Modules\PkgGestionInscription\models\Groupe;
use Modules\PkgGestionInscription\models\Inscription;

class InscriptionSeeder extends Seeder
{
    public function run()
    {
        $apprenants = Apprenant::all();
        $ateliers = Atelier::all();
        $groupes = Groupe::all();

        foreach ($apprenants as $apprenant) {
            Inscription::create([
                'apprenantId' => $apprenant->id,
                'atelierId' => $ateliers->random()->id,
                'groupeId' => $groupes->random()->id,
                'description' => 'Inscription pour ' . $apprenant->nom,
            ]);
        }
    }
}
