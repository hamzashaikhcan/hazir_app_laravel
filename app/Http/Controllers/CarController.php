<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Torann\GeoIP\Facades\GeoIP;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Str;


// use App\Http\Controllers\GeoIP;


class CarController extends Controller
{
    //
    public function storeCar(Request $request) {
        $validator = Validator::make($request->all(), [
            'car_model' => 'required',
            'car_name' => 'required',
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
        $ip = request()->ip(); 
        $data['ip'] = $ip;
        $cars = Car::create($data);

        // Upload images
        if ($request->has('image')) {
            foreach ($request->image as $key => $image) {
                $path = '/car-images';
                $image = str_replace('data:image/png;base64,', '', $image);
                $image = str_replace(' ', '+', $image);
                $imageName = time() . $key . '.png';

                File::put(public_path($path) . '/' . $imageName, base64_decode($image));

                $car_image = new CarImage();
                $car_image->car_id = $cars->id;
                $car_image->image = $imageName;
                $car_image->save();
            }
        }
         // fetch the car with its related images
        $car = Car::with('images')->find($cars->id);
         return response()->json([
            'message' => true,
            'data' => $car,
         ]);
    }
    // -------------
    public function allCar()
    {
        $cars = Car::all();
        return response()->json(
            $cars,
        );
    }
}
