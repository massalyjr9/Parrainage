<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;

    protected $table = 'candidats';
    protected $fillable = [
        'nom', 
        'prenom', 
        'adresse_email', 
        'numero_telephone', 
        'parti_politique', 
        'slogan', 
        'photo', 
        'trois_couleurs_parti', 
        'url_page_infos',
        'user_id',
        'numero_carte_electeur',
        'nombre_parrainages',
        'user_id',
    ];

    protected $casts = [
        'trois_couleurs_parti' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}