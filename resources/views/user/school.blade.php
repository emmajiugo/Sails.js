@extends('layouts.dash2')

@section('content')

    <!-- start with the real content -->
    <div id="real">
      <!-- start content here -->
      <div id="Profile">

        <div class="wrap card">
        	<section class="app-content">

                <?php
                    $schools = session()->get('schools');
                    $sessiondetails = session()->get('sessiondetails');
                    $no_record = session()->get('no_record');
                ?>
                @isset($schools)
                    @if(count($schools) > 0)
                        @foreach ($schools as $school)
                            <div class="card">
                                <div class="card-body">
                                    <h2>{{$school->schoolname}}</h2>
                                    <h4>Adress: {{$school->schooladdr}}</h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <b>Email:</b> {{$school->schoolemail}}
                                        </div>
                                        <div class="col-md-6">
                                            <b>Phone:</b> {{$school->schoolphone}}
                                        </div>
                                        <div class="col-md-12"><hr></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                        <form action="{{ route('user.school.post') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="schoolid" value="{{$school->id}}">
                                            <div class="form-group row">
                                                <div class="col-md-3 col-sm-12">
                                                    <select class="form-control" name="section">
                                                        <option value="">-- select section --</option>
                                                        <option value="SECONDARY">SECONDARY</option>
                                                        <option value="PRIMARY">PRIMARY</option>
                                                        <option value="NURSERY">NURSERY</option>
                                                        <option value="CRECHE">CRECHE</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <select class="form-control" name="session">
                                                        <option selected>-- select session --</option>
                                                        @foreach ($sessiondetails as $unique)
                                                            <option value="{{$unique->sessionname}}">{{$unique->sessionname}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <select class="form-control" name="term">
                                                        <option selected>-- select term --</option>
                                                        <option value="1ST TERM">1ST TERM</option>
                                                        <option value="2ND TERM">2ND TERM</option>
                                                        <option value="3RD TERM">3RD TERM</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <select class="form-control" name="class">
                                                        <option selected>-- select class --</option>
                                                        <option value="SS 1">SSS 1</option>
                                                        <option value="SS 2">SSS 2</option>
                                                        <option value="SS 3">SSS 3</option>
                                                        <option value="JSS 1">JSS 1</option>
                                                        <option value="JSS 2">JSS 2</option>
                                                        <option value="JSS 3">JSS 3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="submit" class="btn btn-success pull-right" value="Continue">
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach
                    @else
                        <div class="alert alert-danger">
                            <strong>Oops!</strong> No record was found on your search. Reach out to the school to make sure they have been <b>VERIFIED</b>.
                        </div>
                        <a href="{{ route('user.dashboard') }}" class="btn btn-sm btn-primary">Go Home</a>
                    @endif
                @else
                    <div class="alert alert-danger">
                        <strong>Oops!</strong> No search was made. Click the button below to go back.
                    </div>
                    <a href="{{ route('user.dashboard') }}" class="btn btn-sm btn-primary">Go Home</a>
                @endisset 

                @if ($no_record)
                    <div class="alert alert-danger">
                        <strong>Oops!</strong> {{$no_record}}
                    </div>
                @endif
            </section>
        </div>
      </div>
    </div>

@endsection