@extends('layouts.dash')

@section('content')

    <!-- start with the real content -->
    <div id="real">
      <!-- start content here -->
      <div class="wrap card" id="support">
        <!-- CONTENT -->
        <section class="app-content">
          <div class="row">
            <div class="col-md-3">
              <div class="app-action-panel" id="support-action-panel">
                <div class="action-panel-toggle" data-toggle="class" data-target="#support-action-panel" data-class="open">
                  <i class="fa fa-chevron-right"></i>
                  <i class="fa fa-chevron-left"></i>
                </div><!-- .app-action-panel -->

                <div class="app-actions-list scrollable-container">
                  <!-- mail category list -->
                  <div class="list-group">
                    <a class="list-group-item" href="#" id="edit-profile-button" onclick="showSettings('edit-profile')">
                        <i class="m-r-sm fa fa-user-edit"></i>
                        Edit Profile
                    </a>

                    <a class="list-group-item" href="#" id="change-password-button" onclick="showSettings('change-password')">
                        <i class="m-r-sm fa fa-unlock-alt"></i>
                        Change Password
                    </a>

                    <a class="list-group-item" href="#" id="fees-collected-button" onclick="showSettings('fees-collected')">
                        <i class="m-r-sm fa fa-clipboard"></i>
                        Fees Collected
                    </a>

                    <a class="list-group-item" href="#" id="how-it-works-button" onclick="showSettings('how-it-works')">
                        <i class="m-r-sm fa fa-puzzle-piece"></i>
                        How it works!
                    </a>

                  </div><!-- .list-group -->

                  <hr class="m-0 m-b-md" style="border-color: #ddd;">

                  <div class="list-group">
                    <a href="javascript:void(0)" class="text-color list-group-item"><i class="m-r-sm fa fa-envelope"></i>hello@skooleo.com</a>
                    <a href="javascript:void(0)" class="text-color list-group-item"><i class="m-r-sm fa fa-phone-alt"></i>(+234) 07031056082</a>
                    <a href="javascript:void(0)" class="text-color list-group-item"><i class="m-r-sm fa fa-calendar-alt"></i>Mon-Fri: 8am - 5pm</a>
                    <a href="javascript:void(0)" class="text-color list-group-item"><i class="m-r-sm fa fa-calendar-alt"></i>Sat-Sun: 10am - 3pm</a>
                </div><!-- .list-group -->

                  <hr class="m-0 m-b-md" style="border-color: #ddd;">
                  <div class="list-group">
                  </div><!-- .list-group -->
                </div><!-- .app-actions-list -->
              </div><!-- .app-action-panel -->
            </div><!-- END column -->

            <div class="col-md-9">
                <div class="panel-group card">
                    <div class="panel panel-default" id="edit-profile">
                        <div class="panel-heading" role="tab">
                            <h4 class="panel-title">Edit Profile</h4>
                            <i class="fa acc-switch"></i>
                        </div>
                        <div>
                            <div class="panel-body">
                                <div class="col-md-10">
                                    <form action="{{ action('SettingsController@update', ['id' => $school->id]) }}" method='POST'>
                                        @csrf
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="input" value="profile"><!-- to separate coming inputs in the controller -->
                                        <div class="form-group">
                                            <label for="">School Name</label>
                                            <input type="text" class="form-control" name="schoolname" value="{{$school->schoolname}}" readonly>
                                            <small style="color:blueviolet">You can't edit this from here. To edit, send us an email to <b>hello@skooleo.com</b></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">School Address</label>
                                            <textarea class="form-control" name="schooladdr" rows="3">{{$school->schooladdress}}</textarea>
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
                    </div>

                    <div class="panel panel-default" id="change-password">
                        <div class="panel-heading">
                            <h4 class="panel-title">Change Password</h4>
                            <i class="fa acc-switch"></i>
                        </div>
                        <div>
                            <div class="panel-body">
                                <div class="col-md-10">
                                    <form action="{{ action('SettingsController@update', ['id' => $school->id]) }}" method='POST'>
                                        @csrf
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="input" value="password"><!-- to separate coming inputs in the controller -->
                                        <p>Enter a new password. Minimum of 6 characters.</p>
                                        <div class="form-group">
                                            <label for="">New Password</label>
                                            <input type="password" class="form-control" name="newpassword">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Confirm New Password</label>
                                            <input type="password" class="form-control" name="cnewpassword">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" value="Update Password">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" id="fees-collected">
                        <div class="panel-heading">
                            <h4 class="panel-title">Fees Collected</h4>
                            <i class="fa acc-switch"></i>
                        </div>
                        <div>
                            <div class="panel-body">
                                <div class="col-md-10">
                                    <p>List of fees collected by your school. To add to the list below, <a href="{{ route('school.setup.fees') }}">click here</a> and click on <b>Set Fees Collected</b> button at  the right hand of the page.</p>

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
                                                                        @csrf
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

                                                    <!-- Delete Modal -->
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

                                                                    <form action="{{ action('SettingsController@update', ['id' => $fee->id]) }}" method="POST">
                                                                        @csrf
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
                                            <strong>Notice!</strong> No fee set yet. To set the fees, <a href="{{ route('school.setup.fees') }}">click here</a> and click on <b>Set Fees Collected</b> button at  the right hand of the page.
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default" id="how-it-works">
                        <div class="panel-heading">
                            <h4 class="panel-title">How it works!</h4>
                            <i class="fa acc-switch"></i>
                        </div>
                        <div>
                            <div class="panel-body how-it-works">
                                <p>Watch our little demo of the Skooleo platform <a href="#">here</a></p>
                                <table>
                                    <tr>
                                        <td><i class="far fa-check-circle"></i></td>
                                        <td class="text">Register or Login your school account.</td>
                                    </tr>
                                    <tr>
                                        <td><i class="far fa-check-circle"></i></td>
                                        <td class="text">Verification process before making your school visible to parents.</td>
                                    </tr>
                                    <tr>
                                        <td><i class="far fa-check-circle"></i></td>
                                        <td class="text">Set up your payment plans for each sections and classes.</td>
                                    </tr>
                                    <tr>
                                        <td><i class="far fa-check-circle"></i></td>
                                        <td class="text">Start receiving payments from students and parents.</td>
                                    </tr>
                                    <tr>
                                        <td><i class="far fa-check-circle"></i></td>
                                        <td class="text">Withdraw anytime to your bank account.</td>
                                    </tr>
                                    <tr>
                                        <td><i class="far fa-check-circle"></i></td>
                                        <td class="text">Available transactions report on your dashboard.</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- END column -->
          </div>
        </section><!-- .app-content -->
      </div><!-- .wrap -->
      <!-- end content -->
    </div>
    <!-- end the real content -->

@endsection
