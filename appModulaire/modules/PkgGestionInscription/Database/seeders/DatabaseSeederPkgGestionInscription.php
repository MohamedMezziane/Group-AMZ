<?php

namespace Modules\PkgGestionInscription\Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeederPkgGestionInscription extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdministrationSeeder::class,
            AtelierSeeder::class,
            GroupeSeeder::class,
            InscriptionSeeder::class,
        ]);
    }
}