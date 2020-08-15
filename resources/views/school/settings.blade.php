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

                    <a class="list-group-item" href="#" id="how-it-works-button" onclick="showSettings('how-it-works')">
                        <i class="m-r-sm fa fa-puzzle-piece"></i>
                        How it works!
                    </a>

                  </div><!-- .list-group -->

                  <hr class="m-0 m-b-md" style="border-color: #ddd;">

                  <div class="list-group">
                    <a href="javascript:void(0)" class="text-color list-group-item"><i class="m-r-sm fa fa-envelope"></i>{{ \App\WebSettings::find(1)->email }}</a>
                    <a href="javascript:void(0)" class="text-color list-group-item"><i class="m-r-sm fa fa-phone-alt"></i>{{ \App\WebSettings::find(1)->phone }}</a>
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
                                            <small style="color:blueviolet">You can't edit this from here. To edit, send us an email to <b>{{ \App\WebSettings::find(1)->email }}</b></small>
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

                    <div class="panel panel-default" id="how-it-works">
                        <div class="panel-heading">
                            <h4 class="panel-title">How it works!</h4>
                            <i class="fa acc-switch"></i>
                        </div>
                        <div>
                            <div class="panel-body how-it-works">
                                <p>Watch our little demo of the Skooleo platform <a href="{{ \App\WebSettings::find(1)->demo_link }}">here</a></p>
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
