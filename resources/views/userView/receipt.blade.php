@extends('userView.base')
@section('content')
<section class="page-section">
    <div class="container pt-5">
        <div class="container bootdey">
            <div class="row invoice row-printable">
                <div class="col-md-10">
                    <!-- col-lg-12 start here -->
                    <div class="panel panel-default plain" id="dash_0">
                        <!-- Start .panel -->
                        <div class="panel-body p30">
                            <div class="row">
                                <!-- Start .row -->
                                <div class="col-lg-6">
                                    <!-- col-lg-6 start here -->
                                    <div class="invoice-logo"><img width="100" src="{{ url('/storage/'.Auth::user()->image) }}" alt="Invoice logo"></div>
                                </div>
                                <!-- col-lg-6 end here -->
                                <div class="col-lg-6">
                                    <!-- col-lg-6 start here -->

                                    <h2>HomeFix</h2>
                                    <p>Money Receipt to {{ $cart->user->name }}<p class="text-secondary">Copyright © HomeFix 2022</p></p>
                                    

                                </div>
                                <!-- col-lg-6 end here -->
                                <div class="col-lg-12">
                                    <!-- col-lg-12 start here -->
                                    <div class="invoice-details mt25">
                                        <div class="well">
                                            <ul class="list-unstyled mb0">
                                                <li><strong>Transaction ID: </strong> {{ $cart->tran_id }}</li>
                                                <li><strong>Paid On:</strong> {{ $cart->updated_at }}</li>
                                                <li><strong>Status:</strong> <span class="label label-danger">PAID</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="invoice-to mt25">
                                        <ul class="list-unstyled">
                                            <li><strong>Invoiced To</strong></li>
                                            <li>Name: {{ $cart->user->name }}</li>
                                            <li>Phone: {{ $cart->user->phone }}</li>
                                            <li>Mail: {{ $cart->user->email }}</li>
                                        </ul>
                                    </div>
                                    <div class="invoice-items">
                                        <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="per70 text-center">Description</th>
                                                        <th class="per5 text-center">Provider's Name</th>
                                                        <th class="per25 text-center">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $cart->type->name }} ({{ $cart->created_at }})</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center">{{ $cart->type->cost }} tk</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                
                                                    <tr>
                                                        <th colspan="2" class="text-right">0% VAT:</th>
                                                        <th class="text-center">0 tk</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2" class="text-right">Total:</th>
                                                        <th class="text-center">{{ $cart->type->cost }} tk</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="invoice-footer mt25">
                                        <p class="text-center"> {{ \Carbon\Carbon::now()->format('l m-Y')}} 
                                            <a href="#" class="btn btn-default ml15"><i class="fa fa-print mr5"></i> Print</a>
                                        </p>
                                    </div>
                                </div>
                                <!-- col-lg-12 end here -->
                            </div>
                            <!-- End .row -->
                        </div>
                    </div>
                    <!-- End .panel -->
                </div>
                <!-- col-lg-12 end here -->
            </div>
            </div>
    </div>
</section>