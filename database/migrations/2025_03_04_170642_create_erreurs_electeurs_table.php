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
        Schema::create('erreurs_electeurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tentative_upload_id')->constrained('tentatives_uploads')->onDelete('cascade');
            $table->string('numero_carte_identite');
            $table->string('numero_carte_electeur');
            $table->text('probleme');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('erreurs_electeurs');
    }
};
