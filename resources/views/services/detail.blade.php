@php
    $birthday = $service->service_provider->b_day;
    $age = Carbon\Carbon::parse($birthday)->diff(Carbon\Carbon::now())->format('%y years');
    // %m months and %d days'
@endphp
@extends('layouts.app')
@section('content')
<div class="container">
  <section class="section about-section gray-bg" id="about">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                <div class="about-text go-to">
                    <h2 class="dark-color">{{ $service->service_provider->nid_name }} ({{ $service->service_provider->user->name }})</h2>
                    <h6 class="theme-color lead">NID Number: {{ $service->service_provider->nid_number }} </h6>
                    <p></p>
                    <div class="row about-list">
                        <div class="col-md-6">
                            <div class="media">
                                <label>Birthday</label>
                                <p>{{ $service->service_provider->b_day }}</p>
                            </div>
                            <div class="media">
                                <label>Age</label>
                                <p>{{ $age }}</p>
                            </div>
                            <div class="media">
                                <label>House Address</label>
                                <p>{{ $service->service_provider->address_2 }}</p>
                            </div>
                            <div class="media">
                                <label>Address</label>
                                <p>{{ $service->service_provider->address }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <label>E-mail</label>
                                <p><a href="mailto:{{ $service->service_provider->user->email }}">
                                    {{ $service->service_provider->user->email }}</a></p>
                            </div>
                            <div class="media">
                                <label>Phone</label>
                                <p>
                                    <a href="tel:{{ $service->service_provider->user->phone }}">{{ $service->service_provider->user->phone }}</a>
                                </p>
                                </div>
                            <div class="media">
                                <label>Skype</label>
                                <p>Not Avaiable</p>
                            </div>
                            <div class="media">
                                <label>Status</label>
                                @if ($service->service_provider->user->active == 1 )
                                <p>Active</p>
                                @else
                                <p>Not In Online</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="about-avatar">
                    <img class="p-md-1" src="{{ url('/storage/'.$service->service_provider->user->image) }}" height="70%" width="70%" >
                </div>
            </div>
        </div>
        <div class="counter">
            <div class="row">
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="500" data-speed="500">{{ $count }}</h6>
                        <p class="m-0px font-w-600">Number of Pending Job</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="150" data-speed="150">{{ $service->service_provider->job_finished }}</h6>
                        <p class="m-0px font-w-600">Job Completed</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="850" data-speed="850">{{ $service->count() }}</h6>
                        <p class="m-0px font-w-600">Posted Job</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" data-to="190" data-speed="190">{{ $cart->count() }}</h6>
                        <p class="m-0px font-w-600">Number Of Job On Cart</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <div class="card text-center m-2">
        <div class="card-header">
          Service Details
        </div>
        <div class="card-body">
          <h5 class="card-title">{{ $service->name }}</h5>
          <strong><span>Cost: {{ $service->cost }}</span> Taka</strong>
          <p class="card-text">Service Area: {{ $service->area }}</p>
          <p class="card-text">{{ $service->detail }}</p>
          @if (Auth::user()->id != $service->service_provider->user->id)
          <a href="{{ route('create.cart',$service->id) }}" class="btn btn-primary">Take The Service</a>
          @endif
        </div>
        <div class="card-footer text-muted">
          2 days ago
        </div>
      </div>
</div>
@endsection
