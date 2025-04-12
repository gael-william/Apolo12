<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// app/Models/Commande.php
class Commande extends Model
{
    protected $fillable = [
        'boutique_id',
        'produit',
        'quantite',
        'total',
        'numero_telephone',
        'etat'
    ];

    public function boutique()
    {
        return $this->belongsTo(Boutique::class);
    }
}

