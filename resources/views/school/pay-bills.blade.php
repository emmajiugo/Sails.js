@extends('layouts.dash')

@section('content')

    <!-- Page content start -->
    <div class="page-contentbar">

        <!-- START PAGE CONTENT -->
        <div id="page-right-content">

            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Pay Bills</h4>
                    </div>
                </div> 
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-offset-3 col-lg-6">
                        <div class="card-box">
                            <div class="text-center">
                            <img src="{{asset('dashboard/assets/images/coming-soon.png')}}" height="200" width="auto" alt="COMING SOON">
                                <h1>Pay Bills</h1>
                                <p>In this section, you will be able bills like Tax, Electricity bills and co, with a <b>"Click"</b> of a button.</p>
                            </div>
                        </div>
                    </div> 
                    <!-- end col -->
                </div>

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