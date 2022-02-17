<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Mockery\Generator\StringManipulation\Pass\Pass;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function selectDate($provider_id)
    {
        return view('userView.date',compact('provider_id'));
    }

    public function createCart($provider_id)
    {
        $date = request()->date;
        $date_now = Carbon::now();
        $date_now = $date_now->toDateString();
        $provider = ServiceProvider::find($provider_id);
        // dd($date>=$date_now);
        if($date>=$date_now){
        Cart::create([
            'type_id' => $provider->type_id,
            'service_provider_id' => $provider->id,
            'user_id' => Auth::user()->id,
            'booking_date'=>request()->date
        ]);
        return redirect()->route('user.home');
        }
        else{
            return redirect()->back()->with('message','You Can not select Previous Date');;
        }

    }

    public function cartList()
    {
        $provider_id = ServiceProvider::where('user_id',Auth::user()->id)->first();
        if (Auth::user()->role == 'user') {
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            return view('userView.dashboard', compact('cart'));
        } else {
            $cart = Cart::all();
            return view('cart.index', compact('cart'));
        }
    }

    public function cartAccept($cart_id)
    {
        $cart = Cart::find($cart_id);
        $provider = ServiceProvider::find($cart->service_provider_id);
        if ($cart->user_id == Auth::user()->id) {
            $cart->update(['customer_status' => 'Done']);
            $provider->update(['job_finished'=>$provider->job_finished+1]);
            return redirect()->back();
        } else {
            $cart->update(['status' => 'Accepted']);
            return redirect()->back();
        }
    }
}
