<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Torann\GeoIP\Facades\GeoIP;
use Stevebauman\Location\Facades\Location;

// use App\Http\Controllers\GeoIP;


class CarController extends Controller
{
    //
    public function storeCar(Request $request) {
        $validator = Validator::make($request->all(), [
            'car_model' => 'required',
            'car_no' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 401);
        }
        $data = $request->all();
        // $ipAddress = $request->ip();
        // $location = GeoIP::getLocation($ipAddress);
        $ip = request()->ip(); 
        // $data['longitude'] = $location['longitude'];
        // $data['latitude'] = $location['latitude '];
        // $data['city'] = $location['cityName '];
        // $data['state'] = $location['regionName '];
        // $data['country'] = $location['countryName '];
        $data['ip'] = $ip;
        $cars = Car::create($data);
        return response()->json([
            'car' => $cars,
        ]);
    }
    // -------------
    public function allCar()
    {
        $cars = Car::all();
        return response()->json([
            'cars' => $cars,
        ]);
    }
}
