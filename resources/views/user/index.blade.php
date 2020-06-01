@extends('layouts.dash')

@section('content')

  <!-- start with the real content -->
  <div id="real">
    <div class="row">

      <!-- start user -->
      <div class="col-lg-6">

        <!-- Regster Users -->
        <div class="regsterUsers">
          <div class="card">
            <div class="card-top">
              <h1>Over 3500</h1>
              <i class="fa fa-building"></i>
            </div>
            <div class="card-bottom">
              <p>Schools are registered and verified</p>
              <small>Couldn't find your child's school? Tell the principal/headmistress about us to make life easy for yourself.</small>
            </div>
          </div>
        </div>
        <!-- end  Regster Users-->

        <div class="users">
          <div class="card">
            <h1 class="head">Search Desired School</h1>
            <br>

            <div class="">
                {{-- <form action="{{ route('user.search.post') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" list="schoolList" id="schoolname" name="schoolname" placeholder="Search school by name" autofocus>
                        <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </div>
                </form>

                <datalist id="schoolList"></datalist> --}}

                <form action="{{ route('user.search.post') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <select name="schoolid" class="form-control search-for-school" required></select>
                    </div>

                    <button type="submit" class="btn mw-md btn-primary btn-block">Search School</button>
                </form>

            </div>

            <div class="user">

                <a href="{{ route('user.invoice') }}" class="btn mw-md btn-success btn-block">I Have Unpaid Invoice</a>

            </div>

          </div>
        </div>
      </div>
      <!-- end user -->
        <!-- start user -->
        <div class="col-lg-6">
            <div class="users">
                <div class="card">
                    <h1 class="head">Unpaid Invoices</h1>
                    @if (count($unpaidInvoices) > 0)
                        @foreach ($unpaidInvoices as $invoice)
                            <div class="user">
                                <div class="info">
                                    <h1>{{ $invoice->studentname }}</h1>
                                    <p>#{{ $invoice->invoice_reference }} | &#8358;{{ $invoice->amount }}</p>
                                </div>
                                <div class="type">
                                    <div class="btn btn-danger">unpaid</div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="user">
                            <div class="info">
                                <h1>Hurray! All invoices are cleared.</h1>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="users">
                <div class="card">
                    <h1 class="head">Latest Transactions</h1>
                    @if (count($latestInvoices) > 0)
                        @foreach ($latestInvoices as $trx)
                            <div class="user">
                                <div class="info">
                                    <h1>{{ $trx->studentname }}</h1>
                                    <p>#{{ $trx->invoice_reference }} | &#8358;{{ $trx->amount }}</p>
                                </div>
                                <div class="type">
                                    <div class="btn btn-success">paid</div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="user">
                            <div class="info">
                                <h1>No latest transactions yet!</h1>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- end user -->

    </div>
  </div>
  <!-- end the real content -->

@endsection
