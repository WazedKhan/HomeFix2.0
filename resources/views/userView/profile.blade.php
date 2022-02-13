@if ($provider != null)
@php
$birthday = $provider->b_day;
$age = Carbon\Carbon::parse($birthday)->diff(Carbon\Carbon::now())->format('%y years');
@endphp
@endif
@extends('userView.base')
@section('content')
<div class="container">
    <section class="section about-section gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <div class="about-text go-to">
                        <h2 class="dark-color">{{ $provider->user->name }} </h2><a href="#"><span>
                        
                        @if (Auth::user()->id != $provider->user->id)
                        <p>
                            <a class="btn btn-info form-control" href="{{ route('date.cart',$provider) }}">Hire Me</a>
                        </p>
                        @endif
                        
                        <h6 class="theme-color lead">Profession: {{ $provider->type->name }} </h6> 
                        <div class="row about-list">
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Birthday</label>
                                    <p>{{ $provider->b_day }}</p>
                                </div>
                                <div class="media">
                                    <label>Age</label>
                                    <p>{{ $age }}</p>
                                </div>
                                <div class="media">
                                    <label>House Address</label>
                                    <p>{{ $provider->address_2 }}</p>
                                </div>
                                <div class="media">
                                    <label>Address</label>
                                    <p>{{ $provider->address }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="media">
                                    <label>E-mail</label>
                                    <p><a href="mailto:{{ $provider->user->email }}">
                                        {{ $provider->user->email }}</a></p>
                                </div>
                                <div class="media">
                                    <label>Phone</label>
                                    <p>
                                        <a href="tel:{{ $provider->user->phone }}">{{ $provider->user->phone }}</a>
                                    </p>
                                    </div>
                                <div class="media">
                                    <label>Skype</label>
                                    <p>Not Avaiable</p>
                                </div>
                                <div class="media">
                                    <label>Status</label>
                                    @if ($provider->user->active == 1 )
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
                        <img class="p-md-1" src="{{ url('/storage/'.$provider->user->image) }}" height="70%" width="70%" >
                    </div>
                </div>
            </div>


            </div>
            <div class="counter">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="500" data-speed="500">500</h6>
                            <p class="m-0px font-w-600">Happy Clients</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="150" data-speed="150">150</h6>
                            <p class="m-0px font-w-600">Project Completed</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="850" data-speed="850">850</h6>
                            <p class="m-0px font-w-600">Photo Capture</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="190" data-speed="190">190</h6>
                            <p class="m-0px font-w-600">Telephonic Talk</p>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
    </section>
    
</div>    


@endsection