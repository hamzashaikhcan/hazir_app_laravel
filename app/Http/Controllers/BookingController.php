<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    //
    public function bookCar(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'car_id' => 'required',
            'driver_id' => 'required',
            // 'distance' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 401);
        }

        $data = $request->all();
        $booking = Booking::create($data);
        $bookings = Booking::with('user')->with('car')->with('driver')->find($booking->id);

        return response()->json([
            'message' => 'Car booked successfully.',
            'bookings' => $bookings,
        ], 200);
    }   
}
