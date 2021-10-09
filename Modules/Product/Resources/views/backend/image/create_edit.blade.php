@extends('backend.layouts.default')

@section('breadcrumb')
    <li><a href="{{ route('backend.product.image.index', [$product->id]) }}">{{ __('product::image.images') }}</a></li>
    <li class="active">{{ __('product::image.create_edit') }}</li>
@stop

@section('content')

    <div class="row">

        {!! Form::open(["method" => "POST", "files" => true]) !!}

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#image" data-toggle="tab"> {{ __('product::image.image') }} </a></li>
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
                                <label for="name"> {{ __('product::image.title') }}</label>
                                {!! Form::text("title", isset($image) ? $image->title : "",["class" => "form-control", "placeholder" => __('product::image.title'), 'required' ]) !!}
                            </div>

                            <div style="width: 100%">
                                <div data-image="{{isset($image) ? $image->image : "" }}" class="dropzone" data-width="900" data-ajax="false" data-height="550"  style="">
                                    <input type="file" name="image" />
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
                    <h3 class="profile-username text-center"> {{ __('product::image.operations') }} </h3>

                    <button type="submit" class="btn btn-primary btn-block"> {{ __('product::image.save_button') }} </button>
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
@stop

@section('page.css')

@stop

@section('plugin.js')
    <script src="/backend/plugins/iCheck/icheck.min.js"></script>
    <script src="{{asset('backend/crop/crop_original.js')}}"></script>
@stop

@section('page.js')
    <script>


        $('.dropzone').html5imageupload({
            imageRemoved: true

        });

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