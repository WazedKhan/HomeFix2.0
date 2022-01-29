<style>
    *{
        text-decoration: none;
    }
</style>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center" >
        <h1>Applications</h1>
        <blockquote>________________________________</blockquote>
    </div>
    @foreach ($serviceproviders as $item)
    <div class="row">
    <div class="card align-items-lg-center" style="width: 60%;">
        <img class="card-img-top" src="{{ url('/storage/'.$item->image) }}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title text-center">{{ $item->nid_name }}</h5>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><strong>NID Number </strong>{{ $item->nid_number }}</li>
          <li class="list-group-item"><strong>City </strong>{{ $item->city }}</li>
          <li class="list-group-item"><strong>State </strong>{{ $item->state }}</li>
          <li class="list-group-item"><strong>Address </strong>{{ $item->address }}</li>
          <li class="list-group-item"><strong>Address 2 </strong>{{ $item->address_2 }}</li>
          <li class="list-group-item"><strong>Exprience </strong>{{ $item->exprience }}</li>
        </ul>
        <div class="card-body">
            <div class="container">
                <div class="row">
                  <div class="col-sm">
                    <form action="{{ route('application.action',$item->id) }}" method="post">
                        @csrf
                        <button value="1" name="action" class="btn btn-outline-success" type="submit">Approve</button>
                    </form>
                  </div>
                  <div class="col-sm">
                    <form action="{{ route('application.action',$item->id) }}" method="post">
                        @csrf
                        <button value="0" name="action" class="btn btn-outline-danger" type="submit">Decline</button>
                    </form>
                  </div>
                </div>
              </div>
      </div>
    </div>
    </div>
    @endforeach
</div>
@endsection
