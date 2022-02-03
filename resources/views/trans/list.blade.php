@extends('layouts.app')
@section('content')
    <div class="container">
        Total Transaction Amount: {{ $total }}
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Transaction ID</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transList as $item)
                <tr>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->transaction_id }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection