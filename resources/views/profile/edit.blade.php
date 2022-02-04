@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="h1 text-center">Update profile</div>
        <div class="text-center">You can't update infomation that were provider for <strong>Service Provider</strong> Registation</div>
        <form action="{{ route('profile.update',$profile->user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="name" class="form-control" name="name" value="{{ $profile->user->name }}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="{{ $profile->user->email }}">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" value="{{ $profile->user->phone }}">
            </div>

            <div class="form-group pt-1">
                <div class="col-md-6">
                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                </div>
            </div>
            <button type="submit" class="btn btn-primary m-1">Submit</button>
        </form>
    </div>
@endsection