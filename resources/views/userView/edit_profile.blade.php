@extends('userView.base')
@section('content')
<section class="page-section">
    <div class="container pt-5">
        <div class="text-center">
            <img src="{{ url('/storage/'.Auth::user()->image) }}" class="rounded border border-primary">
        </div>

        <form action="{{ route('user.profile.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Name</label>
              <input type="name" class="form-control" name="name" value="{{ $user->name }}">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="form-group">
              <label>Phone</label>
              <input type="phone" name="phone" class="form-control" value="{{ $user->phone }}"> 
            </div>

            <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" value="{{ $user->image }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary m-1">Submit</button>
        </form>
    </div>
</section>
@endsection