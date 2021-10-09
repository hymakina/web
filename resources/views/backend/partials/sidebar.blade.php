<aside class="main-sidebar">
    <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="{{ route('backend.dashboard.index') }}">
                    <i class="fa fa-dashboard"></i>
                    <span> {{ __('backend.sidebar.dashboard') }} </span>
                </a>
            </li>

            <li class="treeview @if(\Request::is(config("app.backend")."/admin*") || \Request::is(config("app.backend")."/role*")) active menu-open @endif">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>{{ __('backend.sidebar.admins') }}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('backend.admin.index') }}"><i
                                    class="fa fa-circle-o"></i> {{ __('backend.sidebar.admins') }} </a></li>
                </ul>
            </li>

            <li class="treeview @if(\Request::is(config("app.backend")."/page*")) active menu-open @endif">
                <a href="#">
                    <i class="fa fa-file"></i>
                    <span>{{ __('backend.sidebar.page.title') }}</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('backend.page.post.index') }}"><i
                                    class="fa fa-circle-o"></i> {{ __('backend.sidebar.page.pages') }} </a></li>
                    <li><a href="{{ route('backend.page.category.index') }}"><i
                                    class="fa fa-circle-o"></i> {{ __('backend.sidebar.page.categories') }} </a></li>
                </ul>
            </li>

            <li class="treeview @if(\Request::is(config("app.backend")."/product*")) active menu-open @endif">
                <a href="#">
                    <i class="fa fa-shopping-basket"></i>
                    <span>{{ __('backend.sidebar.product.title') }}</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('backend.product.product.index') }}"><i
                                    class="fa fa-circle-o"></i> {{ __('backend.sidebar.product.products') }} </a></li>
                    <li><a href="{{ route('backend.product.category.index') }}"><i
                                    class="fa fa-circle-o"></i> {{ __('backend.sidebar.product.categories') }} </a></li>
                    <li><a href="{{ route('backend.product.attribute.index') }}"><i
                                    class="fa fa-circle-o"></i> {{ __('backend.sidebar.product.attributes') }} </a></li>
                    <li><a href="{{ route('backend.product.option.index') }}"><i
                                    class="fa fa-circle-o"></i> {{ __('backend.sidebar.product.options') }} </a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('backend.contact.index') }}">
                    <i class="fa fa-bars"></i>
                    <span> {{ __('backend.sidebar.contacts') }} </span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.menu.index') }}">
                    <i class="fa fa-bars"></i>
                    <span> {{ __('backend.sidebar.menus') }} </span>
                </a>
            </li>

            <li>
                <a href="{{ route('backend.slider.index') }}">
                    <i class="fa fa-image"></i>
                    <span> {{ __('backend.sidebar.slider') }} </span>
                </a>
            </li>

            <li class="treeview @if(\Request::is(config("app.backend")."/setting*")) active menu-open @endif">
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span>{{ __('backend.sidebar.settings') }}</span>
                    <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('backend.setting.index') }}"><i
                                    class="fa fa-circle-o"></i> {{ __('backend.sidebar.settings') }} </a></li>
                </ul>
            </li>

            <li class="header">{{ __('backend.sidebar.frontend') }}</li>
            <li><a target="_blank" href="/"><i class="fa fa-circle-o text-aqua"></i>
                    <span>{{ __('backend.sidebar.go_to_frontend') }}</span></a></li>
        </ul>
    </section>
</aside>
