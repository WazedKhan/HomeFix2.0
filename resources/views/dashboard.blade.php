@extends('layouts.app')
@section('content') <br> <br>
    <div class="container">
        <h2 class="text-center">Dashboard</h2><br><br>
        <div id="divToPrint">
        <div class="container">
            <div class="row">
              <div class="col-sm">
                <div class="card border-success mb-3" style="max-width: 28rem;">
                    <div class="card-header text-center h3">Service Providers</div>
                    <div class="card-body">
                      <h5 class="card-title text-center">{{ $provider->count() }}</h5>
                    </div>
                  </div>
              </div>
              <div class="col-sm">
                <div class="card text-white bg-secondary mb-3 mb-3" style="max-width: 28rem;">
                  <div class="card-header text-center h3">Services</div>
                  <div class="card-body">
                    <h5 class="card-title text-center">{{ $servie->count() }}</h5>
                  </div>
                </div>
              </div>
              <div class="col-sm">
              <div class="card border-success mb-3" style="max-width: 28rem;">
                <div class="card-header text-center h3">Total Orders</div>
                <div class="card-body">
                  <h5 class="card-title text-center">{{ $order->count() }}</h5>
                </div>
              </div>
              </div>
              </div>
            <div class="container">
            <div class="row">
              <div class="col-sm">
                <div class="card text-white bg-secondary mb-3 mb-3" style="max-width: 25rem;">
                  <div class="card-header text-center h3">Users</div>
                  <div class="card-body">
                    <h5 class="card-title text-center">{{ $user->count() }}</h5>
                  </div>
                </div>
              </div>
              <div class="col-sm">
                <div class="card border-success mb-3" style="max-width: 25rem;">
                  <div class="card-header text-center h3">Transaction Number</div>
                  <div class="card-body">
                    <h5 class="card-title text-center">{{ $trans->count() }}</h5>
                  </div>
                </div>
                </div>
              <div class="col-sm">
                <div class="card text-white bg-secondary mb-3 mb-3" style="max-width: 25rem;">
                  <div class="card-header text-center h3">Transactions</div>
                  <div class="card-body">
                    @if($total >= 1000000)
                    <h5 class="card-title text-center">{{ $total/1000000 }}M ৳</h5>
                    @else
                    <h5 class="card-title text-center">{{ $total }} ৳</h5>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
        <p class="text-center">
            <input class="btn btn-success" type="button" onClick="PrintDiv('divToPrint');" value="Print">
        </p><br>
        <hr>
    </div>

    <div class="text-center text-secondary footer">© Copyright 2022 Homefix 0.2 - All Rights reserved </div>
@endsection

<script language="javascript">
  function PrintDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }
</script>
