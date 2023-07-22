<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Driver;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
   
    // -----------
    public function dashboard()
    {
        $cars = Car::count();
        $driver = Driver::count();
        // Get data for the chart
        $data = DB::table('cars')
    ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
    ->whereBetween('created_at', [Carbon::now()->subMonth(), Carbon::now()])
    ->groupBy('date')
    ->get();

        return view('admin.index', compact('cars', 'driver', 'data'));
    }
    // ------------
    public function addCar()
    {
        return view('admin.addcar');
    }
    // ----------
    public function storeCar(Request $request)
    {
        $validatedData = $request->validate([
            'car_model' => 'required',
            'car_make' => 'required',
            'car_no' => 'required',
        ]);
       
        $data = $request->all();
        // ---car image
        if($request->has('image')){

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/car-images');
            
            $image->move($path, $imageName);

            $data['image'] = $imageName;
            
        }

        $car = Car::create($data);
        return redirect('allcars')->with('message', 'Car has been added Successfully.');


    }
    // -----------
    public function allCars() 
    {
        $cars = Car::with('driver')->paginate(25);
        return view('admin.allcars', compact('cars'));
    }
    // -----------
    public function deleteCars($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return back()->with('message', 'Car Delete Successfully.');
    }
    // -----------
    public function allusers()
    {
        $users = Driver::all();
        return view('admin.allusers', compact('users'));
    }
    // ----------
    public function addUsers()
    {
        return view('admin.adduser');
    }
    // ----------
    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:drivers',
            'phone_no' => 'required',
            'cnic' => 'required',
            'password' => 'required',
        ]);
        $data = $request->all();
        // ------ cnic front
        if($request->has('cnic_front')){
            $image = $request->file('cnic_front');
            $imageName = time() . '_'.uniqid().'.' . $image->getClientOriginalExtension();
            $path = public_path('/driver-profile');
            
            $image->move($path, $imageName);

            $data['cnic_front'] = $imageName;
            
        }
       // ------ cnic back
       if($request->has('cnic_back')){
        $image = $request->file('cnic_back');
        $imageName = time() . '_'.uniqid().'.'. $image->getClientOriginalExtension();
        $path = public_path('/driver-profile');
        
        $image->move($path, $imageName);

        $data['cnic_back'] = $imageName;
            
            
        }
       // ------ licnece
       if($request->has('licence')){
            $image = $request->file('licence');
            $imageName = time() . '_'.uniqid().'.'. $image->getClientOriginalExtension();
            $path = public_path('/driver-profile');
            
            $image->move($path, $imageName);

            $data['licence'] = $imageName;
            
        }
       // ------ profile photo
       if($request->has('profile_photo')){
            $image = $request->file('profile_photo');
            $imageName = time() . '_'.uniqid().'.'. $image->getClientOriginalExtension();
            $path = public_path('/driver-profile');
            
            $image->move($path, $imageName);

            $data['profile_photo'] = $imageName;
            
        }
        
        $user = Driver::create($data);
        return back()->with('message', 'User Added Successfully.');
    }
    // -----------
    public function deleteUser($id)
    {
        $user = Driver::findOrFail($id);
        return back()->with('message', 'User Deleted Succesfully');
    }
    // --------------
    public function profile() {
        return view('admin.profile');
    }
    public function profileUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = Auth::user();
        if ($user) {
            $user->update($validatedData);
            return back()->with('message', 'Profile Updated.');
        } else {
            // Handle the case when the user is not authenticated
            return back()->with('message', 'You are not able to update.');
        }
    }
    // --------------
    public function profilePassword(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        $user = Auth::user();

        // Check if the old password is correct
        if (Hash::check($validatedData['old_password'], $user->password)) {
            // Update the user's password
            $user->password = Hash::make($validatedData['new_password']);
            $user->save();

            // Password successfully updated
            return redirect()->back()->with('message', 'Your password has been updated.');
        } else {
            // Old password is incorrect
            return redirect()->back()->with('error', 'Your old password is not correct.');
        }
    }
    // --------------
    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
