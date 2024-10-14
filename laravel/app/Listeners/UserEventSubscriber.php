<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

class UserEventSubscriber
{
    /**
     * Create the event listener.
     */
    public function __construct() {}

    /**
     * [Info] Gère l'événement: un utilisateur se connecte.
     */
    public function handleUserLogin(Login $event): void
    {
        $user = $event->user;

        if ($user) {
            $user->is_online = true;
            $user->save();
        }
    }

    /**
     * [Info] Gère l'événement: un utilisateur se déconnecte.
     */
    public function handleUserLogout(Logout $event): void
    {
        $user = $event->user;

        if ($user) {
            $user->is_online = false;
            $user->save();
        }
    }

    /**
     * [Info] Enregistre les écouteurs d'évènements.
     *
     * @return array<string, string>
     */
    public function subscribe(): array
    {
        return [
            Login::class => 'handleUserLogin',
            Logout::class => 'handleUserLogout',
        ];
    }
}
