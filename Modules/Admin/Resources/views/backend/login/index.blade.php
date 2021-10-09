@extends('admin::backend.login.layouts.default')

{{-- Web site Title --}}
@section('title')
	Login
	@parent
@stop

@section('content_header')

@stop

{{-- Content --}}
@section('content')
	<h1>{{ __('auth.login_screen_title') }}</h1>
	<form action="{{route('backend.admin.login.post')}}" class="login-form" method="post">

		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>{{{ __('auth.fill_form') }}} </span>
		</div>
		<div class="row">
			<div class="col-xs-6">
				<input class="form-control form-control-solid placeholder-no-fix form-group" type="text" placeholder="{{__('auth.email')}}" name="email" required/> </div>
			<div class="col-xs-6">
				<input class="form-control form-control-solid placeholder-no-fix form-group" type="password" placeholder="{{ __('auth.password') }}" name="password" required/> </div>
		</div>
		<div class="row">
			<div class="col-sm-4">

			</div>
			<div class="col-sm-8 text-right">
				<div class="forgot-password">
					<a href="javascript:;" id="forget-password" class="forget-password">{{{ __('auth.lost_your_password') }}}</a>
				</div>
				<button class="btn green" type="submit">{{{ __('auth.login') }}}</button>
			</div>
		</div>
	</form>
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="{{ URL::to('user/forgot-password') }}" method="post">

		<h3 class="font-green">{{{ __('auth.lost_your_password') }}}</h3>
		<p> {{{ __('auth.lost_password_info_title') }}}</p>
		<div class="form-group">
			<input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn green btn-outline">{{{ __('auth.back_to_login') }}}</button>
			<button type="submit" class="btn btn-success uppercase pull-right">{{{ __('auth.reset_my_password') }}}</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
@stop
