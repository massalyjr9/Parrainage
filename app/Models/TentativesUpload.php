<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentativesUpload extends Model {
    use HasFactory;

    protected $table = 'Tentative_uploads';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['utilisateurUpload', 'dateUpload', 'adresseIp', 'agentDGE_id'];

    public function administrateurDGE() {
        return $this->belongsTo(AdministrateurDGE::class, 'agentDGE_id','id');}
}
