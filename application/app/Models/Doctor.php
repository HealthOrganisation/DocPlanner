<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Doctor extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_doctor';
    protected $table = 'doctors';

    protected $fillable = [
        'id_user',
        'nom',
        'specialite',
        'location',
        'phone',
        'date_debut',
        'image',
        'availabilityStatus',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function availabilities()
    {
        return $this->hasMany(Availability::class, 'id_doctor');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_doctor');
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'id_doctor');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'id_doctor');
    }

    public function patients() {
        return $this->belongsToMany(Patient::class);
    }
}
