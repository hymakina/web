<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include("backend.partials.head")

<body class="hold-transition skin-black-light sidebar-mini">

<div class="wrapper">

    @include("backend.partials.header")

    @include("backend.partials.sidebar")

    <div class="content-wrapper">

        @yield('toolbox')

        <section class="content">
            @yield('content')
        </section>

    </div>

    @include("backend.partials.footer")

    <div class="control-sidebar-bg"></div>

        <div class="modal fade" id="modal-fadein"  role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content" id="modalContent">

                </div>
            </div>
        </div>

</div>

@include("backend.partials.scripts")

@include('backend.partials.notifications')

</body>
</html>
