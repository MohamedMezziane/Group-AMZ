<?php

namespace  modules\PkgGestionInscription\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\PkgGestionInscription\models\Atelier;

class AtelierSeeder extends Seeder
{
    public function run()
    {
        $ateliers = [
            [
                'nom' => 'Atelier de Cuisine', 
                'description' => 'Apprendre les bases de la cuisine française.',
                'dateDebut' => Carbon::now()->addDays(1), // Start tomorrow
                'dateFin' => Carbon::now()->addDays(5) // End in five days
            ],
            [
                'nom' => 'Atelier de Photographie', 
                'description' => 'Techniques de photographie et retouche.',
                'dateDebut' => Carbon::now()->addDays(7), // Start in a week
                'dateFin' => Carbon::now()->addDays(14) // End in two weeks
            ],
            [
                'nom' => 'Atelier de Développement Web', 
                'description' => 'Introduction à HTML, CSS et JavaScript.',
                'dateDebut' => Carbon::now()->addDays(14), // Start in two weeks
                'dateFin' => Carbon::now()->addDays(21) // End in three weeks
            ],
            [
                'nom' => 'Atelier de Dessin', 
                'description' => 'Techniques de dessin pour débutants.',
                'dateDebut' => Carbon::now()->addDays(3), // Start in three days
                'dateFin' => Carbon::now()->addDays(8) // End in eight days
            ],
            [
                'nom' => 'Atelier de Jardinage', 
                'description' => 'Apprendre à cultiver son propre jardin.',
                'dateDebut' => Carbon::now()->addDays(10), // Start in ten days
                'dateFin' => Carbon::now()->addDays(15) // End in fifteen days
            ],
        ];

        foreach ($ateliers as $atelier) {
            Atelier::create($atelier);
        }
    }
}
