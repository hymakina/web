@extends('backend.layouts.default')

@section('breadcrumb')
    <li class="active">{{ __('setting::index.settings') }}</li>
@stop

@section('content')

    <div class="row">

    {!! Form::open(["route" => "backend.setting.edit", "method" => "POST", "files" => true]) !!}

    <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                    <li class="active"><a href="#siteTab" data-toggle="tab"> {{ __('setting::index.site_settings') }} </a></li>
                    <li><a href="#seoTab" data-toggle="tab"> {{ __('setting::index.seo_settings') }} </a></li>
                    <li><a href="#socialTab" data-toggle="tab"> {{ __('setting::index.social_media_settings') }} </a></li>

                </ul>
                <div class="tab-content">

                    <div class="active tab-pane" id="siteTab">

                        <div class="form-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.site_title') }} </label>
                                        <input type="text" name="site[general][title]" value="{{ Setting::get('site.general.title') }}" class="form-control" placeholder="{{ __('setting::index.site_title') }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.footer.description') }} </label>
                                        <input type="text" name="site[footer][description]" value="{{ Setting::get('site.footer.description') }}" class="form-control" placeholder="{{ __('setting::index.footer.description') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.footer.phone') }} </label>
                                        <input type="text" name="site[footer][phone]" value="{{ Setting::get('site.footer.phone') }}" class="form-control" placeholder="{{ __('setting::index.footer.phone') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.footer.mobilephone') }} </label>
                                        <input type="text" name="site[footer][mobilephone]" value="{{ Setting::get('site.footer.mobilephone') }}" class="form-control" placeholder="{{ __('setting::index.footer.mobilephone') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.footer.address') }} </label>
                                        <input type="text" name="site[footer][address]" value="{{ Setting::get('site.footer.address') }}" class="form-control" placeholder="{{ __('setting::index.footer.address') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.footer.email') }} </label>
                                        <input type="text" name="site[footer][email]" value="{{ Setting::get('site.footer.email') }}" class="form-control" placeholder="{{ __('setting::index.footer.email') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.footer.copyright_title') }} </label>
                                        <input type="text" name="site[footer][copyright_title]" value="{{ Setting::get('site.footer.copyright_title') }}" class="form-control" placeholder="{{ __('setting::index.footer.copyright_title') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.sender_email') }} </label>
                                        <input type="text" name="site[general][sender_email]" value="{{ Setting::get('site.general.sender_email') }}" class="form-control" placeholder="{{ __('setting::index.sender_email') }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.site_closed_title') }} </label>
                                        <input type="text" name="site[general][site_closed_title]" value="{{ Setting::get('site.general.site_closed_title') }}" class="form-control" placeholder="{{ __('setting::index.site_closed_title') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.site_closed_comment') }} </label>
                                        <input type="text" name="site[general][site_closed_comment]" value="{{ Setting::get('site.general.site_closed_comment') }}" class="form-control" placeholder="{{ __('setting::index.site_closed_comment') }}">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="seoTab">

                        <div class="form-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.meta_title') }} </label>
                                        <input type="text" name="site[seo][meta_title]" value="{{ Setting::get('site.seo.meta_title') }}" class="form-control" placeholder="{{ __('setting::index.meta_title') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.meta_keywords') }} </label>
                                        <input type="text" name="site[seo][meta_keywords]" value="{{ Setting::get('site.seo.meta_keywords') }}" class="form-control" placeholder="{{ __('setting::index.meta_keywords') }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.meta_description') }} </label>
                                        <input type="text" name="site[seo][meta_description]" value="{{ Setting::get('site.seo.meta_description') }}" class="form-control" placeholder="{{ __('setting::index.meta_description') }}">
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="socialTab">

                        <div class="form-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.facebook_url') }} </label>
                                        <input type="text" name="site[social][facebook_url]" value="{{ Setting::get('site.social.facebook_url') }}" class="form-control" placeholder="{{ __('setting::index.facebook_url') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.instagram_url') }} </label>
                                        <input type="text" name="site[social][instagram_url]" value="{{ Setting::get('site.social.instagram_url') }}" class="form-control" placeholder="{{ __('setting::index.instagram_url') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.linkedin_url') }} </label>
                                        <input type="text" name="site[social][linkedin_url]" value="{{ Setting::get('site.social.linkedin_url') }}" class="form-control" placeholder="{{ __('setting::index.linkedin_url') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.twitter_url') }} </label>
                                        <input type="text" name="site[social][twitter_url]" value="{{ Setting::get('site.social.twitter_url') }}" class="form-control" placeholder="{{ __('setting::index.twitter_url') }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"> {{ __('setting::index.google_plus_url') }} </label>
                                        <input type="text" name="site[social][google_plus_url]" value="{{ Setting::get('site.social.google_plus_url') }}" class="form-control" placeholder="{{ __('setting::index.google_plus_url') }}">
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
                    <h3 class="profile-username text-center"> {{ __('setting::index.operations') }} </h3>




                    <button type="submit" class="btn btn-primary btn-block"> {{ __('setting::index.save_button') }} </button>
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
@stop

@section('page.css')

@stop

@section('plugin.js')
@stop

@section('page.js')
    <script>

    </script>
@stop
