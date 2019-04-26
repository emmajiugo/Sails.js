@extends('layouts.dash2')

@section('content')

    <!-- start with the real content -->
    <div id="real">
      <!-- start content here -->
      <div id="Profile">

        <div class="wrap card">
        	<section class="app-content">

        		<div class="row">
        			<div class="col-md-7">
        				<div class="col-md-11">
									<div id="profile-tabs" class="nav-tabs-horizontal white m-b-lg">
										<!-- tabs list -->
										<ul class="nav nav-tabs" role="tablist">
											<li role="presentation" class="active">Edit Profile</li>
										</ul><!-- .nav-tabs -->
										
										<br>

										<form action="" method="post">

											<div class="form-group">
												<label for="email">Email</label>
												<input type="text" class="form-control" name="email" value="e@x.com" readonly>
											</div>
											<div class="form-group">
												<label for="fullname">Full Name</label>
												<input type="text" class="form-control" name="fullname" value="Johnny Debby">
											</div>
											<div class="form-group">
												<label for="phone">Phone Number</label>
												<input type="text" class="form-control" name="phone" value="07031056082">
											</div>

											<br><hr><br>

											<div class="form-group">
												<label for="new_password">New Password</label>
												<input type="password" class="form-control" name="new_password">
											</div>
											<div class="form-group">
												<label for="confirm_password">Confirm New Password</label>
												<input type="password" class="form-control" name="confirm_password">
											</div>

											<div class="form-group">
												<input type="submit" value="Save Update" name="save" class="btn btn-primary">
											</div>

										</form>
									</div><!-- #profile-components -->
								</div>
        			</div><!-- END column -->

        			<div class="col-md-5">
        				<div class="row">
        					<div class="col-md-12 col-sm-6">
        						<div class="widget who-to-follow-widget">
        							<div class="widget-header p-h-lg p-v-md">
        								<h4 class="widget-title">Who To Follow</h4>
        							</div>
        							<hr class="widget-separator m-0">
        							<div class="media-group">
        								<div class="media-group-item b-0 p-h-sm">
        									<div class="media">
        										<div class="media-left">
        											<div class="avatar avatar-md avatar-circle">
        												<img src="img/221.jpg" alt="">
        												<i class="status status-online"></i>
        											</div>
        										</div>
        										<div class="media-body">
        											<h5 class="media-heading"><a href="javascript:void(0)">John Doe</a></h5>
        											<small class="media-meta">Software Engineer</small>
        										</div>
        									</div>
        								</div><!-- .media-group-item -->
        							</div>
        						</div><!-- .widget -->
        					</div><!-- END column -->

        				</div><!-- .row -->

        			</div><!-- END column -->
        		</div><!-- .row -->
        	</section><!-- #dash-content -->
        </div><!-- .row -->

        <!-- Likes/comments Modal -->
        <div id="likesModal" class="modal fade" tabindex="-1" role="dialog">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        				<h4 class="modal-title">3 people like this</h4>
        			</div>
        			<div class="modal-body">
        				<ul class="list-group m-0">
        					<li class="list-group-item">
        						<div class="media">
        							<div class="media-left">
        								<a href="javascript:void(0)" class="avatar avatar-sm">
        									<img class="img-responsive" src="img/221.jpg" alt="avatar"/>
        								</a><!-- .avatar -->
        							</div>
        							<div class="media-body">
        								<h5 class="media-heading m-0"><a href="javascript:void(0)">John Doe</a></h5>
        							</div>
        							<div class="media-right">
        								<a href="javascript:void(0)" class="btn btn-sm btn-default"><i class="fa fa-rss m-r-xs"></i>Follow</a>
        							</div>
        						</div>
        					</li>

        					<li class="list-group-item">
        						<div class="media">
        							<div class="media-left">
        								<a href="javascript:void(0)" class="avatar avatar-sm">
        									<img class="img-responsive" src="img/104.jpg" alt="avatar"/>
        								</a><!-- .avatar -->
        							</div>
        							<div class="media-body">
        								<h5 class="media-heading m-0"><a href="javascript:void(0)">Sara Adams</a></h5>
        							</div>
        							<div class="media-right">
        								<a href="javascript:void(0)" class="btn btn-sm btn-default"><i class="fa fa-user-plus m-r-xs"></i>Add Freind</a>
        							</div>
        						</div>
        					</li>

        					<li class="list-group-item">
        						<div class="media">
        							<div class="media-left">
        								<a href="javascript:void(0)" class="avatar avatar-sm">
        									<img class="img-responsive" src="img/101.jpg" alt="avatar"/>
        								</a><!-- .avatar -->
        							</div>
        							<div class="media-body">
        								<h5 class="media-heading m-0"><a href="javascript:void(0)">John Doe</a></h5>
        							</div>
        							<div class="media-right">
        								<a href="javascript:void(0)" class="btn btn-sm btn-default"><i class="fa fa-user-plus m-r-xs"></i>Add Friend</a>
        							</div>
        						</div>
        					</li>
        				</ul>
        			</div>
        		</div><!-- /.modal-content -->
        	</div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
      </div>
      <!-- end content -->
    </div>
    <!-- end the real content -->

@endsection