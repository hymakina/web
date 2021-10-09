@extends('backend.layouts.default')

@section('breadcrumb')
    <li class="active">{{ __('product::index.attribute.attributes') }}</li>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ __('product::index.attribute.attributes') }}</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">


                            <div class="input-group-btn">
                                <a href="{{ route('backend.product.attribute.create') }}" class="btn btn-block btn-success pull-right"><i class="fa fa-plus"></i> {{ __('product::index.attribute.create_new') }} </a>
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
                            <th>{{ __('product::index.attribute.name') }}</th>
                            <th>{{ __('product::index.attribute.created_at') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attributes as $attribute)
                        <tr>
                            <td>{{ $attribute->id }}</td>
                            <td>
                                @foreach($attribute->translations as $attributeTranslation)
                                    {!! "(". $attributeTranslation->locale . ") " . $attributeTranslation->name !!}
                                    @if(!$loop->last)
                                        <br>
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $attribute->created_at }}</td>
                            <td>
                                <a href="{{ route("backend.product.attribute.edit", $attribute->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> {{ __('product::index.attribute.edit') }} </a>
                                <a href="{{ route("backend.product.attribute.delete", $attribute->id) }}" onclick="return confirm('{{ __('product::index.attribute.delete_confirm') }}');" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> {{ __('product::index.attribute.delete') }} </a>
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