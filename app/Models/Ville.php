<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    protected $table = 'ville';

    protected $fillable = [
        'nom_ville',
        'region',
        'image',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region');
    }
}