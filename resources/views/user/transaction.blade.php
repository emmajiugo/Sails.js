@extends('layouts.dash2')

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
										<th>Tabel heading</th>
										<th>Tabel heading</th>
										<th>Tabel heading</th>
										<th>Tabel heading</th>
										<th>Tabel heading</th>
										<th>Tabel heading</th>
									</tr>
									<tr>
										<td>1</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td><a href="{{ route('user.invoice', ['invoiceid' => $invoiceid]) }}" class="btn btn-info btn-sm">Open Invoice</a></td>
									</tr>
									<tr>
										<td>2</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td><a href="{{ route('user.invoice', ['invoiceid' => $invoiceid]) }}" class="btn btn-info btn-sm">Open Invoice</a></td>
									</tr>
									<tr>
										<td>3</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td><a href="{{ route('user.invoice', ['invoiceid' => $invoiceid]) }}" class="btn btn-info btn-sm">Open Invoice</a></td>
									</tr>
									<tr>
										<td>4</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td><a href="{{ route('user.invoice', ['invoiceid' => $invoiceid]) }}" class="btn btn-info btn-sm">Open Invoice</a></td>
									</tr>
									<tr>
										<td>5</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td>Table cell</td>
										<td><a href="{{ route('user.invoice', ['invoiceid' => $invoiceid]) }}" class="btn btn-info btn-sm">Open Invoice</a></td>
									</tr>
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