@extends('backend.layouts.default')

@section('breadcrumb')
    <li><a href="{{ route('backend.slider.index') }}">{{ __('slider::slider.sliders') }}</a></li>
    <li class="active">{{ __('slider::slider.create_edit') }}</li>
@stop

@section('content')

    <div class="row">

        {!! Form::open(["method" => "POST", "files" => true]) !!}

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#slider" data-toggle="tab"> {{ __('slider::slider.slider') }} </a></li>
                </ul>
                <div class="tab-content">

                    <div class="active tab-pane" id="slider">

                        @if(count( $errors ) > 0 )
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="box-body">

                            <div class="form-group">
                                <label for="name"> {{ __('slider::slider.name') }}</label>
                                {!! Form::text("name", isset($slider) ? $slider->name : "",["class" => "form-control", "placeholder" => __('slider::slider.name'), 'required' ]) !!}
                            </div>
                          
                            <div class="form-group">
                                <label for="short_code"> {{ __('slider::slider.short_code') }}</label>
                                {!! Form::text("short_code", isset($slider) ? $slider->short_code : "",["class" => "form-control", "placeholder" => __('slider::slider.short_code'), 'required' ]) !!}
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
                    <h3 class="profile-username text-center"> {{ __('slider::slider.operations') }} </h3>

                    <button type="submit" class="btn btn-primary btn-block"> {{ __('slider::slider.save_button') }} </button>
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

        function bs_input_file() {
            $(".input-file").before(
                function() {
                    if ( ! $(this).prev().hasClass('input-ghost') ) {
                        var element = $("<input type='file' tabindex='-1' accept='image/*' class='input-ghost' style='visibility:hidden; height:0'>");
                        element.attr("name",$(this).attr("name"));
                        element.change(function(){
                            element.next(element).find('input').val((element.val()).split('\\').pop());
                        });
                        $(this).find("button.btn-choose").click(function(){
                            element.click();
                        });
                        $(this).find("button.btn-reset").click(function(){
                            element.val(null);
                            $(this).parents(".input-file").find('input').val('');
                        });
                        $(this).find('input').css("cursor","pointer");
                        $(this).find('input').mousedown(function() {
                            $(this).parents('.input-file').prev().click();
                            return false;
                        });
                        return element;
                    }
                }
            );
        }
        $(function() {
            bs_input_file();
        });
    </script>
@stop