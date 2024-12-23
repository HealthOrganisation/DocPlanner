<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_dispo';

    protected $fillable = [
        'id_doc',
        'date',
        'start_time',
        'end_time',
        'is_available',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'id_doc');
    }
}
