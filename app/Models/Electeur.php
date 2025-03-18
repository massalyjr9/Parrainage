<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electeur extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_carte_electeur', 
        'numero_carte_identite', 
        'nom', 
        'prenom', 
        'date_naissance', 
        'lieu_naissance', 
        'sexe', 
        'numero_telephone', 
        'adresse_email', 
        'numero_bureau_vote',
        'code_auth',
        'user_id', // Ajouter le champ user_id
    ];

    public function parrainages()
    {
        return $this->hasMany(Parrainage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}