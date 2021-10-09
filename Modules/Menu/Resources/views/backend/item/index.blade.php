@extends('backend.layouts.default')

@section('breadcrumb')
    <li><a href="{{ route('backend.menu.index') }}">{{ __('menu::index.menu.menus') }}</a></li>
    <li class="active">{{ __('menu::index.item.items') }}</li>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ __('menu::index.item.items') }}</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <div class="input-group-btn">
                                <a href="{{ route('backend.menu.item.create', $menu->id) }}" class="btn btn-block btn-success pull-right"><i class="fa fa-plus"></i> {{ __('menu::index.item.create_new') }} </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <ul class="todo-list">
                        @foreach($menuItems as $menuItem)
                        <li id="{{$menuItem->id}}">
                            <!-- drag handle -->
                            <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <span class="text"> {{ $menuItem->title }} </span>
                            <!-- Emphasis label -->
                            <small class="label label-danger"><i class="fa fa-link"></i> {{ __('menu::index.item.link') }}: </small>
                            <label>&nbsp; {{ $menuItem->title }}</label>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">

                                <a href="{{ route("backend.menu.item.edit", ['menu' => $menuItem->menu->id, 'menu_item' => $menuItem->id]) }}" >
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route("backend.menu.item.delete", ['menu' => $menuItem->menu->id, 'menu_item' => $menuItem->id]) }}" onclick="return confirm('{{ __('widget::index.delete_confirm') }}');" >
                                    <i class="fa fa-trash-o"></i>
                                </a>

                            </div>
                        </li>
                        @endforeach
                    </ul>

                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

@stop

@section('plugin.css')
@stop

@section('page.css')
<style>
    .todo-list>li .tools {
        display: block;
    }
</style>
@stop

@section('plugin.js')
@stop

@section('page.js')
<script>
    $('.todo-list').sortable({
        placeholder         : 'sort-highlight',
        handle              : '.handle',
        forcePlaceholderSize: true,
        zIndex              : 999999,
        update                : function(event,ui){

            var order = [];
            $('.todo-list li').each( function(e) {
                order.push( $(this).attr('id') );
            });

            $.ajax({
                type: 'POST',
                url: '{{ route('backend.menu.item.order', ['menu' => $menu->id]) }}',
                data: JSON.stringify(order),
                contentType: "application/json",
                dataType: 'json'
            });
        }
    });
</script>
@stop