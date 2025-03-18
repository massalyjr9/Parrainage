<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fichiersElecteur extends Model
{
    protected $table = 'fichiers_electeurs';
    protected $fillable = ['nom_fichier', 'checksum', 'utilisateur_upload', 'adresse_ip'];
}
