<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Vehicle;
use App\Models\VehicleImage;
use RealRashid\SweetAlert\Facades\Alert;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function vehicleList()
    {
        return view('vehicles.vehicleList');
    }
}
