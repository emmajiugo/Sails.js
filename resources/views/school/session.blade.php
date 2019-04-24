@extends('layout.dash')

@section('content')

    <!-- Page content start -->
    <div class="page-contentbar">

        <!-- START PAGE CONTENT -->
        <div id="page-right-content">

            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Academic Session</h4>
                        <p>You can create a new academic session through the "Setup Fees Section" or edit existing one to a new academic session to reuse the same information.</p>
                    </div>
                </div> 
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="text-center">
                                <h2 class="m-t-0">2014/2015</h2>
                                <small>Academic Session</small><br>
                                <a href="/home/setup-fees/session/classes" class="btn btn-sm btn-info">View</a> 
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#sessionModal" onclick="session('2014/2015')">Edit</button>
                            </div>
                        </div>
                    </div> 
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="text-center">
                                <h2 class="m-t-0">2014/2015</h2>
                                <small>Academic Session</small><br>
                                <a href="" class="btn btn-sm btn-info">View</a> 
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#sessionModal" onclick="session('2014/2015')">Edit</button>
                            </div>
                        </div>
                    </div> 
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="text-center">
                                <h2 class="m-t-0">2014/2015</h2>
                                <small>Academic Session</small><br>
                                <a href="" class="btn btn-sm btn-info">View</a> 
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#sessionModal" onclick="session('2014/2015')">Edit</button>
                            </div>
                        </div>
                    </div> 
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card-box">
                            <div class="text-center">
                                <h2 class="m-t-0">2014/2015</h2>
                                <small>Academic Session</small><br>
                                <a href="" class="btn btn-sm btn-info">View</a> 
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#sessionModal" onclick="session('2004/2005')">Edit</button>
                            </div>
                        </div>
                    </div> 
                    <!-- end col -->
                </div> 
                <!-- end row -->

                <!-- pass the section to the modal -->
                <script>
                    function session(sessionYear) {
                        //assign to the textbox
                        document.getElementById('session').value = sessionYear;
                    }
                </script>

                <!-- modal here -->
                <div id="sessionModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Fee Setup</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="section" class="control-label">Session</label>
                                            <input type="text" class="form-control" id="session" name="session">
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-info waves-effect waves-light">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal -->

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