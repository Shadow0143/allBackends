<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homes;
use App\Models\HomeImages;
use Alert;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        return view('home.list');
    }

    public function addHome()
    {
        return view('home.addHome');
    }

    public function submitHome(Request $request)
    {

        $home = new Homes();
        $home->type = $request->type;
        $home->title = $request->title;
        $home->price = $request->price;
        $home->duration = $request->duration;
        $home->description = $request->description;
        $home->city = $request->city;
        $home->state = $request->state;
        $home->address = $request->address;
        $home->pin = $request->pin;
        $home->availabel = $request->availabel;
        $home->status = $request->status;
        $home->save();

        if ($request->hasfile('image')) {

            foreach ($request->file('image') as $image) {
                $name =  $request->type . '-house' . $home->id . '.' . $image->getClientOriginalExtension();
                $result = public_path('houseImage');
                $image->move($result, $name);
                $houseImage = new HomeImages();
                $houseImage->home_id = $home->id;
                $houseImage->image  = $name;
                $houseImage->save();
            }
        }

        toast('Your Home as been added!', 'success');


        return back();
    }
}