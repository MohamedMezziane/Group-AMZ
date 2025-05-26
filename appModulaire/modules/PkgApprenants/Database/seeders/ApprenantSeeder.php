<?php

namespace  modules\PkgApprenants\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\PkgApprenants\models\Apprenant;

class ApprenantSeeder extends Seeder
{
    public function run()
    {
        $apprenants = [
            ['nom' => 'Lucas Martin', 'statut' => 'Actif'],
            ['nom' => 'Sophie Dubois', 'statut' => 'Actif'],
            ['nom' => 'Emma Lefevre', 'statut' => 'Inactif'],
            ['nom' => 'Noah Bernard', 'statut' => 'Actif'],
            ['nom' => 'Chloe Moreau', 'statut' => 'Actif'],
            ['nom' => 'Paul Simon', 'statut' => 'Inactif'],
            ['nom' => 'Alice Leroy', 'statut' => 'Actif'],
            ['nom' => 'Liam Petit', 'statut' => 'Actif'],
            ['nom' => 'Juliette Roche', 'statut' => 'Actif'],
            ['nom' => 'Lucas Dubois', 'statut' => 'Actif'],
        ];
        foreach ($apprenants as $apprenant) {
            Apprenant::create($apprenant);
        }
    }
}