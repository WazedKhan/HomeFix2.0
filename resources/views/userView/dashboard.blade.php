@extends('userView.base')
@section('content')
    <!-- Services-->
    <section class="page-section">
        <div class="container pt-5">
            <h3>My Service</h3>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Serial No</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Provider Name</th>
                    <th scope="col">Provider Number</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>

                  </tr>
                </thead>
                <tbody>
                @foreach ($cart as $key=>$item)
                  <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->type->name }}</td>
                    <td>{{ $item->service_provider->user->name }}</td>
                    <td>{{ $item->service_provider->user->phone }}</td>
                    <td>{{ $item->type->cost }} tk</td>
                    @if ($item->status == 'Accepted' && $item->customer_status != 'Done')
                        <td>
                          <a class="btn btn-outline-info" href="{{ route('goto.payment',$item->id) }}">Pay Now</a>
                          <a class="btn btn-outline-success" href="{{ route('cart.accept',$item->id) }}">Done</a>
                        </td>
                    @else
                        <td>{{ $item->customer_status }}</td>
                    @endif
                  </tr>
                  
                @endforeach
                </tbody>
              </table>
        </div>
    </section>
@endsection