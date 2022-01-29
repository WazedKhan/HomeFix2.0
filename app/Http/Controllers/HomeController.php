<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Service;
use Illuminate\Http\Request;

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
        return view('home',compact('types'));
    }

    public function serviceIndex()
    {
        $service = Service::all();
        return view('services.list',compact('service'));
    }
}
