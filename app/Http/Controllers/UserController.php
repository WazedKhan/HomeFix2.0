<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
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

    public function profile($user_id)
    {
        $user = User::find($user_id);
        return view('userView.edit_profile',compact('user'));
    }

    public function profileUpdate($user_id)
    {
        $user = User::find($user_id);
        $image = $user->image;
        if (request('image')) {
            $image = request('image')->store('profile','public');
        }

        $user->update([
            'name'=>request()->name,
            'email'=>request()->email,
            'phone'=>request()->phone,
            'image'=>$image

        ]);
        return redirect()->back();
    }

}
