<?php

namespace App\Providers;

use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * [Info] Le « service provider » permet d'enregistrer des "services" qui pourront ensuite être appelés dans le reste de l'application.
     * Ici, on utilise la facade View:: pour définir des valeurs partagées entre toutes nos vues. Aucune donnée sensible ne doit apparaitre ici
     *
     * @see https://laravel.com/docs/providers
     *
     * @return void
     */
    public function boot(): void
    {
        View::share('APP_AUTHOR_NAME', 'Guillaume CANCALON');
        View::share('APP_CONTACT_EMAIL', 'contact@lambdamaths.fr');
        View::share('APP_CONTACT_FACEBOOK', '#');
        View::share('APP_CONTACT_LINKEDIN', '#');
        View::share('APP_CONTACT_PHONE', '06 14 12 29 83');
        View::share('APP_CONTACT_PHONE_FORMAT', '+614122983');
        View::share('APP_CONTACT_TWITTER', '#');
        View::share('APP_COPYRIGHT_YEAR', Date::today()->year);
        View::share('APP_DESCRIPTION', 'Application permettant de dispenser des cours de maths');
        View::share('APP_NAME', env('APP_NAME'));
    }
}
