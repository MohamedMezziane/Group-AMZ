<?php

namespace Modules\PkgGestionInscription\app\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
// use Modules\PkgGestionInscription\Models\Article;
// use Modules\PkgGestionInscription\Policies\ArticlePolicy;

class PkgGestionInscriptionServiceProvider extends ServiceProvider
{
    // protected $policies = [
    //     Article::class => ArticlePolicy::class,
    // ];
    public function boot()
    {
        // Charger les routes
        $this->loadRoutesFrom(__DIR__.'/../../Routes/web.php');

        // Charger les migrations
        $this->loadMigrationsFrom(__DIR__.'/../../Database/Migrations');

        // Charger les vues
        $this->loadViewsFrom(__DIR__.'/../../Resources/views', 'PkgGestionInscription');

        // Publier les assets si nécessaire
    }

    public function register()
    {
        // Enregistrer d'autres services si nécessaire
    }
}
