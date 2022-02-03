@extends('layouts.app')
@section('content')
<div class="container">
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Serial No</th>
        <th scope="col">Service Name</th>
        @if (auth()->user()->role != 'user')
        <th scope="col">Odered Person's Contact Name</th>
        <th scope="col">Odered Person's Contact Number</th>
        <th scope="col">Odered Person's Address</th>
        @endif
        <th scope="col">Price</th>
        <th scope="col">Service Provider Status</th>
        @if (auth()->user()->role != 'user')
        <th scope="col">Status</th>
        @endif
      </tr>
    </thead>
    <tbody>
    @foreach ($cart as $key=>$item)
      <tr>
        <th scope="row">{{ $key+1 }}</th>
        <td>{{ $item->service->name }}</td>
        @if (auth()->user()->role != 'user')
        <td>{{ $item->user->name }}</td>
        <td><a href="tel:{{ $item->user->phone }}">{{ $item->user->phone }}</a></td>
        <td>Dhaka</td>
        @endif
        <td>{{ $item->service->cost }} taka</td>
        <td>{{ $item->status }}</td>
        @if (auth()->user()->role != 'user' && auth()->user()->role != 'admin' && $item->status == 'Pending')
        <td>
            <a class="btn btn-outline-success" href="{{ route('cart.accept',$item->id) }}">Accept</a>
        </td>
        @endif
        @if ($item->user_id == Auth::user()->id)
          @if ($item->status == 'Accepted' && $item->customer_status != 'Done')
            <td>
              <a class="btn btn-outline-info" href="{{ url('/pay') }}">Pay Now</a>
              <a class="btn btn-outline-success" href="{{ route('cart.accept',$item->id) }}">Done</a>
            </td>
          @else
            <td>{{ $item->customer_status }}</td>
          @endif
        @else
            <td>{{ $item->customer_status }}</td>
        @endif
      </tr>
      
    @endforeach
    </tbody>
  </table>
</div>
@endsection
