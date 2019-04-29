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
                    <a class="text-color list-group-item" data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                        <i class="m-r-sm fa fa-exclamation-triangle"></i>
                        Edit Profile
                    </a>

                    <a class="text-color list-group-item" data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="true" aria-controls="collapse-2">
                        <i class="m-r-sm fa fa-folder"></i>
                        Change Password
                    </a>

                    <a class="text-color list-group-item" data-toggle="collapse" data-parent="#accordion" href="#collapse-3" aria-expanded="true" aria-controls="collapse-3">
                        <i class="m-r-sm fa fa-exclamation-circle"></i>
                        Fees Collected
                    </a>

                  </div><!-- .list-group -->

                  <hr class="m-0 m-b-md" style="border-color: #ddd;">

                  <div class="list-group">
                    <a href="javascript:void(0)" class="text-color list-group-item"><i class="m-r-sm fa fa-envelope"></i>me@gmail.com</a>
                    <a href="javascript:void(0)" class="text-color list-group-item"><i class="m-r-sm fa fa-phone"></i>1451 1251 444</a>
                    <a href="javascript:void(0)" class="text-color list-group-item"><i class="m-r-sm fa fa-eye"></i>Mon-Fri: 8:00-18:00</a>
                    <a href="javascript:void(0)" class="text-color list-group-item"><i class="m-r-sm fa fa-eye"></i>Sat-Sun: 10:00-15:00</a>
                </div><!-- .list-group -->

                  <hr class="m-0 m-b-md" style="border-color: #ddd;">
                  <div class="list-group">
                    <a href="{{ url('school/support-ticket') }}" class="list-group-item"><i class="fa m-r-sm fa-edit"></i>Submit Ticket</a>
                  </div><!-- .list-group -->
                </div><!-- .app-actions-list -->
              </div><!-- .app-action-panel -->
            </div><!-- END column -->

            <div class="col-md-9 ">
              <div class="panel-group accordion card" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="heading-1">
                    <a class="accordion-toggle" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                      <h4 class="panel-title"># Edit Profile</h4>
                      <i class="fa acc-switch"></i>
                    </a>
                  </div>
                  <div id="collapse-1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading-1">
                    <div class="panel-body">
                        <div class="col-md-10">
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
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="heading-2">
                    <a class="accordion-toggle" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                      <h4 class="panel-title"># Change Password</h4>
                      <i class="fa acc-switch"></i>
                    </a>
                  </div>
                  <div id="collapse-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-2">
                    <div class="panel-body">
                        <div class="col-md-10">
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
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="heading-3">
                    <a class="accordion-toggle" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                      <h4 class="panel-title"># Fees Collected</h4>
                      <i class="fa acc-switch"></i>
                    </a>
                  </div>
                  <div id="collapse-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-3">
                    <div class="panel-body">
                        <div class="col-md-10">
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
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="heading-4">
                    <a class="accordion-toggle" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                      <h4 class="panel-title">How much shipping cost me?</h4>
                      <i class="fa acc-switch"></i>
                    </a>
                  </div>
                  <div id="collapse-4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-4">
                    <div class="panel-body">
                      <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
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