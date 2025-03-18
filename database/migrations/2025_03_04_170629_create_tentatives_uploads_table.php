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
        Schema::create('tentatives_uploads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fichier_electeur_id')->constrained('fichiers_electeurs')->onDelete('cascade');
            $table->foreignID('user_id')->constrained()->onDelete('cascade');
            $table->string('adresse_ip');
            $table->string('checksum');
            $table->text('message_erreur')->nullable();
            $table->text('message_succes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentatives_uploads');
    }
};
