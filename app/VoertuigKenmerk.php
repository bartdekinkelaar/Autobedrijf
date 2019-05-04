<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VoertuigKenmerk extends Model
{
    protected $fillable = [
        'kenmerk_naam', 'kenmerk_uitleg', 'kenmerk_standaard'
    ];
    protected $guarded = [];
    protected $primaryKey = 'kenmerk_id';
    protected $table = 'voertuig_kenmerken';
}