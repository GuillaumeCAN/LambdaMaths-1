<?php

namespace Database\Seeders;

use App\Enums\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * [Info] Enregistrement des utilisateurs en base de données.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'email' => 'contact@lambdamaths.fr',
                'firstname' => 'Guillaume',
                'lastname' => 'Cancalon',
                'phone' => '+33600000000',
                'subscribed' => '1',
                'password' => Hash::make('admin1234'),
                'role_id' => Role::ADMINISTRATEUR,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'email' => 'francois.cancalon@gmail.com',
                'firstname' => 'Francois',
                'lastname' => 'Cancalon',
                'phone' => '+33600000000',
                'subscribed' => '1',
                'password' => Hash::make('motdepasse'),
                'role_id' => Role::PROFESSEUR,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'email' => 'clara@gmail.com',
                'firstname' => 'Clara',
                'lastname' => 'Champagne',
                'phone' => '+33600000000',
                'subscribed' => '0',
                'password' => Hash::make('camilleLM123'),
                'role_id' => Role::MEMBRE,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'email' => 'durandana@gmail.com',
                'firstname' => 'Durandana',
                'lastname' => 'Garcia',
                'phone' => '+33600000000',
                'subscribed' => '0',
                'password' => Hash::make('durandanaLM123'),
                'role_id' => Role::MEMBRE,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'email' => 'alexandrin@gmail.com',
                'firstname' => 'Alexandrin',
                'lastname' => 'Garnier',
                'phone' => '+33600000000',
                'subscribed' => '1',
                'password' => Hash::make('alexandrinLM123'),
                'role_id' => Role::MEMBRE,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'email' => 'clothilde@gmail.com',
                'firstname' => 'Clothilde',
                'lastname' => 'Desjardins',
                'phone' => '+33600000000',
                'subscribed' => '0',
                'password' => Hash::make('clothildeLM123'),
                'role_id' => Role::MEMBRE,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'email' => 'margaux@gmail.com',
                'firstname' => 'Margaux',
                'lastname' => 'Berie',
                'phone' => '+33600000000',
                'subscribed' => '0',
                'password' => Hash::make('margauxLM123'),
                'role_id' => Role::MEMBRE,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
      ]);
    }
}
