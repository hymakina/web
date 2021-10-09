@extends("frontend.layouts.default")

@section("body")
    <body class="body-class bc packeg">

    @yield('head_content')

    <div class="site-preloader">
    <div class="spinner">
    <div class="double-bounce1"></div>
    <div class="double-bounce2"></div>
    </div>
    </div>

    @include('frontend.layouts.partials.notifications')

    <div id="body-wrap">

        @include('frontend.layouts.partials.header')

        @yield('head_content')

        @yield('content')

        @include('frontend.layouts.partials.footer')

    </div>

    @include('frontend.layouts.partials.style')
    @include('frontend.layouts.partials.script')

    @yield('style')
    @yield('script')

    </body>
@stop