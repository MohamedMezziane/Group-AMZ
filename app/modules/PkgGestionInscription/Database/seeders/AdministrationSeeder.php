<?php

namespace  modules\PkgGestionInscription\Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use modules\PkgGestionInscription\models\Administration;

class AdministrationSeeder extends Seeder
{
    public function run()
    {
        Administration::create(['nom' => 'Admin One', 'email' => 'admin1@example.com', 'role' => 'Gestionnaire']);
        Administration::create(['nom' => 'Admin Two', 'email' => 'admin2@example.com', 'role' => 'Superviseur']);
    }
}
