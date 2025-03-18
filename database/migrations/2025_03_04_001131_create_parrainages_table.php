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
        Schema::create('parrainages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('electeur_id')->constrained('electeurs')->onDelete('cascade');
            $table->foreignId('candidat_id')->constrained('candidats')->onDelete('cascade');
            $table->string('code_verification')->nullable();
            $table->enum('statut', ['validé', 'en_attente', 'rejeté'])->default('en_attente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parrainages');
    }
};
