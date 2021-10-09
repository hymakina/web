@extends('frontend.layouts.page')

@section('content')

    <section id="breadcrumb" class="breadcrumb {{isset($borderTopNone) ? "border-top-none" : ""}}">
        <div class="container">
            <div class="row ">
                <div class="col-lg-4 col-md-3 text-left breadcrumb-title">
                    <h1>{{$page->title}}</h1>
                </div>
                <div class="col-lg-8 col-md-9 text-right links">
                    <div class="breadcrumbinfo">
                        <article>
                            <a href="/" class="breadcrumb-link">{{ Setting::get('site.general.title') }}</a>
                            <a class="active" href="#">{{$page->title}}</a>
                            </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="latest_news" class="single-blog blogs">
        <div class="container">
            <div class="row">
                <div class="@if($page->thumbnail != null) col-md-8 @else col-md-12 @endif">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="blog-box">
                                <div class="blog-content-area">

                                    <div class="blog-details">


                                        {!! $page->filteredContent() !!}

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @if($page->thumbnail != null)
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="recent-posts-widget sidebar-widget image-widget">

                            <img class="img-fluid" src="{{$page->thumbnail}}">

                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </section>

@stop

@section('style')
    <link href="{{asset('frontend/construction/css/blog.css')}}" rel="stylesheet">
@stop

@section('script')

@stop
