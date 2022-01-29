<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceProvider;
use App\Models\Type;
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
            'image' => $image_path
        ]);
        return redirect()->route('service.list');
    }

    public function specificService($id)
    {
        $service = Service::where('type_id', $id)->get();
        return view('services.specific_s_list', compact('service'));
    }

    public function serviceDetails($id)
    {
        $service = Service::find($id);
        return view('services.detail', compact('service'));
    }
}
