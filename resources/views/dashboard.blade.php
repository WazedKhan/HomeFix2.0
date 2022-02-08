@extends('layouts.app')
@section('content') <br> <br>
    <div class="container">
      <div id="divToPrint">
        <h2 class="text-center">Dashboard</h2>
        
        <div class="container">
            <div class="row">
              <div class="col-sm">
                <div class="card border-success mb-3" style="max-width: 30rem;">
                    <div class="card-header text-center h3">Number Of Service Providers</div>
                    <div class="card-body">
                      <h5 class="card-title text-center">{{ $provider->count() }}</h5>
                    </div>

                  </div>
              </div>
              <div class="col-sm">
                <div class="card text-white bg-dark mb-3 mb-3" style="max-width: 25rem;">
                  <div class="card-header text-center h3">Services</div>
                  <div class="card-body">
                    <h5 class="card-title text-center">{{ $servie->count() }}</h5>
                  </div>
                  </div>
              </div>
              <div class="col-sm">
                <div class="card border-danger mb-3" style="max-width: 18rem;">
                  <div class="card-header text-center h3">Orders</div>
                  <div class="card-body">
                    <h5 class="card-title text-center">{{ $order->count() }}</h5>
                  </div>
              </div>
              </div>
              </div>
        <div class="container">
            <div class="row">
              <div class="col-sm">
                <div class="card text-white bg-secondary mb-3 mb-3" style="max-width: 20rem;">
                  <div class="card-header text-center h3">Users</div>
                  <div class="card-body">
                    <h5 class="card-title text-center">{{ $user->count() }}</h5>
                  </div>
                </div>
              </div>
              <div class="col-sm">
                
                <div class="card text-white bg-primary mb-3" style="max-width: 25rem;">
                  <div class="card-header text-center h3">Transaction Number</div>
                  <div class="card-body">
                    <h5 class="card-title text-center">{{ $trans->count() }}</h5>
                  </div>
                </div>

              </div>
              <div class="col-sm">
                
                <div class="card border-warning mb-3" style="max-width: 18rem;">
                  <div class="card-header text-center h3">Transaction</div>
                  <div class="card-body">
                    <h5 class="card-title text-center">{{ $total }} Taka</h5>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <hr>
        </div>
    </div>
    <input class="button" type="button" onClick="PrintDiv('divToPrint');" value="Print">
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