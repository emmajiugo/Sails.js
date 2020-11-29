@extends('layouts.dash')

@section('content')

    <!-- start with the real content -->
    <div id="real">
        <div class="row">
            <!-- start head content    -->

            @if(count($schools) > 0)

                <!-- check if the user is verified -->
                @if($verify_status == 0)
                    <div class="col-lg-12">
                        <div class="alert alert-warning" role="alert">
                            <i class="mdi mdi-information"></i>
                            <strong>Notice!</strong> Your school is yet to be verified and cannot be visible to the public. If verification has exceeded 48hrs, please contact us at <b>{{ $webSettings->email }}</b> or <b>{{ $webSettings->phone }}</b>
                        </div>
                    </div>
                @endif

                <div class="col-lg-4">
                    <!-- avtive -->
                    <div class="activeMode">
                        <div class="card">
                            <h1>Account Status</h1>

                            @if ($verify_status == 0)
                                <button class="btn btn-warning">Not Verified</button>
                            @else
                                <button class="btn btn-success">Active</button>
                            @endif
                        </div>
                    </div>
                    <!-- end active -->

                    <!-- Available Funds -->
                    <div class="regsterUsers">
                        <div class="card">
                            <div class="card-top">
                                <h1>&#8358; {{ number_format($wallet) }}</h1>
                            </div>
                            <div class="card-bottom">
                                <p><i class="fa fa-wallet"></i> Available Funds <button class="btn btn-secondary btn-sm float-right" type="button"  data-toggle="modal" data-target="#withdrawModal">Withdraw</button></p>
                            </div>
                        </div>
                    </div>
                    <!-- end Available Funds -->
                </div>

                <div class="col-lg-8">
                    <div id="money">
                        <div class="card">
                        <div id="chart" style="width:100%; height:270px;"></div>
                        </div>
                    </div>
                </div>
                <!-- end head content -->

                <!-- start analytics -->
                <div class="col-lg-4">
                    <div class="analytics">
                        <div class="card">
                            <div class="icon"><i class="fa fa-user-graduate"></i></div>
                            <div class="text">
                                <h1>{{ count($payments) }}</h1>
                                <p>Students Paid</p>
                            </div>
                        </div>
                    </div>
                    <div class="analytics">
                        <div class="card">
                            <div class="icon"><i class="fa fa-user-circle"></i></div>
                            <div class="text">
                                <h1>{{ count($schools) }}</h1>
                                <p>Accounts</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end analytics -->

                <!-- start Active Leads -->
                <div class="col-lg-8">
                    <div id="leads">
                        <div class="card">
                        <h1 class="head">Latest Payments
                            <a href="/school/history" class="btn btn-sm btn-info" style="float:right">Transaction History</a>
                        </h1>


                        @if(count($payments) > 0)
                            <table class="table">
                                <!-- start head -->
                                <thead>
                                    <tr>
                                        <th>Invoice #</th>
                                        <th>Student Name</th>
                                        <th>Class</th>
                                    </tr>
                                </thead>
                                <!-- end head -->
                                <!-- start body -->
                                <tbody>
                                    <!-- start rows -->
                                    @foreach($payments as $payment)
                                        <tr>
                                            <td># {{ $payment->invoice_reference }}</td>
                                            <td>{{ $payment->studentname }}</td>
                                            <td>{{ $payment->class }}</td>
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
                </div>
                <!-- end Active Leads -->
            @else
                <div class="col-lg-12 alert alert-warning text-center">
                    <strong>Welcome to Skooleo!</strong> Create an account for your school and start enjoying our awesome services.<br><br>
                    <button class="btn btn-info" data-toggle="modal" data-target="#newAccountModal">Create an account</button>
                </div>

            @endif

        </div>
    </div>
    <!-- end the real content -->

@endsection
