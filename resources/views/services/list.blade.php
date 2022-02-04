<style>
  @import url(https://fonts.googleapis.com/css?family=Open+Sans);

body{
  background: #f2f2f2;
  font-family: 'Open Sans', sans-serif;
}

.search {
  width: 22%;
  position: relative;
  display: flex;
}


/*Resize the wrap to see the search bar change!*/
</style>

@extends('layouts.app')
@section('content')

<div class="text-center"><h3>Services</h3></div>

<div class="container">
  
  <form action="{{route('service.list')}}" method="GET">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <input value="{{ $key }}" type="text" placeholder="Search" name="search" class="form-control">
        </div>
        <div class="col-md-4">
            <button type="submit" class="btn btn-success">Search</button>
        </div>
    </div>
    </form>

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
                @if (Auth::check() && Auth::user()->id == $item->service_provider->user_id || Auth::check() && Auth::user()->role == 'admin')
                <a class="btn btn-outline-danger" href="{{ route('service.delete',$item->id) }}">Delete</a>
                @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>
</div>

@endsection
