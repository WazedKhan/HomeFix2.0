<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@extends('layouts.app')
@section('content')
<style>
    #piechart{
        margin-left: 40% !important;
    }
</style>
<br> <br>
    <div class="container">
        <h2 class="text-center">Dashboard</h2><br><br>
<div id="piechart"></div>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Type', 'Total'],
  ['Total Orders', {{ $order->count() }}],
  ['Transaction Number',{{ $trans->count() }}],
  ['Service Providers', {{ $provider->count() }}],
  ['Services', {{ $servie->count() }}],
  ['Users', {{ $user->count() }}]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'', 'width':1100, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
<br><br>
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
