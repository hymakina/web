@extends('backend.layouts.default')

@section('breadcrumb')
    <li><a href="{{ route('backend.slider.image.index', [$slider->id]) }}">{{ __('slider::image.images') }}</a></li>
    <li class="active">{{ __('slider::image.create_edit') }}</li>
@stop

@section('content')

    <div class="row">

        {!! Form::open(["method" => "POST", "files" => true]) !!}

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#image" data-toggle="tab"> {{ __('slider::image.image') }} </a></li>
                </ul>
                <div class="tab-content">

                    <div class="active tab-pane" id="image">

                        @if(count( $errors ) > 0 )
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="box-body">

                            <div class="form-group">
                                <label for="name"> {{ __('slider::image.title') }}</label>
                                {!! Form::text("name", isset($image) ? $image->name : "",["class" => "form-control", "placeholder" => __('slider::image.title'), 'required' ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="sub_title"> {{ __('slider::image.sub_title') }}</label>
                                {!! Form::text("sub_title", isset($image) ? $image->sub_title : "",["class" => "form-control", "placeholder" => __('slider::image.sub_title') ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="content"> {{ __('slider::image.content') }}</label>
                                {!! Form::text("content", isset($image) ? $image->content : "",["class" => "form-control", "placeholder" => __('slider::image.content') ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="link"> {{ __('slider::image.link') }}</label>
                                {!! Form::text("link", isset($image) ? $image->link : "",["class" => "form-control", "placeholder" => __('slider::image.link')]) !!}
                            </div>

                            <div class="form-group">
                                <label for="link_title"> {{ __('slider::image.link_title') }}</label>
                                {!! Form::text("link_title", isset($image) ? $image->link_title : "",["class" => "form-control", "placeholder" => __('slider::image.link_title')]) !!}
                            </div>

                            <div class="form-group">
                                <label for="order"> {{ __('slider::image.order') }}</label>
                                {!! Form::number("order", isset($image) ? $image->order : "",["class" => "form-control", "placeholder" => __('slider::image.order'), 'required' ]) !!}
                            </div>

                            <div style="width: 100%">
                                <div data-image="{{isset($image) ? $image->image : "" }}" class="dropzone" data-width="1280" data-ajax="false" data-height="540"  style="">
                                    <input type="file" name="image" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image_opacity"> {{ __('slider::image.opacity') }}</label>
                                <input name="image_opacity" type="text" value="" class="slider form-control" data-slider-min="0" data-slider-max="1"
                                       data-slider-step="0.01" data-slider-value="{{isset($image) ? $image->image_opacity : "1" }}" data-slider-orientation="horizontal"
                                       data-slider-selection="before" data-slider-tooltip="show" data-slider-id="red">
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
                    <h3 class="profile-username text-center"> {{ __('slider::image.operations') }} </h3>

                    <button type="submit" class="btn btn-primary btn-block"> {{ __('slider::image.save_button') }} </button>
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
    <link media="all" type="text/css" rel="stylesheet" href="/backend/crop/crop.css">
    <link rel="stylesheet" href="{{asset('backend/plugins/bootstrap-slider/slider.css')}}">
@stop

@section('page.css')

@stop

@section('plugin.js')
    <script src="/backend/plugins/iCheck/icheck.min.js"></script>
    <script src="{{asset('backend/crop/crop_original.js')}}"></script>
    <script src="{{asset('backend/plugins/bootstrap-slider/bootstrap-slider.js')}}"></script>
@stop

@section('page.js')
    <script>

        $(function () {
            /* BOOTSTRAP SLIDER */
            $('.slider').bootstrapSlider();
        })

        $(".image-opacity").inputmask({
            'radixPoint' : ',',
            'alias': 'numeric',
            'groupSeparator': '.',
            'autoGroup': true,
            'digits': 0,
            'suffix': ' XAF',
            'placeholder': '0',
            'prefix':'',
            'min':0,
            'max':1
        });



        $('.dropzone').html5imageupload({
            imageRemoved: true

        });

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