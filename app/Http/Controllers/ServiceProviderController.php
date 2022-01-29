<?php

namespace App\Http\Controllers;

use App\Models\ServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function applyForm()
    {
        return view('serviceprovider.applyform');
    }

    public function applicationSubmit()
    {
        // dd(request()->all());
        $image_path  = request('image')->store('serviceProvider', 'public');
        ServiceProvider::create([
            'user_id' => Auth::user()->id,
            'nid_number' => request()->nid_number,
            'nid_name' => request()->nid_name,
            'address' => request()->address,
            'address_2' => request()->address_2,
            'city' => request()->city,
            'state' => request()->state,
            'zip' => request()->zip,
            'exprience' => request()->exprience,
            'image' => $image_path
        ]);
        return redirect()->route('home');
    }
    public function applicationlist()
    {
        $serviceproviders = ServiceProvider::where('status', 'Pending')->get();
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
}
