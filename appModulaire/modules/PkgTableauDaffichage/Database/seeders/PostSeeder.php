<?php

namespace Modules\PkgTableauDaffichage\Database\seeders;

use Illuminate\Database\Seeder;
use Modules\PkgTableauDaffichage\Models\Post;
use Modules\PkgTableauDaffichage\Models\PostCategory;

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
            ['Retour en classe', 'Les cours reprendront officiellement le 1er septembre.', 'back-to-school.jpg'],
            ['Incendie simulé demain', 'Un exercice d\'évacuation aura lieu à 10h.', 'fire-drill.jpg'],
            ['Menu de la cantine', 'Découvrez les nouveaux plats sains proposés.', null],
            ['Réunion des parents', 'Une réunion pour les parents d\'élèves aura lieu vendredi.', 'parent-meeting.jpg'],
            ['Championnat de foot', 'L\'équipe locale participera au tournoi interscolaire.', 'football.jpg'],
            ['Nouveaux ordinateurs', 'Des ordinateurs neufs ont été installés au laboratoire.', 'new-pcs.jpg'],
            ['Journée culturelle', 'Participez à la fête de la culture ce samedi.', 'culture-day.jpg'],
            ['Atelier santé mentale', 'Séance spéciale pour parler de bien-être étudiant.', 'mental-health.jpg'],
            ['Sécurité renforcée', 'De nouvelles caméras ont été installées.', 'security.jpg'],
            ['Pause hivernale', 'L\'école fermera pour les vacances d\'hiver du 20 déc. au 3 janv.', 'winter-break.jpg'],
            ['Bourse scolaire', 'Les demandes de bourse sont ouvertes jusqu\'au 15 novembre.', null],
            ['Concert de l\'école', 'Rejoignez-nous pour un spectacle musical des élèves.', 'school-concert.jpg'],
            ['Semaine du livre', 'Les élèves sont invités à lire un livre par jour.', 'book-week.jpg'],
            ['Vaccination gratuite', 'Centre mobile de vaccination sur le campus mardi prochain.', 'vaccination.jpg'],
            ['Coupure d\'électricité', 'Maintenance prévue samedi entre 8h et 12h.', 'electricity.jpg'],
            ['Film éducatif', 'Projection spéciale au réfectoire vendredi après-midi.', 'film.jpg'],
            ['Conférence sur le climat', 'Intervention d\'un expert environnemental ce lundi.', 'climate.jpg'],
            ['Collecte alimentaire', 'Aidez les familles en difficulté en apportant des denrées.', 'food-drive.jpg'],
            ['Distribution de masques', 'Des masques gratuits seront distribués mardi.', 'masks.jpg'],
            ['Nouvelle bibliothèque', 'La nouvelle médiathèque ouvre ses portes ce jeudi.', 'library.jpg'],
        ];

        foreach ($posts as [$titre, $description, $image]) {
            Post::create([
                'titre' => $titre,
                'description' => $description,
                'image_url' => $image ? "https://example.com/images/$image" : null,
                'categorie_id' => $categories->random()->id,
            ]);
        }
    }
}