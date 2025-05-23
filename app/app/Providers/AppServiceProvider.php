<?php

namespace App\Providers;

use App\Models\Article;
use App\Policies\ArticlePolicy;
use Illuminate\Support\ServiceProvider;
use Modules\PkgGestionInscription\app\Providers\PkgGestionInscriptionServiceProvider;

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
