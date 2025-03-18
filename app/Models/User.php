<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];

    protected $hidden = ['password'];

    public function isAgentDGE()
    {
        return $this->role === 'agentdge';
    }

    public function isCandidat()
    {
        return $this->role === 'candidat';
    }

    public function isElecteur()
    {
        return $this->role === 'electeur';
    }
    
    public function candidat()
    {
        return $this->hasOne(Candidat::class);
    }
    
    public function electeur()
    {
        return $this->hasOne(Electeur::class, 'user_id');
    }
}