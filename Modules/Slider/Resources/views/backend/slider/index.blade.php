@extends('backend.layouts.default')

@section('breadcrumb')
    <li class="active">{{ __('slider::slider.sliders') }}</li>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ __('slider::slider.sliders') }}</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <div class="input-group-btn">
                                <a href="{{ route('backend.slider.create') }}" class="btn btn-block btn-success pull-right"><i class="fa fa-plus"></i> {{ __('slider::slider.create_new') }} </a>
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
                            <th>{{ __('slider::slider.name') }}</th>
                            <th>{{ __('slider::slider.created_at') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>{{ $slider->id }}</td>
                            <td>{{ $slider->name }}</td>
                            <td>
                                <a href="{{ route("backend.slider.edit", $slider->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> {{ __('slider::slider.edit') }} </a>
                                <a href="{{ route("backend.slider.image.index", $slider->id) }}" class="btn btn-success btn-sm"><i class="fa fa-image"></i> {{ __('slider::slider.images') }} </a>
                                <a href="{{ route("backend.slider.delete", $slider->id) }}" onclick="return confirm('{{ __('slider::slider.delete_confirm') }}');" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> {{ __('slider::slider.delete') }} </a>
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