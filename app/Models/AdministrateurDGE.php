<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdministrateurDGE extends Authenticatable
{
    use HasFactory;

    protected $table = 'agentDGE';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'nom', 'prenom', 'email', 'password'];
}
