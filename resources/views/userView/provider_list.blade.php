@extends('userView.base')
@section('content')
    <!-- Services-->
            <section class="page-section bg-light" id="portfolio">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Top Service Providers</h2>
                        {{-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> --}}
                    </div>
                    <section class="page-section" id="services">
                            <div class="row text-center">
                                @foreach ($provider as $provider)
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
                                @endforeach
                            </div>
                        </div>
                    </section>

        </div>
    </section>