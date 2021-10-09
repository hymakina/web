<div id="main-menu" class="main-menu-wrapper">

    <div class="navbar-top">
        <div class="container">
            <ul class="">
                <li>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <a href="tel:{{ str_replace(" ", "", Setting::get('site.footer.phone')) }}">{{ Setting::get('site.footer.phone') }}</a>
                </li>
                <li>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <a href="tel:{{ str_replace(" ", "", Setting::get('site.footer.mobilephone')) }}">{{ Setting::get('site.footer.mobilephone') }}</a>
                </li>
                <li>
                    <i class="fa fa-envelope navbar-top-email" aria-hidden="true"></i>
                    <a href="mailto:{{ Setting::get('site.footer.email') }}">{{ Setting::get('site.footer.email') }}</a>
                </li>
            </ul>
            <div class="social-link" style="float: right; margin-top: 15px;">
                <a target="blank" href="{{ Setting::get('site.social.facebook_url') }}">
                    <i class="fa fa-facebook"></i>
                </a>
                <a target="blank" href="{{ Setting::get('site.social.linkedin_url') }}">
                    <i class="fa fa-linkedin"></i>
                </a>
                <a target="blank" href="{{ Setting::get('site.social.instagram_url') }}">
                    <i class="fa fa-instagram"></i>
                </a>
                <a target="blank" href="{{ Setting::get('site.social.twitter_url') }}">
                    <i class="fa fa-twitter"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">

        <div class="container">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <div class="navbar-logo">

                    <a class="navbar-brand" href="/">
                        <img src="/frontend/construction/images/hy/hymakina-logo.png">
                    </a>

                </div>

                <ul class="navbar-nav ml-auto">

                    @foreach(\Modules\Menu\Entities\Menu::where('short_code', 'top_menu')->first()->menuItems()->orderBy('order')->get() as $menuItem)
                        @php ($headMenuItem = $menuItem->getMenuItem())
                        @if($headMenuItem != null)
                            @if($headMenuItem->is_list)

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {!! _uit("frontend.menu.top." . $menuItem->slug) !!}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                        @foreach($headMenuItem->links as $menuLink)
                                            <a class="dropdown-item"
                                               href="{{ $menuLink['link'] }}">{{ $menuLink['title'] }}</a>
                                        @endforeach
                                    </div>
                                </li>

                            @else
                                <li class="nav-item">
                                    <a class="nav-link {{(Request::is($headMenuItem->link)) ? 'active' : '' }}"
                                       href="{{ $headMenuItem->link }}">
                                        {!! _uit("frontend.menu.top." . $headMenuItem->title) !!}
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ul>

                <div class="navbar-lang ">
                    <a class="lang-link" href="javascript:void(0)" id="lang-switcher">
                        {{ \Loc::getDefaultLocaleName() }}
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <div class="lang-dropdown">
                        @foreach(\Loc::getLocales() as $locale)
                            <a class="dropdown-item" href="/{{$locale->code}}">{{strtoupper($locale->name)}}</a>
                        @endforeach
                    </div>
                </div>

            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="mobile-title">
                <label>{!! _uit("frontend.main.header.Mobile Menu Title") !!}</label>
            </div>

        </div>
    </nav>
</div>
