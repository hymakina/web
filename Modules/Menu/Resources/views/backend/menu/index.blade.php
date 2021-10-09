@extends('backend.layouts.default')

@section('breadcrumb')
    <li class="active">{{ __('menu::index.menu.menus') }}</li>
@stop

@section('content')
   

            
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('menu::index.menu.name') }}</th>
                            <th>{{ __('menu::index.menu.short_code') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menus as $menu)
                        <tr>
                            <td>{{ $menu->id }}</td>
                            <td>{{ $menu->name }}</td>
                            <td>{{ $menu->short_code }}</td>
                            <td>
                                <a href="{{ route("backend.menu.item.index", $menu->id) }}" class="btn btn-info btn-sm"><i class="fa fa-list"></i> {{ __('menu::index.menu.items') }} </a>

                                <a href="{{ route("backend.menu.edit", $menu->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> {{ __('menu::index.edit') }} </a>

                                <a href="{{ route("backend.menu.delete", $menu->id) }}" onclick="return confirm('{{ __('menu::index.delete_confirm') }}');" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> {{ __('menu::index.delete') }} </a>
                            </td>
                        </tr>

                        @endforeach

                        </tbody>

                    </table>
               

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
