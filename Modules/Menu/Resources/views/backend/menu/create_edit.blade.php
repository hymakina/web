@extends('backend.layouts.default')

@section('breadcrumb')
    <li><a href="{{ route('backend.menu.index') }}">{{ __('menu::index.menu.menus') }}</a></li>
    <li class="active">{{ __('menu::index.menu.title') }}</li>
@stop

@section('content')

    <div class="row">

        {!! Form::open(["method" => "POST", "files" => true]) !!}

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#menu" data-toggle="tab"> {{ __('menu::index.menu.title') }} </a></li>
                </ul>
                <div class="tab-content">

                    <div class="active tab-pane" id="menu">

                        @if(count( $errors ) > 0 )
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="box-body">

                            <div class="form-group">
                                <label for="name"> {{ __('menu::index.menu.name') }}</label>
                                {!! Form::text("name", isset($menu) ? $menu->name : "",["class" => "form-control", "placeholder" => __('menu::index.menu.name'), 'required' ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="short_code"> {{ __('menu::index.menu.short_code') }}</label>
                                {!! Form::text("short_code", isset($menu) ? $menu->short_code : "", ["class" => "form-control", "placeholder" => __('menu::index.menu.short_code') ]) !!}
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
                    <h3 class="profile-username text-center"> {{ __('menu::index.operations') }} </h3>

                    <button type="submit" class="btn btn-primary btn-block"> {{ __('menu::index.save_button') }} </button>
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