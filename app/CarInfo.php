<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarInfo extends Model
{
    protected $fillable = [
        'brandstof', 'kleur', 'kilometers', 'trekgewicht', 'gewicht', 'vermogen',
        'laadvermogen', 'stadverbruik', 'verbruik', 'coverbruik', 'APK', 'topsnelheid',
        'zitplaatsen', 'cilinder_inhoud', 'versnellingen'
    ];
    protected $guarded = [];
    protected $primaryKey = 'voertuig_id';
    protected $table = 'car_info';
}
