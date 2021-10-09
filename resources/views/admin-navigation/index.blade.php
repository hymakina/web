@section('head_content')

<!-- menu start -->
<nav id="menu-1" class="mega-menu desktopTopFixed" data-color="">
    <!-- menu list items container -->
    <section class="menu-list-items">
        <!-- menu logo -->
        <ul class="menu-logo">
            <li>
                <a href="#">
                    <i class="fa fa-circle-o-notch"></i>
                    Site Management Console
                </a>
            </li>
        </ul>
        <!-- menu links -->
        <ul class="menu-links menu-links-align-right">
            <!-- active class -->
            <li class="active"><a href="{{{ URL::to('admin') }}}"> <i class="fa fa-home"></i> Go To Admin Dashboard</a></li>

            @if(app('auth')->guard('admin')->user())
                @if(\Module::setting('translation')->get("is_translation_activated"))
                    <li>
                        <a href="{{route("translation.deactivate")}}"><i class="fa fa-pencil-square"></i> {{ __("frontend.deactivate_translation") }} </a>
                    </li>
                @else
                    <li>
                        <a href="{{route("translation.activate")}}"><i class="fa fa-pencil-square"></i> {{ __("frontend.activate_translation") }} </a>
                    </li>
                @endif
            @endif

            <li class="hoverTrigger"><a href="javascript:void(0)">{{strtoupper(App::getLocale())}}<i class="fa fa-angle-down fa-indicator"></i></a>

                <!-- drop down multilevel  -->
                <ul class="drop-down-multilevel effect-fade">
                    @foreach(\Loc::getLocales() as $locale)
                        <li><a href="/{{$locale->code}}">{{strtoupper($locale->name)}}</a></li>
                    @endforeach
                </ul>

            </li>
        </ul>


    </section>
</nav>
<!-- menu end -->
@show

@push('style')
<link href="/admin-navigation/css/mega_menu.min.css" rel="stylesheet">
@endpush

@push('script')
    <script src="/admin-navigation/js/mega_menu.min.js"></script>
    <script>
        $(window).load(function() {
            // alert();
        });
    </script>
@endpush