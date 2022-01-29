<style>
    *{
        text-decoration: none;
    }
</style>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center" >
        <h1>Our Services</h1>
    </div>
    @foreach ($types as $item)
    <a class="h6" href="{{ route('type.list',$item->id) }}">
        <div class="card mb-3 text-center">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{ $item->name }}</h5>
              <p class="card-text">{{ $item->detail }}</p>
              <p class="card-text"><small class="text-muted">{{ $item->updated_at->diffforhumans() }}</small></p>
            </div>
        </div>
        </a>
    @endforeach
</div>
@endsection
