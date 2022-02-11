<?php

namespace App\Http\Controllers;

use App\Models\ServiceProvider;
use App\Models\Type;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $providers = ServiceProvider::all();
        return view('userView.home',compact('types','providers'));
    }

    public function providerProfile($id)
    {
        $provider = ServiceProvider::find($id);
        return view('userView.profile', compact('provider'));
    }
}
