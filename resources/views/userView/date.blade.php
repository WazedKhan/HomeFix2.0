@extends('userView.base')
@section('content')
    <!-- Services-->
    <section class="page-section">
        <div class="container pt-5">
            <form action="{{ route('create.cart',$provider_id) }}" method="GET">
                <div class="form-group">
                    <label >Date</label>
                    <input type="date" name="date" class="form-control">
                    <small id="emailHelp" class="form-text text-muted">Selcet date when you need the service</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
@endsection