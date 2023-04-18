<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    //-----------
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:drivers|max:255',
            'phone_no' => 'required',
            'password' => 'required',
            'cnic' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 401);
        }
        $data = $request->all();

        $data['password'] = Hash::make($request->password);
        $driver = Driver::create($data);
        return response()->json([
            'driver' => $driver,
            'message' => 'Driver registered successfully.'
        ], 200);
    }
    // ---------
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 401);
        }
        $driver = Driver::where('email', $request->email)->first();
        if ($driver) {
            if (Hash::check($request->password, $driver->password)) {
                // $token = $driver->createToken("API TOKEN")->plainTextToken;
                $response = [
                    // 'token' => $token,
                    'driver' => $driver,
                    'message' => 'Driver login successfully.',
                ];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" =>'driver does not exist'];
            return response($response, 422);
        }
    }
    // ----------
    public function getDriverCars(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        $drivercars = Car::with('images')->where('driver_id', $request->id)->get();
        return response()->json(
            $drivercars,
       );
    }
    // --------
    public function getDriverBookings($id)
    {
        $driverbookings = Booking::with('user')->with('car')->where('driver_id', $id)->get();
        return response()->json(
            $driverbookings,
        );
    }
    // --------
    public function driverupdateProfile(Request $request)
    {
        $id = $request->driver_id;
        $diver = Driver::find($id);
        $data = $request->all();
        // ------ cnic front
        if($request->has('cnic_front')){

             $path = '/driver-profile';
             $cnic_front = $request->cnic_front;  //  base64 encoded
             $cnic_front = str_replace('data:image/png;base64,', '', $cnic_front);
             $cnic_front = str_replace(' ', '+', $cnic_front);
             $imageName = time().'_'.uniqid().'.'.'png';
             
             File::put(public_path($path). '/' . $imageName, base64_decode($cnic_front));
             $data['cnic_front'] = $imageName;
             
         }
        // ------ cnic back
        if($request->has('cnic_back')){

             $path = '/driver-profile';
             $cnic_back = $request->cnic_back;  //  base64 encoded
             $cnic_back = str_replace('data:image/png;base64,', '', $cnic_back);
             $cnic_back = str_replace(' ', '+', $cnic_back);
             $imageName = time().'_'.uniqid().'.'.'png';
             
             File::put(public_path($path). '/' . $imageName, base64_decode($cnic_back));
             $data['cnic_back'] = $imageName;
             
         }
        // ------ licnece
        if($request->has('licence')){

             $path = '/driver-profile';
             $licence = $request->licence;  //  base64 encoded
             $licence = str_replace('data:image/png;base64,', '', $licence);
             $licence = str_replace(' ', '+', $licence);
             $imageName = time().'_'.uniqid().'.'.'png';
             
             File::put(public_path($path). '/' . $imageName, base64_decode($licence));
             $data['licence'] = $imageName;
             
         }
        // ------ profile photo
        if($request->has('profile_photo')){

             $path = '/driver-profile';
             $profile_photo = $request->profile_photo;  //  base64 encoded
             $profile_photo = str_replace('data:image/png;base64,', '', $profile_photo);
             $profile_photo = str_replace(' ', '+', $profile_photo);
             $imageName = time().'_'.uniqid().'.'.'png';
             
             File::put(public_path($path). '/' . $imageName, base64_decode($profile_photo));
             $data['profile_photo'] = $imageName;
             
         }

         try {
            $driver = $diver->update($data);
            
            // get the updated driver data from the database
            $driver = Driver::find($id);
            return response()->json([
                'message' => true,
                'data' => $driver,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => false,
                'error' => $e->getMessage(),
            ]);
        }
    }
}
