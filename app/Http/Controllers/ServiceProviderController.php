<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ApplicationNotification;

class ServiceProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function applyForm()
    {
        $types = Type::all();
        return view('serviceprovider.applyform', compact('types'));
    }

    public function applicationSubmit()
    {
        // dd(request()->type_id);
         
        $image_path  = request('image')->store('profile', 'public');
        
        $user = User::create([
            'role'=>'sp',
            'image'=>$image_path,
            'name'=>request()->nid_name,
            'email'=>request()->email,
            'phone'=>request()->phone,
            'password'=>bcrypt(request()->password)
        ]);

        ServiceProvider::create([
            'user_id' => $user->id,
            'type_id'=>request()->type_id,
            'nid_number' => request()->nid_number,
            'b_day' => request()->b_day,
            'address' => request()->address,
            'address_2' => request()->address_2,
            'city' => request()->city,
            'state' => request()->state,
            'zip' => request()->zip,
            'exprience' => request()->exprience,
            'status' => 'Approve'
        ]);
        return redirect()->route('home');
    }


    public function applicationlist()
    {
        return view('serviceprovider.applications', compact('serviceproviders'));
    }

    public function providerApprove($provider_id)
    {
        if (request()->action != 0) {
            $provider = ServiceProvider::find($provider_id);
            $provider->update(['status' => 'Approve']);
            User::find($provider->user_id)->update(['role' => 'sp']);
        } else {
            ServiceProvider::find($provider_id)->delete();
        }
        return redirect()->back();
    }

    public function providers()
    {
        $provider = ServiceProvider::all();
        return view('serviceprovider.list',compact('provider'));
    }
}
