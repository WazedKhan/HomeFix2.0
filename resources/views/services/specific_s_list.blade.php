@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container">
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
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->type->name }}</td>
                    <td>
                        <a class="btn btn-outline-primary" href="{{ route('service.detail',$item->id) }}">Details</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
