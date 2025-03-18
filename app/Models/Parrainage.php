<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parrainage extends Model
{

    protected $fillable = [
        'candidat_id',
        'electeur_id',
        'code_verification',
        'date_debut',
        'date_fin',
        'status',
    ];

    // Define relationships
    public function parrain()
    {
        return $this->belongsTo(User::class, 'electeur_id');
    }

    public function filleul()
    {
        return $this->belongsTo(User::class, 'candidat_id');
    }
}