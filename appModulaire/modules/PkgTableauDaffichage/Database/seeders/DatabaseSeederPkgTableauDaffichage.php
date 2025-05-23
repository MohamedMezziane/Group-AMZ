<?php

namespace Modules\PkgTableauDaffichage\Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeederPkgTableauDaffichage extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PostCategorySeeder::class,  // Add CategorySeeder
            PostSeeder::class,       // Add TagSeeder
        ]);
    }
}