@extends('layouts.dash')

@section('content')

    <!-- start with the real content -->
    <div id="real">
      <!-- start content here -->
      <div id="Profile">

        <div class="wrap card">
        	<section class="app-content">

                @isset($data)
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('user.invoice.post') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-5 order-md-last">
                                        <div class="card">
                                            <div class="card-body text-center" style="background-color:darkgreen; color:#fff">
                                                <br><br>
                                                <h3>{{ strtoupper($feetype) }}:</h3>
                                                <span style="font-size:2.5em; font-weight:bolder">&#8358; {{$feesum}}</span>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <!-- hidden inputs -->
                                        <input type="hidden" name="section" value="{{$data['section']}}">
                                        <input type="hidden" name="schoolid" value="{{$data['schoolid']}}">
                                        <input type="hidden" name="feesetupid" value="{{$feesetupid}}">
                                        <input type="hidden" name="amount" value="{{$feesum}}">
                                        <input type="hidden" name="feetype" value="{{$feetype}}">
                                        <div class="form-group">
                                            <label for="session">Academic Session:</label>
                                            <input type="text" class="form-control" name="session" value="{{$data['session']}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="term">Academic Term:</label>
                                            <input type="text" class="form-control" name="term" value="{{$data['term']}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="class">Student Class:</label>
                                            <input type="text" class="form-control" name="studentclass" value="{{$data['class']}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="class">School Name:</label>
                                            <input type="text" class="form-control" name="schoolname" value="{{$school['schoolname']}}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="class">School Address:</label>
                                            <textarea class="form-control" readonly>{{$school['schooladdress']}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="student-name">Enter Student Name:</label>
                                            <input type="text" class="form-control" name="studentname" placeholder="Enter full name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <a href="{{ route('user.search') }}" class="btn btn-info"><i class="fa fa-angle-double-left"></i> Back</a>
                                            <button type="submit" class="btn btn-success">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <script type="text/javascript">
                        window.location = "{{ route('user.dashboard') }}";//redirect to index
                    </script>
                @endisset

            </section>
        </div>
      </div>
    </div>

@endsection
