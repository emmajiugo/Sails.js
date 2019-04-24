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

                    <div class="col-sm-6">
                        <h4 class="header-title m-t-0 m-b-20">Fees</h4>
                    </div>
                    <div class="col-sm-6">
                        <p class="pull-right" style="color:green">Use the side box to filter the search.</p>
                    </div>
                </div> 
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card-box" style="min-height:500px; background-color:aliceblue">
                            <h4 class="header-title m-t-0 m-b-20 text-center">SEARCH</h4>

                            <form action="{{route('setup.search')}}" method='POST'>
                                <div class="form-group">
                                    <label for="section" class="control-label">Section</label>
                                    <input type="text" class="form-control" name="section" value="{{strtoupper($section)}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="session">Academic Session</label>
                                    <select name="session" class="form-control">
                                        <option value="">-- select academic session --</option>
                                        @if(count($sessiondetails) > 0)
                                            @foreach($sessiondetails as $value)
                                                <option value="{{$value->sessionname}}" {{ old('session') == $value->sessionname ? 'selected':'' }}>{{$value->sessionname}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="class">Class</label>
                                    <select name="classes" class="form-control">
                                        <option value="">-- select class --</option>
                                        @if($section == 'secondary')
                                            <option value="JSS 1" {{ old('classes') == 'JSS 1' ? 'selected':'' }}>JSS 1</option>
                                            <option value="JSS 2" {{ old('classes') == 'JSS 2' ? 'selected':'' }}>JSS 2</option>
                                            <option value="JSS 3" {{ old('classes') == 'JSS 3' ? 'selected':'' }}>JSS 3</option>
                                            <option value="SS 1" {{ old('classes') == 'SS 1' ? 'selected':'' }}>SSS 1</option>
                                            <option value="SS 2" {{ old('classes') == 'SS 2' ? 'selected':'' }}>SSS 2</option>
                                            <option value="SS 3" {{ old('classes') == 'SS 3' ? 'selected':'' }}>SSS 3</option>
                                        @elseif($section == 'primary')
                                            <option value="PRIMARY 1" {{ old('classes') == 'PRIMARY 1' ? 'selected':'' }}>PRIMARY 1</option>
                                            <option value="PRIMARY 2" {{ old('classes') == 'PRIMARY 2' ? 'selected':'' }}>PRIMARY 2</option>
                                            <option value="PRIMARY 3" {{ old('classes') == 'PRIMARY 3' ? 'selected':'' }}>PRIMARY 3</option>
                                            <option value="PRIMARY 4" {{ old('classes') == 'PRIMARY 4' ? 'selected':'' }}>PRIMARY 4</option>
                                            <option value="PRIMARY 5" {{ old('classes') == 'PRIMARY 5' ? 'selected':'' }}>PRIMARY 5</option>
                                            <option value="PRIMARY 6" {{ old('classes') == 'PRIMARY 6' ? 'selected':'' }}>PRIMARY 6</option>
                                        @elseif($section == 'nursery')
                                            <option value="NURSERY 1" {{ old('classes') == 'NURSERY 1' ? 'selected':'' }}>NURSERY 1</option>
                                            <option value="NURSERY 2" {{ old('classes') == 'NURSERY 2' ? 'selected':'' }}>NURSERY 2</option>
                                            <option value="NURSERY 3" {{ old('classes') == 'NURSERY 3' ? 'selected':'' }}>NURSERY 3</option>
                                        @elseif($section == 'creche')
                                            <option value="CRECHE" {{ old('classes') == 'CRECHE' ? 'selected':'' }}>CRECHE</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="term">Academic Term</label>
                                    <select name="term" class="form-control">
                                        <option value="">-- select term --</option>
                                        <option value="1ST TERM" {{ old('term') == '1ST TERM' ? 'selected':'' }}>1ST TERM</option>
                                        <option value="2ND TERM" {{ old('term') == '2ND TERM' ? 'selected':'' }}>2ND TERM</option>
                                        <option value="3RD TERM" {{ old('term') == '3RD TERM' ? 'selected':'' }}>3RD TERM</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fee-name" class="control-label">Fee Name</label>
                                    @if(count($fees) > 0)
                                        <select name="feename" class="form-control">
                                            <option value="">-- select fee type --</option>
                                            @foreach($fees as $fee)
                                                <option value="{{$fee->id}}" {{ old('feename') == $fee->id ? 'selected':'' }}>{{strtoupper($fee->feename)}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="text" class="form-control" name="feename" placeholder="No Fees Set." readonly>
                                        <small style="color:red"><a href="/home/setup-fees">Click Here</a> to set fees. Use the <b>Set Fees</b> button at the right hand of the page.</small>
                                    @endif                                            
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                                </div>
                            </form>
                        </div>
                    </div> 
                    <!-- end col -->

                    <div class="col-lg-8">
                        <div id="flipdiv"> 
                            <div class="front">
                                <div class="card-box" style="min-height:500px; background-color:#f8f8f8">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h4 class="m-t-0">SEARCH RESULT</h4>                                        
                                        </div>
                                        <div class="col-lg-6" style="text-align:right">
                                            <a href="/home/advance-view" class="btn btn-sm btn-info">Advance View</a>
                                            <button class="btn btn-sm btn-primary" onclick="flipFunction()">Flip to Edit</button>
                                        </div>
                                        <div class="col-lg-12">
                                            <br>
                                            @if(session('feesetup'))
                                                @php
                                                    //getting values passed through session
                                                    $feesetup = session()->get('feesetup');
                                                    $feebreakdown = session()->get('feebreakdown');
                                                    
                                                @endphp
                                                
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td colspan="3" class="text-center">
                                                            <h3><u>{{$feesetup->section}}</u></h3>
                                                            <p><b>{{strtoupper($feesetup->feetype->feename)}}</b></p>
                                                        </td>
                                                    </tr>
                                                    <tr class="text-center">
                                                        <td>
                                                            <b>Class: </b>{{$feesetup->class}}
                                                        </td>
                                                        <td>
                                                            <b>Term: </b>{{$feesetup->term}}<br>
                                                        </td>
                                                        <td>
                                                            <b>Session: </b>{{$feesetup->session}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <br>
                                                            <div class="text-center"><b>Fees Breakdown</b></div>
                                                            <br>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>Description</th>
                                                                    <th>Amount</th>
                                                                </tr>
                                                                <?php $totalAmount = 0; ?>
                                                                @foreach($feebreakdown as $details)
                                                                    <tr>
                                                                        <td>{{$details->description}}</td>
                                                                        <td>{{$details->amount}}</td>
                                                                    </tr>
                                                                    <?php $totalAmount += $details->amount; ?>
                                                                @endforeach
                                                                <tr>
                                                                    <th style="text-align:right">Total:</th>
                                                                    <th>{{$totalAmount}}</th>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            @else
                                                <p class="text-center" style="margin-top: 50px; color:forestgreen">No search made yet.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="back">
                                <div class="card-box" style="min-height:500px;">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h4 class="m-t-0">Edit Content</h4>
                                        </div>
                                        <div class="col-lg-6">
                                            <button class="btn btn-sm btn-primary pull-right" onclick="flipFunction()">Unflip</button>
                                        </div>
                                        <div class="col-lg-12">
                                            <br>
                                            @if(session('feesetup'))
                                                @php
                                                    //getting values passed through session
                                                    $feesetup = session()->get('feesetup');
                                                    $feebreakdown = session()->get('feebreakdown');

                                                @endphp                                            
                                                
                                                <div class="panel-group" id="accordion">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                                Setup <!-- setup info for editting -->
                                                            </a>
                                                        </h4>
                                                        </div>
                                                        <div id="collapse1" class="panel-collapse collapse in">
                                                            <div class="panel-body">
                                                                <form action="{{route(setup.update, $feesetup->id)}}" method=POST>
                                                                    <input name='_method' value='PUT'><!--to show its an update request-->
                                                                    <input type="hidden" name="type" value="feesetup"><!--we want to know type of update being passed so we can loop it in our function-->
                                                                    <div class="form-group col-lg-12">
                                                                        <label for="section" class="control-label">Section</label>
                                                                        <input type="text" class="form-control" name="section" value="{{strtoupper($section)}}" readonly>
                                                                    </div>
                                                                    <div class="form-group col-lg-6">
                                                                        <label for="session">Academic Session</label>
                                                                        <select name="session" class="form-control">
                                                                            <option value="">-- select academic session --</option>
                                                                            @if(count($sessiondetails) > 0)
                                                                                @foreach($sessiondetails as $value)
                                                                                    <option value="{{$value->sessionname}}" {{ old('session') == $value->sessionname ? 'selected':'' }}>{{$value->sessionname}}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-lg-6">
                                                                        <label for="class">Class</label>
                                                                        <select name="classes" class="form-control">
                                                                            <option value="">-- select class --</option>
                                                                            @if($section == 'secondary')
                                                                                <option value="JSS 1" {{ old('classes') == 'JSS 1' ? 'selected':'' }}>JSS 1</option>
                                                                                <option value="JSS 2" {{ old('classes') == 'JSS 2' ? 'selected':'' }}>JSS 2</option>
                                                                                <option value="JSS 3" {{ old('classes') == 'JSS 3' ? 'selected':'' }}>JSS 3</option>
                                                                                <option value="SS 1" {{ old('classes') == 'SS 1' ? 'selected':'' }}>SSS 1</option>
                                                                                <option value="SS 2" {{ old('classes') == 'SS 2' ? 'selected':'' }}>SSS 2</option>
                                                                                <option value="SS 3" {{ old('classes') == 'SS 3' ? 'selected':'' }}>SSS 3</option>
                                                                            @elseif($section == 'primary')
                                                                                <option value="PRIMARY 1" {{ old('classes') == 'PRIMARY 1' ? 'selected':'' }}>PRIMARY 1</option>
                                                                                <option value="PRIMARY 2" {{ old('classes') == 'PRIMARY 2' ? 'selected':'' }}>PRIMARY 2</option>
                                                                                <option value="PRIMARY 3" {{ old('classes') == 'PRIMARY 3' ? 'selected':'' }}>PRIMARY 3</option>
                                                                                <option value="PRIMARY 4" {{ old('classes') == 'PRIMARY 4' ? 'selected':'' }}>PRIMARY 4</option>
                                                                                <option value="PRIMARY 5" {{ old('classes') == 'PRIMARY 5' ? 'selected':'' }}>PRIMARY 5</option>
                                                                                <option value="PRIMARY 6" {{ old('classes') == 'PRIMARY 6' ? 'selected':'' }}>PRIMARY 6</option>
                                                                            @elseif($section == 'nursery')
                                                                                <option value="NURSERY 1" {{ old('classes') == 'NURSERY 1' ? 'selected':'' }}>NURSERY 1</option>
                                                                                <option value="NURSERY 2" {{ old('classes') == 'NURSERY 2' ? 'selected':'' }}>NURSERY 2</option>
                                                                                <option value="NURSERY 3" {{ old('classes') == 'NURSERY 3' ? 'selected':'' }}>NURSERY 3</option>
                                                                            @elseif($section == 'creche')
                                                                                <option value="CRECHE" {{ old('classes') == 'CRECHE' ? 'selected':'' }}>CRECHE</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-lg-6">
                                                                        <label for="term">Academic Term</label>
                                                                        <select name="term" class="form-control">
                                                                            <option value="">-- select term --</option>
                                                                            <option value="1ST TERM" {{ old('term') == '1ST TERM' ? 'selected':'' }}>1ST TERM</option>
                                                                            <option value="2ND TERM" {{ old('term') == '2ND TERM' ? 'selected':'' }}>2ND TERM</option>
                                                                            <option value="3RD TERM" {{ old('term') == '3RD TERM' ? 'selected':'' }}>3RD TERM</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-lg-6">
                                                                        <label for="fee-name" class="control-label">Fee Name</label>
                                                                        @if(count($fees) > 0)
                                                                            <select name="feename" class="form-control">
                                                                                <option value="">-- select fee type --</option>
                                                                                @foreach($fees as $fee)
                                                                                    <option value="{{$fee->id}}" {{ old('feename') == $fee->id ? 'selected':'' }}>{{strtoupper($fee->feename)}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        @endif                                            
                                                                    </div>
                                                                    <div class="form-group col-lg-12">
                                                                        <button type="submit" class="btn btn-primary pull-right">Update Record</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <h4 class="panel-title">
                                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                                        Fees Breakdown</a>
                                                                    </h4>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <button class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#addModal">Add Fees Breakdown</button>
                                                                </div>
                                                            </div>                                                    
                                                        </div>
                                                        <div id="collapse2" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <p>To edit a record, make your change and click the <b>"Update Record"</b> button. While to delete a record, click the <b>"Delete Record"</b> button.</p>
                                                                <br>
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <th>Description</th>
                                                                        <th>Amount</th>
                                                                        <th>Edit</th>
                                                                        <th>Delete</th>
                                                                    </tr>
                                                                    @foreach($feebreakdown as $details)
                                                                        <tr>
                                                                            <!--form for editting-->
                                                                            <form action="{{route('setup.update', $details->id)}}" method='POST'>
                                                                                <input name='_method' value='PUT'><!--to show its an update request-->
                                                                                <input type="hidden" name="type" value="feesbreakdown">
                                                                                <td>
                                                                                    <input type="text" name="description" class="form-control" value="{{$details->description}}" {{ old('description') }}>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="amount" class="form-control" value="{{$details->amount}}" {{ old('amount') }}>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="submit" class="btn btn-info btn-sm" value="Update Record">
                                                                                </td>
                                                                            </form>
                                                                            <td>
                                                                                <!--form for delete-->
                                                                                <form action="{{route('setup.delete', $details->id)}}" method='POST'>
                                                                                    <input name='_method' value='DELETE'><!--to show its an delete request-->
                                                                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete Record">
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <p class="text-center" style="margin-top: 50px; color:forestgreen">No form available for editting.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <!-- end col -->
                </div> 
                <!-- end row -->

                <!-- modal here -->
                <div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Add Fees Breakdown</h4>
                            </div>
                            <div class="modal-body">
                                <form action={{route('setup.addbreakdown')}}" method='POST'>
                                <div>
                                    @if(session('feesetup'))
                                        <input type="hidden" name="feesetup" value="{{$feesetup->id}}">
                                    @endif
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
                                                <input type="text" class="form-control" name="description[]" placeholder="Eg: Tuition Payment, PTA Levy, Sports levy etc">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="amount[]" placeholder="3000">
                                            </div>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col-md-offset-8 col-md-4">
                                        <span id="addButton" class="btn btn-sm btn-success">+</span> <span id="removeButton" class="btn btn-sm btn-danger">-</span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-info waves-effect waves-light">Add</button>
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