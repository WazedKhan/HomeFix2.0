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
                        @if(Auth::user()->role == 'user')
                        <p>
                            <a class="btn btn-info form-control" href="{{ route('date.cart',$provider) }}">Hire Me</a>
                        </p>
                        @endif
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

                    <form action="{{ route('feedback',$provider->id) }}" method="post">
                        @csrf
                        <label for="">FeedBack</label>
                        <input class="form-control" name="text" type="text">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </form>

                    Feedbacks:
                    <br>
                    @foreach ($feedback as $item)
                        <strong>Name: {{ $item->user->name }}</strong>
                        Feedback:{{ $item->text }}
                    @endforeach

                </div>

            </div>

        </div>
    </section>

</div>


@endsection
