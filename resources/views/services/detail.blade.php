@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container mt-5 p-md-1">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">
                    <div class="text-center"> <img src="https://i.imgur.com/bDLhJiP.jpg" width="100" class="rounded-circle"> </div>
                    <div class="text-center mt-3">
                        <h5 class="mt-2 mb-0">{{ $service->user->name }}</h5> <span>Car Service Provider</span>
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
          <a href="#" class="btn btn-primary">Take The Service</a>
        </div>
        <div class="card-footer text-muted">
          2 days ago
        </div>
      </div>
</div>
@endsection
