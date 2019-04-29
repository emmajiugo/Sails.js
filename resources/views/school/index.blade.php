@extends('layouts.dash')

@section('content')

    <!-- start with the real content -->
    <div id="real">
      <div class="row">
        <!-- start head content    -->

        <!-- check if the user is verified -->
        @if($verify_status == 0)
            <div class="alert alert-warning" role="alert">
                <i class="mdi mdi-information"></i>
                <strong>Notice!</strong> Your school is yet to be verified and cannot be visible to the public. If verification has exceeded 48hrs, please contact us at <b>hello@schoolpay.ng</b> or <b>07031056082</b>
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
          <!-- Regster Users -->
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
          <!-- end  Regster Users-->
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

        <!-- Enter bank details if not yet submitted -->
        @if($bank)
            <!-- <div class="row"> -->
            <div class="col-lg-1">
            </div>
            <div class="col-lg-offset-1 col-lg-10">
                <div class="alert alert-success text-center">
                    <strong>Verification Details!</strong> As part of the verification process, fill in your corporate bank details and upload an image format of any government approved documents of your school.<br><br>
                    <button class="btn btn-info" data-toggle="modal" data-target="#bankModal">Enter Bank Details</button>
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
            <!-- </div> -->
            <!-- end of row -->
        @endif
        <!-- end of Bank details -->

        <!-- start Active Leads -->
        <div class="col-lg-7">
          <div id="leads">
            <div class="card">
              <h1 class="head">Latest Payments
                <a href="/home/history" class="btn btn-sm btn-info" style="float:right">Transaction History</a>
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
        <!-- end task card -->

      </div>
    </div>
    <!-- end the real content -->

@endsection