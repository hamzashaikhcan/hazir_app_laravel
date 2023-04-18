<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'driver_id',
        'car_model',
        'car_name',
        'car_no',
        'car_pictures',
        'ip',
        'longitude',
        'latitude',
        'city',
        'state',
        'country',
    ];
    public function images()
    {
        return $this->hasMany(CarImage::class);
    }
}
