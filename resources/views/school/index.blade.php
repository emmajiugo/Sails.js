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
                            <strong>Notice!</strong> Your school is yet to be verified and cannot be visible to the public. If verification has exceeded 48hrs, please contact us at <b>hello@schoolpay.ng</b> or <b>07031056082</b>
                        </div>
                    </div>
                @endif

                <div class="col-lg-4">
                    <!-- avtive -->
                    <div class="activeMode">
                        <div class="card">
                            <h1>Account Mode</h1>

                            @if ($verify_status == 0)
                                <a href="" class="btn btn-warning">Not Verified</a>
                            @else
                                <a href="" class="btn btn-success">Active</a>
                            @endif
                        </div>
                    </div>
                    <!-- end active -->

                    <!-- Registered Users -->
                    <div class="regsterUsers">
                        <div class="card">
                        <div class="card-top">
                            <h1>320</h1>
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="card-bottom">
                            <p>Transactions This Month</p>
                        </div>
                        </div>
                    </div>
                    <!-- end  Registered Users-->
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
                    <div class="icon"><i class="fa fa-video"></i></div>
                    <div class="text">
                        <h1>&#8358; {{number_format($amount)}}</h1>
                        <p>Total Tuition</p>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-4">
                <div class="analytics">
                    <div class="card">
                    <div class="icon"><i class="fab fa-vimeo-v"></i></div>
                    <div class="text">
                        <h1>{{ count($payments) }}</h1>
                        <p>Students Paid</p>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-4">
                <div class="analytics">
                    <div class="card">
                    <div class="icon"><i class="fa fa-users"></i></div>
                    <div class="text">
                        <h1>32</h1>
                        <p>Users</p>
                    </div>
                    </div>
                </div>
                </div>
                <!-- end analytics -->

                <!-- start Active Leads -->
                <div class="col-lg-7">
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
                                            <td># {{ $payment->trx_id }}</td>
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

                <!-- start task card -->
                <div class="col-lg-5">
                    <div id="active">
                        <div class="card">
                        <p class="head">Active user right now</p>
                        <div class="info">
                            <div class="col">
                            <h1>937</h1>
                            <p>users</p>
                            </div>
                            <div class="col">
                            <h1>82</h1>
                            <p>guests</p>
                            </div>
                        </div>
                        <p class="head">Page view per aria</p>
                        <div class="aria">
                            <p>22 from the United States of America</p>
                            <p>96 from the egypt</p>
                            <p>667 from the canada</p>
                        </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-12 alert alert-warning text-center">
                    <strong>Welcome to SKOOLEO!</strong> Create an account for your school and start enjoying our awesome services.<br><br>
                    <button class="btn btn-info" data-toggle="modal" data-target="#newAccountModal">Create an account</button>
                </div>

            @endif

        </div>
    </div>
    <!-- end the real content -->

@endsection
