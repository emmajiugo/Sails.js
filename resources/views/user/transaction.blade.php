@extends('layouts.dash')

@section('content')

	<!-- start with the real content -->
	<div id="real">
		<!-- start content here -->
		<div class="wrap">
			<section class="app-content">
				<div class="row">

					<div class="col-md-12">
						<div class="widget p-lg">
							<h4 class="m-b-lg">
                                Invoice
                                <button class="btn btn-warning float-right"  data-toggle="modal" data-target="#payAllModal">
                                    <i class="fa fa-credit-card"></i> Pay All
                                </button>
                            </h4>
							<span class="m-b-lg docs">
								All payments are shown here. You can always create an invoice and pay later. To pay for all <code>UNPAID</code> invoice, click the <code>Pay All</code> button above. To view invoice details, click on <code>Open Invoice</code>.
                            </span>
                            <br><br>
							<div class="table-responsive">
								<table class="table table-hover">
									<tr>
                                        <th>Invoice ID</th>
                                        <th>Student Name</th>
                                        <th>Session</th>
										<th>Class</th>
										<th>Term</th>
										<th>Amount</th>
										<th>Status</th>
										<th></th>
                                    </tr>

                                    @isset($invoices)
                                        @foreach ($invoices as $invoice)
                                            <tr>
                                                <td>#{{ $invoice->invoice_reference }}</td>
                                                <td>{{ $invoice->studentname }}</td>
                                                <td>{{ $invoice->session }}</td>
                                                <td>{{ $invoice->class }}</td>
                                                <td>{{ $invoice->term }}</td>
                                                <td>&#8358;{{ number_format($invoice->amount) }}</td>
                                                <td>
                                                    {!! $invoice->status=='UNPAID' ? '<button class="btn btn-danger btn-sm">'.$invoice->status.'</button>':'<button class="btn btn-success btn-sm">'.$invoice->status.'</button>' !!}
                                                </td>
                                                <td><a href="{{ route('user.invoice.id', ['reference' => $invoice->invoice_reference]) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a></td>
                                            </tr>
                                        @endforeach

                                    @else

                                        <p>You have not created an invoice yet! Proceed <a href="{{ route('user.dashboard') }}">here</a> to start the process.</p>

                                    @endisset

								</table>
							</div>
						</div><!-- .widget -->
					</div><!-- END column -->
				</div><!-- .row -->
			</section><!-- #dash-content -->
		</div><!-- .wrap -->
		<!-- end content -->
	</div>
    <!-- end the real content -->

    <!-- Modal -->
    <div id="payAllModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Payment Notice</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <strong>NB:</strong> The below <code>UNPAID</code> invoice(s) will be paid for with the <b>Grand Total</b> amount below.
                    <br><br>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Invoice ID</th>
                                <th>Amount</th>
                                <th>Fee</th>
                            </tr>

                            @php
                                $totalAmount = 0;
                                $totalFee = 0;
                                $grandTotal = 0;
                                $invoiceRefs = [];
                            @endphp

                            @isset($invoices)
                                @foreach ($invoices as $invoice)
                                    @if ($invoice->status == "UNPAID")
                                        @php
                                            $totalAmount += $invoice->amount;
                                            $totalFee += 300;
                                            $grandTotal += ($invoice->amount + 300);
                                            $invoiceRefs[] = $invoice->invoice_reference;
                                        @endphp
                                        <tr>
                                            <td>#{{ $invoice->invoice_reference }}</td>
                                            <td>&#8358;{{ number_format($invoice->amount) }}</td>
                                            <td>&#8358;300</td>
                                        </tr>
                                    @endif
                                @endforeach

                                <tr style="background-color: #eeecec">
                                    <td>Total:</td>
                                    <td>&#8358;{{ number_format($totalAmount) }}</td>
                                    <td>&#8358;{{ $totalFee }}</td>
                                </tr>
                                <tr style="background-color: #e2e0e0">
                                    <td><b>Grand Total:</b></td>
                                    <td colspan="2" class="text-right"><b>&#8358;{{ number_format($grandTotal) }}</b></td>
                                </tr>
                            @endisset
                        </table>
                    </div>

                    <form action="{{ route('user.invoice.payment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="type" value="multiple">
                        <input type="hidden" name="grand_total" value="{{ $grandTotal }}">
                        <input type="hidden" name="invoice_reference" value="{{ serialize($invoiceRefs) }}">
                        <input type="hidden" name="school" value="SKOOLEO INC.">
                        <input type="hidden" name="user_name" value="{{ auth()->user()->fullname }}">
                        <input type="hidden" name="user_phone" value="{{ auth()->user()->phone }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Continue</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
