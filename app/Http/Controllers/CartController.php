<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createCart($service_id)
    {
        $service = Service::find($service_id);
        Cart::create([
            'service_id' => $service->id,
            'service_provider_id' => $service->service_provider_id,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('home');
    }

    public function cartList()
    {
        $provider_id = ServiceProvider::where('user_id',Auth::user()->id)->first();
        if (Auth::user()->role == 'sp') {
            $cart = Cart::where('service_provider_id', $provider_id)->get();
            return view('cart.index', compact('cart'));
        } elseif (Auth::user()->role == 'user') {
            $cart = Cart::where('user_id', Auth::user()->id)->get();
            return view('cart.index', compact('cart'));
        } else {
            $cart = Cart::all();
            return view('cart.index', compact('cart'));
        }
    }

    public function cartAccept($cart_id)
    {
        Cart::find($cart_id)->update(['status' => 'Accepted']);
        return redirect()->back();
    }
}
