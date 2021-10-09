@extends('backend.layouts.default')

@section('toolbox')
    

    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.page.post.index') }}">{{ __('page::index.page.pages') }}</a></li>
            <li class="active">{{ __('page::index.page.create_edit') }}</li>
        </ol>
        
    </section>
@stop

@section('content')

    <div class="row">

        {!! Form::open(["method" => "POST", "files" => true]) !!}

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#pagePost" data-toggle="tab"> {{ __('page::index.page.title') }} </a></li>
                    <li><a href="#pageFeaturedImage" data-toggle="tab"> {{ __('page::index.page.featured_image') }} </a></li>
                    <li><a href="#pageSEO" data-toggle="tab"> {{ __('page::index.page.seo') }} </a></li>
                </ul>
                <div class="tab-content">

                    <div class="active tab-pane" id="pagePost">

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
                                                    <label for="title"> {{ __('page::index.page.title') }}</label>
                                                    {!! Form::text("title[$key]", isset($page) ? $page->{'title:'.$key} : "",["class" => "form-control", "placeholder" => __('page::index.page.title'), ($loop->first && 1==2 ? "required":"" ) ]) !!}
                                                </div>

                                                <div class="form-group">
                                                    <label for="subtitle"> {{ __('page::index.page.subtitle') }}</label>
                                                    {!! Form::text("subtitle[$key]", isset($page) ? $page->{'subtitle:'.$key} : "",["class" => "form-control", "placeholder" => __('page::index.page.subtitle') ]) !!}
                                                </div>

                                                <div class="form-group">
                                                    <label for="content"> {{ __('page::index.page.content') }}</label>
                                                    {!! Form::textarea("content[$key]", isset($page) ? $page->{'content:'.$key} : "", ["class" => "form-control tinymce_content", "placeholder" => __('page::index.page.content')]) !!}
                                                </div>

                                            </div>
                                            @endforeach

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="tab-pane" id="pageFeaturedImage">

                        <div class="form-group">
                            <label for="featured_image_alt"> {{ __('page::index.page.featured_image_alt') }}</label>
                            {!! Form::text("featured_image_alt", isset($page) ? $page->featured_image_alt : "",["class" => "form-control", "placeholder" => __('page::index.page.featured_image_alt') ]) !!}
                        </div>

                        <div style="width: 100%">
                            <div data-image="{{isset($page) ? $page->featured_image : "" }}" class="dropzone" data-width="900" data-ajax="false" data-height="550"  style="">
                                <input type="file" name="image" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="content">{{ __('page::index.page.upload_image') }}</label>
                            <div class="input-group input-file" name="thumbnail">
                                <input name="thumbnail" tabindex="-1" type="text" class="form-control" placeholder="{{ __('page::index.page.select_image') }}" />
                                <span class="input-group-btn">
                                        <button class="btn btn-default btn-choose" type="button">{{ __('page::index.page.select_image') }}</button>
                                    </span>
                            </div>
                        </div>

                        @if (isset($page) && $page->thumbnail != "")
                            <div class="jumbotron" style="display: flex; text-align: center;">

                                <img style="margin: 0 auto;" class="img-responsive" src="{{$page->thumbnail}}">

                            </div>
                        @endif

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
                                                    <label for="meta_title"> {{ __('page::index.page.meta_title') }}</label>
                                                    {!! Form::text("meta_title[$key]", isset($page) ? $page->{'meta_title:'.$key} : "",["class" => "form-control", "placeholder" => __('page::index.page.meta_title') ]) !!}
                                                </div>

                                                <div class="form-group">
                                                    <label for="meta_keywords"> {{ __('page::index.page.meta_keywords') }}</label>
                                                    {!! Form::text("meta_keywords[$key]", isset($page) ? $page->{'meta_keywords:'.$key} : "",["class" => "form-control", "placeholder" => __('page::index.page.meta_keywords') ]) !!}
                                                </div>

                                                <div class="form-group">
                                                    <label for="meta_description"> {{ __('page::index.page.meta_description') }}</label>
                                                    {!! Form::text("meta_description[$key]", isset($page) ? $page->{'meta_description:'.$key} : "",["class" => "form-control", "placeholder" => __('page::index.page.meta_description') ]) !!}
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
                        <label for="page_category_id"> {{ __('page::index.page.page_category') }}</label>
                        {!! Form::select("page_category_id", \Modules\Page\Entities\PageCategory::listsTranslations('name',"tr")->pluck("name", "id")->toArray(), (isset($page) ? $page->page_category_id : old("page_category_id")), ["required", "class" => "form-control"]) !!}
                    </div>

                    @if(env("PAGE_TEMPLATE_ENABLED") == true)
                    <div class="form-group">
                        <label for="page_template_id"> {{ __('page::index.page.page_template') }}</label>
                        {!! Form::select("page_template_id", \Modules\Page\Entities\PageTemplate::orderBy('id', 'asc')->pluck("name", "id")->toArray(), (isset($page) ? $page->page_template_id : old("page_template_id")), ["required", "class" => "form-control"]) !!}
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="is_active"> {{ __('page::index.page.is_active') }}</label>
                        {!! Form::select("is_active", ['0' => __('page::index.not_active'), '1' => __('page::index.active')], (isset($page) ? $page->is_active : old("is_active")), ["class" => "form-control", "required"]) !!}
                    </div>

                    <div style="display: none;">
                        <div class="form-group">
                            <label for="show_featured_image_inline"> {{ __('page::index.page.show_featured_image_inline') }}</label>
                            {!! Form::select("show_featured_image_inline", ['0' => __('page::index.do_not_display'), '1' => __('page::index.display')], (isset($page) ? $page->show_featured_image_inline : old("show_featured_image_inline")), ["class" => "form-control", "required"]) !!}
                        </div>

                        <div class="form-group">
                            <label for="is_fixed_on_mainpage"> {{ __('page::index.page.is_fixed_on_mainpage') }}</label>
                            {!! Form::select("is_fixed_on_mainpage", ['0' => __('page::index.no'), '1' => __('page::index.yes')], (isset($page) ? $page->is_fixed_on_mainpage : old("is_fixed_on_mainpage")), ["class" => "form-control", "required"]) !!}
                        </div>

                        <div class="form-group">
                            <label for="is_comment_active"> {{ __('page::index.page.is_comment_active') }}</label>
                            {!! Form::select("is_comment_active", ['0' => __('page::index.not_active'), '1' => __('page::index.active')], (isset($page) ? $page->is_comment_active : old("is_comment_active")), ["class" => "form-control", "required"]) !!}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"> {{ __('page::index.save_button') }} </button>

                    @if(isset($page))
                        <a class="btn btn-success btn-block" target="_blank" href="{{ route("frontend.page.show", $page->category->getTranslation("tr")->slug) }}"> {{ __('page::index.page.preview') }} </a>
                    @endif
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
@stop

@section('page.css')
    <style>

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
@stop

@section('page.js')
    <script>

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
