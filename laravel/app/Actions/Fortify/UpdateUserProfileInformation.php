<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * [Info] Vérifie et met à jour les informations de l'utilisateur.
     *
     * @param User $user
     * @param array<string, string> $input
     *
     * @throws ValidationException
     */
    public function update(User $user, array $input): void
    {
        /**
         * [Info] Fortify nous met à disposition une action qui va nous permettre de mettre à jour un utilisateur
         * (dans le cas d'un changement d'email par exemple).
         */
        Validator::make($input, [
            'email' => ['email', 'max:255', 'required', 'string', Rule::unique('users')->ignore($user->id)],
            'name' => ['alpha:ascii', 'max:32', 'min:2', 'required', 'string'],
        ])->validateWithBag('updateProfileInformation');

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'email' => $input['email'],
                'name' => $input['name'],
            ])->save();
        }
    }

    /**
     * [Info] Fortify envoie un mail de vérification dans le cas d'un email non vérifié → $user->sendEmailVerificationNotification();
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'email' => $input['email'],
            'email_verified_at' => null,
            'name' => $input['name'],
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
