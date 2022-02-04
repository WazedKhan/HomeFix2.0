<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $types = Type::all();
        $service = Service::all();
        $provider = ServiceProvider::all();
        return view('home',compact('types','service','provider'));
    }

    public function serviceIndex()
    {
        $key=null;
        if(request()->search){
            $key=request()->search;
            $service = Service::where('name','LIKE','%'.$key.'%')
                ->where('status','active')
                ->orWhere('cost','LIKE','%'.$key.'%')
                ->get();
            return view('services.list',compact('service','key'));
        }
        $service = Service::where('status','active')->get();
        return view('services.list',compact('service','key'));
    }
}
