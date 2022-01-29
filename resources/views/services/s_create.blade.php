@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('service.list.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="name" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Area</label>
            <input type="area" name="area" class="form-control">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Cost</label>
            <input type="number" name="cost" class="form-control">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Details</label>
            <input type="name" name="detail" class="form-control">
        </div>

        <div class="col-6 mt-3 p-md-1">
            <h5>Category</h5>
            <select name="category" class="form-control form-control-md">
                @foreach ($types as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="form-control btn-dark pt-1" type="submit">Submit</button>
    </form>
</div>
@endsection
