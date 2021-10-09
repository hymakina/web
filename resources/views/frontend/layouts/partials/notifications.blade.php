@if (count($errors->all()) > 0)
<div data-alert class="alert-box alert">
	Hata Oluştu!<br>
	Lütfen eksiksiz doldurunuz
	<a href="#" class="close">&times;</a>
</div>
@endif

@if ($message = Session::get('success'))
<div data-alert class="alert-box success">
	İşlem Başarılı!<br>
	@if(is_array($message))
			@foreach ($message as $m)
					{{ $m }}
			@endforeach
	@else
			{{ $message }}
	@endif
	<a href="#" class="close">&times;</a>
</div>
@endif

@if ($message = Session::get('error'))
<div data-alert class="alert-box alert">
	Hata!<br>
	@if(is_array($message))
    @foreach ($message as $m)
    {{ $m }}
    @endforeach
    @else
    {{ $message }}
  @endif
	<a href="#" class="close">&times;</a>
</div>
@endif

@if ($message = Session::get('warning'))
<div data-alert class="alert-box alert">
	Uyarı!<br>
	@if(is_array($message))
    @foreach ($message as $m)
    {{ $m }}
    @endforeach
    @else
    {{ $message }}
  @endif
	<a href="#" class="close">&times;</a>
</div>
@endif

@if ($message = Session::get('info'))
<div data-alert class="alert-box info">
	Bilgi!<br>
	@if(is_array($message))
    @foreach ($message as $m)
    {{ $m }}
    @endforeach
    @else
    {{ $message }}
  @endif
	<a href="#" class="close">&times;</a>
</div>
@endif
