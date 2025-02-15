<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_dispo';

    protected $fillable = [
        'id_doctor',
        'date',
        'start_time',
        'end_time',
        'is_available',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doctor');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
