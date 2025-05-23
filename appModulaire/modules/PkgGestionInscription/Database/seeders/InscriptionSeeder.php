<?php

namespace  modules\PkgGestionInscription\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\PkgGestionInscription\models\Inscription;

class InscriptionSeeder extends Seeder
{
    public function run()
    {
        Inscription::create(['apprenantId' => 1, 'atelierId' => 1, 'groupeId' => 1, 'description' => 'Inscription de John Doe']);
        Inscription::create(['apprenantId' => 2, 'atelierId' => 2, 'groupeId' => 2, 'description' => 'Inscription de Jane Smith']);
    }
}
