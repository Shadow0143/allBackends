<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Homes;
use App\Models\HomeImages;
use Alert;
use Illuminate\Support\Facades\URL;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $allhouse = Homes::orderBy('price', 'desc')->paginate(2);
        foreach ($allhouse as $key => $val) {
            $houseImage = Homeimages::where('home_id', $val->id)->get();
            $allhouse[$key]->houseImage = $houseImage;
        }
        // dd($allhouse);
        return view('home.list', compact('allhouse'));
    }

    public function addHome()
    {
        $data = '';
        $image = '';
        return view('home.addHome', compact('data', 'image'));
    }

    public function submitHome(Request $request)
    {

        if (!empty($request->id)) {
            $home = Homes::find($request->id);
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

                foreach ($request->file('image') as $key => $image) {
                    $name =  time() . $request->type . '-house' . $home->id . $key . '.' . $image->getClientOriginalExtension();
                    $result = public_path('houseImage');
                    $image->move($result, $name);
                    $houseImage = new HomeImages();
                    $houseImage->home_id = $home->id;
                    $houseImage->image  = $name;
                    $houseImage->save();
                }
            }
            toast('Your Home as been Updated!', 'success');
        } else {
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
                foreach ($request->file('image') as $key => $image) {
                    $name =  time() . $request->type . '-house' . $home->id . $key . '.' . $image->getClientOriginalExtension();
                    $result = public_path('houseImage');
                    $image->move($result, $name);
                    $houseImage = new HomeImages();
                    $houseImage->home_id = $home->id;
                    $houseImage->image  = $name;
                    $houseImage->save();
                }
            }

            toast('Your Home as been added!', 'success');
        }

        return redirect()->route('list');
    }

    public function editHome($id)
    {
        $data = Homes::find($id);
        $image = HomeImages::where('home_id', $id)->get();
        return view('home.addHome', compact('data', 'image'));
    }

    public function editHomeStatus(Request $request)
    {
        $update = Homes::find($request->id);
        $update->status = $request->value;
        $update->save();
        $data = $request->value;
        return $data;
    }

    public function deleteimage(Request $request)
    {

        $image = HomeImages::find($request->id);
        $image->delete();
        return 'success';
    }

    public function knowMore(Request $request)
    {
        $data = Homes::find($request->id);

        $image = HomeImages::where('home_id', $request->id)->get();

        $slider = '  <div id="carouselExampleIndicator" class="carousel slide"
        data-ride="carousel">

        <div class="carousel-inner">';
        foreach ($image as $key => $val) {

            $slider .= '<div class="carousel-item active"><img class="d-block w-100" src="' . url('') . '/houseImage/' . $val->image . '" alt="First slide"></div>';
        }
        $slider .= '</div>
        <a class="carousel-control-prev" href="#carouselExampleIndicator"
            role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicator"
            role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>';


        $data->slider = $slider;
        return $data;
    }

    public function filterproperty(Request $request)
    {
        // dd($request->all());

        $allhouse = Homes::where($request->type, 'like', '%' . $request->keyword . '%')->get();
        foreach ($allhouse as $key => $val) {
            $houseImage = Homeimages::where('home_id', $val->id)->get();
            $allhouse[$key]->houseImage = $houseImage;
        }

        // dd($allhouse);
        return view('home.ajaxHome', compact('allhouse'));
    }

    public function filterorder(Request $request)
    {
        if ($request->type) {
            $allhouse = Homes::where($request->type, 'like', '%' . $request->keyword . '%')->orderBy('price', $request->order)->get();
        } else {
            $allhouse = Homes::orderBy('price', $request->order)->get();
        }
        foreach ($allhouse as $key => $val) {
            $houseImage = Homeimages::where('home_id', $val->id)->get();
            $allhouse[$key]->houseImage = $houseImage;
        }

        // dd($allhouse);
        return view('home.ajaxHome', compact('allhouse'));
    }
}