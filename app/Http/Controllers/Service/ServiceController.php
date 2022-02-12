<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceProvider;
use App\Models\Type;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function createService()
    {
        $types = Type::all();
        return view('services.s_create', compact('types'));
    }

    public function storeService()
    {
        Service::create([
            'name' => request()->name,
            'area' => request()->area,
            'cost' => request()->cost,
            'detail' => request()->detail,
            'type_id' => request()->category,
            'service_provider_id' => ServiceProvider::where('user_id', Auth::user()->id)->first()->id
        ]);
        return redirect()->route('service.list');
    }

    public function typeCreateview()
    {
        return view('services.create');
    }

    public function storeType()
    {
        if (request('image')) {
            $image_path  = request('image')->store('types', 'public');
        }
        Type::create([
            'name' => request()->name,
            'detail' => request()->detail,
            'area' => request()->area,
            'cost'=>request()->cost,
            'image' => $image_path
        ]);
        return redirect()->back();
    }

    public function specificService($id)
    {
        $providers = ServiceProvider::where('type_id', $id)->get();
        if (Auth::user()->role=='user') {
            return view('userView.providers', compact('providers'));
        }
        return view('services.specific_s_list', compact('providers'));
    }

    public function serviceDetails($id)
    {
        $count = 0;
        $service = Service::find($id);
        $cart = Cart::where('service_provider_id',$service->service_provider->id)->get();
        foreach($cart as $item)
        {
            if($item->status=='Accepted')
            {
                $count+=1;
            }
        }
        return view('services.detail', compact('service', 'cart','count'));
    }

    public function serviceDelete($id)
    {
        $service = Service::find($id)->update(['status'=>'detactive']);;
        return redirect()->back();
    }

    public function serviceUpdate($service_id)
    {
        dd('It service update page');
    }

    public function updateTypeView($id)
    {
        $data = Type::find($id);
        return view('services.update_type',compact('data'));
    }

    public function updateType($id)
    {
        $data = Type::find($id);
        $image_path = $data->image;
        if(request('image')){
            $image_path  = request('image')->store('profile', 'public');
        }
        $data->update([
            'name'=>request()->name,
            'detail'=>request()->detail,
            'image'=>$image_path
        ]);
        return redirect()->route('home');
    }
}
