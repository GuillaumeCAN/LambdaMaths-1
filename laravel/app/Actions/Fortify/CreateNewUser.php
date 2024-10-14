<?php

namespace App\Actions\Fortify;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * [Info] Création d'un utilisateur.
     *
     * @param array<string, string> $input
     *
     * @throws ValidationException
     */
    public function create(array $input): User
    {
        /** [Info] Vérifie la conformité des données du nouvel utilisateur selon des règles strictes grâce à Validator::. */
        Validator::make($input, [
            'email' => ['email', 'max:255', 'required', 'string', Rule::unique(User::class)],
            'name' => ['alpha:ascii', 'max:32', 'min:2', 'required', 'string'],
            'password' => $this->passwordRules(),
        ])->validate();

        /**
         * [Info] Enregistre l'utilisateur dans l'application
         * Via son Model, qui est sa représentation objet dans la base de données,
         * Laravel s'occupe du traitement SQL pour nous via le « User Model », c'est l'avantage de l'ORM - Object-Relational Mapping.
         */
        $user = User::create([
            'email' => $input['email'],
            'name' => $input['name'],
            'password' => Hash::make($input['password']), /** Hash:: → @see https://laravel.com/docs/hashing#hashing-passwords */
            'role_id' => Role::MEMBRE, /** [Info] Par défaut un utilisateur est « membre » */
        ]);
        /** [Info] Log nos informations dans storage/logs/app.log → ici le canal app pour « application » */
        Log::channel('app')->info('L\'utilisateur '.$user->email.'('.$user->id.') a été créé.');

        return $user;
    }
}
