<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [];

    /**
     * [Info] Génération du message de vérification d'adresse email.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Bienvenue sur LambdaMaths.fr')
                ->line('Bienvenue sur LambdaMaths.fr, l\'équipe est heureuse de vous compter parmi ses membres !')
                ->line('Merci de cliquer ici pour vérifier votre compte 👇')
                ->action('Vérifier mon email', $url);
        });
    }
}
