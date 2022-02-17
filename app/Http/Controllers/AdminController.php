<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use App\Models\Type;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function transList()
    {
        $transList = Order::all();
        $total = 0;
        foreach($transList as $item)
        {
            $total += $item->amount;
        }

        return view('trans.list',compact('transList','total'));
    }

    public function dashboard()
    {
        $user=User::where('role','user')->get();
        $servie=Type::all();
        $provider=ServiceProvider::all();
        $order = Cart::all();
        $trans = Order::all();
        $total = 0;
        foreach($trans as $item)
        {
            $total += $item->amount;
        }
        return view('dashboard',compact('user','servie','provider','order','trans','total'));
    }
}
