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
                                <button class="btn btn-warning float-right"><i class="fa fa-credit-card"></i> Pay All</button>
                            </h4>
							<span class="m-b-lg docs">
								All payments are shown here. You can always create an invoice and pay later. To pay for all <code>UNPAID</code> invoice, click the <code>Pay All</code> button above. To view invoice details, click on <code>Open Invoice</code>.
                            </span>
                            <br><br>
							<div class="table-responsive">
								<table class="table table-hover">
									<tr>
                                        <th>#</th>
                                        <th>Invoice ID</th>
										<th>Student Name</th>
										<th>Class</th>
										<th>Term</th>
										<th>Amount</th>
										<th>Status</th>
										<th></th>
                                    </tr>

                                    @isset($invoices)
                                        @foreach ($invoices as $invoice)
                                            <tr>
                                                <td>#</td>
                                                <td>{{ $invoice->invoice_reference }}</td>
                                                <td>{{ $invoice->studentname }}</td>
                                                <td>{{ $invoice->class }}</td>
                                                <td>{{ $invoice->term }}</td>
                                                <td>&#8358;{{ number_format($invoice->amount) }}</td>
                                                <td>
                                                    {!! $invoice->status=='UNPAID' ? '<button class="btn btn-danger btn-sm">'.$invoice->status.'</button>':'<button class="btn btn-success btn-sm">'.$invoice->status.'</button>' !!}
                                                </td>
                                                <td><a href="{{ route('user.invoice.id', ['reference' => $invoice->invoice_reference]) }}" class="btn btn-info btn-sm">Open Invoice</a></td>
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

@endsection
