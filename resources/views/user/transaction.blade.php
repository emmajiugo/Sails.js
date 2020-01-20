@extends('layouts.dash')

@section('content')

	<!-- start with the real content -->
	<div id="real">
		<!-- start content here -->
		<div class="wrap">
			<section class="app-content">
				<div class="row">
					<div class="col-md-12">
						<h4 class="m-b-lg">Transaction History</h4>
					</div><!-- END column -->

					<div class="col-md-12">
						<div class="widget p-lg">
							<h4 class="m-b-lg">Responsive tables</h4>
							<p class="m-b-lg docs">
								Create responsive tables by wrapping any <code>.table</code> in <code>.table-responsive</code> to make them scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, you will not see any difference in these tables.
							</p>
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
