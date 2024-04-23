<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $fillable = [
        'id_user',
        'id_activite_detail',
        'date_debut',
        'date_fin',
    ];

    public function users()
    {
        return $this->belongsTo(Users::class, 'id_user');
    }

    public function activite_details()
    {
        return $this->belongsTo(Activite_detail::class, 'id_activite_detail');
    }

}
