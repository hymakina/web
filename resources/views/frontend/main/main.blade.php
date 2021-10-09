@extends('frontend.layouts.page')

@section('custom_meta')
    <meta property="og:url" content="{{ Request::url() }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ Setting::get('site.general.title') }}"/>
    <meta property="og:description" content="{{ Setting::get('site.seo.meta_description') }}"/>
@stop

{{-- Content --}}
@section('content')

    @php
        $mainPageSlider = \Modules\Slider\Entities\Slider::where('short_code', 'main_page_slider')->first();
    @endphp
    @if($mainPageSlider)
        <section class="sec-slider">
            <div class="rev_slider_wrapper fullwidthbanner-container">
                <div id="rev_slider_2" class="rev_slide fullwidthabanner " data-version="5.4.5" style="display:none">
                    <ul>
                        @foreach($mainPageSlider->images as $sliderImage)
                            @include("frontend.main.slider.slider")
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    @endif

    <section id="choose-us" class="mainpage-section-wrapper">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                    <div class="c-box text-center">
                        <div class="icon">
                            <img src="/frontend/construction/images/caterpillar-797-2009-photos-1-1024x768-jpg.jpg">
                        </div>
                        <h4>{!! _uit("frontend.main.Box One Title") !!}</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                    <div class="c-box text-center">
                        <div class="icon">
                            <img src="/frontend/construction/images/cat-d-video-description-caterpillar-db-bulldozer-width-front-blade-223675-jpg.jpg">
                        </div>
                        <h4>{!! _uit("frontend.main.Box Two Title") !!}</h4>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                    <div class="c-box text-center">
                        <div class="icon">
                            <img src="/frontend/construction/images/jgxr120-png.png">
                        </div>
                        <h4>{!! _uit("frontend.main.Box Three Title") !!}</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="concepts" class="mainpage-section-wrapper">
        <div class="container">

            <div class="row">

                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <h5>{!! _uit("frontend.main.About Us Title") !!}</h5>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-12">

                    <p>{!! _uit("frontend.main.About Us Content") !!}</p>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-12">
                    <ul class="concept-list">
                        <li>
                            <span><i class="fa fa-trophy"></i>{!! _uit("frontend.main.concept.First Title") !!}</span>
                        </li>
                        <li>
                            <span><i class="fa fa-key"></i>{!! _uit("frontend.main.concept.Second Title") !!}</span>
                        </li>
                        <li>
                            <span><i class="fa fa-plane"></i>{!! _uit("frontend.main.concept.Third Title") !!}</span>
                        </li>
                    </ul>
                </div>


            </div>
        </div>

    </section>


    <section id="offers">
        <div class="overly-2"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10 text-center">
                    <h2>{!! _uit("frontend.main.quote") !!}</h2>
                </div>
            </div>
        </div>
    </section>


    <section id="popular_destinations" class="mainpage-section-wrapper">
        <div class="container">

            <div class="row">

                <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-0 mr-px-15">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid" src="/frontend/construction/images/hy/mak/beko_loder.jpg" alt="">
                        </div>
                        <article>
                            <div class="footer d-flex justify-content-between">
                                <div>
                                    <span> {!! _uit("frontend.main.machines.Beko Loderler") !!}</span>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-0 mr-px-15">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid" src="/frontend/construction/images/hy/mak/belden_kirmali.jpg" alt="">
                        </div>
                        <article>
                            <div class="footer d-flex justify-content-between">
                                <div>
                                    <span> {!! _uit("frontend.main.machines.Belden Kırmalı") !!}</span>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-0 mr-px-15">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid" src="/frontend/construction/images/hy/mak/dozer.jpg" alt="">
                        </div>
                        <article>
                            <div class="footer d-flex justify-content-between">
                                <div>
                                    <span> {!! _uit("frontend.main.machines.Dozer") !!}</span>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-0 mr-px-15">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid" src="/frontend/construction/images/hy/mak/greyder.jpg" alt="">
                        </div>
                        <article>
                            <div class="footer d-flex justify-content-between">
                                <div>
                                    <span> {!! _uit("frontend.main.machines.Greyder") !!}</span>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-0 mr-px-15">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid" src="/frontend/construction/images/hy/mak/kaya_kamyon.jpg" alt="">
                        </div>
                        <article>
                            <div class="footer d-flex justify-content-between">
                                <div>
                                    <span> {!! _uit("frontend.main.machines.Kaya Kamyon") !!}</span>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-0 mr-px-15">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid" src="/frontend/construction/images/hy/mak/lastik_ekskavator.jpg" alt="">
                        </div>
                        <article>
                            <div class="footer d-flex justify-content-between">
                                <div>
                                    <span> {!! _uit("frontend.main.machines.Lastikli Ekskavatör") !!}</span>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-0 mr-px-15">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid" src="/frontend/construction/images/hy/mak/lastik_yukleyici.jpg" alt="">
                        </div>
                        <article>
                            <div class="footer d-flex justify-content-between">
                                <div>
                                    <span> {!! _uit("frontend.main.machines.Lastikli Yükleyici") !!}</span>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-0 mr-px-15">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid" src="/frontend/construction/images/hy/mak/palet_ekskavator.jpg" alt="">
                        </div>
                        <article>
                            <div class="footer d-flex justify-content-between">
                                <div>
                                    <span> {!! _uit("frontend.main.machines.Paletli Ekskavatör") !!}</span>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-0 mr-px-15">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid" src="/frontend/construction/images/hy/mak/skid_steer_loder.jpg" alt="">
                        </div>
                        <article>
                            <div class="footer d-flex justify-content-between">
                                <div>
                                    <span> {!! _uit("frontend.main.machines.Skid Steer Loder") !!}</span>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-0 mr-px-15">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid" src="/frontend/construction/images/hy/mak/forklift.png" alt="">
                        </div>
                        <article>
                            <div class="footer d-flex justify-content-between">
                                <div>
                                    <span> {!! _uit("frontend.main.machines.Forklift") !!}</span>

                                </div>
                            </div>
                        </article>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="top_travell">
        <div class="container">
           
            <div class="row top-t-slider">


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/Komatsu_logo_small.png"
                                 alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/caterpillar-logo.png"
                                 alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/hitachi.png" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/hyundai.png" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/volvo.png" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/case.png" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/jcb.gif" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/doosan.gif" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/terexlogo.jpg" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/liebherr.jpg" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/johndeere.jpg" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/Bell-logo.jpg" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/hidromek.png" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/kawasaki.png" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/linde.png" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/liugong.png" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/still.png" alt="">
                        </div>
                    </div>
                </div>


                <div class="col-lg-2">
                    <div class="c-box">
                        <div class="img">
                            <img class="img-fluid align-self-center" src="/frontend/construction/images/hy/toyota.png" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@stop

@section('style')
    <link href="{{asset('frontend/construction/plugins/nice-select/nice-select.css')}}" rel="stylesheet">
    <style>
        #rev_slider_2 .slotholder:after {
            width: 100%;
            height: 100%;
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            pointer-events: none;
            background: rgba(0, 0, 0, 0.30);
            /*background: #355c7d;*/
            /*background: linear-gradient(to right, #355c7d, #6f6677, #584d52);*/
            /*opacity: 0.9;*/
        }

        @foreach($mainPageSlider->images as $sliderImage)
            @if($sliderImage->image_opacity != "")
                    #front-slider-item-{{$sliderImage->id}} .slotholder:after {
            background: rgba(0, 0, 0, {{$sliderImage->image_opacity}});

        }
        @endif
        @endforeach

    </style>
@stop

@section('script')
    <script src="{{asset('frontend/construction/plugins/nice-select/jquery.nice-select.min.js')}}"></script>
    <script>


        $(document).ready(function () {
            $('.tour-select').niceSelect();

            jQuery('#rev_slider_2').show().revolution({

                responsiveLevels: [1900, 992, 768, 576],
                gridwidth: [1140, 720, 768, 576],
                gridheight: [550, 400, 300, 250],
                // autoHeight: "on",
                delay: @if(config('app.debug') == false) 10000 @else 10000000 @endif,
                sliderLayout: 'fullwidth',
                spinner: 'spinner2',

                navigation: {

                    keyboardNavigation: 'on',
                    keyboard_direction: 'horizontal',
                    onHoverStop: 'on',

                    touch: {

                        touchenabled: 'on',
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: 'horizontal',
                        drag_block_vertical: true

                    }

                }
            });

        });


    </script>

@stop

