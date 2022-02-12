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

    <div class="list-group">
      @foreach ($types as $item)
      <a href="{{ route('type.update.view',$item->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">{{ $item->name }}</h5>
          <small>{{ $item->updated_at->diffforhumans() }}</small>
        </div>
        <p class="mb-1">{{ $item->detail }}</p>
        <small><strong>Area:</strong> {{ $item->area }}</small>
        <small> <strong>Price:</strong> {{ $item->cost }}</small>
      </a>
      @endforeach
    </div>

</div>
@endsection
