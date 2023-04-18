<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'cnic',
        'phone_no',
        'cnic_front',
        'cnic_back',
        'licence',
        'location',
        'profile_photo',
        'password',
    ];

}
