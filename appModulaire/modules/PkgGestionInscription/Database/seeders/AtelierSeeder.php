<?php

namespace  modules\PkgGestionInscription\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\PkgGestionInscription\models\Atelier;

class AtelierSeeder extends Seeder
{
    public function run()
    {
        Atelier::create(['nom' => 'Atelier A', 'description' => 'Description de l\'atelier A', 'dateDebut' => now(), 'dateFin' => now()->addDays(5)]);
        Atelier::create(['nom' => 'Atelier B', 'description' => 'Description de l\'atelier B', 'dateDebut' => now(), 'dateFin' => now()->addDays(3)]);
    }
}
