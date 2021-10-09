<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
	<meta charset="utf-8" />
	<title>
		@section('title')
			{{ Setting::get('site.title') }}
		@show
	</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />

	@section('meta_keywords')
		<meta name="keywords" content="{{ Setting::get('meta.keywords') }}" />
	@show

	@section('meta_author')
		<meta name="author" content="" />
	@show

	@section('meta_description')
		<meta name="description" content="{{ Setting::get('meta.description') }}" />
@show

<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/login/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/login/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/login/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/login/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<link href="{{asset('backend/login/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/login/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL STYLES -->
	<link href="{{asset('backend/login/global/css/components-md.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
	<link href="{{asset('backend/login/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- END THEME GLOBAL STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="{{asset('backend/login/pages/css/login-5.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('backend/login/global/plugins/bootstrap-toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL STYLES -->
	<!-- BEGIN THEME LAYOUT STYLES -->
	<!-- END THEME LAYOUT STYLES -->
	<link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN : LOGIN PAGE 5-1 -->
<div class="user-login-5">
	<div class="row bs-reset">
		<div class="col-md-6 bs-reset mt-login-5-bsfix">
			<div class="login-bg" style="background-image:url({{asset('backend/login/pages/img/login/bg1.jpg')}})">
			</div>
		</div>
		<div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
			<div class="login-content">

				@yield('content')

			</div>
			<div class="login-footer">
				<div class="row bs-reset">
					<div class="col-xs-5 bs-reset">
						<ul class="login-social">

							@if(Setting::get('site.facebook_url'))
								<li>
									<a href="{{ Setting::get('site.facebook_url') }}">
										<i class="icon-social-facebook"></i>
									</a>
								</li>
							@endif
							@if(Setting::get('site.twitter_url'))
								<li>
									<a href="{{ Setting::get('site.twitter_url') }}">
										<i class="icon-social-twitter"></i>
									</a>
								</li>
							@endif
						</ul>
					</div>
					<div class="col-xs-7 bs-reset">
						<div class="login-copyright text-right">
							<p>&copy; {{Setting::get('site.title')}} {{date('Y')}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END : LOGIN PAGE 5-1 -->
<!--[if lt IE 9]>
<script src="{{asset('backend/login/global/plugins/respond.min.js')}}"></script>
<script src="{{asset('backend/login/global/plugins/excanvas.min.js')}}"></script>
<script src="{{asset('backend/login/global/plugins/ie8.fix.min.js')}}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{asset('backend/login/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/login/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/login/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/login/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/login/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/login/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('backend/login/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/login/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/login/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/login/global/plugins/backstretch/jquery.backstretch.min.js')}}" type="text/javascript"></script>

<script src="{{asset('backend/login/global/plugins/bootstrap-toastr/toastr.min.js')}}" type="text/javascript"></script>
<script src="{{asset('backend/login/pages/scripts/ui-toastr.min.js')}}" type="text/javascript"></script>

<script src="{{asset('bootstrap/js/tooltip.js')}}"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{asset('backend/login/global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('backend/login/pages/scripts/login-5.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->

@include('backend.partials.notifications')

<!-- End -->
</body>



</html>
<!-- Localized -->