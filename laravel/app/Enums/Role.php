<?php

namespace App\Enums;

/**
 * [Info] L'utilisation des « énumérations » en PHP améliore la lisibilité, la sécurité, la maintenance et la documentation du code,
 * tout en favorisant une approche plus structurée dans la gestion des valeurs constantes.
 * Ici cette énumération représente les valeurs possibles pour un rôle (représenté par sa clé primaire = id).
 *
 * @see https://www.php.net/manual/en/language.types.enumerations.php
 */
enum Role: int
{
    case ADMINISTRATEUR = 1;
    case PROFESSEUR = 2;
    case ABONNE = 3;
    case MEMBRE = 4;
}
