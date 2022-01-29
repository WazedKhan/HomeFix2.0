@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container mt-0">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-1 py-4">
                    <div class="text-center"> <img src="{{ url('/storage/') }}" width="70%" height="70%" class="rounded"> </div>
                    <div class="text-center mt-3">
                        <h5 class="mt-2 mb-0">Name</h5> <span>Car Service Provider</span>
                        <div class="px-4 mt-1">
                            <p class="fonts"> I have 5 years experience of car service </p>
                        </div>
                        <div class="buttons"> Mobile: 0176582082 </div>
                        <p> <strong>NID Card No:</strong> 158-3452-9624-25</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card text-center">
        <div class="card-header">
          Service Details
        </div>
        <div class="card-body">
          <h5 class="card-title">{{ $service->name }}</h5>
          <strong><span>Cost: {{ $service->cost }}</span> Taka</strong>
          <p class="card-text">Service Area: {{ $service->area }}</p>
          <p class="card-text">{{ $service->detail }}</p>
          @if (Auth::user()->role != 'sp')
          <a href="{{ route('create.cart',$service->id) }}" class="btn btn-primary">Take The Service</a>
          @endif
        </div>
        <div class="card-footer text-muted">
          2 days ago
        </div>
      </div>
</div>
@endsection
