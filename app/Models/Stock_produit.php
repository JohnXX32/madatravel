<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock_produit extends Model
{
    use HasFactory;

    protected $table = 'stock_produits';

    protected $fillable = [
        'id_produit',
        'quantite',
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }
}
