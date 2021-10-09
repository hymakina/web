@extends('backend.layouts.default')

@section('breadcrumb')
    <li><a href="{{ route('backend.page.category.index') }}">{{ __('page::index.category.categories') }}</a></li>
    <li class="active">{{ __('page::index.category.create_edit') }}</li>
@stop

@section('content')

    <div class="row">

        {!! Form::open(["method" => "POST", "files" => true]) !!}

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#pageCategory" data-toggle="tab"> {{ __('page::index.category.title') }} </a></li>
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
                                                    <label for="name"> {{ __('page::index.category.name') }} </label>
                                                    {!! Form::text("name[$key]", isset($category) ? $category->{'name:'.$key} : "",["class" => "form-control", "placeholder" => __('page::index.category.name'), ($loop->first && 1==2 ? "required":"" ) ]) !!}
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
                    <h3 class="profile-username text-center"> {{ __('page::index.operations') }} </h3>

                    <div class="form-group">
                        <label for="main_page_category_id"> {{ __('page::index.page.page_category') }}</label>
                        {!! Form::select("main_page_category_id", array(""=>"")+\Modules\Page\Entities\PageCategory::listsTranslations('name', 'tr')->pluck("name", "id")->toArray(), (isset($category) ? $category->main_page_category_id : old("main_page_category_id")), ["class" => "form-control"]) !!}
                    </div>

                    <button type="submit" class="btn btn-primary btn-block"> {{ __('page::index.save_button') }} </button>
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
    </script>
@stop