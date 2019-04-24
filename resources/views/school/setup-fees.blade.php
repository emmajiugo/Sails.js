@extends('layouts.dash')

@section('content')

    <!-- Page content start -->
    <div class="page-contentbar">

        <!-- START PAGE CONTENT -->
        <div id="page-right-content">            
            <div class="container">
                <div class="row">
                    <!-- check if the user is verified -->
                    @if($verify_status == 0)
                        <div class="alert alert-warning" role="alert">
                            <i class="mdi mdi-information"></i>
                            <strong>Notice!</strong> Your school is yet to be verified and cannot be visible to the public. If verification has exceeded 48hrs, please contact us at <b>hello@schoolpay.ng</b> or <b>07031056082</b>
                        </div>
                    @endif
                    
                    <!-- include message alerts -->
                    @include('inc.messages_bs3')
                    <!-- end message alerts -->
                    <div class="col-sm-6 pull-right">
                        <div class="pull-right">
                            <button class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#feetypeModal">Set Fees Collected</button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="header-title m-t-0 m-b-20">Setup Fees</h4>
                    </div>
                </div> 
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-box">
                            <div class="text-center">
                                <h2 class="m-t-0">SECONDARY SECTION</h2>
                                <a href="/school/view-setup/secondary" class="btn btn-sm btn-info">View Fees</a> 
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#setupModal" onclick="setup('SECONDARY')">Setup Fees</button>
                            </div>
                        </div>
                    </div> 
                    <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card-box">
                            <div class="text-center">
                                <h2 class="m-t-0">PRIMARY SECTION</h2>
                                <a href="/school/view-setup/primary" class="btn btn-sm btn-info">View Fees</a> 
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#setupModal" onclick="setup('PRIMARY')">Setup Fees</button>
                            </div>
                        </div>
                    </div> 
                    <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card-box">
                            <div class="text-center">
                                <h2 class="m-t-0">NURSERY SECTION</h2>
                                <a href="/school/view-setup/nursery" class="btn btn-sm btn-info">View Fees</a> 
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#setupModal" onclick="setup('NURSERY')">Setup Fees</button>
                            </div>
                        </div>
                    </div> 
                    <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card-box">
                            <div class="text-center">
                                <h2 class="m-t-0">CRECHE SECTION</h2>
                                <a href="/school/view-setup/creche" class="btn btn-sm btn-info">View Fees</a> 
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#setupModal" onclick="setup('CRECHE')">Setup Fees</button>
                            </div>
                        </div>
                    </div> 
                    <!-- end col -->
                </div> 
                <!-- end row -->
                
                <!-- pass the section to the modal -->
                <script>
                    function setup(section) {
                        //assign to the textbox
                        document.getElementById('section').value = section;
                    }
                </script>

                <!-- fees collected modal here -->
                <div id="feetypeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Set Fees Collected</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Set the type of fees you collect. <b>Eg: School Fees, PTA Levy, Lesson Fees.</b> You can add as many as possible.</p>
                                        <br>
                                    </div>
                                </div>

                                <form action='/school/setup-fees' method='POST' >
                                    <input type="hidden" name="formtype" value="fees collected">
                                    <div class="row" id='TextBoxesGroupx'>
                                        <div id="TextBoxDivx1">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="feetype[]" placeholder="Eg: School Fees" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-offset-8 col-md-4">
                                            <span id="addButtonx" class="btn btn-sm btn-success">+</span> 
                                            <span id="removeButtonx" class="btn btn-sm btn-danger">-</span>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- modal here -->
                <div id="setupModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Fee Setup</h4>
                            </div>
                            <div class="modal-body">
                            <form action='/school/setup-fees' method='POST' >
                                <input type="hidden" name="formtype" value="setup fees">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="section" class="control-label">Section</label>
                                            <input type="text" class="form-control" id="section" name="section" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="session">Academic Session</label>
                                            <select name="session" class="form-control" required>
                                                <option value="">-- select academic session --</option>
                                                @if(count($sessiondetails) > 0)
                                                    @foreach($sessiondetails as $value)
                                                        <option value="{{$value->sessionname}}" {{ old('session') == $value->sessionname ? 'selected':'' }}>{{$value->sessionname}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="session">Academic Term</label>
                                            <select name="term" class="form-control" required>
                                                <option value="">-- select term --</option>
                                                <option value="1ST TERM" {{ old('term') == '1ST TERM' ? 'selected':'' }}>1ST TERM</option>
                                                <option value="2ND TERM" {{ old('term') == '2ND TERM' ? 'selected':'' }}>2ND TERM</option>
                                                <option value="3RD TERM" {{ old('term') == '3RD TERM' ? 'selected':'' }}>3RD TERM</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="section" class="control-label">Fee Name</label>
                                            @if(count($fees) > 0)
                                                <select name="feename" class="form-control" required>
                                                    <option value="">-- select fee type --</option>
                                                    @foreach($fees as $fee)
                                                        <option value="{{$fee->id}}" {{ old('feename') == $fee->id ? 'selected':'' }}>{{strtoupper($fee->feename)}}</option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <input type="text" class="form-control" name="feename" placeholder="No Fees Set." readonly>
                                                <small style="color:red">Close the modal and set your fees with the button at the right hand of the page.</small>
                                            @endif                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id='TextBoxesGroup'>
                                    <div class="col-md-8">
                                        <label for="field-4" class="control-label">Fee Description</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="field-6" class="control-label">Amount</label>
                                    </div>
                                    <div id="TextBoxDiv1">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="description[]" placeholder="Eg: Tuition Payment, PTA Levy, Sports levy etc" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="amount[]" placeholder="3000" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-8 col-md-4">
                                        <span id="addButton" class="btn btn-sm btn-success">+</span> 
                                        <span id="removeButton" class="btn btn-sm btn-danger">-</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="form-group">
                                            <label for="field-7" class="control-label">Fees applicable to:</label><br>
                                            <small>(select the classes this fee structure is applicable to)</small>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="checkbox checkbox-dark">
                                                        <input name="classes[]" type="checkbox" value="SS 1">
                                                        <label for="ss1">SS 1</label>
                                                    </div>
                                                    <div class="checkbox checkbox-dark">
                                                        <input name="classes[]" type="checkbox"  value="SS 2">
                                                        <label for="ss2">SS 2</label>
                                                    </div>
                                                    <div class="checkbox checkbox-dark">
                                                        <input name="classes[]" type="checkbox" value="SS 3">
                                                        <label for="ss3">SS 3</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="checkbox checkbox-dark">
                                                        <input name="classes[]" type="checkbox" value="JSS 1">
                                                        <label for="jss1">JSS 1</label>
                                                    </div>
                                                    <div class="checkbox checkbox-dark">
                                                        <input name="classes[]" type="checkbox" value="JSS 2">
                                                        <label for="jss2">JSS 2</label>
                                                    </div>
                                                    <div class="checkbox checkbox-dark">
                                                        <input name="classes[]" type="checkbox" value="JSS 3">
                                                        <label for="jss3">JSS 3</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                                </form>
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