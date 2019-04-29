@extends('layouts.dash2')

@section('content')

    <!-- start with the real content -->
    <div id="real">
      <!-- start content here -->
      <div id="Profile">

        <div class="wrap card">
        	<section class="app-content">

                <?php
                    $feesum = session()->get('feesum');//total sum of the fee
                    $data = session()->get('data');//retrieve as an array
                    $feesetupid = session()->get('feesetupid');//feesetup id
                ?>
                @isset($data)
                    <div class="card">
                        <div class="card-body">
                            <form action="/school/post-invoice" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-5 order-md-last">
                                        <div class="card">
                                            <div class="card-body text-center" style="background-color:darkgreen; color:#fff">
                                                <br><br>
                                                <b>Tuition Fee:</b><br>
                                                <span style="font-size:2.5em; font-weight:bolder">&#8358; {{$feesum}}</span>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <!-- hidden inputs -->
                                        <input type="hidden" name="section" value="{{$data['section']}}"> 
                                        <input type="hidden" name="userid" value="{{$data['userid']}}">
                                        <input type="hidden" name="feesetupid" value="{{$feesetupid}}">
                                        <input type="hidden" name="amount" value="{{$feesum}}">
                                        <div class="form-group">
                                            <label for="student-name">Student Name:</label>
                                            <input type="text" class="form-control" name="studentname" placeholder="Enter full name">
                                        </div>
                                        <div class="form-group">
                                            <label for="class">Student Class:</label>
                                            <input type="text" class="form-control" name="studentclass" value="{{$data['class']}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="session">Academic Session:</label>
                                            <input type="text" class="form-control" name="session" value="{{$data['session']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="term">Academic Term:</label>
                                            <input type="text" class="form-control" name="term" value="{{$data['term']}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4>Parent or Guardian's Information</h4>
                                        <div class="form-group">
                                            <label for="payers-name">Name of Payer</label>
                                            <input type="text" class="form-control" name="payername" placeholder="Enter full name">
                                        </div>
                                        <div class="form-group">
                                            <label for="payers-email">Email of Payer</label>
                                            <input type="email" class="form-control" name="payeremail" placeholder="john.doe@gmail.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="parent-phone">Phone of Payer</label>
                                            <input type="text" class="form-control" name="payerphone" placeholder="07033224455">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" value="Continue ">
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