<hr>
<h3>{{ __('product::index.product.option_key_values') }}</h3>
<hr>

@foreach ($option->values as $value)
<div class="box box-warning box-solid">
    <div class="box-header with-border">
        <h3 class="box-title">{{ __('product::index.product.add_option_key_value') }}</h3>
        <div class="box-tools pull-right">
            <button data-value="{{ $value->id }}" type="button" class="btn btn-box-tool delete_option_key_value"><i class="fa fa-remove"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form id="update_option_key_value_form_{{$value->id}}">
        @foreach (\Loc::getLocales() as $key => $locale)
            <div class="form-group">
                <label for="name"> {{ $key }} </label>
                {!! Form::text("value[$key]", $value->{'name:'.$key}, ["class" => "form-control", "placeholder" => $key, ($loop->first && 1==2 ? "required":"" ) ]) !!}
            </div>
        @endforeach
        <button data-value="{{$value->id}}" type="button" class="btn btn-warning btn-block update_option_key_value"> {{ __('product::index.product.add_option_key_value') }} </button>
        </form>
    </div>
</div>
@endforeach


