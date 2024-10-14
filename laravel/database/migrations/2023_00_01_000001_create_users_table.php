<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * [Info] Migration de la table des utilisateurs.
     * Laravel nous permet de construire nos tables via Schema::, un outil pratique pour éviter d'avoir à utiliser SQL.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_online')->default(false);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone');
            $table->string('password');
            $table->boolean('subscribed')->default(0);
            $table->rememberToken();
            $table->timestamps();
            /** [Info] Pour assigner un unique rôle → @see https://datascientest.com/cle-etrangere-sql-tout-savoir */
            $table->unsignedBiginteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * [Info] Annulation de la migration (utilisé par exemple par: php artisan migrate:fresh).
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
