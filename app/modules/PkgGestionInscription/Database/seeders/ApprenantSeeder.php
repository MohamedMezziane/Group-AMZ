<?php

namespace  modules\PkgGestionInscription\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use modules\PkgGestionInscription\models\Apprenant;

class ApprenantSeeder extends Seeder
{
    public function run()
    {
        Apprenant::create(['nom' => 'John Doe', 'statut' => 'Actif']);
        Apprenant::create(['nom' => 'Jane Smith', 'statut' => 'Inactif']);
    }
}
