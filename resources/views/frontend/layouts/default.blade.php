<!DOCTYPE html>
<html lang="{{strtoupper(App::getLocale())}}">

<head>

	@section('custom_meta')
	@show

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@section('title') {{ Setting::get('site.general.title') }} @show </title>

    <link rel="canonical" href="{{ Request::url() }}" />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

      <!-- Favicon and Apple Icons -->
    <link rel="shortcut icon" href="{{asset('frontend/construction/images/favicon.ico')}}">
    <link rel="icon" href="{{asset('frontend/construction/images/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('frontend/construction/images/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('frontend/construction/images/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('frontend/construction/images/apple-icon-114x114.png')}}">

	@section('meta_keywords')
	<meta name="keywords" content="{{ Setting::get('site.seo.meta_keywords') }}" />
	@show 
	
	@section('meta_author')
	<meta name="author" content="" /> 
	@show 
	
	@section('meta_description')
	<meta name="description" content="{{ Setting::get('site.seo.meta_description') }}" />
	@show

    <meta name="google-site-verification" content="{{ Setting::get('site.google.google_site_verification_key') }}" />

</head>

@if (Auth::guard("admin")->check())
    @include("admin-navigation.index")
@endif

@yield("body")

@if(Auth::guard("admin")->check() && \Module::setting('translation')->get("is_translation_activated"))
    @include("translation::frontend.translation")
@endif

@stack('style')

@stack('script')

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

</html>