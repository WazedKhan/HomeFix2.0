<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Type;
use App\Models\User;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $providers = ServiceProvider::all();
        $message = Contact::all();
        return view('userView.home',compact('types','providers','message'));
    }

    public function contact(Request $request)
    {
        Contact::create([
             'name'=> $request->name,
             'email'=> $request->email,
             'phone'=> $request->phone,
             'message'=> $request->message,
        ]);
        return redirect()->back()->with('success','Submit Successfully');
    }

    public function providerProfile($id)
    {
        $provider = ServiceProvider::find($id);
        $feedback = Comment::where('provider_id',$id)->get();
        return view('userView.profile', compact('provider','feedback'));
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

    public function serviceList()
    {
        $key=null;
        if(request()->search){
            $key=request()->search;
            $types = Type::where('name','LIKE','%'.$key.'%')
                ->get();
            return view('userView.service_list',compact('types','key'));
        }
        $types = Type::all();
        return view('userView.service_list',compact('types','key'));
    }

    public function payment($cart_id)
    {
        $cart = Cart::find($cart_id);
        $user = Auth::user();
        $order = Order::create([
            'name'=>$user->id,
            'email'=>$user->email,
            'phone'=>$user->phone,
            'address'=>null,
            'transaction_id'=>uniqid(),
            'amount'=>$cart->type->cost
        ]);
        $cart->update([
            'customer_status'=>'Done',
            'tran_id'=>$order->transaction_id
        ]);
        return redirect()->back();
    }

    public function receipt($cart_id)
    {
        $cart = Cart::findOrFail($cart_id);
        return view('userView.receipt',compact('cart'));
    }

    public function feedback($id)
    {
        Comment::create([
            'provider_id'=>$id,
            'text'=>request()->text,
            'user_id'=>Auth::user()->id
        ]);
        return redirect()->back();
    }

}
