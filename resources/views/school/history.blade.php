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
                        <table id="transactions" class="display table table-bordered table-striped" style="width:100% important!">
                            <thead>
                                <tr>
                                    <th>Invoice ID</th>
                                    <th>Academic Session</th>
                                    <th>Term</th>
                                    <th>Student Name</th>
                                    <th>Class</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>

                            <tbody id="transaction-body">
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>#{{$invoice->invoice_reference}}</td>
                                        <td>{{$invoice->session}}</td>
                                        <td>{{$invoice->term}}</td>
                                        <td>{{$invoice->studentname}}</td>
                                        <td>{{$invoice->class}}</td>
                                        <td>&#8358;{{$invoice->amount}}</td>
                                        <td>{{date("d-M-Y", strtotime($invoice->updated_at))}}</td>
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
                    <br><br>
                    {{-- <div class="float-right">{{ $invoices->links() }}</div> --}}
                </div>
            </div>
            <!-- end row -->

        </section>
    </div>
    </div>



@endsection
