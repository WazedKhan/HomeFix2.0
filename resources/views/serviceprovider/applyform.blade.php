@extends('layouts.app')
@section('content')
<form action="{{ route('application.submit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">

    <div class="form-group">
        <label for="inputAddress2">NID Number</label>
        <input type="number" class="form-control" name="nid_number" id="inputAddress2" placeholder="152-00-000-00">
    </div>

    <div class="form-group">
      <label for="inputAddress2">email</label>
      <input type="email" class="form-control" name="email" id="inputAddress2">
    </div>

    <div class="form-group pt-2">
      <label for="form-select">Select provider profession</label>
      <select class="form-select" name="type_id">
        @foreach ($types as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
    </div>

  <div class="form-group">
    <label for="inputAddress2">Phone</label>
    <input type="text" class="form-control" name="phone" id="inputAddress2" placeholder="152-00-000-00">
  </div>

  <div class="form-group">
  <label for="inputAddress2">Password</label>
  <input type="password" class="form-control" name="password" id="inputAddress2" placeholder="152-00-000-00">
  </div>

    <div class="form-group">
        <label for="inputAddress2">NID Card's Name</label>
        <input type="name" class="form-control" name="nid_name" id="name" placeholder="Samiur Rahman Bappi">
    </div>
    <div class="form-group">
      <label for="inputAddress2">Birth Date</label>
      <input type="date" class="form-control" name="b_day" id="inputAddress2" placeholder="1990-01-01">
  </div>
    <div class="form-group">
      <label for="inputAddress">Address</label>
      <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Address 2</label>
        <input type="text" class="form-control" name="address_2" id="inputAddress2" placeholder="Apartment, studio, or floor">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Experience</label>
        <input type="number" class="form-control" name="exprience" id="inputAddress2" placeholder="2">
    </div>

    <div class="form-row p-md-1">
      <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="city" name="city" class="form-control" id="inputCity">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="inputState" name="state" class="form-control">
          <option selected>Choose...</option>
          <option value="Mirpur">Mirpur</option>
          <option value="Uttara">Uttara</option>
          <option value="Banani">Banani</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Zip</label>
        <input type="text" name="zip" class="form-control" id="inputZip">
      </div>
    </div>

    <div class="input-group mb-3">

        <div class="custom-file">
        <label class="custom-file-label" for="inputGroupFile01">Photo </label>
          <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
</div>
@endsection
