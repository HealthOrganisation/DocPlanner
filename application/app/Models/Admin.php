<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'email',
        'password',
        'role',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'id_admin');
    }
}
