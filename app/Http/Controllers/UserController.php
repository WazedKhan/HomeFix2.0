<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;

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
    public function userLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
