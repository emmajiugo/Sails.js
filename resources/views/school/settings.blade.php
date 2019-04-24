@extends('layouts.dash')

@section('content')

    <!-- Page content start -->
    <div class="page-contentbar">

        <!-- START PAGE CONTENT -->
        <div id="page-right-content">

            <div class="container">
                <div class="row">
                    <!-- include message alerts -->
                    @include('inc.messages_bs3')
                    <!-- end message alerts -->
                    <div class="col-sm-12">
                        <h4 class="header-title m-t-0 m-b-20">Settings</h4>
                    </div>
                </div> 
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box" style="min-height:500px">

                            <ul class="nav nav-tabs navtab-bg nav-justified">
                                <li class="active">
                                    <a href="#profile1" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-user"></i></span>
                                        <span class="hidden-xs">Edit Profile</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#password1" data-toggle="tab" aria-expanded="true">
                                        <span class="visible-xs"><i class="fa fa-user"></i></span>
                                        <span class="hidden-xs">Change Password</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="#fees1" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                                        <span class="hidden-xs">Fees Collected</span>
                                    </a>
                                </li>
                                {{-- <li class="">
                                    <a href="#settings1" data-toggle="tab" aria-expanded="false">
                                        <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                        <span class="hidden-xs">General Settings</span>
                                    </a>
                                </li> --}}
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile1">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <form action="{{ action('SettingsController@update', ['id' => $school->id]) }}" method='POST'>
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="input" value="profile"><!-- to separate coming inputs in the controller -->
                                                <div class="form-group">
                                                    <label for="">School Name</label>
                                                    <input type="text" class="form-control" name="schoolname" value="{{$school->schoolname}}" readonly>
                                                    <small style="color:blueviolet">You can't edit this from here. To edit, send us an email to <b>hello@schoolpay.ng</b></small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">School Address</label>
                                                    <textarea class="form-control" name="schooladdr" rows="3">{{$school->schooladdr}}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">School Contact Phone</label>
                                                    <input type="text" class="form-control" name="schoolphone" value="{{$school->schoolphone}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">School Contact Email</label>
                                                    <input type="text" class="form-control" name="schoolemail" value="{{$school->schoolemail}}">
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <label for="">Account Created By</label>
                                                    <input type="text" class="form-control" name="accountcreatedby" value="{{$school->registeredby}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Registrar's Status</label>
                                                    <input type="text" class="form-control" name="registrarstatus" value="{{$school->registrarstatus}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-success" value="Update Changes">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="password1">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <form action="{{ action('SettingsController@update', ['id' => $school->id]) }}" method='POST'>
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="input" value="password"><!-- to separate coming inputs in the controller -->
                                                <p>Enter a new password. Minimum of 6 characters.</p>
                                                <div class="form-group">
                                                    <label for="">New Password</label>
                                                    <input type="text" class="form-control" name="newpassword">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Confirm New Password</label>
                                                    <input type="text" class="form-control" name="cnewpassword">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-success" value="Update Password">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="fees1">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <p>List of fees collected by your school. To add to the list below, <a href="/school/setup-fees">click here</a> and click on <b>Set Fees Collected</b> button at  the right hand of the page.</p>
                                            @if (count($fees) > 0)
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <th>Name of Fee</th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody>
                                                    @foreach ($fees as $fee)                                                
                                                        <tr>
                                                            <td>{{$fee->feename}}</td>
                                                            <td>
                                                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editModal{{$fee->id}}"><i class="fa fa-edit"></i></button> 
                                                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delModal{{$fee->id}}"><i class="fa fa-trash"></i></button>
                                                            </td>
                                                            <!-- Edit Modal -->
                                                            <div id="editModal{{$fee->id}}" class="modal fade" role="dialog">
                                                                <div class="modal-dialog modal-md">
                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{ action('SettingsController@update', ['id' => $fee->id]) }}" method='POST'>
                                                                                <input type="hidden" name="_method" value="PUT">
                                                                                <input type="hidden" name="input" value="fees"><!-- to separate coming inputs in the controller -->
                                                                                <div class="form-group">
                                                                                    <label for="">Fee Name</label>
                                                                                    <input type="text" class="form-control" name="feename" value="{{$fee->feename}}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <input type="submit" class="btn btn-success" value="Update Record">
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- Dele Modal -->
                                                            <div id="delModal{{$fee->id}}" class="modal fade" role="dialog">
                                                                <div class="modal-dialog modal-md">
                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="alert alert-warning" role="alert">
                                                                                <i class="mdi mdi-information"></i>
                                                                                <strong>Warning!</strong> Are sure you want to delete this record?
                                                                            </div>
                                                                            <form action="{{ action('SettingsController@update', ['id' => $fee->id]) }}"" method='POST'>
                                                                                <input type="hidden" name="_method" value="PUT">
                                                                                <input type="hidden" name="input" value="delete"><!-- to separate coming inputs in the controller -->
                                                                                <div class="form-group">
                                                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </tr>                                                
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            @else
                                                <div class="alert alert-warning" role="alert">
                                                    <i class="mdi mdi-information"></i>
                                                    <strong>Notice!</strong> No fee set yet. To set the fees, <a href="/home/setup-fees">click here</a> and click on <b>Set Fees Collected</b> button at  the right hand of the page.
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings1">
                                    
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
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