@extends('layouts.app')
@section('content')
<form class="m-5" action="{{ route('type.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input type="name" name="name" class="form-control">
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Details</label>
        <input type="detail" name="detail" class="form-control">
    </div>

    <div class="input-group mb-3">
        <div class="custom-file">
          <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
