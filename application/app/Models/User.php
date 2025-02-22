<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Ajout champ role
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function patients()
    {
        return $this->hasMany(Patient::class, 'id_user');
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'id_user'); // Make sure 'id_user' is the correct foreign key.
    }
}
