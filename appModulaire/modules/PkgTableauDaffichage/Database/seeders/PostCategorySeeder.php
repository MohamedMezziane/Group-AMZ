<?php

// database/seeders/PostCategorySeeder.php

namespace Modules\PkgTableauDaffichage\Database\seeders;

use Illuminate\Database\Seeder;
use Modules\PkgTableauDaffichage\models\PostCategory;

class PostCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Annonces', 'Événements', 'Menus', 'Urgence', 'Divers'];

        foreach ($categories as $nom) {
            PostCategory::create(['nom' => $nom]);
        }
    }
}
