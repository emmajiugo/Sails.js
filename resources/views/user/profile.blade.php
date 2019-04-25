@extends('layouts.dash2')

@section('content')

    <!-- start with the real content -->
    <div id="real">
      <!-- start content here -->
      <div id="Profile">
        <div class="profile-header card">
        	<div class="profile-cover">
        		<div class="cover-user m-b-lg">
        			<div>
        				<span class="cover-icon"><i class="fa fa-heart"></i></span>
        			</div>
        			<div>
        				<div class="avatar avatar-xl avatar-circle">
        					<a href="javascript:void(0)">
        						<img class="img-responsive" src="img/221.jpg" alt="avatar"/>
        					</a>
        				</div><!-- .avatar -->
        			</div>
        			<div>
        				<span class="cover-icon"><i class="fa fa-envelope"></i></span>
        			</div>
        		</div>
        		<div class="text-center">
        			<h4 class="profile-info-name m-b-lg"><a href="javascript:void(0)" class="title-color">John Doe</a></h4>
        			<div>
        				<a href="javascript:void(0)" class="m-r-xl theme-color"><i class="fa fa-bolt m-r-xs"></i> Web Developer</a>
        				<a href="javascript:void(0)" class="theme-color"><i class="fa fa-map-marker m-r-xs"></i>Cairo, Egypt</a>
        			</div>
        		</div>
        	</div><!-- .profile-cover -->

        	<div class="promo-footer">
        		<div class="row justify-content-center">
        			<div class="col-sm-2 col-sm-offset-3 col-xs-6 promo-tab">
        				<div class="text-center">
        					<small>Experience</small>
        					<h4 class="m-0 m-t-xs">+2 years</h4>
        				</div>
        			</div>
        			<div class="col-sm-2 col-xs-6 promo-tab">
        				<div class="text-center">
        					<small>Hourly Rate</small>
        					<h4 class="m-0 m-t-xs">12$ - 25$</h4>
        				</div>
        			</div>
        			<div class="col-sm-2 col-xs-12 promo-tab">
        				<div class="text-center">
        					<small>Reviews</small>
        					<div class="m-t-xs">
        						<i class="text-primary fa fa-star"></i>
        						<i class="text-primary fa fa-star"></i>
        						<i class="text-primary fa fa-star"></i>
        						<i class="text-primary fa fa-star"></i>
        						<i class="text-primary fa fa-star-o"></i>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div><!-- .promo-footer -->
        </div><!-- .profile-header -->

        <div class="wrap card">
        	<section class="app-content">
        		<div class="panel card" id="status-update-panel">
        			<div class="panel-body">
        				<textarea name="status_update_content" id="status-update-content" cols="30" rows="10" placeholder="Write Something Impressive..."></textarea>
        			</div>
        			<div class="panel-footer">
        				<a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-video"></i></a>
        				<a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-camera"></i></a>
        				<button type="button" role="button" class="btn btn-primary pull-right">Send</button>
        			</div>
        		</div><!-- #status-update-panel -->

        		<div class="row">
        			<div class="col-md-8">
        				<div id="profile-tabs" class="nav-tabs-horizontal white m-b-lg">
        					<!-- tabs list -->
        					<ul class="nav nav-tabs" role="tablist">
        						<li role="presentation" class="active"><a href="#profile-stream" aria-controls="stream" role="tab" data-toggle="tab">Stream</a></li>
        					</ul><!-- .nav-tabs -->

        					 <h1>content</h1>
        				</div><!-- #profile-components -->
        			</div><!-- END column -->

        			<div class="col-md-4">
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

        								<div class="media-group-item b-0 p-h-sm">
        									<div class="media">
        										<div class="media-left">
        											<div class="avatar avatar-md avatar-circle">
        												<img src="img/101.jpg" alt="">
        												<i class="status status-offline"></i>
        											</div>
        										</div>
        										<div class="media-body">
        											<h5 class="media-heading"><a href="javascript:void(0)">Adam Khaury</a></h5>
        											<small class="media-meta">Web Designer</small>
        										</div>
        									</div>
        								</div><!-- .media-group-item -->

        								<div class="media-group-item b-0 p-h-sm">
        									<div class="media">
        										<div class="media-left">
        											<div class="avatar avatar-md avatar-circle">
        												<img src="img/209.jpg" alt="">
        												<i class="status status-offline"></i>
        											</div>
        										</div>
        										<div class="media-body">
        											<h5 class="media-heading"><a href="javascript:void(0)">John Doe</a></h5>
        											<small class="media-meta">Web Developer</small>
        										</div>
        									</div>
        								</div><!-- .media-group-item -->

        								<div class="media-group-item b-0 p-h-sm">
        									<div class="media">
        										<div class="media-left">
        											<div class="avatar avatar-md avatar-circle">
        												<img src="img/203.jpg" alt="">
        												<i class="status status-away"></i>
        											</div>
        										</div>
        										<div class="media-body">
        											<h5 class="media-heading"><a href="javascript:void(0)">Sara Smith</a></h5>
        											<small class="media-meta">UI/UX Designer</small>
        										</div>
        									</div>
        								</div><!-- .media-group-item -->

        								<div class="media-group-item b-0 p-h-sm">
        									<div class="media">
        										<div class="media-left">
        											<div class="avatar avatar-md avatar-circle">
        												<img src="img/204.jpg" alt="">
        												<i class="status status-away"></i>
        											</div>
        										</div>
        										<div class="media-body">
        											<h5 class="media-heading"><a href="javascript:void(0)">Dani Smith</a></h5>
        											<small class="media-meta">Teacher Assistant</small>
        										</div>
        									</div>
        								</div><!-- .media-group-item -->

        								<div class="media-group-item b-0 p-h-sm">
        									<div class="media">
        										<div class="media-left">
        											<div class="avatar avatar-md avatar-circle">
        												<img src="img/202.jpg" alt="">
        												<i class="status status-away"></i>
        											</div>
        										</div>
        										<div class="media-body">
        											<h5 class="media-heading"><a href="javascript:void(0)">Sally Sally</a></h5>
        											<small class="media-meta">Teacher Assistant</small>
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