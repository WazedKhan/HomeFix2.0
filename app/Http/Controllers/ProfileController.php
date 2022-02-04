<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Profile;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($user_id)
    {
        $cart = null;
        if(User::find($user_id)->role=='user')
        {
            $cart = Cart::where('user_id',$user_id)->get();
        }
        $service = null;
        $provider= null;
        if(User::find($user_id)->role=='sp')
        {
            $provider = ServiceProvider::where('user_id',$user_id)->first();
            $service = Service::where('service_provider_id',$provider->id)->where('status','active')->get();
        }
        $profile = Profile::where('user_id',$user_id)->first();
        return view('profile.index',compact('profile','cart','service','provider'));
    }
    public function editProfileView($profile)
    {
        $profile=Profile::find($profile);
        return view('profile.edit',compact('profile'));
    }

    public function update($user_id)    
    {
        
        $user=User::find($user_id);
        $image_path = $user->image;
        if(request('image')){
            $image_path  = request('image')->store('profile', 'public');
        }
        $user->update([
            'name'=>request()->name,
            'email'=>request()->email,
            'phone'=>request()->phone,
            'image'=>$image_path,
        ]);
        return redirect()->back();
    }
}
