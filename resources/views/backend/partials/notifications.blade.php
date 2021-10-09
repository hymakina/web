<?php $message = ""; ?>
<?php $alertType = "info"; ?>

@if (count($errors->all()) > 0)
    <?php $message = 'Formu eksiksiz doldurunuz'; ?>
    <?php $alertType = "error"; ?>

@elseif ($message = Session::get('notice'))
    @if(is_array($message))
        @foreach ($message as $m)
            <?php $message = $message + $m; ?>
        @endforeach
    @else
        <?php $message = $message; ?>
    @endif
    <?php $alertType = "info"; ?>
    <?php Session::forget('notice'); ?>

@elseif ($message = Session::get('success'))
    @if(is_array($message))
        @foreach ($message as $m)
            <?php $message = $message + $m; ?>
        @endforeach
    @else
        <?php $message = $message; ?>
    @endif
    <?php $alertType = "success"; ?>
    <?php Session::forget('success'); ?>

@elseif ($message = Session::get('error'))
    @if(is_array($message))
        @foreach ($message as $m)
            <?php $message = $message + $m; ?>
        @endforeach
    @else
        <?php $message = $message; ?>
    @endif
    <?php $alertType = "error"; ?>
    <?php Session::forget('error'); ?>

@elseif ($message = Session::get('warning'))
    @if(is_array($message))
        @foreach ($message as $m)
            <?php $message = $message + $m; ?>
        @endforeach
    @else
        <?php $message = $message; ?>
    @endif
    <?php $alertType = "warning"; ?>
    <?php Session::forget('warning'); ?>

@elseif ($message = Session::get('info'))
    @if(is_array($message))
        @foreach ($message as $m)
            <?php $message = $message + $m; ?>
        @endforeach
    @else
        <?php $message = $message; ?>
    @endif
    <?php $alertType = "info"; ?>
    <?php Session::forget('info'); ?>

@endif

<script>
    jQuery(document).ready( function($){
        if(1 == {{$message != "" ? 1 : 2}}){
            toastr.{{$alertType}}('{{$message}}')
        }
    })
</script>
