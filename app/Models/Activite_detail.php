<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite_detail extends Model
{
    use HasFactory;

    protected $table = 'activite_details';

    protected $fillable = [
        'id_activite',
        'nom',
        'id_ville',
        'prix',
    ];

    public function activite()
    {
        return $this->belongsTo(Activite::class, 'id_activite');
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'id_ville');
    }
}
