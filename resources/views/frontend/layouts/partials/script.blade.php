@if(app()->isLocal())

    <script src="{{asset('frontend/construction/js/jquery.2.1.2.min.js')}}"></script>
    <script src="{{asset('frontend/construction/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/construction/js/plugins/waypoints.js')}}"></script>
    <script src="{{asset('frontend/construction/js/plugins/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('frontend/construction/js/plugins/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/construction/js/plugins/venobox.min.js')}}"></script>
    <script src="{{asset('frontend/construction/js/plugins/slick.min.js')}}"></script>
    <script src="{{asset('frontend/construction/js/plugins/venobox.min.js')}}"></script>

    <script src="{{asset('frontend/construction/plugins/revolution/js/source/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('frontend/construction/plugins/revolution/js/source/jquery.themepunch.revolution.js')}}"></script>
    <script src="{{asset('frontend/construction/plugins/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="{{asset('frontend/construction/plugins/revolution/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/construction/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('frontend/construction/plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('frontend/construction/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('frontend/construction/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('frontend/construction/plugins/revolution/js/extensions/source/revolution.extension.navigation.js')}}"></script>
    <script src="{{asset('frontend/construction/plugins/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('frontend/construction/plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>

    <script src="{{asset('frontend/construction/js/custom.js')}}"></script>

@else
    <script src="{{asset('js/all.js')}}"></script>
@endif

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Coda:100,200,300,400,500|Rajdhani:400,500,600,700|Rubik:400,500&ver=1.0" type="text/css" media="all">
<link href="https://fonts.googleapis.com/css?family=Lato&amp;Montserrat:400,700" rel="stylesheet">