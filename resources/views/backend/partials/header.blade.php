<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('backend.dashboard.index') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/backend/dist/img/avatar.png" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{  \Auth::guard('admin')->user()->getFullname() }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="/backend/dist/img/avatar.png" class="img-circle" alt="User Image">

                            <p>
                                {{  \Auth::guard('admin')->user()->getFullname() }}
                                <small> {{ __('backend.member_since') }} {{  \Auth::guard('admin')->user()->created_at }}</small>
                            </p>
                        </li>

                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('backend.admin.me.index') }}" class="btn btn-default btn-flat">{{ __('backend.profile') }}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('backend.admin.logout') }}" class="btn btn-default btn-flat">{{ __('backend.log_out') }}</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
