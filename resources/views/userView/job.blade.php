@extends('userView.base')
@section('content')
<section class="page-section">
    <div class="container pt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Date</th>
                    <th>phone</th>
                    <th>email</th>
                    <th>My Status</th>
                    <th>Payment</th>
                </tr>
            </thead>
            @foreach ($job as $item)
            <tbody>
                <tr>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->booking_date }}</td>
                    <td>{{ $item->user->phone }}</td>
                    <td>{{ $item->user->email }}</td>
                    <td>
                        @if ($item->status == 'Pending')
                            <a href="{{ route('job.approve',$item->id) }}">Approve</a>
                            <a href="{{ route('job.delete',$item->id) }}">Decaline</a>
                        @else
                        {{ $item->status }}
                        @endif

                    </td>
                    <td>
                    @if ($item->customer_status != 'Pending')
                        Compeleted
                    @else
                    Pending
                    @endif
                    </td>
                </tr>
            </tbody>
            @endforeach
            
        </table>
    </div>
</section>
@endsection