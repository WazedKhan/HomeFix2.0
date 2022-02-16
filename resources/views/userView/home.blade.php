@extends('userView.base')
@section('content')
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container pt-5">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>

            </div>
            <div class="row text-center">
                @foreach ($types as $type)
                    <div class="col-md-4">
                        <img src="{{ url('/storage/'.$type->image) }}" height="300" width="300">
                        <h4 class="my-3">{{ $type->name }}</h4>
                        <h6 class="my-3">Price {{ $type->cost }} tk</h6>
                        <h6 class="my-3">Area: {{ $type->area }} </h6>
                        <p class="text-muted">{{ $type->detail }}</p>
                        <a href="{{ route('type.detail',$type->id) }}" class="btn btn-primary">Find Provider</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Service Providers Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Top Service Providers</h2>
                {{-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> --}}
            </div>
            <section class="page-section" id="services">
                    <div class="row text-center">
                        @foreach ($providers as $provider)
                        @if($provider->deletestatus == '0')
                        <div class="card m-2" style="width: 18rem;">
                            <img class="card-img-top" src="{{ url('/storage/'.$provider->user->image) }}">
                            <div class="card-body">
                              <h5 class="card-title">{{ $provider->user->name }}</h5>
                              <div class="card-footer m-1">
                                  <p><strong>Profession:</strong> {{ $provider->type->name }}</p>
                              </div>
                              <a href="{{ route('provider.profile',$provider->id) }}" class="btn btn-primary">Profile</a>
                            </div>
                          </div>
                          @endif
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </section>


    <!-- Contact-->
    @if(Auth::check())
    @if (Auth::user()->role == 'user' || Auth::user()->role == 'sp')
    <section class="page-section" id="contact">
        <div class="container">
            @if(session()->has('success'))
    <p class="alert alert-success">
        {{session()->get('success')}}
    </p>
@endif
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
            <form id="contactForm" method="post" action="{{ route('user.contact') }}">
                @csrf
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" name="name" type="text" value="{{ Auth::user()->name }}" required >
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="email" name="email" type="email" value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" type="tel" name="phone" value="{{ Auth::user()->phone }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" name="message" placeholder="Your Message *" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </section>
    @else
    <div class="container">

        <div class="text-center" >
            <h1>Message</h1>
        </div>

        <div class="list-group">
          @foreach ($message as $item)
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">{{ $item->name }}</h5>
              <small>{{ $item->updated_at->diffforhumans() }}</small>
            </div>
            <p class="mb-1">{{ $item->email }}</p>
            <small><strong>Phone:</strong> {{ $item->phone }}</small>
            <small> <strong>Message:</strong> {{ $item->message }}</small>
            <hr>
          @endforeach
        </div>
    </div>
    @endif
    @else
    <section class="page-section" id="contact">
        <div class="container">
            @if(session()->has('success'))
            <p class="alert alert-success">
                {{session()->get('success')}}
            </p>
        @endif
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                {{-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> --}}
            </div>
            <form id="contactForm" method="post" action="{{ route('user.contact') }}">
                @csrf
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" type="text" name="name" placeholder="Your Name *" required>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="email" type="email" name="email" placeholder="Your Email *" required>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" type="tel" name="phone" placeholder="Your Phone *" required >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" name="message" placeholder="Your Message *" required></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </section>
    @endif
@endsection
