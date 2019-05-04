<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    protected $fillable = [
        'brandname', 'country'
    ];
    protected $guarded = [];
    protected $primaryKey = 'brand_id';
    protected $table = 'car_brands';
}