@extends('backend.layouts.default')

@section('breadcrumb')
    <li><a href="{{ route('backend.contact.index') }}">{{ __('contact::contact.contacts') }}</a></li>
    <li class="active">{{ __('contact::contact.create_edit') }}</li>
@stop

@section('content')

    <div class="row">

        {!! Form::open(["method" => "POST", "files" => true]) !!}

        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#contact" data-toggle="tab"> {{ __('contact::contact.contact') }} </a></li>
                </ul>
                <div class="tab-content">

                    <div class="active tab-pane" id="contact">

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
                                            <li class="{{ $loop->first ? "active":"" }}"><a href="#contactTab_{{$locale->code}}" data-toggle="tab">{{$locale->name}}</a></li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">

                                        @foreach (\Loc::getLocales() as $key => $locale)
                                            <div class="tab-pane  {{ $loop->first ? "active":"" }}  " id="contactTab_{{$locale->code}}">

                                                <div class="form-group">
                                                    <label for="title"> {{ __('contact::contact.title') }}</label>
                                                    {!! Form::text("title[$key]", isset($contact) ? $contact->{'title:'.$key} : "",["class" => "form-control", "placeholder" => __('contact::contact.title'), ($loop->first ? "required":"" ) ]) !!}
                                                </div>

                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone"> {{ __('contact::contact.phone') }}</label>
                                {!! Form::text("phone", isset($contact) ? $contact->phone : "",["class" => "form-control", "placeholder" => __('contact::contact.phone') ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="fax"> {{ __('contact::contact.fax') }}</label>
                                {!! Form::text("fax", isset($contact) ? $contact->fax : "",["class" => "form-control", "placeholder" => __('contact::contact.fax') ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="email"> {{ __('contact::contact.email') }}</label>
                                {!! Form::text("email", isset($contact) ? $contact->email : "",["class" => "form-control", "placeholder" => __('contact::contact.email') ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="address"> {{ __('contact::contact.address') }}</label>
                                {!! Form::text("address", isset($contact) ? $contact->address : "",["class" => "form-control", "placeholder" => __('contact::contact.address') ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="longitude"> {{ __('contact::contact.longitude') }}</label>
                                {!! Form::text("longitude", isset($contact) ? $contact->longitude : "",["class" => "form-control", "placeholder" => __('contact::contact.longitude') ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="latitude"> {{ __('contact::contact.latitude') }}</label>
                                {!! Form::text("latitude", isset($contact) ? $contact->latitude : "",["class" => "form-control", "placeholder" => __('contact::contact.latitude') ]) !!}
                            </div>

                            <div class="form-group">
                                <label for="contact_form_to_email"> {{ __('contact::contact.contact_form_to_email') }}</label>
                                {!! Form::text("contact_form_to_email", isset($contact) ? $contact->contact_form_to_email : "",["class" => "form-control", "placeholder" => __('contact::contact.contact_form_to_email') ]) !!}
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
                    <h3 class="profile-username text-center"> {{ __('contact::contact.operations') }} </h3>

                    <button type="submit" class="btn btn-primary btn-block"> {{ __('contact::contact.save_button') }} </button>
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