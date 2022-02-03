<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

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
}
