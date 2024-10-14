<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * [Info] Lancement des « seeders ».
     * Les « seeders » sont des outils pratiques permettant d'alimenter facilement notre base dans le cadre de test par exemple.
     * Le « seeder » utilisateur a besoin d'une référence « role » (une clé étrangère depuis les valeurs de la table role)
     * c'est pourquoi il est appelé après celui-ci, l'ordre d'appel à une importance.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
      ]);
    }
}
