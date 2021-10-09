@extends('backend.layouts.default')

@section('breadcrumb')
    <li><a href="{{ route('backend.product.category.index') }}">{{ __('product::index.category.categories') }}</a></li>
    <li class="active">{{ __('product::index.category.create_edit') }}</li>
@stop

@section('content')

    <div class="row">

        {!! Form::open(["method" => "POST", "files" => true]) !!}

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#pageCategory" data-toggle="tab"> {{ __('product::index.category.title') }} </a></li>
                    <li><a href="#pageSEO" data-toggle="tab"> {{ __('product::index.category.seo') }} </a></li>
                </ul>
                <div class="tab-content">

                    <div class="active tab-pane" id="pageCategory">

                        @if(count( $errors ) > 0 )
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="box-body">

                            <div class="tabbable">
                                <div class="box-body">
                                    <ul class="nav nav-tabs">
                                        @foreach (\Loc::getLocales() as $key => $locale)
                                            <li class="{{ $loop->first ? "active":"" }}"><a href="#pagePostTab_{{$locale->code}}" data-toggle="tab">{{$locale->name}}</a></li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">

                                        @foreach (\Loc::getLocales() as $key => $locale)
                                            <div class="tab-pane  {{ $loop->first ? "active":"" }}  " id="pagePostTab_{{$locale->code}}">

                                                <div class="form-group">
                                                    <label for="name"> {{ __('product::index.category.name') }} </label>
                                                    {!! Form::text("name[$key]", isset($category) ? $category->{'name:'.$key} : "",["class" => "form-control", "placeholder" => __('product::index.category.name'), ($loop->first && 1==2 ? "required":"" ) ]) !!}
                                                </div>

                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="tab-pane" id="pageSEO">

                        <div class="box-body">

                            <div class="tabbable">
                                <div class="box-body">
                                    <ul class="nav nav-tabs">
                                        @foreach (\Loc::getLocales() as $key => $locale)
                                            <li class="{{ $loop->first ? "active":"" }}"><a href="#pageSEOtTab_{{$locale->code}}" data-toggle="tab">{{$locale->name}}</a></li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">

                                        @foreach (\Loc::getLocales() as $key => $locale)
                                            <div class="tab-pane  {{ $loop->first ? "active":"" }}  " id="pageSEOtTab_{{$locale->code}}">

                                                <div class="form-group">
                                                    <label for="meta_title"> {{ __('product::index.category.meta_title') }}</label>
                                                    {!! Form::text("meta_title[$key]", isset($category) ? $category->{'meta_title:'.$key} : "",["class" => "form-control", "placeholder" => __('product::index.category.meta_title') ]) !!}
                                                </div>

                                                <div class="form-group">
                                                    <label for="meta_keywords"> {{ __('product::index.category.meta_keywords') }}</label>
                                                    {!! Form::text("meta_keywords[$key]", isset($category) ? $category->{'meta_keywords:'.$key} : "",["class" => "form-control", "placeholder" => __('product::index.category.meta_keywords') ]) !!}
                                                </div>

                                                <div class="form-group">
                                                    <label for="meta_description"> {{ __('product::index.category.meta_description') }}</label>
                                                    {!! Form::text("meta_description[$key]", isset($category) ? $category->{'meta_description:'.$key} : "",["class" => "form-control", "placeholder" => __('product::index.category.meta_description') ]) !!}
                                                </div>

                                            </div>
                                        @endforeach

                                    </div>
                                </div>
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
                    <h3 class="profile-username text-center"> {{ __('product::index.operations') }} </h3>

                    <button type="submit" class="btn btn-primary btn-block"> {{ __('product::index.save_button') }} </button>
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

@section('product.css')

@stop

@section('plugin.js')
    <script src="/backend/plugins/iCheck/icheck.min.js"></script>
@stop

@section('product.js')
    <script>
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
    </script>
@stop