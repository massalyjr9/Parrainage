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
        Schema::create('electeurs', function (Blueprint $table) {
            $table->id();
            $table->string('numero_carte_electeur')->unique();
            $table->string('numero_carte_identite')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->enum('sexe', ['Masculin', 'Féminin']);
            $table->string('adresse_email')->unique();
            $table->string('numero_telephone')->unique();
            $table->integer('numero_bureau_vote');
            $table->foreignId('candidat_id')->nullable()->constrained('candidats')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('electeurs');
    }
};
