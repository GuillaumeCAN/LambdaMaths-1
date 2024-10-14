<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * [Info] Migration de la table des rôles.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('entitled');
            $table->timestamps();
        });
    }

    /**
     * [Info] Annulation de la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
