@extends('layouts.dash')

@section('content')

    <!-- start with the real content -->
    <div id="real">
      <!-- start content here -->
      <div class="wrap card" id="support">
        <!-- CONTENT -->
        <section class="app-content">
            <div class="row">
                <div class="col-md-10">
                    <span>List of fees collected by your school. To add to the list below, <a href="{{ route('school.setup.fees') }}">click here</a> and click on <b>Set Fees Collected</b> button at  the right hand of the page.</span>

                    <br><br>

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

                                                    <form action="{{ action('FeesCollectedController@update', ['id' => $fee->id]) }}" method='POST'>
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

                                                    <form action="{{ action('FeesCollectedController@update', ['id' => $fee->id]) }}" method="POST">
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
        </section><!-- .app-content -->
      </div><!-- .wrap -->
      <!-- end content -->
    </div>
    <!-- end the real content -->

@endsection
