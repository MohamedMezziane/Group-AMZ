<?php

namespace Modules\PkgApprenants\Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeederPkgApprenants extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ApprenantSeeder::class,  // Add CategorySeeder
        ]);
    }
}