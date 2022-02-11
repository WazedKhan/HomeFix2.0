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


    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                {{-- <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3> --}}
            </div>
            <!-- * * * * * * * * * * * * * * *-->
            <!-- * * SB Forms Contact Form * *-->
            <!-- * * * * * * * * * * * * * * *-->
            <!-- This form is pre-integrated with SB Forms.-->
            <!-- To make this form functional, sign up at-->
            <!-- https://startbootstrap.com/solution/contact-forms-->
            <!-- to get an API token!-->
            <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" type="text" placeholder="Your Name *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                    </div>
                </div>
                <!-- Submit success message-->
                <!---->
                <!-- This is what your users will see when the form-->
                <!-- has successfully submitted-->
                <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center text-white mb-3">
                        <div class="fw-bolder">Form submission successful!</div>
                        To activate this form, sign up at
                        <br />
                        <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                    </div>
                </div>
                <!-- Submit error message-->
                <!---->
                <!-- This is what your users will see when there is-->
                <!-- an error submitting the form-->
                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                <!-- Submit Button-->
                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Send Message</button></div>
            </form>
        </div>
    </section>
@endsection