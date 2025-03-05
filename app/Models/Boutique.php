<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    use HasFactory;

    
        protected $fillable = [
            'name',
            'image',
            'location',
            'city',
            'description',
            'owner_name',
            'phone',
            'business_type'
        ];
    
}

