<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'naam', 'deuren', 'merk_id', 'bouwjaar', 'transmissie', 'prijs'
    ];
    protected $primaryKey = 'id';
    protected $table = 'cars';
}
