<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\PkgApprenants\App\providers\PkgApprenantsServiceProvider;
use Modules\PkgGestionInscription\app\Providers\PkgGestionInscriptionServiceProvider;
use Modules\PkgTableauDaffichage\App\Providers\PkgGestionDaffichageServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    // protected $policies = [
    //     Article::class => ArticlePolicy::class,
    // ];


    /**
     * Register any application services.
     */
    public function register(): void
    {
        
        $this->app->register(PkgGestionDaffichageServiceProvider::class);
        $this->app->register(PkgApprenantsServiceProvider::class);
        $this->app->register(PkgGestionInscriptionServiceProvider::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
