<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $car = Car::find(6);
        return view('index', compact('car'));
    }
}
