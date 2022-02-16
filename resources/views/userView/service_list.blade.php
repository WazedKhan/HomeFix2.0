<style>
    .input-group{
        margin-left: 80%;
    }
</style>
@extends('userView.base')
@section('content')

    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container pt-5">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Services</h2>
            </div>
            <form action="{{ route('user.service/list') }}" method="get">
                @csrf
            <div class="input-group">
                <div class="form-outline">
                  <input value="{{$key}}" type="search" id="form1" class="form-control" name="search" />
                </div>
                <button type="submit" class="btn btn-success">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </form><br><br>
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
@endsection
