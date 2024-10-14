<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * [Info] Enregistrement des rôles en base de données.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'description' => 'Possède les droits les plus élevés de toute l\'application '.env('APP_NAME'),
                'entitled' => 'Administrateur',
            ],
            [
                'description' => 'Occupe le poste de professeur sur '.env('APP_NAME'),
                'entitled' => 'Professeur',
            ],
            [
                'description' => 'Occupe le poste d\'élève abonné sur '.env('APP_NAME'),
                'entitled' => 'Abonné',
            ],
            [
                'description' => 'Occupe le poste d\'élève sur '.env('APP_NAME'),
                'entitled' => 'Membre',
            ],
        ]);
    }
}
