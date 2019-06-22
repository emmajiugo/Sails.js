@extends('layouts.dash')

@section('content')

    <!-- start with the real content -->
    <div id="real">
      <!-- start content here -->
      <div class="wrap card" id="support">
      	<section class="app-content">

            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-icon alert-white alert-info" role="alert">
                        <i class="mdi mdi-information"></i>
                        <strong>Heads up!</strong> We have done our best to give you a seamless product, but we feel like there is something you want us to do, add or modify. Feel free to express your mind and tell us how we should improve. You can write as many times as possible.
                        <br><br>
                        <em><b>NB:</b> Please use the <a href="/school/support-ticket">Support Ticket</a> if you want us to assist you with a problem or inquiry. We do not reply the feedback section.</em>
                    </div>

                    <!-- feedback form -->
                    <form action="{{ route('school.feedback.submit') }}" method='POST'>
                        @csrf
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" placeholder="Enter Subject" name="subject">
                        </div>
                        <div class="form-group">
                            <label for="message">Pour Out Your Mind</label>
                            <textarea name="bodymessage" class="form-control" rows="10" placeholder="Enter your message here"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary pull-right" value="Send Feedback">
                        </div>
                    </form>
                </div>
            </div>

        </section>
      </div>
    </div>

@endsection