<style>
a:link {
  text-decoration: none !important;
}

</style>
@extends('layouts.app')

@section('content')
<div class="container">
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
