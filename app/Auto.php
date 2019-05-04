<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $fillable = [
        'naam', 'deuren', 'merk_id', 'bouwjaar', 'transmissie', 'prijs'
    ];
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'voertuigen';
}
