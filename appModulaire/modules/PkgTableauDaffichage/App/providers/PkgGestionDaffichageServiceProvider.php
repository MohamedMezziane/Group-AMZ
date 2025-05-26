<?php

namespace modules\PkgTableauDaffichage\App\providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
// use Modules\Blog\Models\Article;
// use Modules\Blog\Policies\ArticlePolicy;

class PkgGestionDaffichageServiceProvider extends ServiceProvider
{
    // protected $policies = [
    //     Article::class => ArticlePolicy::class,
    // ];
    public function boot()
    {
        Paginator::useBootstrap();
        // Charger les routes
        $this->loadRoutesFrom(__DIR__ . '/../../Routes/web.php');

        // Charger les migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../Database/Migrations');

        // Charger les vues
        $this->loadViewsFrom(__DIR__ . '/../../views', 'PkgTableauDaffichage');
    }

    public function register()
    {
        // Enregistrer d'autres services si nécessaire
    }
}
