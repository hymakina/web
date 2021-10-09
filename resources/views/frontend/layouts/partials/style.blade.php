@if(app()->isLocal())
    <link href="{{asset('frontend/construction/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/construction/css/plugins/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/construction/css/plugins/slick-theme.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/construction/css/plugins/slick.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/construction/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/construction/css/plugins/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/construction/css/plugins/animate.css')}}" rel="stylesheet">

    <link href="{{asset('frontend/construction/plugins/revolution/css/layers.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('frontend/construction/plugins/revolution/css/navigation.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('frontend/construction/plugins/revolution/css/settings.css')}}" rel="stylesheet" type="text/css">

    <link href="{{asset('frontend/construction/css/style.css')}}" rel="stylesheet">
@else
    <link href="{{asset('css/all.css')}}" rel="stylesheet">
@endif