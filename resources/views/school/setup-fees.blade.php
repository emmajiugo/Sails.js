@extends('layouts.dash')

@section('content')

    <!-- start with the real content -->
    <div id="real">
      <!-- start content here -->

        <!-- check if the user is verified -->
        @include('inc.verify')

        <!-- setup fees modal -->
        <button class="btn btn-primary right" data-toggle="modal" data-target="#feetypeModal">Set Fees Collected</button>
        <br><br>

        <div class="wrap card" id="support">
        <!-- CONTENT -->
        <section class="app-content">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="text-center">
                            <h2 class="m-t-0">SECONDARY SECTION</h2>
                            <a href="/school/view-setup/secondary" class="btn btn-sm btn-info">View Fees</a>
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#setupModal" onclick="setup('SECONDARY')">Setup Fees</button>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="text-center">
                            <h2 class="m-t-0">PRIMARY SECTION</h2>
                            <a href="/school/view-setup/primary" class="btn btn-sm btn-info">View Fees</a>
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#setupModal" onclick="setup('PRIMARY')">Setup Fees</button>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="text-center">
                            <h2 class="m-t-0">NURSERY SECTION</h2>
                            <a href="/school/view-setup/nursery" class="btn btn-sm btn-info">View Fees</a>
                            <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#setupModal" onclick="setup('NURSERY')">Setup Fees</button>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
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
                    // document.getElementById('section').value = section;
                    $('#section').val(section);

                    if (section == "SECONDARY") {

                        $('#secondary-checkboxes').show();
                        $('#primary-checkboxes').hide();
                        $('#nursery-checkboxes').hide();
                        $('#creche-checkboxes').hide();
                    }
                    if (section == "PRIMARY") {
                        $('#secondary-checkboxes').hide();
                        $('#primary-checkboxes').show();
                        $('#nursery-checkboxes').hide();
                        $('#creche-checkboxes').hide();
                    }
                    if (section == "NURSERY") {
                        $('#secondary-checkboxes').hide();
                        $('#primary-checkboxes').hide();
                        $('#nursery-checkboxes').show();
                        $('#creche-checkboxes').hide();
                    }
                    if (section == "CRECHE") {
                        $('#secondary-checkboxes').hide();
                        $('#primary-checkboxes').hide();
                        $('#nursery-checkboxes').hide();
                        $('#creche-checkboxes').show();
                    }
                }
            </script>

            <!-- fees collected modal here -->
            <div id="feetypeModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Set Fees Collected</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>

                        <form action="{{ route('school.fees.store') }}" method='POST' >
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    Set the type of fees you collect. <b>Eg: School Fees, PTA Levy, Lesson Fees.</b> You can add as many as possible.
                                    <br><br>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="formtype" value="fees collected">
                                </div>

                                <div id='TextBoxesGroupx'>
                                    <div id="TextBoxDivx1">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="feetype[]" placeholder="Eg: School Fees" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="right">
                                    <span id="addButtonx" class="btn btn-sm btn-success">+</span>
                                    <span id="removeButtonx" class="btn btn-sm btn-danger">-</span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

            <!-- Fess Setup modal here -->
            <div id="setupModal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Fee Setup</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>

                        <form action="{{ route('school.fees.store') }}" method='POST'>
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="formtype" value="setup fees">

                                <div class="form-group">
                                    <label for="section" class="control-label">Section</label>
                                    <input type="text" class="form-control" id="section" name="section" readonly>
                                </div>

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

                                <div class="form-group">
                                    <label for="session">Academic Term</label>
                                    <select name="term" class="form-control" required>
                                        <option value="">-- select term --</option>
                                        <option value="1ST TERM" {{ old('term') == '1ST TERM' ? 'selected':'' }}>1ST TERM</option>
                                        <option value="2ND TERM" {{ old('term') == '2ND TERM' ? 'selected':'' }}>2ND TERM</option>
                                        <option value="3RD TERM" {{ old('term') == '3RD TERM' ? 'selected':'' }}>3RD TERM</option>
                                    </select>
                                </div>

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

                                <div id='TextBoxesGroup'>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="Fee Description" class="control-label">Fee Description</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="Amount" class="control-label">Amount</label>
                                        </div>
                                    </div>

                                    <div class="row" id="TextBoxDiv1">

                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="description[]" placeholder="Eg: Tuition Payment, PTA Levy, Sports levy etc" required>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="amount[]" placeholder="3000" required>
                                        </div>

                                    </div>
                                    <br>
                                </div>

                                <div class="form-group">
                                    <br>
                                    <span id="addButton" class="btn btn-sm btn-success">+</span>
                                    <span id="removeButton" class="btn btn-sm btn-danger">-</span>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Fees applicable to:</label><br>
                                    <small>(select the classes this fee structure is applicable to)</small>
                                    <!-- Secondary Checkboxed -->
                                    <div class="row" id="secondary-checkboxes">
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
                                    <!-- Primary Checkboxed -->
                                    <div class="row" id="primary-checkboxes">
                                        <div class="col-md-6">
                                            <div class="checkbox checkbox-dark">
                                                <input name="classes[]" type="checkbox" value="PRIMARY 1">
                                                <label for="pri1">PRIMARY 1</label>
                                            </div>
                                            <div class="checkbox checkbox-dark">
                                                <input name="classes[]" type="checkbox"  value="PRIMARY 2">
                                                <label for="pri2">PRIMARY 2</label>
                                            </div>
                                            <div class="checkbox checkbox-dark">
                                                <input name="classes[]" type="checkbox" value="PRIMARY 3">
                                                <label for="pri3">PRIMARY 3</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkbox checkbox-dark">
                                                <input name="classes[]" type="checkbox" value="PRIMARY 4">
                                                <label for="pri4">PRIMARY 4</label>
                                            </div>
                                            <div class="checkbox checkbox-dark">
                                                <input name="classes[]" type="checkbox" value="PRIMARY 5">
                                                <label for="pri5">PRIMARY 5</label>
                                            </div>
                                            <div class="checkbox checkbox-dark">
                                                <input name="classes[]" type="checkbox" value="PRIMARY 6">
                                                <label for="pri6">PRIMARY 6</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Nursery Checkboxed -->
                                    <div class="row" id="nursery-checkboxes">
                                        <div class="col-md-6">
                                            <div class="checkbox checkbox-dark">
                                                <input name="classes[]" type="checkbox" value="NURSERY 1">
                                                <label for="pri1">NURSERY 1</label>
                                            </div>
                                            <div class="checkbox checkbox-dark">
                                                <input name="classes[]" type="checkbox"  value="NURSERY 2">
                                                <label for="pri2">NURSERY 2</label>
                                            </div>
                                            <div class="checkbox checkbox-dark">
                                                <input name="classes[]" type="checkbox" value="NURSERY 3">
                                                <label for="pri3">NURSERY 3</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>
                                    <!-- Creche Checkboxed -->
                                    <div class="row" id="creche-checkboxes">
                                        <div class="col-md-6">
                                            <div class="checkbox checkbox-dark">
                                                <input name="classes[]" type="checkbox" value="CRECHE" checked disabled>
                                                <label for="creche">CRECHE</label>
                                                <br><small>(we have selected this for you)</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.modal -->

        </section>
        </div>
    </div>


@endsection
