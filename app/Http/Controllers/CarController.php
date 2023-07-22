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
    public function storeCar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'car_model' => 'required',
            'car_make' => 'required',
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
        // ---car image
        if ($request->has('image')) {

            $path = '/car-images';
            $image = $request->image;  //  base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = time() . '.' . 'png';

            File::put(public_path($path) . '/' . $imageName, base64_decode($image));
            $data['image'] = $imageName;
        }
        if ($request->has('image2')) {

            $path = '/car-images';
            $image2 = $request->image2;  //  base64 encoded
            $image2 = str_replace('data:image/png;base64,', '', $image2);
            $image2 = str_replace(' ', '+', $image2);
            $imageName2 = time() . '.' . 'png';

            File::put(public_path($path) . '/' . $imageName2, base64_decode($image2));
            $data['image2'] = $imageName2;
        }
        if ($request->has('image3')) {

            $path = '/car-images';
            $image3 = $request->image3;  //  base64 encoded
            $image3 = str_replace('data:image/png;base64,', '', $image3);
            $image3 = str_replace(' ', '+', $image3);
            $imageName3 = time() . '.' . 'png';

            File::put(public_path($path) . '/' . $imageName3, base64_decode($image3));
            $data['image3'] = $imageName3;
        }
        if ($request->has('image4')) {

            $path = '/car-images';
            $image4 = $request->image4;  //  base64 encoded
            $image4 = str_replace('data:image/png;base64,', '', $image);
            $image4 = str_replace(' ', '+', $image4);
            $imageName4 = time() . '.' . 'png';

            File::put(public_path($path) . '/' . $imageName4, base64_decode($image4));
            $data['image4'] = $imageName4;
        }
        if ($request->has('image5')) {

            $path = '/car-images';
            $image5 = $request->image5;  //  base64 encoded
            $image5 = str_replace('data:image/png;base64,', '', $image5);
            $image5 = str_replace(' ', '+', $image5);
            $imageName5 = time() . '.' . 'png';

            File::put(public_path($path) . '/' . $imageName5, base64_decode($image5));
            $data['image5'] = $imageName5;
        }
        $ip = request()->ip();
        $data['ip'] = $ip;
        $cars = Car::create($data);

        // Upload images
        // if ($request->has('image')) {
        //     foreach ($request->image as $key => $image) {
        //         $path = '/car-images';
        //         $image = str_replace('data:image/png;base64,', '', $image);
        //         $image = str_replace(' ', '+', $image);
        //         $imageName = time() . $key . '.png';

        //         File::put(public_path($path) . '/' . $imageName, base64_decode($image));

        //         $car_image = new CarImage();
        //         $car_image->car_id = $cars->id;
        //         $car_image->image = $imageName;
        //         $car_image->save();
        //     }
        // }
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
        $cars = Car::with('driver')->where('ad_status', '=', 1)->get();
        return response()->json(
            $cars,
        );
    }
    // ---------------
    public function deleteCar($id)
    {
        $cars = Car::find($id);
        $cars->delete();
        return response()->json([
            'message' => 'Car has been deleted successfully.',

        ]);
    }
    // -------------
    public function carUpdate(Request $request, $id)
    {
        $car = Car::find($id);
        $data = $request->all();
        $car = $car->update($data);

        return response()->json([
            'message' => 'Car updated successfully',
            'car' => $car,
        ]);
    }
    // ----------
    public function carStatus($id)
    {
        $car = Car::find($id);
        $car->car_status = 'booked';
        $car->save();
        return response()->json([
            'message' => true,
            'car' => $car,
        ]);
    }
    // ----------
    public function searchCars(Request $request)
    {
        // Retrieve the search parameters from the request
        $car_make = request('car_make');
        $tranmission = request('car_tranmission');
        $car_model = request('car_model');
        $engine_capacity = request('engine_capacity');
        $model_year = request('model_year');
        $city = request('city');
        $car_rent = request('car_rent');
        $driver = request('driver_availability');
        // Perform the search using the retrieved parameters
        $cars = Car::where('car_make', 'LIKE', "%$car_make%")
            ->where('car_tranmission', 'LIKE', "%$tranmission%")->where('car_model', 'LIKE', "%$car_model%")->where('engine_capacity', 'LIKE', "%$engine_capacity%")->where('model_year', 'LIKE', "%$model_year%")->where('pickup_city', 'LIKE', "%$city%")->where('car_rent', 'LIKE', "%$car_rent%")->where('driver_availability', 'LIKE', "%$driver%")->get();

        return response()->json([
            'message' => true,
            'cars' => $cars,
        ]);
    }
}
