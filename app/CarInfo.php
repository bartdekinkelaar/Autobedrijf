<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarInfo extends Model
{
    protected $fillable = [
        'fuel', 'colo', 'kilometres', 'pullweight', 'weight', 'power',
        'laadvermogen', 'emission', 'APK', 'topspeed',
        'seats', 'cilinder_inhoud', 'accelerators'
    ];
    protected $guarded = [];
    protected $primaryKey = 'car_id';
    protected $table = 'car_info';
}
