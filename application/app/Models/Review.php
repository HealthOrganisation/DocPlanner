<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_doctor',
        'id_patient',
        'comment',
        'rating',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctor');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }
}
