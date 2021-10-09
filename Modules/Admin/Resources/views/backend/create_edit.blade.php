@extends('backend.layouts.default')

@section('breadcrumb')
    <li><a href="{{ route('backend.admin.index') }}">{{ __('admin::index.admins') }}</a></li>
    <li class="active">{{ __('admin::index.create_edit') }}</li>
@stop

@section('content')

    <div class="row">

        {!! Form::open(["method" => "POST", "files" => true]) !!}

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#userTab" data-toggle="tab"> {{ __('admin::index.admin') }} </a></li>
                </ul>
                <div class="tab-content">

                    <div class="active tab-pane" id="userTab">

                        @if(count( $errors ) > 0 )
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                            <div class="box-body">

                                <div class="form-group">
                                    <label for="email"> {{ __('admin::index.email') }} </label>
                                    {!! Form::text("email", isset($admin) ? $admin->email : "", ["class" => "form-control", "placeholder" => __('admin::index.email'), 'required' ]) !!}
                                </div>

                                <div class="form-group">
                                    <label for="name"> {{ __('admin::index.name') }}</label>
                                    {!! Form::text("name", isset($admin) ? $admin->name : "",["class" => "form-control", "placeholder" => __('admin::index.name'), 'required' ]) !!}
                                </div>

                                <div class="form-group">
                                    <label for="lastname"> {{ __('admin::index.lastname') }}</label>
                                    {!! Form::text("lastname", isset($admin) ? $admin->lastname : "", ["class" => "form-control", "placeholder" => __('admin::index.lastname') ]) !!}
                                </div>

                                <div class="form-group">
                                    <label for="password"> {{ __('admin::index.password') }} </label>
                                    {!! Form::password("password", ["autocomplete"=>"new-password","class" => "form-control", "placeholder" => __('admin::index.password') ]) !!}
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation"> {{ __('admin::index.password_confirmation') }} </label>
                                    {!! Form::password("password_confirmation", ["autocomplete"=>"new-password","class" => "form-control", "placeholder" => __('admin::index.password_confirmation') ]) !!}
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
                    <h3 class="profile-username text-center"> {{ __('admin::index.operations') }} </h3>

                    <div class="form-group">
                        <label for="is_active"> {{ __('admin::index.is_admin_active') }}</label>
                        {!! Form::select("is_active", ['0' => __('admin::index.not_active'), '1' => __('admin::index.active')], (isset($admin) ? $admin->is_active : old("is_active")), ["class" => "form-control", "required"]) !!}
                    </div>

                    <button type="submit" class="btn btn-primary btn-block"> {{ __('admin::index.save_button') }} </button>
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