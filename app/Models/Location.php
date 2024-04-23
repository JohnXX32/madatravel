<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'location';

    protected $fillable = [
        'id_user',
        'id_produit',
        'quantite',
        'date_debut',
        'date_fin',
    ];

    public function users()
    {
        return $this->belongsTo(Users::class, 'id_user');
    }

    public function produits()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }
}
