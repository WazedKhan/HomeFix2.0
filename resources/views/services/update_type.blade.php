@extends('layouts.app')
@section('content')
<div class="container">
<form class="m-5" action="{{ route('type.update',$data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input value="{{ $data->name }}" type="name" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Details</label>
        <input value="{{ $data->detail }}" type="detail" name="detail" class="form-control">
    </div>

    <div class="input-group mb-3">
        <div class="custom-file">
          <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection