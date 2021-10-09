@extends('backend.layouts.default')

@section('breadcrumb')
    <li class="active">{{ __('product::index.product.products') }}</li>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ __('product::index.product.products') }}</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <div class="input-group-btn">
                                <a href="{{ route('backend.product.product.create') }}" class="btn btn-block btn-success pull-right"><i class="fa fa-plus"></i> {{ __('product::index.product.create_new') }} </a>
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
{{--                            <th>{{ __('product::index.product.category') }}</th>--}}
                            <th>{{ __('product::index.product.title') }}</th>
                            <th>{{ __('product::index.status') }}</th>
                            <th>{{ __('product::index.product.created_at') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @foreach($product->translations as $productTranslation)
                                    {!! "(". $productTranslation->locale . ") " . $productTranslation->title !!}
                                    @if(!$loop->last)
                                        <br>
                                    @endif
                                @endforeach

                            </td>
                            <td>{{ $product->is_active ? __('product::index.active') : __('product::index.not_active') }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td>
                                {{--<div class="btn-group">--}}
                                    {{--<button type="button" class="btn btn-info btn-sm">{{ __('product::index.product.preview') }}</button>--}}
                                    {{--<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">--}}
                                        {{--<span class="caret"></span>--}}
                                        {{--<span class="sr-only">{{ __('product::index.product.preview') }}</span>--}}
                                    {{--</button>--}}
                                    {{--<ul class="dropdown-menu" role="menu">--}}
                                        {{--@foreach($product->translations as $translate)--}}
                                        {{--<li><a href="{{ route("frontend.product.show", $translate->slug) }}" target="_blank">{{ \Loc::getLocale($translate->locale)->name }}</a></li>--}}
                                        {{--@endforeach--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                                <a href="{{ route("backend.product.image.index", $product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-list"></i> {{ __('product::index.product.images') }} </a>

                                <a href="{{ route("backend.product.product.edit", $product->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> {{ __('product::index.product.edit') }} </a>
                                <a href="{{ route("backend.product.product.delete", $product->id) }}" onclick="return confirm('{{ __('product::index.product.delete_confirm') }}');" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> {{ __('product::index.product.delete') }} </a>
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

@section('product.js')
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