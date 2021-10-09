
    @foreach (\Loc::getLocales() as $key => $locale)

        <div class="form-group">
            <label for="meta_title"> {{ $key }} </label>
            {!! Form::text("attribute[value][$key]", isset($attribute) ? $attribute->{'value:'.$key} : "",["class" => "form-control", "placeholder" => $key ]) !!}
        </div>

    @endforeach

    <button data-attribute="{{$attribute->id}}" type="button" class="btn btn-primary btn-block attribute-value-update"> {{ __('product::index.save_button') }} </button>
