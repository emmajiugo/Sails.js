@extends('layouts.dash')

@section('content')

    <!-- start with the real content -->
    <div id="real">
    <!-- start content here -->
    <div class="wrap card" id="support">
        <!-- CONTENT -->
        <section class="app-content">
            <div class="row">
                <div class="col-sm-12">
                    @if(count($invoices) > 0)
                        <table id="datatable-buttons" class="table table-hover">
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
                                        <td>#{{$invoice->invoice_reference}}</td>
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

        </section>
    </div>
    </div>



@endsection
