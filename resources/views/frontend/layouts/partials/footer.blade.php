<footer id="contact" class="theme-footer-one">
    <div class="top-footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6 col-12 footer-list center-mobile" style="text-align: center;">

                    <a class="" href="/">
                        <img class="footer-image" src="/frontend/construction/images/hy/hymakina-logo.png">
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12  footer-list center-mobile who-we-are">
                    <h6 class="title">{!! _uit("frontend.main.footer.Menu Title") !!}</h6>
                    <p>
                        {!! _uit("frontend.main.footer.Who We Are") !!}
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12 footer-list center-mobile">
                    <h6 class="title">{!! _uit("frontend.main.footer.Concepts") !!}</h6>
                    <ul>
                        @php
                            $footerMenuList = \Modules\Menu\Entities\Menu::where('short_code', 'footer_menu')->first()->menuItems()->orderBy('order')->get();
                        @endphp
                        @if($footerMenuList)
                            @foreach($footerMenuList as $footerMenu)
                                @php
                                    $footerMenuItem = $footerMenu->getMenuItem();
                                @endphp
                                @if($footerMenuItem != null)
                                    <li>
                                        <a href="{{ $footerMenuItem->link }}">{{{ $footerMenuItem->title }}}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif

                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12 about-widget center-mobile">
                    <h6 class="title">{!! _uit("frontend.main.footer.Contacts") !!}</h6>
                    <div class="queries">
                        <ul>
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <a href="tel:{{ str_replace(" ", "", Setting::get('site.footer.phone')) }}">{{ Setting::get('site.footer.phone') }}</a>
                            </li>
                            <li>
                                <i class="fa fa-mobile-phone" aria-hidden="true"></i>
                                <a href="tel:{{ str_replace(" ", "", Setting::get('site.footer.mobilephone')) }}">{{ Setting::get('site.footer.mobilephone') }}</a>
                            </li>
                            <li>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <a href="#">{{ Setting::get('site.footer.address') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 col-12 footer-menu-container">
                    <div class="footer-copyright">
                        <p>
                            &copy; {{date("Y")}} {{ Setting::get('site.general.title') }}
                            / {!! _uit("frontend.main.footer.Copyright Note") !!}
                        </p>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <div class="social-link">
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

        </div>
    </div>
</footer>

<div class="totop">
    <a href="#top"><i class="fa fa-arrow-up"></i></a>
</div>