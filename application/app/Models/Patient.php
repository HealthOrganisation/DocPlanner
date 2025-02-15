<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_patient';

    protected $fillable = [
        'id_user',
        'nom',
        'date_naissance',
        'poids',
        'taille',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_patient');
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'id_patient');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'id_patient');
    }

    public function availabilities()
    {
        return $this->hasMany(Availability::class);
    }
}
