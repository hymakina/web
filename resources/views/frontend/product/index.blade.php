@extends('frontend.layouts.page')

{{-- Content --}}
@section('content')


    <section id="breadcrumb" class="breadcrumb {{isset($borderTopNone) ? "border-top-none" : ""}}">
        <div class="container">
            <div class="row ">
                <div class="col-lg-4 col-md-3 text-left breadcrumb-title">
                    <h1>{{$category->name}}</h1>
                </div>
                <div class="col-lg-8 col-md-9 text-right links">
                    <div class="breadcrumbinfo">
                        <article>
                            <a href="/" class="breadcrumb-link">{{ Setting::get('site.general.title') }}</a>
                            <a class="active" href="#">{{$category->name}}</a>
                            </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="latest_news">
        <div class="container">
            <div class="row">
                <div class="col-md-3 order-last order-lg-first">

                    <div class="sidebar">

                        <div class="product-filter">
                            <h3 class="filter-title">{!! _uit("frontend.product.filter.title") !!}</h3>

                            <form action="{{route('frontend.product.search', $category->slug)}}" method="post">
                                @csrf
                                <fieldset>

                                    @foreach($category->options as $categoryOption)

                                        @if($categoryOption->type->name == 'select' || $categoryOption->type->name == 'multi_select')
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="sel1">{{ $categoryOption->name }}:</label>
                                                        <select name="{{ $categoryOption->id }}" class="form-control">
                                                            <option value="">----</option>
                                                            @foreach($categoryOption->values as $optionValue)
                                                                <option value="{{ $optionValue->id }}">{{ $optionValue->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        @elseif($categoryOption->type->name == 'double')

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="sel1">{{ $categoryOption->name }}:</label>
                                                        <input name="{{ $categoryOption->id }}[]" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="sel1">&nbsp;</label>
                                                        <input name="{{ $categoryOption->id }}[]" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                        @endif
                                    @endforeach

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group ">
                                                <button type="submit" class="filter-submit">
                                                    {!! _uit("frontend.product.filter.button") !!}
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>

                            </form>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 order-first order-lg-last">
                    <div class="row">
                        @if(isset($products))
                        @foreach($products as $product)
                        <div class="col-lg-4 col-md-6">
                            <div class="c-box">
                                <div class="img">
                                    <img class="img-fluid" src="{{ $product->featured_image }}" alt="">
                                </div>
                                <article>
                                    <a href="#">
                                        <h4>{{ $product->title }}</h4>
                                    </a>
                                </article>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </section>



@stop


@section('style')
    <link href="{{asset('frontend/construction/css/blog.css')}}" rel="stylesheet">
@stop

@section('script')

@stop
