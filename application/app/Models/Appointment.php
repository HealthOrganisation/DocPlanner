<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_doctor',
        'id_patient',
        'id_dispo',
        'phone',
        'email',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctor');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }

    public function disponibilite()
    {
        return $this->belongsTo(Availability::class, 'id_dispo');
    }
    
    // app/Models/Patient.php
public function appointments()
{
    return $this->hasMany(Appointment::class, 'id_patient'); // Utiliser le bon nom de colonne pour la clé étrangère
}

}
