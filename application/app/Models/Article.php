<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_admin',
        'title',
        'content',
        'date_posted',
        'image',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
}
