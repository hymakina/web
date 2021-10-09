@extends('frontend.layouts.page')

{{-- Content --}}
@section('content')


    <section id="breadcrumb" class="breadcrumb {{isset($borderTopNone) ? "border-top-none" : ""}}">
        <div class="container">
            <div class="row ">
                <div class="col-lg-4 col-md-3 text-left breadcrumb-title">
                    <h1>{{$contact->title}}</h1>
                </div>
                <div class="col-lg-8 col-md-9 text-right links">
                    <div class="breadcrumbinfo">
                        <article>
                            <a href="/" class="breadcrumb-link">{{ Setting::get('site.general.title') }}</a>
                            <a class="active" href="#">{{$contact->title}}</a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-main" class="site-content-wrapper padding-bottom-none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="google_map_wrapper">
                        <div id="map">


                        </div>
                    </div>
                    <div class="contact-address">
                        <div class="con-num">
                            <div>
                                <div class="media">
                                    <i class="fa fa-map-marker mr-3"></i>
                                    <div class="media-body">
                                        <h5>{!! _uit("frontend.contact.Address") !!}</h5>
                                        <p>{!! $contact->address !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="media">
                                    <i class="fa fa-mobile mr-3"></i>
                                    <div class="media-body">
                                        <a class="d-block" href="tel:{{$contact->phone}}">
                                            {!! _uit("frontend.contact.Phone") !!}: {{$contact->phone}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="media">
                                    <i class="fa fa-mobile mr-3"></i>
                                    <div class="media-body">
                                        <a class="d-block" href="#">
                                            {!! _uit("frontend.contact.Fax") !!}: {{$contact->fax}}
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="contact-form-area-padding">
            <div class="container">
                <div class="row contact-form-area">
                    <div class="col-lg-12 contact-form">
                        <div class="row">
                            <div class="col-12">
                                <div class="contact-block-form">
                                    <h4>{!! _uit("frontend.contact.form.title") !!}</h4>
                                    <p>{!! _uit("frontend.contact.form.content") !!}</p>
                                </div>
                            </div>
                        </div>
                        <form id="c-form" action="{{route('frontend.contact.form.submit', $contact->slug)}}"
                              method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                           {!! _uit("frontend.contact.form.name", true) !!} name="name" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="email" class="form-control"
                                           {!! _uit("frontend.contact.form.email", true) !!} name="email" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control"
                                           {!! _uit("frontend.contact.form.subject", true) !!} name="subject" required>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="3" id="comment"
                                              {!! _uit("frontend.contact.form.message", true) !!} name="message"
                                              required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit"
                                            class="btn btn-contact">{!! _uit("frontend.contact.form.submit") !!}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>

@stop

@section('style')
    <link href="{{asset('frontend/construction/css/contact.css')}}" rel="stylesheet">
@stop

@section('script')


    <script src="https://api-maps.yandex.ru/2.1/?apikey=aa&lang=en_US"
            type="text/javascript"></script>

    <script type="text/javascript">
        ymaps.ready(init);
        var myMap,
            myPlacemark;

        function init() {
            myMap = new ymaps.Map("map", {
                center: [{{$contact->latitude}}, {{$contact->longitude}}],
                zoom: 15
            });

            myPlacemark = new ymaps.Placemark([{{$contact->latitude}}, {{$contact->longitude}}], {
                hintContent: '{{$contact->title}}', balloonContent: '{{$contact->title}}'
            });

            myMap.geoObjects.add(myPlacemark);
        }
    </script>



@stop
