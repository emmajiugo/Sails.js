@extends('layouts.dash')

@section('content')

    <!-- start with the real content -->
    <div id="real">
      <!-- start content here -->
      <div id="Profile">

        <div class="wrap card">
        	<section class="app-content">

        		<div class="row">
        			<div class="col-md-6">
                        <div class="widget who-to-follow-widget">
                            <div class="widget-header p-h-lg p-v-md">
                                <h4 class="widget-title">Edit Profile</h4>
                            </div>
                            <hr class="widget-separator m-0"><br>
                            <div class="media-group">
                                <div class="media-group-item b-0 p-h-sm">
                                    <form action="{{ route('user.profile.post') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="type" value="profile">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="fullname">Full Name</label>
                                            <input type="text" class="form-control" name="fullname" value="{{ auth()->user()->fullname }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone Number</label>
                                            <input type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" value="Save Profile" class="btn btn-primary">
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div><!-- #profile-components -->
        			</div><!-- END column -->

        			<div class="col-md-6">
                        <div class="widget who-to-follow-widget">
                            <div class="widget-header p-h-lg p-v-md">
                                <h4 class="widget-title">Update Password</h4>
                            </div>
                            <hr class="widget-separator m-0"><br>
                            <div class="media-group">
                                <div class="media-group-item b-0 p-h-sm">
                                    <form action="{{ route('user.profile.post') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="type" value="password">
                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm_password">Confirm New Password</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" value="Update Password" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div><!-- .media-group-item -->
                            </div>
                        </div><!-- .widget -->
        			</div><!-- END column -->
                </div><!-- .row -->

        	</section><!-- #dash-content -->
        </div><!-- .row -->
      </div>
      <!-- end content -->
    </div>
    <!-- end the real content -->

@endsection
