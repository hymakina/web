@extends('backend.layouts.default')

@section('breadcrumb')
    <li><a href="{{ route('backend.product.product.index') }}">{{ __('product::index.product.products') }}</a></li>
    <li class="active">{{ __('product::index.product.create_edit') }}</li>
@stop

@section('content')

    <div class="row">

        {!! Form::open(["method" => "POST", "files" => true]) !!}

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#productPost" data-toggle="tab"> {{ __('product::index.product.title') }} </a></li>
                    @if(isset($product))
                    <li><a href="#productAttributes" data-toggle="tab"> {{ __('product::index.product.attributes') }} </a></li>
                    <li><a href="#productOptions" data-toggle="tab"> {{ __('product::index.product.options') }} </a></li>
                    @endif
                    <li><a href="#productFeaturedImage" data-toggle="tab"> {{ __('product::index.product.featured_image') }} </a></li>
                    <li><a href="#productSEO" data-toggle="tab"> {{ __('product::index.product.seo') }} </a></li>
                </ul>
                <div class="tab-content">

                    <div class="active tab-pane" id="productPost">

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
                                            <li class="{{ $loop->first ? "active":"" }}"><a href="#productPostTab_{{$locale->code}}" data-toggle="tab">{{$locale->name}}</a></li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">

                                            @foreach (\Loc::getLocales() as $key => $locale)
                                            <div class="tab-pane  {{ $loop->first ? "active":"" }}  " id="productPostTab_{{$locale->code}}">

                                                <div class="form-group">
                                                    <label for="title"> {{ __('product::index.product.title') }}</label>
                                                    {!! Form::text("title[$key]", isset($product) ? $product->{'title:'.$key} : "",["class" => "form-control", "placeholder" => __('product::index.product.title'), ($loop->first && 1==2 ? "required":"" ) ]) !!}
                                                </div>

                                                <div class="form-group">
                                                    <label for="content"> {{ __('product::index.product.content') }}</label>
                                                    {!! Form::textarea("content[$key]", isset($product) ? $product->{'content:'.$key} : "", ["class" => "form-control tinymce_content", "placeholder" => __('product::index.product.content')]) !!}
                                                </div>

                                            </div>
                                            @endforeach

                                    </div>
                                </div>
                            </div>

                        </div>

                        @if(!isset($product))
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {!! Form::label("categories[]", __('product::product.categories')) !!}
                                    <select multiple="multiple" id="categories" name="categories[]">
                                        @foreach(\Modules\Product\Entities\ProductCategory::all() as $category)
                                            <option value="{{$category->id}}" {{ isset($product) ? (in_array($category->id, $inCategories) ? "SELECTED" : "") : ""}}>
                                                {!! $category->getTranslation("tr")->name !!}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>

                    @if(isset($product))
                    <div class="tab-pane" id="productAttributes">

                        <div class="box direct-chat direct-chat-success" style="border-top: 0;">

                            <!-- /.box-header -->
                            <div class="box-body">


                                <div class="direct-chat-messages" style="height: auto;">


                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <div class="input-group">
                                    {!! Form::select("attribute_id", \Modules\Product\Entities\ProductAttribute::listsTranslations('name',"tr")->pluck("name", "id")->toArray(),  null, ["id" => "attribute_id", "class" => "form-control "]) !!}
                                    <span class="input-group-btn">
                                        <button id="add-attribute-button" type="button" class="btn btn-success btn-flat"> {{ __('product::index.product.add_attribute') }}</button>
                                    </span>
                                </div>
                            </div>
                            <!-- /.box-footer-->
                        </div>


                        <div class="row" id="attribute-container">

                            @include("product::backend.product.attributes", ['product' => $product])

                        </div>

                    </div>

                    <div class="tab-pane" id="productOptions">

                        @include("product::backend.product.options", ['product' => $product])

                    </div>
                    @endif
                    <div class="tab-pane" id="productFeaturedImage">

                        <div style="width: 100%">
                            <div data-image="{{isset($product) ? $product->featured_image : "" }}" class="dropzone" data-width="900" data-ajax="false" data-height="550"  style="">
                                <input type="file" name="image" />
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="productSEO">

                        <div class="box-body">

                            <div class="tabbable">
                                <div class="box-body">
                                    <ul class="nav nav-tabs">
                                        @foreach (\Loc::getLocales() as $key => $locale)
                                            <li class="{{ $loop->first ? "active":"" }}"><a href="#productSEOtTab_{{$locale->code}}" data-toggle="tab">{{$locale->name}}</a></li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">

                                        @foreach (\Loc::getLocales() as $key => $locale)
                                            <div class="tab-pane  {{ $loop->first ? "active":"" }}  " id="productSEOtTab_{{$locale->code}}">

                                                <div class="form-group">
                                                    <label for="meta_title"> {{ __('product::index.product.meta_title') }}</label>
                                                    {!! Form::text("meta_title[$key]", isset($product) ? $product->{'meta_title:'.$key} : "",["class" => "form-control", "placeholder" => __('product::index.product.meta_title') ]) !!}
                                                </div>

                                                <div class="form-group">
                                                    <label for="meta_keywords"> {{ __('product::index.product.meta_keywords') }}</label>
                                                    {!! Form::text("meta_keywords[$key]", isset($product) ? $product->{'meta_keywords:'.$key} : "",["class" => "form-control", "placeholder" => __('product::index.product.meta_keywords') ]) !!}
                                                </div>

                                                <div class="form-group">
                                                    <label for="meta_description"> {{ __('product::index.product.meta_description') }}</label>
                                                    {!! Form::text("meta_description[$key]", isset($product) ? $product->{'meta_description:'.$key} : "",["class" => "form-control", "placeholder" => __('product::index.product.meta_description') ]) !!}
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



                    <div class="form-group">
                        <label for="is_active"> {{ __('product::index.product.is_active') }}</label>
                        {!! Form::select("is_active", ['0' => __('product::index.not_active'), '1' => __('product::index.active')], (isset($product) ? $product->is_active : old("is_active")), ["class" => "form-control", "required"]) !!}
                    </div>

                    <button type="submit" class="btn btn-primary btn-block"> {{ __('product::index.save_button') }} </button>

                    {{--@if(isset($product))--}}
                        {{--<a class="btn btn-success btn-block" target="_blank" href="{{ route("frontend.product.show", $product->slug) }}"> {{ __('product::index.product.preview') }} </a>--}}
                    {{--@endif--}}
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('backend/plugins/jquery-multiselect/multi-select.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css') }}">
@stop

@section('page.css')
    <style>
        .todo-list>li .tools {
            display: block;
        }
    </style>
@stop

@section('plugin.js')
    <script src="/backend/plugins/iCheck/icheck.min.js"></script>
    <script src="{{asset('backend/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('backend/tinymce/plugins/table/plugin.min.js')}}"></script>
    <script src="{{asset('backend/tinymce/plugins/paste/plugin.min.js')}}"></script>
    <script src="{{asset('backend/tinymce/plugins/spellchecker/plugin.min.js')}}"></script>
    <script src="{{asset('backend/crop/crop_original.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script src="{{ asset("backend/plugins/jquery-multiselect/jquery.multi-select.js") }}"></script>
    <script src="{{ asset("backend/plugins/jquery-quicksearch/jquery.quicksearch.js") }}"></script>
    <script src="{{ asset("backend/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js") }}"></script>
@stop

@section('page.js')
    <script>

        @if(isset($product))
        $(document).on('click', '.product-product-attribute', function (e) {

            var attributeId = $(this).attr("id");
            openLoader();
            $.ajax({
                type:'GET',
                url:'{{ route("backend.product.product.attribute.edit", [$product->id])}}',
                data: {'attribute_id': attributeId} ,
                success:function(result){
                    $("#product-attribute-values").html(result);
                    closeLoader();
                }
            });
        });

        $(document).on('click', '.attribute-value-update', function (e) {

            var attributeId = $(this).data("attribute");
            var data = $('input[name^="attribute[value]"]').serializeArray();

            openLoader();
            $.ajax({
                type:'POST',
                url:'{{ route("backend.product.product.attribute.update", [$product->id])}}' + '/' + attributeId,
                data: data ,
                success:function(result){
                    closeLoader();
                }
            });
        });

        $(document).on('click', '.product-product-attribute-delete', function (e) {

            var attributeId = $(this).data("attribute");

            openLoader();
            $.ajax({
                type:'GET',
                url:'{{ route("backend.product.product.attribute.delete", [$product->id])}}' + '/' + attributeId,
                success:function(result){
                    $("#attribute-container").html(result);
                    closeLoader();
                }
            });
        });

        $(document).on('click', '#add-attribute-button', function (e) {

            e.preventDefault();

            openLoader();

            var attributeId = $("#attribute_id").val();

            $.ajax({
                type:'POST',
                url:'{{ route("backend.product.product.attribute.store", [$product->id])}}',
                data: {'attribute_id': attributeId} ,
                success:function(result){
                    $("#attribute-container").html(result);
                    closeLoader();
                }
            });

        });
        @endif

        $('#categories').multiSelect({
            selectableHeader: "<input type='text' class='search-input form-control' autocomplete='off' >",
            selectionHeader: "<input type='text' class='search-input form-control' autocomplete='off' >",
            afterInit: function(ms){
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function(e){
                        if (e.which === 40){
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function(e){
                        if (e.which == 40){
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
            },
            afterSelect: function(){
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function(){
                this.qs1.cache();
                this.qs2.cache();
            }
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

        $(".select2").select2({
            tags:true,
            createTag: function (params) {
                var term = $.trim(params.term);

                if (term === '') {
                    return null;
                }

                return {
                    id: "new:" + term,
                    text: term,
                }
            }
        });

        $('.dropzone').html5imageupload({
            imageRemoved: true
        });

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })

        tinymce.init({

            relative_urls : false,
            remove_script_host : true,
            document_base_url : "/",
            convert_urls : true,

            selector: ".tinymce_content",
            force_p_newlines : false,
            force_br_newlines : false,
            convert_newlines_to_brs : false,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table imagetools contextmenu directionality emoticons template paste textcolor importcss colorpicker textpattern responsivefilemanager example"
            ],
            add_unload_trigger: false,
            toolbar2: "| responsivefilemanager ",
            image_advtab: true ,
            external_filemanager_path:"/backend/filemanager/",
            filemanager_title:"Responsive Filemanager" ,
            external_plugins: { "filemanager" : "/backend/filemanager/plugin.min.js"},
            extended_valid_elements : "i[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]",
            setup: function (editor) {
                editor.addButton('mybutton', {
                    text: 'Read More',
                    icon: false,
                    onclick: function () {
                        editor.insertContent('[Read More]');
                    }
                });
                editor.addButton('amybutton', {
                    text: 'aRead More',
                    icon: false,
                    onclick: function () {
                        editor.insertContent('[Reada More]');
                    }
                });
            },
            toolbar: 'undo redo | bold italic underline | ' +
            'alignleft aligncenter alignright | ' +
            'bullist numlist | toolbarplugin | ' + 'mybutton | ' + 'example | ' + 'responsivefilemanager',
        });

        if (!window.console) {
            window.console = {
                log: function() {
                    tinymce.$('<div></div>').text(tinymce.grep(arguments).join(' ')).appendTo(document.body);
                }
            };
        }


        tinymce.PluginManager.add('example', function(editor, url) {
            // Add a button that opens a window
            editor.addButton('example', {
                text: 'Reklam Ekle',
                icon: false,
                onclick: function() {
                    // Open window
                    editor.windowManager.open({
                        title: 'Reklam Ekle',
                        body: [
                            {
                                type: 'listbox',
                                name: 'link_type',
                                label: 'Link Tipi',
                                values: [
                                    { text: 'İmaj Link', value: 'image_link' },
                                    { text: 'Yazı Link', value: 'text_link' },
                                ]
                            },
                            {
                                type: 'listbox',
                                name: 'ad',
                                label: 'Reklam Seçimi',
                                values: [
                                        {{--@foreach(\Modules\Advertisement\Entities\Advertisement::all() as $ad)--}}
                                    {{--{ text: '{{$ad->name}}', value: '{{$ad->id}}' },--}}
                                    {{--@endforeach--}}
                                ]
                            },
                            {
                                type: 'textbox',
                                name: 'link_text',
                                label: 'Link Yazısı (Eğer Yazı Link İse)'
                            },
                        ],
                        onsubmit: function(e) {
                            // Insert content when the window form is submitted
                            // console.log(e.data);
                            // if(e.data.link_type ==  'image_link'){
                            //     editor.insertContent('[advertisement_image_link:'+e.data.ad+']');
                            // }else{
                            //     if(e.data.link_text == ''){
                            //         alert("");
                            //         return false;
                            //     }
                            //     editor.insertContent('[advertisement_text_link:'+e.data.ad+':'+e.data.link_text+']');
                            // }

                        }
                    });
                }
            });

            // Adds a menu item to the tools menu
            editor.addMenuItem('example', {
                text: 'Example plugin',
                context: 'tools',
                onclick: function() {
                    // Open window with a specific url
                    editor.windowManager.open({
                        title: 'TinyMCE site',
                        url: 'https://www.tinymce.com',
                        width: 800,
                        height: 600,
                        buttons: [{
                            text: 'Close',
                            onclick: 'close'
                        }]
                    });
                }
            });

            return {
                getMetadata: function () {
                    return  {
                        name: "Example plugin",
                        url: "http://exampleplugindocsurl.com"
                    };
                }
            };
        });


    </script>
@stop
