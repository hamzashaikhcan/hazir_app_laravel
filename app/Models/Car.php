<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'car_make',
        'car_no',
        'seats_capacity',
        'car_seats',
        'car_model',
        'model_year',
        'car_assembly',
        'car_varient',
        'car_tranmission',
        'car_type',
        'engine_type',
        'engine_capacity',
        'body_color',
        'image',
        'image2',
        'image3',
        'image4',
        'image5',
        'between_cities',
        'registration_city',
        'pickup_city',
        'driver_availability',
        'car_mileage',
        'car_rent',
        'description',
        'insured',
        'car_pictures',
        'car_status',
        'ip',
        'longitude',
        'latitude',
        'city',
        'state',
        'country',
        'ad_status'
    ];
    public function images()
    {
        return $this->hasMany(CarImage::class);
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
