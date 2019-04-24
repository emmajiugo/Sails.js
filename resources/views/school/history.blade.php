@extends('layouts.dash')

@section('content')

    <!-- Page content start -->
    <div class="page-contentbar">

        <!-- START PAGE CONTENT -->
        <div id="page-right-content">

            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">History</h4>
                    </div>
                    <div class="col-sm-12">
                        @if(count($invoices) > 0)
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Invoice #</th>
                                        <th>Academic Session</th>
                                        <th>Term</th>
                                        <th>Student Name</th>
                                        <th>Class</th>
                                        <th>Amount Paid</th>
                                        <th>Date of Payment</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($invoices as $invoice)
                                        <tr>
                                            <td>#{{$invoice->trx_id}}</td>
                                            <td>{{$invoice->session}}</td>
                                            <td>{{$invoice->term}}</td>
                                            <td>{{$invoice->studentname}}</td>
                                            <td>{{$invoice->class}}</td>
                                            <td>&#8358;{{$invoice->amount}}</td>
                                            <td>{{date("jS F, Y", strtotime($invoice->updated_at))}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <br><br>
                            <div class="alert alert-info">
                                <strong>Info!</strong> No payments made to your account yet.
                            </div>
                        @endif
                    </div>
                </div> 
                <!-- end row -->

            </div>
            <!-- end container -->
            
            <!-- include footer -->
            @include('inc.dashfooter')

        </div>
        <!-- End #page-right-content -->

        <div class="clearfix"></div>

    </div>
    <!-- end .page-contentbar -->

@endsection