@extends('backend.layouts.default')

@section('breadcrumb')
    <li><a href="{{ route('backend.menu.index') }}">{{ __('menu::index.menu.menus') }}</a></li>
    <li><a href="{{ route('backend.menu.item.index', ['menu' => $menu->id]) }}">{{ __('menu::index.item.items') }}</a></li>
    <li class="active">{{ __('menu::index.item.create_edit') }}</li>
@stop

@section('content')

    <div class="row">

        {!! Form::open(["method" => "POST", "files" => true]) !!}

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#widgetContainer" data-toggle="tab"> {{ __('menu::index.item.title') }} </a></li>
                </ul>
                <div class="tab-content">

                    <div class="active tab-pane" id="widgetContainer">

                        @if(count( $errors ) > 0 )
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="box-body">

                            <div class="form-group">
                                <label for="title"> {{ __('menu::index.item.item_title') }} </label>
                                {!! Form::text("title", isset($menuItem) ? $menuItem->title : "",["class" => "form-control", "placeholder" => __('menu::index.item.item_title'), 'required' ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="type"> {{ __('menu::index.item.type') }} </label>
                                <br>
                                <label class="radio-inline">
                                    <input type="radio" required="REQUIRED" name="type" id="item_type_custom" value="custom" {{ (isset($menuItem) && $menuItem->type == 'custom' ) ? 'checked' : '' }}>
                                    {{ __('menu::index.item.type_custom') }}
                                </label>
                                {{--<label class="radio-inline">--}}
                                    {{--<input type="radio" required="REQUIRED" name="type" id="item_type_blog" value="blog" {{ (isset($menuItem) && $menuItem->type == 'blog' ) ? 'checked' : '' }}>--}}
                                    {{--{{ __('menu::index.item.type_blog') }}--}}
                                {{--</label>--}}
                                <label class="radio-inline">
                                    <input type="radio" required="REQUIRED" name="type" id="item_type_page" value="page" {{ (isset($menuItem) && $menuItem->type == 'page' ) ? 'checked' : '' }}>
                                    {{ __('menu::index.item.type_page') }}
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" required="REQUIRED" name="type" id="item_type_page_category" value="page_category" {{ (isset($menuItem) && $menuItem->type == 'page_category' ) ? 'checked' : '' }}>
                                    {{ __('menu::index.item.type_page_category') }}
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" required="REQUIRED" name="type" id="item_type_product_category" value="product_category" {{ (isset($menuItem) && $menuItem->type == 'product_category' ) ? 'checked' : '' }}>
                                    {{ __('menu::index.item.type_product_category') }}
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" required="REQUIRED" name="type" id="item_type_product_categories" value="product_categories" {{ (isset($menuItem) && $menuItem->type == 'product_categories' ) ? 'checked' : '' }}>
                                    {{ __('menu::index.item.type_product_categories') }}
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" required="REQUIRED" name="type" id="item_type_contact" value="contact" {{ (isset($menuItem) && $menuItem->type == 'contact' ) ? 'checked' : '' }}>
                                    {{ __('menu::index.item.type_contact') }}
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" required="REQUIRED" name="type" id="item_type_page_categories" value="page_categories" {{ (isset($menuItem) && $menuItem->type == 'page_categories' ) ? 'checked' : '' }}>
                                    {{ __('menu::index.item.type_page_categories') }}
                                </label>

                                @can('flight')
                                    <label class="radio-inline">
                                        <input type="radio" required="REQUIRED" name="type" id="item_type_flight_landingpage" value="flight_landingpage" {{ (isset($menuItem) && $menuItem->type == 'flight_landingpage' ) ? 'checked' : '' }}>
                                        {{ __('menu::index.item.type_flight_landingpage') }}
                                    </label>
                                @endcan

                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="{{ __('menu::index.item.type_custom') }}" @if(isset($menuItem) && $menuItem->type == 'custom') style="display:block;" value="{{ $menuItem->value }}" @else style="display:none;" @endif class="form-control" name="fix_url" id="fix_url" />

                                {{--<select style="@if(isset($menuItem) && $menuItem->type == 'blog') display:block; @else display:none; @endif" class="form-control" name="blog_route" id="blog_route">--}}
                                    {{--@foreach (\Modules\Blog\Entities\Blog::where('is_active', 1)->get() as $blog)--}}
                                        {{--<option value="{{$blog->id}}" {{{ (isset($menuItem) && $menuItem->type == "blog" && $menuItem->value == $blog->id) ? "SELECTED" : "" }}}>{{ $blog->title }}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}

                                <select style="@if(isset($menuItem) && $menuItem->type == 'page') display:block; @else display:none; @endif" class="form-control" name="page_route" id="page_route">
                                    @foreach (\Modules\Page\Entities\Page::where('is_active', 1)->get() as $page)
                                        <option value="{{$page->id}}" {{{ (isset($menuItem) && $menuItem->type == "page" && $menuItem->value == $page->id) ? "SELECTED" : "" }}}>{{ $page->title }}</option>
                                    @endforeach
                                </select>

                                <select style="@if(isset($menuItem) && $menuItem->type == 'page_category') display:block; @else display:none; @endif" class="form-control" name="page_category_route" id="page_category_route">
                                    @foreach (\Modules\Page\Entities\PageCategory::all() as $pageCategory)
                                        <option value="{{$pageCategory->id}}" {{{ (isset($menuItem) && $menuItem->type == "page_category" && $menuItem->value == $pageCategory->id) ? "SELECTED" : "" }}}>{{ $pageCategory->name }}</option>
                                    @endforeach
                                </select>

                                <select style="@if(isset($menuItem) && $menuItem->type == 'product_category') display:block; @else display:none; @endif" class="form-control" name="product_category_route" id="product_category_route">
                                    @foreach (\Modules\Product\Entities\ProductCategory::all() as $pageCategory)
                                        <option value="{{$pageCategory->id}}" {{{ (isset($menuItem) && $menuItem->type == "product_category" && $menuItem->value == $pageCategory->id) ? "SELECTED" : "" }}}>{{ $pageCategory->name }}</option>
                                    @endforeach
                                </select>

                                <select style="@if(isset($menuItem) && $menuItem->type == 'product_categories') display:block; @else display:none; @endif" class="form-control" name="product_categories[]" id="product_categories" multiple>
                                    @foreach (\Modules\Product\Entities\ProductCategory::all() as $pageCategory)
                                        <option value="{{$pageCategory->id}}">{{ $pageCategory->name }}</option>
                                    @endforeach
                                </select>

                                <select style="@if(isset($menuItem) && $menuItem->type == 'page_categories') display:block; @else display:none; @endif" class="form-control" name="page_categories[]" id="page_categories" multiple>
                                    @foreach (\Modules\Page\Entities\PageCategory::all() as $pageCategory)
                                        <option value="{{$pageCategory->id}}">{{ $pageCategory->name }}</option>
                                    @endforeach
                                </select>

                                <select style="@if(isset($menuItem) && $menuItem->type == 'contact') display:block; @else display:none; @endif" class="form-control" name="contact_route" id="contact_route">
                                    @foreach (\Modules\Contact\Entities\Contact::all() as $contact)
                                        <option value="{{$contact->id}}" {{{ (isset($menuItem) && $menuItem->type == "contact" && $menuItem->value == $contact->id) ? "SELECTED" : "" }}}>{{ $contact->title }}</option>
                                    @endforeach
                                </select>

                                @can('flight')
                                <select style="@if(isset($menuItem) && $menuItem->type == 'flight_landingpage') display:block; @else display:none; @endif" class="form-control" name="flight_landingpage_route" id="flight_landingpage_route">
                                    @foreach (\Modules\Flight\Entities\FlightLandingPage::all() as $landingPage)
                                        <option value="{{$landingPage->id}}" {{{ (isset($menuItem) && $menuItem->type == "flight_landingpage" && $menuItem->value == $landingPage->id) ? "SELECTED" : "" }}}>{{ $landingPage->title }}</option>
                                    @endforeach
                                </select>
                                @endcan

                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <h3 class="profile-username text-center"> {{ __('widget::index.operations') }} </h3>

                    <button type="submit" class="btn btn-primary btn-block"> {{ __('widget::index.save_button') }} </button>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>
        {!! Form::close() !!}
    </div>
    <!-- /.row -->

@stop

@section('plugin.css')
    <link rel="stylesheet" href="/backend/plugins/iCheck/all.css">
@stop

@section('page.css')

@stop

@section('plugin.js')
    <script src="/backend/plugins/iCheck/icheck.min.js"></script>
@stop

@section('page.js')
    <script>
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })

        $('#item_type_custom').click(function(e){
            $('#fix_url').show();
            $('#blog_route').hide();
            $('#page_route').hide();
            $('#contact_route').hide();
            $('#page_category_route').hide();
            $('#page_categories').hide();
            $('#flight_landingpage_route').hide();
            $('#product_category_route').hide();
            $('#product_categories').hide();
        });

        $('#item_type_blog').click(function(e){
            $('#fix_url').hide();
            $('#blog_route').show();
            $('#page_route').hide();
            $('#contact_route').hide();
            $('#page_category_route').hide();
            $('#page_categories').hide();
            $('#flight_landingpage_route').hide();
            $('#product_category_route').hide();
            $('#product_categories').hide();
        });

        $('#item_type_page').click(function(e){
            $('#fix_url').hide();
            $('#blog_route').hide();
            $('#page_route').show();
            $('#contact_route').hide();
            $('#page_category_route').hide();
            $('#page_categories').hide();
            $('#flight_landingpage_route').hide();
            $('#product_category_route').hide();
            $('#product_categories').hide();
        });

        $('#item_type_page_category').click(function(e){
            $('#fix_url').hide();
            $('#blog_route').hide();
            $('#page_route').hide();
            $('#contact_route').hide();
            $('#page_category_route').show();
            $('#page_categories').hide();
            $('#flight_landingpage_route').hide();
            $('#product_category_route').hide();
            $('#product_categories').hide();
        });

        $('#item_type_product_category').click(function(e){
            $('#fix_url').hide();
            $('#blog_route').hide();
            $('#page_route').hide();
            $('#contact_route').hide();
            $('#page_category_route').hide();
            $('#page_categories').hide();
            $('#flight_landingpage_route').hide();
            $('#product_category_route').show();
            $('#product_categories').hide();
        });

        $('#item_type_contact').click(function(e){
            $('#fix_url').hide();
            $('#blog_route').hide();
            $('#page_route').hide();
            $('#page_category_route').hide();
            $('#contact_route').show();
            $('#page_categories').hide();
            $('#flight_landingpage_route').hide();
            $('#product_category_route').hide();
            $('#product_categories').hide();
        });

        $('#item_type_page_categories').click(function(e){
            $('#fix_url').hide();
            $('#blog_route').hide();
            $('#page_route').hide();
            $('#page_category_route').hide();
            $('#contact_route').hide();
            $('#page_categories').show();
            $('#flight_landingpage_route').hide();
            $('#product_category_route').hide();
            $('#product_categories').hide();
        });

        $('#item_type_product_categories').click(function(e){
            $('#fix_url').hide();
            $('#blog_route').hide();
            $('#page_route').hide();
            $('#page_category_route').hide();
            $('#contact_route').hide();
            $('#page_categories').hide();
            $('#flight_landingpage_route').hide();
            $('#product_category_route').hide();
            $('#product_categories').show();
        });

        $('#item_type_flight_landingpage').click(function(e){
            $('#fix_url').hide();
            $('#blog_route').hide();
            $('#page_route').hide();
            $('#page_category_route').hide();
            $('#contact_route').hide();
            $('#page_categories').hide();
            $('#flight_landingpage_route').show();
            $('#product_category_route').hide();
            $('#product_categories').hide();
        });


    </script>
@stop