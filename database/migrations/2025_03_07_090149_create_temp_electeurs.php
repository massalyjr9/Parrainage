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
        Schema::create('temp_electeurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tentative_upload_id')->constrained('tentatives_uploads')->onDelete('cascade');
            $table->string('numero_carte_electeur')->unique();
            $table->string('numero_carte_identite')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('sexe');
            $table->string('numero_telephone')->unique();
            $table->string('adresse_email')->unique();
            $table->string('numero_bureau_vote');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_electeurs');
    }
};