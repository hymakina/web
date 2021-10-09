@extends('backend.layouts.default')

@section('breadcrumb')
    <li class="active">{{ __('contact::contact.contacts') }}</li>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ __('contact::contact.contacts') }}</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <div class="input-group-btn">
                                <a href="{{ route('backend.contact.create') }}" class="btn btn-block btn-success pull-right"><i class="fa fa-plus"></i> {{ __('contact::contact.create_new') }} </a>
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
                            <th>{{ __('contact::contact.title') }}</th>
                            <th>{{ __('contact::contact.created_at') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->title }}</td>
                            <td>
                                <a href="{{ route("backend.contact.edit", $contact->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> {{ __('contact::contact.edit') }} </a>
                                <a href="{{ route("backend.contact.delete", $contact->id) }}" onclick="return confirm('{{ __('contact::contact.delete_confirm') }}');" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i> {{ __('contact::contact.delete') }} </a>
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