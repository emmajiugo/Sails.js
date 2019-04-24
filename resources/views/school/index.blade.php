@extends('layouts.dash')

@section('content')

    <!-- Page content start -->
    <div class="page-contentbar">

        <!-- START PAGE CONTENT -->
        <div id="page-right-content">

            <div class="container">
                <div class="row">
                    <!-- check if the user is verified -->
                    @if($verify_status == 0)
                        <div class="alert alert-warning" role="alert">
                            <i class="mdi mdi-information"></i>
                            <strong>Notice!</strong> Your school is yet to be verified and cannot be visible to the public. If verification has exceeded 48hrs, please contact us at <b>hello@schoolpay.ng</b> or <b>07031056082</b>
                        </div>
                    @endif

                    <!-- include message alerts -->
                    @include('inc.messages_bs3')
                    <!-- end message alerts -->
                    <div class="col-sm-6">
                        <h4 class="header-title m-t-0 m-b-20">Dashboard</h4>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        Welcome <b style="color:darkturquoise">{{ Auth::user()->schoolname }}</b>
                    </div>
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-sm-4">
                        <div class="card-box">
                            <a href="/home/report" class="btn btn-sm btn-default pull-right">View</a>
                            <h6 class="text-muted m-t-0 text-uppercase">Total Tuition</h6>
                            <h2 class="m-b-20">&#8358;<span>{{number_format($amount)}}</span></h2>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card-box">
                            <a href="/home/history" class="btn btn-sm btn-default pull-right">View</a>
                            <h6 class="text-muted m-t-0 text-uppercase">Students Paid</h6>
                            <h2 class="m-b-20"><span>{{count($payments)}}</span></h2>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="card-box">
                            <a href="/home/settings" class="btn btn-sm btn-default pull-right">View</a>
                            <h6 class="text-muted m-t-0 text-uppercase">Users</h6>
                            <h2 class="m-b-20">0</h2>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->

                @if($bank)
                    <div class="row">
                        <div class="col-lg-offset-1 col-lg-10">
                            <div class="alert alert-success text-center">
                                <strong>Verification Details!</strong> As part of the verification process, fill in your corporate bank details and upload an image format of any government approved documents of your school.<br><br>
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#bankModal">Enter Bank Details</button>
                            </div>

                            <!-- Bank Modal -->
                            <div id="bankModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Enter your Corporate Account</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/home/bank_details" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="bank name">Select Bank</label>
                                                    <select id="bank" name="bankname" class="form-control">
                                                        <option value="">-- select bank --</option>
                                                        @if (count($banknames) > 0)
                                                            @foreach ($banknames as $bankname)
                                                                <option value="{{$bankname['code']}}">{{$bankname['name']}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="account number">Account Number</label>
                                                    <input type="text" class="form-control" id="acctno" name="acctno" placeholder="0023976543">
                                                </div>
                                                <div class="form-group">
                                                    <label for="account name">Account Name</label>
                                                    <input type="text" class="form-control" id="acctname" name="acctname" placeholder="Account Name" readonly>
                                                    <div id="loader"><img width='35px' height='35px' src="{{asset('dashboard/assets/images/loader1.gif')}}" ></div>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="">Upload Govt. Approved Document (Image Only)</label><br>
                                                    <small>(eg. CAC Document or Ministry of Education Document. Max-Size: 2MB)</small>
                                                    <input type="file" class="form-control" name="govtdoc">
                                                </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of row -->
                @endif

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <h4 class="m-t-0">Total Revenue</h4>
                            <div class="text-center">
                                <ul class="list-inline chart-detail-list">
                                    <li>
                                        <h5 class="font-normal"><i class="fa fa-circle m-r-10 text-primary"></i>Series A</h5>
                                    </li>
                                    <li>
                                        <h5 class="font-normal"><i class="fa fa-circle m-r-10 text-muted"></i>Series B</h5>
                                    </li>
                                </ul>
                            </div>
                            <div id="dashboard-bar-stacked" style="height: 300px;"></div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card-box">
                            <h4 class="m-t-0">
                                Latest payments
                                <a href="/home/history" class="btn btn-sm btn-info pull-right">Transaction History</a>
                            </h4>
                            <br>
                            <div style="height: 325px;">
                                @if(count($payments) > 0)
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Invoice #</th>
                                                <th>Student Name</th>
                                                <th>Class</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($payments as $payment)
                                                <tr>
                                                    <td>#{{$payment->trx_id}}</td>
                                                    <td>{{$payment->studentname}}</td>
                                                    <td>{{$payment->class}}</td>
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
                    </div> <!-- end col -->
                </div> <!-- end row -->

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