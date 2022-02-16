@extends('layouts.app')
@section('content')
<div class="container">
    <div class="container">
        <div class="list-group">
            <table class="table">
                <thead class="thead-dark">
                  <tr class="justify-content-center">
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Profession</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Lives In</th>
                    <th scope="col">Service Cost</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($providers as $key=>$item)
                  <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->type->name }}</td>
                    <td>{{ $item->user->phone }}</td>
                    <td>{{ $item->state }}</td>
                    <td>{{ $item->type->cost }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
