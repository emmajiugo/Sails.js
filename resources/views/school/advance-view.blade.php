@extends('layout.dash')

@section('content')

    <!-- Page content start -->
    <div class="page-contentbar">

        <!-- START PAGE CONTENT -->
        <div id="page-right-content">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="header-title m-t-0 m-b-20">Advance View</h4>
                    </div>
                </div> 
                <!-- end row -->

                <!-- populate all fees of the user -->
                <div class="row">
                    <div class="col-lg-12">
                        @if (count($feesetup) > 0)
                            <p></p>
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>CLASS</th>
                                    <th>TERM</th>
                                    <th>SESSION</th>
                                    <th>FEE TYPE</th>
                                    <th>AMOUNT</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($feesetup as $fees)
                                        <tr>
                                            <td>{{$fees->class}}</td>
                                            <td>{{$fees->term}}</td>
                                            <td>{{$fees->session}}</td>
                                            <td>{{strtoupper($fees->feetype->feename)}}</td>
                                            <td>
                                                <!-- get the total fee for the setup -->
                                                @php
                                                    $totalFee = 0;
                                                    foreach($fees->feesbreakdown as $value) {
                                                        $totalFee += $value['amount'];
                                                    }
                                                @endphp
                                                <b>{{$totalFee}}</b>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#view{{$fees->id}}">Fee Breakdown</button> 
                                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$fees->id}}">Delete</button>
                                                
                                                <!-- Fee Breakdown Modal -->
                                                <div id="view{{$fees->id}}" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Fee Breakdown</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>To make any changes click the <a href="/home/view-setup/{{strtolower($fees->section)}}">View Setup</a>.</p>
                                                                <table class="table table-striped table-bordered">
                                                                    <tr>
                                                                        <th>Description</th>
                                                                        <th>Amount</th>
                                                                    </tr>
                                                                    @foreach($fees->feesbreakdown as $details)
                                                                        <tr>
                                                                            <td>{{$details->description}}</td>
                                                                            <td>{{$details->amount}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    <tr>
                                                                        <th style="text-align:right">Total:</th>
                                                                        <th>{{$totalFee}}</th>
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Delete Modal -->
                                                <div id="delete{{$fees->id}}" class="modal fade" role="dialog">
                                                    <div class="modal-dialog modal-sm">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Delete Setup</h4>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <img src="{{asset('assets/img/warning.png')}}" alt="Warning-Delete" height="100" width="auto">
                                                                <p>Taking this action will delete the record together with the associated records (eg: fees breakdown).</p>
                                                            </div>
                                                            <div class="modal-footer">                                                                
                                                                <!--form for delete-->
                                                                {!! Form::open(['action' => ['AdvanceViewController@destroy', $fees->id], 'method' => 'POST']) !!}
                                                                {{Form::hidden('_method', 'DELETE')}}<!--to show its an delete request-->
                                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button> 
                                                                <button type="submit" class="btn btn-danger btn-sm">Delete Record</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else 
                            <p>No fee setup associated with your account.</p>
                        @endif
                    </div>
                </div>
                <!-- end the population -->
            
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