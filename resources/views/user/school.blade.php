@extends('layouts.dash')

@section('content')

    <!-- start with the real content -->
    <div id="real">
      <!-- start content here -->
      <div id="Profile">

        <section class="app-content">

            @if(session('schools') != null)
                @if(count(session('schools')) > 0)
                    @foreach (session('schools') as $school)
                        <div class="card">
                            <div class="card-body">
                                <h2>{{$school->schoolname}}</h2>
                                <h4>Adress: {{$school->schooladdress}}</h4>
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
                                    <div class="col-md-8">
                                    <form action="{{ route('user.school.post') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="schoolid" value="{{$school->id}}">
                                        <div class="form-group">
                                            <select class="form-control" name="feetype">
                                                <option selected>-- select fee type --</option>
                                                @foreach ($school->feetype as $fee)
                                                    <option value="{{$fee->id}}">{{$fee->feename}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="section" id="section">
                                                <option value="">-- select section --</option>
                                                <option value="SECONDARY">SECONDARY</option>
                                                <option value="PRIMARY">PRIMARY</option>
                                                <option value="NURSERY">NURSERY</option>
                                                <option value="CRECHE">CRECHE</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="session">
                                                <option selected>-- select session --</option>
                                                @foreach (session('sessiondetails') as $unique)
                                                    <option value="{{$unique->sessionname}}">{{$unique->sessionname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="term">
                                                <option selected>-- select term --</option>
                                                <option value="1ST TERM">1ST TERM</option>
                                                <option value="2ND TERM">2ND TERM</option>
                                                <option value="3RD TERM">3RD TERM</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="class" id="class">
                                                <option class="class-select" selected>-- select class --</option>
                                                <option class="secondary-option" value="SS 3">SSS 3</option>
                                                <option class="secondary-option" value="SS 2">SSS 2</option>
                                                <option class="secondary-option" value="SS 1">SSS 1</option>
                                                <option class="secondary-option" value="JSS 3">JSS 3</option>
                                                <option class="secondary-option" value="JSS 2">JSS 2</option>
                                                <option class="secondary-option" value="JSS 1">JSS 1</option>
                                                <option class="primary-option" value="PRIMARY 6">PRIMARY 6</option>
                                                <option class="primary-option" value="PRIMARY 5">PRIMARY 5</option>
                                                <option class="primary-option" value="PRIMARY 4">PRIMARY 4</option>
                                                <option class="primary-option" value="PRIMARY 3">PRIMARY 3</option>
                                                <option class="primary-option" value="PRIMARY 2">PRIMARY 2</option>
                                                <option class="primary-option" value="PRIMARY 1">PRIMARY 1</option>
                                                <option class="nursery-option" value="NURSERY 3">NURSERY 3</option>
                                                <option class="nursery-option" value="NURSERY 2">NURSERY 2</option>
                                                <option class="nursery-option" value="NURSERY 1">NURSERY 1</option>
                                                <option class="creche-option" value="CRECHE">CRECHE</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success pull-right" value="Continue">
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
            @endif
        </section>
      </div>
    </div>

    {{-- show classes select box based on section selected --}}
    <script>
        $("#section").change(function() {
            var section = $("#section option:selected").val();
            showClass(section);
        });

        function showClass(section) {

            //set the default back
            $('.class-select').prop("selected", true)

            if (section == "SECONDARY") {
                $('.secondary-option').show();
                $('.primary-option').hide();
                $('.nursery-option').hide();
                $('.creche-option').hide();
            }
            if (section == "PRIMARY") {
                $('.secondary-option').hide();
                $('.primary-option').show();
                $('.nursery-option').hide();
                $('.creche-option').hide();
            }
            if (section == "NURSERY") {
                $('.secondary-option').hide();
                $('.primary-option').hide();
                $('.nursery-option').show();
                $('.creche-option').hide();
            }
            if (section == "CRECHE") {
                $('.secondary-option').hide();
                $('.primary-option').hide();
                $('.nursery-option').hide();
                $('.creche-option').show();
            }
        }
    </script>

@endsection
