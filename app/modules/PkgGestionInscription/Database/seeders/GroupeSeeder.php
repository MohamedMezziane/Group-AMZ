<?php

namespace  modules\PkgGestionInscription\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use modules\PkgGestionInscription\models\Groupe;

class GroupeSeeder extends Seeder
{
    public function run()
    {
        Groupe::create(['nom' => 'Groupe 1', 'description' => 'Description du groupe 1', 'atelierId' => 1, 'maxParticipants' => 10]);
        Groupe::create(['nom' => 'Groupe 2', 'description' => 'Description du groupe 2', 'atelierId' => 2, 'maxParticipants' => 15]);
    }
}
