<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //-----------
     public function register(Request $request)
     {
 
         $validator = Validator::make($request->all(), [
             'name' => 'required',
             'email' => 'required|unique:users|max:255',
             'phone_no' => 'required',
             'password' => 'required',
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
         $user = User::create($data);
         return response()->json([
             'user' => $user,
             'message' => 'User registered successfully.'
         ], 200);
     }
    //  --------------
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
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken("API TOKEN")->plainTextToken;
                $response = [
                    'token' => $token,
                    'user' => $user,
                    'message' => 'User login successfully.',
                ];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" =>'User does not exist'];
            return response($response, 422);
        }
    }
    // ----------
    public function getUserBookings($id)
    {
        $userbookings = Booking::with('driver')->with('car.images')->where('user_id', $id)->get();
        return response()->json(
            $userbookings,
        );
    }

}
