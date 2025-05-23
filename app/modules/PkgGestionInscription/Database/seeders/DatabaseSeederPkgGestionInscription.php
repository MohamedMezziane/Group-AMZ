<?php

namespace Modules\PkgGestionInscription\Database\Seeders;

use Illuminate\Database\Seeder;
use modules\PkgGestionInscription\models\Apprenant;

class DatabaseSeederPkgGestionInscription extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdministrationSeeder::class,
            ApprenantSeeder::class,
            AtelierSeeder::class,
            GroupeSeeder::class,
            InscriptionSeeder::class,

        ]);
    }
}