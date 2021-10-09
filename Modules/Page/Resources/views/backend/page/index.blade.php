@extends('backend.layouts.default')

@section('toolbox')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{ route('backend.dashboard.index') }}">{{ __('backend.dashboard') }} </a></li>
            @yield('breadcrumb')
            <li class="active">{{ __('page::index.page.pages') }}</li>
        </ol>
        <div class="input-group input-group-sm" style="width: 150px; right: 25px; position: absolute;">
            <div class="input-group-btn">
                <a href="{{ route('backend.page.post.create') }}" class="btn btn-block btn-success pull-right"><i class="fa fa-plus"></i> {{ __('page::index.page.create_new') }} </a>
            </div>
        </div>
    </section>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('page::index.page.category') }}</th>
                            <th>{{ __('page::index.page.title') }}</th>
                            <th>{{ __('page::index.status') }}</th>
                            <th>{{ __('page::index.page.created_at') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                        <tr>
                            <td>{{ $page->id }}</td>
                            <td>{{ @$page->category->getTranslation("tr")->name }}</td>
                            <td>
                                @foreach($page->translations as $pageTranslation)
                                    {!! "(". $pageTranslation->locale . ") " . $pageTranslation->title !!}
                                    @if(!$loop->last)
                                        <br>
                                    @endif
                                @endforeach

                            </td>
                            <td>{{ $page->is_active ? __('page::index.active') : __('page::index.not_active') }}</td>
                            <td>{{ $page->created_at }}</td>
                            <td>
                                {{--<div class="btn-group">--}}
                                    {{--<button type="button" class="btn btn-info btn-sm">{{ __('page::index.page.preview') }}</button>--}}
                                    {{--<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">--}}
                                        {{--<span class="caret"></span>--}}
                                        {{--<span class="sr-only">{{ __('page::index.page.preview') }}</span>--}}
                                    {{--</button>--}}
                                    {{--<ul class="dropdown-menu" role="menu">--}}
                                        {{--@foreach($page->translations as $translate)--}}
                                        {{--<li><a href="{{ route("frontend.page.show", $translate->slug) }}" target="_blank">{{ \Loc::getLocale($translate->locale)->name }}</a></li>--}}
                                        {{--@endforeach--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                <a href="{{ route("backend.page.post.edit", $page->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> {{ __('page::index.page.edit') }} </a>
                                <a href="{{ route("backend.page.post.delete", $page->id) }}" onclick="return confirm('{{ __('page::index.page.delete_confirm') }}');" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> {{ __('page::index.page.delete') }} </a>
                            </td>
                        </tr>

                        @endforeach

                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

@stop

@section('plugin.css')
    <link rel="stylesheet" href="/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@stop

@section('plugin.js')
    <script src="/backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
@stop

@section('page.js')
<script>
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
        })
</script>
@stop
