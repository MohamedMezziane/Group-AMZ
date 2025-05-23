<?php

namespace  modules\PkgApprenants\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\PkgApprenants\models\Apprenant;

class ApprenantSeeder extends Seeder
{
    public function run()
    {
        Apprenant::create(['nom' => 'John Doe', 'statut' => 'Actif']);
        Apprenant::create(['nom' => 'Jane Smith', 'statut' => 'Inactif']);
    }
}