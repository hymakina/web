@extends('backend.layouts.default')

@section('breadcrumb')
    <li><a href="{{ route('backend.product.option.index') }}">{{ __('product::index.option.options') }}</a></li>
    <li class="active">{{ __('product::index.option.create_edit') }}</li>
@stop

@section('content')

    <div class="row">



        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#pageCategory" data-toggle="tab"> {{ __('product::index.option.title') }} </a></li>
                    @if(isset($option) && ($option->type->name == 'select' || $option->type->name == 'multi_select'))
                    <li><a href="#pageValues" data-toggle="tab"> {{ __('product::index.option.values') }} </a></li>
                    @endif
                </ul>
                <div class="tab-content">

                    <div class="active tab-pane" id="pageCategory">
                        {!! Form::open(["method" => "POST", "files" => true]) !!}
                        @if(count( $errors ) > 0 )
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <div class="box-body">

                            @if(!isset($option))
                            <div class="form-group">
                                <label for="product_category_id"> {{ __('product::index.product.option_category') }}</label>
                                {!! Form::select("product_category_id", \Modules\Product\Entities\ProductCategory::listsTranslations('name',"tr")->pluck("name", "id")->toArray(), (isset($option) ? $option->product_category_id : old("product_category_id")), ["required", "class" => "form-control"]) !!}
                            </div>

                            <div class="form-group">
                                <label for="product_option_type_id"> {{ __('product::index.product.option_type') }}</label>
                                {!! Form::select("product_option_type_id", \Modules\Product\Entities\ProductOptionType::pluck("name", "id")->toArray(), (isset($option) ? $option->product_option_type_id : old("product_option_type_id")), ["required", "class" => "form-control"]) !!}
                            </div>
                            @else
                                <div class="form-group">
                                    <label for="name"> {{ __('product::index.product.option_category') }} </label>
                                    {!! Form::text(null, $option->category->getTranslation("tr")->name,["class" => "form-control", null, "readonly" ]) !!}
                                </div>
                                <div class="form-group">
                                    <label for="name"> {{ __('product::index.product.option_type') }} </label>
                                    {!! Form::text(null, $option->type->name,["class" => "form-control", null, "readonly" ]) !!}
                                </div>

                            @endif

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
                                                    <label for="name"> {{ __('product::index.option.name') }} </label>
                                                    {!! Form::text("name[$key]", isset($option) ? $option->{'name:'.$key} : "",["class" => "form-control", "placeholder" => __('product::index.option.name'), ($loop->first && 1==2 ? "required":"" ) ]) !!}
                                                </div>

                                            </div>
                                        @endforeach
    
                                            <button type="submit" class="btn btn-primary btn-block"> {{ __('product::index.save_button') }} </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        {!! Form::close() !!}

                    </div>
                    @if(isset($option) && ($option->type->name == 'select' || $option->type->name == 'multi_select'))
                    <div class="tab-pane" id="pageValues">

                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">{{ __('product::index.product.add_option_key_value') }}</h3>
                            </div>
                            <div class="box-body">
                                {!! Form::open(["method" => "POST", "files" => true, "id" => "add_option_key_value_form"]) !!}
                                @foreach (\Loc::getLocales() as $key => $locale)

                                    <div class="form-group">
                                        <label for="name"> {{ $key }} </label>
                                        {!! Form::text("value[$key]","",["class" => "form-control", "placeholder" => $key, ($loop->first && 1==2 ? "required":"" ) ]) !!}
                                    </div>

                                @endforeach
                                <button id="add_option_key_value_button" type="button" class="btn btn-success btn-block"> {{ __('product::index.product.add_option_key_value') }} </button>

                                {!! Form::close() !!}
                            </div>
                        </div>
                        <div id="add_option_key_value_container">
                            @include("product::backend.option.values", ['option' => $option])
                        </div>
                    </div>
                    @endif
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

                    
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->


        </div>

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

        @if(isset($option))

        $(document).on('click', '#add_option_key_value_button', function (e) {

            openLoader();

            $.ajax({
                type:'POST',
                url:'{{ route("backend.product.option.value.store", [$option->id])}}',
                data: $("#add_option_key_value_form").serialize(),
                success:function(result){
                    $("#add_option_key_value_container").html(result);
                    closeLoader();
                }
            });

        });

        $(document).on('click', '.update_option_key_value', function (e) {

            var valueId = $(this).data("value");
            var data = $('#update_option_key_value_form_' + valueId).serializeArray();
            openLoader();
            $.ajax({
                type:'POST',
                url:'{{ route("backend.product.option.value.update", [$option->id])}}' + '/' + valueId,
                data: data ,
                success:function(result){
                    closeLoader();
                }
            });
        });

        $(document).on('click', '.delete_option_key_value', function (e) {

            var valueId = $(this).data("value");

            openLoader();
            $.ajax({
                type:'GET',
                url:'{{ route("backend.product.option.value.delete", [$option->id])}}' + '/' + valueId,
                success:function(result){
                    $("#add_option_key_value_container").html(result);
                    closeLoader();
                }
            });
        });

        @endif

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
    </script>
@stop
