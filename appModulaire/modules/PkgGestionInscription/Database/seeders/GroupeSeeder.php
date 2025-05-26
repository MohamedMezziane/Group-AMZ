<?php

namespace  modules\PkgGestionInscription\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\PkgGestionInscription\models\Atelier;
use Modules\PkgGestionInscription\models\Groupe;

class GroupeSeeder extends Seeder
{
    public function run()
    {
        $ateliers = Atelier::all();

        $groupes = [
            [
                'nom' => 'Groupe A',
                'description' => 'Groupe pour les débutants en cuisine.',
                'atelierId' => $ateliers->random()->id, // Random atelier
                'maxParticipants' => 10,
            ],
            [
                'nom' => 'Groupe B',
                'description' => 'Groupe de photographie avancée.',
                'atelierId' => $ateliers->random()->id,
                'maxParticipants' => 8,
            ],
            [
                'nom' => 'Groupe C',
                'description' => 'Groupe de jardinage pour tous niveaux.',
                'atelierId' => $ateliers->random()->id,
                'maxParticipants' => 12,
            ],
            [
                'nom' => 'Groupe D',
                'description' => 'Groupe de dessin pour artistes en herbe.',
                'atelierId' => $ateliers->random()->id,
                'maxParticipants' => 15,
            ],
            [
                'nom' => 'Groupe E',
                'description' => 'Groupe de développement web pour débutants.',
                'atelierId' => $ateliers->random()->id,
                'maxParticipants' => 20,
            ],
        ];

        foreach ($groupes as $groupe) {
            Groupe::create($groupe);
        }
    }
}
