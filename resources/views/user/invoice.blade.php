@extends('layouts.dash')

@section('content')

    <!-- start with the real content -->
    <div id="real">
      <!-- start content here -->
      <div id="invoice" class="wrap card">
      	<section class="app-content">
      		<div class="container-fluid">
      			<div class="panel panel-default">
      				<div class="panel-heading bg-white">
                        <h4 class="panel-title">Invoice Details

                            <a href="{{ route('user.invoice') }}" class="btn btn-link float-right">|<< Back</a>

                        </h4>
      				</div>

      				<div class="panel-body">
      					<div class="row">
      						<div class="col-sm-8 col-xs-6">
      							<h4 class="fw-600">{{ $school->schoolname }}</h4>
      							<p>{{ $school->schooladdress }}</p>
                                  <p>School Contact Email: {{ $school->schoolemail }}</p>
                                  <p>School Contact Phone: {{ $school->schoolphone }}</p>
      						</div>
      						<div class="col-sm-4 col-xs-6">
                                <h4 class="fw-600 text-right">INVOICE #{{ $invoice->invoice_reference }}</h4>
                                <p style="text-align:right">{!! $invoice->status=='UNPAID' ? '<button class="btn btn-danger btn-sm">'.$invoice->status.'</button>':'<button class="btn btn-success btn-sm">'.$invoice->status.'</button>' !!}</p>
      							<p class="text-right">Date Created: {{ $invoice->created_at }}<br>Date of Payment: {{ $invoice->updated_at }}</p>

      							<h4 class="m-t-lg fw-600 text-right details">Student Details:</h4>
      							<div class="clearfix">
      								<p class="pull-left"><b>Student Name:</b></p>
      								<p class="pull-right"><b>{{ $invoice->studentname }}</b></p>
      							</div>
      							<div class="clearfix">
      								<p class="pull-left"><b>Student Class:</b></p>
      								<p class="pull-right"><b>{{ $invoice->class }}</b></p>
      							</div>
      							<div class="clearfix">
      								<p class="pull-left"><b>Term:</b></p>
      								<p class="pull-right"><b>{{ $invoice->term }}</b></p>
      							</div>
      							<div class="clearfix">
      								<p class="pull-left"><b>Session:</b></p>
      								<p class="pull-right"><b>{{ $invoice->session }}</b></p>
      							</div>
      						</div>
      					</div>

      					<div class="table-responsive m-h-lg">
      						<table class="table">
                                <tr><th>#</th><th>Description</th><th>Amount</th></tr>
                                @foreach ($feesbreakdown as $item)
                                    <tr><td>#</td><td>{{ $item->description }}</td><td>&#8358;{{ $item->amount }}</td></tr>
                                @endforeach
      						</table>
      					</div>

      					<div class="row">
      						<div class="col-sm-6 col-sm-push-6">
      							<p>Sub-Total: &#8358;{{ $feesum }}</p>
      							<p>Fee: &#8358;{{ $transaction_fee }}</p>
      							<p>Grand Total: <span class="text-primary">&#8358;{{ $feesum + $transaction_fee }}</span></p>
      							<div class="m-t-lg">
      								<button type="button" class="btn btn-md btn-primary m-r-lg">Pay Now</button>
      								<a href="{{ route('user.dashboard') }}" class="btn btn-md btn-secondary">Add Another Student</a>
      							</div>
      						</div>
      					</div>
      				</div><!-- .panel-body -->
      			</div>
      		</div><!-- .container-fluid -->
      	</section><!-- #dash-content -->
      </div><!-- .wrap -->
      <!-- end content -->
    </div>
    <!-- end the real content -->

@endsection
