@if ($provider != null)
@php
$birthday = $provider->b_day;
$age = Carbon\Carbon::parse($birthday)->diff(Carbon\Carbon::now())->format('%y years');
@endphp
@endif
@extends('layouts.app')
@section('content')
<div class="container">
    <section class="section about-section gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <div class="about-text go-to">
                        <h2 class="dark-color">{{ $profile->user->name }} @if (Auth::user()->id == $profile->user->id)</h2><a href="{{ route('profile.edit.view',Auth::user()->id) }}"><span> <small>Edit</small></span></a>@endif
                        @if ($provider != null)
                        <h6 class="theme-color lead">NID Number: {{ $provider->nid_number }} </h6>
                        @endif

                        <p></p>
                        <div class="row about-list">
                            <div class="col-md-6">
                                @if ($profile->user->role=='sp')
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
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="media">
                                    <label>E-mail</label>
                                    <p><a href="mailto:{{ $profile->user->email }}">
                                        {{ $profile->user->email }}</a></p>
                                </div>
                                <div class="media">
                                    <label>Phone</label>
                                    <p>
                                        <a href="tel:{{ $profile->user->phone }}">{{ $profile->user->phone }}</a>
                                    </p>
                                    </div>
                                <div class="media">
                                    <label>Skype</label>
                                    <p>Not Avaiable</p>
                                </div>
                                <div class="media">
                                    <label>Status</label>
                                    @if ($profile->user->active == 1 )
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
                        <img class="p-md-1" src="{{ url('/storage/'.$profile->user->image) }}" height="70%" width="70%" >
                    </div>
                </div>
            </div>
            <div class="counter">

                @if ($service != null)
                <div class="text-center h3" >Offerd Services</div>
                <div class="list-group">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Area</th>
                            <th scope="col">Service Provider</th>
                            <th scope="col">Service Type</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($service as $key=>$item)
                          <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->cost }}</td>
                            <td>{{ $item->area }}</td>
                            <td>{{ $item->service_provider->nid_name }}</td>
                            <td>{{ $item->type->name }}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{ route('service.detail',$item->id) }}">Details</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                @endif

                @if ($cart != null)
                <div class="text-center h3" >Taken Services</div>
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Name</th>
                                <th>Provider Name</th>
                                <th>Price</th>
                                <th>Provider Status</th>
                                <th>My Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                <tr>
                                    <td>{{ $item->service->name }}</td>
                                    <td>{{ $item->service_provider->nid_name }}</td>
                                    <td>{{ $item->service->cost }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->customer_status }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                @endif
            </div>
        </div>
    </section>

</div>
@endsection
