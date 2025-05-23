<?php

// database/seeders/PostSeeder.php

namespace Modules\PkgTableauDaffichage\Database\seeders;

use Illuminate\Database\Seeder;
use Modules\PkgTableauDaffichage\models\Post;
use Modules\PkgTableauDaffichage\models\PostCategory;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $categories = PostCategory::all();

        if ($categories->count() === 0) {
            $this->command->warn('No categories found. Run PostCategorySeeder first.');
            return;
        }

        $posts = [
            [
                'titre' => 'Retour en classe',
                'image_url' => 'https://example.com/images/back-to-school.jpg',
                'description' => 'Les cours reprendront officiellement le 1er septembre.',
                'categorie_id' => $categories->random()->id,
            ],
            [
                'titre' => 'Incendie simulé demain',
                'image_url' => 'https://example.com/images/fire-drill.jpg',
                'description' => 'Un exercice d\'évacuation aura lieu à 10h.',
                'categorie_id' => $categories->random()->id,
            ],
            [
                'titre' => 'Menu de la cantine',
                'image_url' => null,
                'description' => 'Découvrez les nouveaux plats sains proposés.',
                'categorie_id' => $categories->random()->id,
            ],
        ];

        foreach ($posts as $data) {
            Post::create($data);
        }
    }
}