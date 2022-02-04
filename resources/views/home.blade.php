<style>
a:link {
  text-decoration: none !important;
}

</style>
@extends('layouts.app')

@section('content')
<div class="container">

  <div class="card-group m-1">
    <div class="card m-1">
      <img class="card-img-top border border-light" src="{{ url('/asset/garden.jpg') }}" width="100" height="200" >
      <div class="card-body">
        <h5 class="card-title">Serviecs</h5>
        <p class="card-text">We have <strong>{{ $service->count() }}</strong> services ready for you. Just a click away.</p>
        <a href="{{ route('service.list') }}" class="btn btn-primary">Service For Me</a>
      </div>
    </div>
    <div class="card m-1">
      <img class="card-img-top border border-light" src="{{ url('/asset/serve.png') }}" width="100" height="200">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Detail</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
    <div class="card m-1">
      <img class="card-img-top border border-light" src="{{ url('/asset/provider.jpg') }}" width="100" height="200">
      <div class="card-body">
        <h5 class="card-title">Providers</h5>
        <p class="card-text">We have <strong>{{ $provider->count() }}</strong> service providers ready for you. Just a click away.</p>
        <a href="{{ route('providers') }}" class="btn btn-primary">Service Providers For Me</a>
      </div>
    </div>
  </div>  

    <div class="text-center" >
        <h1>Our Services</h1>
    </div>
    @foreach ($types as $item)
    <a class="boxhead h6 link-secondary" href="{{ route('type.list',$item->id) }}">
        <div class="card mb-3 text-center">
            <img class="card-img-top" src="{{ url('/storage/'.$item->image) }}" width="100" height="300">
            <div class="card-body">
              <h5 class="card-title">{{ $item->name }}</h5>
              <p class="card-text">{{ $item->detail }}</p>
              <p class="card-text"><small class="text-muted">{{ $item->updated_at->diffforhumans() }}</small></p>
            </div>
        </div>
    </a>
    @if (Auth::check() && Auth::user()->role=='admin')
    <div class="container" >
      <a class="link-secondary " href="{{ route('type.update.view',$item->id) }}">Edit</a>
    </div>
    @endif
    @endforeach
</div>
@endsection
