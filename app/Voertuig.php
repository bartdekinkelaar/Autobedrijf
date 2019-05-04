<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voertuig extends Model
{
    protected $fillable = [
        'naam', 'deuren', 'merk_id', 'bouwjaar', 'transmissie', 'prijs'
    ];
    protected $primaryKey = 'id';
    protected $table = 'voertuigen';
}
