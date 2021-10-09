@extends('backend.layouts.default')

@section('breadcrumb')

    <li><a href="{{ route('backend.slider.index') }}">{{ __('slider::image.sliders') }}</a></li>
    <li class="active">{{ __('slider::image.images') }}</li>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ __('slider::image.images') }}</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <div class="input-group-btn">
                                <a href="{{ route('backend.slider.image.create', [$slider->id]) }}" class="btn btn-block btn-success pull-right"><i class="fa fa-plus"></i> {{ __('slider::image.create_new') }} </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('slider::image.name') }}</th>
                            <th>{{ __('slider::image.created_at') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($images as $image)
                        <tr>
                            <td>{{ $image->id }}</td>
                            <td>{{ $image->name }}</td>
                            <td>{{ $image->created_at }}</td>
                            <td>
                                <a href="{{ route("backend.slider.image.edit", [$image->slider->id, $image->id]) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> {{ __('slider::image.edit') }} </a>
                                <a href="{{ route("backend.slider.image.delete", [$image->slider->id, $image->id]) }}" onclick="return confirm('{{ __('slider::image.delete_confirm') }}');" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> {{ __('slider::image.delete') }} </a>
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