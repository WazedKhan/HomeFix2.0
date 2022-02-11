@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="text-center h3">Providers</div>
        <div class="list-group">
            @foreach ($provider as $item)
            <div class="container">
                <a href="{{ route('profile',$item->user_id) }}" 
                    class="list-group-item list-group-item-action list-group-item-primary">
                        <div class="row">
                          <div class="col-sm">
                                <img class="rounded-circle" src="{{ url('/storage/'.$item->user->image) }}" width="30" height="30" >  
                                <strong>{{ $item->user->name }}</strong>
                          </div>
                          <div class="col-sm">
                            <strong>Lives in: </strong> {{ $item->city }}
                          </div>
                          <div class="col-sm">
                            <strong>{{ $item->exprience }}</strong> Years exprience
                          </div>
                        </div>
                </a>
              </div>
            @endforeach
        </div>
    </div>
@endsection