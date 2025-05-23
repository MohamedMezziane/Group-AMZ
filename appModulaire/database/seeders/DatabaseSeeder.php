<?php

namespace Database\Seeders;

use App\Models\User;
use Modules\PkgGestionInscription\Database\Seeders\DatabaseSeederPkgGestionInscription;
use Modules\PkgApprenants\Database\Seeders\DatabaseSeederPkgApprenants;
use Modules\PkgTableauDaffichage\Database\Seeders\DatabaseSeederPkgTableauDaffichage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed the default user
        if (User::where('email', 'test@example.com')->doesntExist()) {
            User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'), // Or any password you want
            ]);
        }

        // $user = User::create([
        //     'name'=>'admin',
        //     'email'=>'admin@gmail.com',
        //     'password'=>bcrypt('admin')
        // ]);

        $this->call([
            // RolePermissionSeeder::class,
            DatabaseSeederPkgApprenants::class,
            DatabaseSeederPkgTableauDaffichage::class,
            DatabaseSeederPkgGestionInscription::class
        ]);
        // $user->assignRole('admin');
    }
}
