@extends('layout.dash')

@section('content')

    <!-- Page content start -->
    <div class="page-contentbar">

        <!-- START PAGE CONTENT -->
        <div id="page-right-content">

            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Classes</h4>
                        <p>Click on the view button to view the fees created.</p>
                    </div>
                </div> 
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="text-center">
                                <h2 class="m-t-0">JSS 1</h2>
                                <a href="/home/setup-fees/session/classes/fees" class="btn btn-sm btn-info">View</a> 
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </div>
                        </div>
                    </div> 
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="text-center">
                                <h2 class="m-t-0">JSS 2</h2>
                                <a href="/home/setup-fees/session/classes/fees" class="btn btn-sm btn-info">View</a> 
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </div>
                        </div>
                    </div> 
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="text-center">
                                <h2 class="m-t-0">JSS 3</h2>
                                <a href="/home/setup-fees/session/classes/fees" class="btn btn-sm btn-info">View</a> 
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </div>
                        </div>
                    </div> 
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="text-center">
                                <h2 class="m-t-0">SS 1</h2>
                                <a href="/home/setup-fees/session/classes/fees" class="btn btn-sm btn-info">View</a> 
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </div>
                        </div>
                    </div> 
                    <!-- end col -->
                </div> 
                <!-- end row -->

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