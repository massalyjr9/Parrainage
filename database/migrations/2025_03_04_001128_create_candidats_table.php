<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('numero_carte_electeur')->unique()->default(Str::uuid());
            $table->string('adresse_email')->unique();
            $table->string('numero_telephone')->unique();
            $table->string('parti_politique')->nullable();
            $table->string('slogan')->nullable();
            $table->string('photo')->nullable();
            $table->json('trois_couleurs_parti')->nullable();
            $table->string('url_page_infos')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
