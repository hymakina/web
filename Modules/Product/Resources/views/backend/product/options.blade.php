

@foreach($product->categories as $productCategory)
    <h3>{{ $productCategory->getTranslation("tr")->name }}</h3>
    @foreach($productCategory->options as $categoryOption)

    @if($categoryOption->type->name == 'select' || $categoryOption->type->name == 'multi_select')

        @php
            $value = @\Modules\Product\Entities\ProductProductOptionKey::where('product_id', $product->id)->where('product_option_key_id', $categoryOption->id)->first()->value;
        @endphp
        <div class="form-group">
            <label for="sel1">{{ $categoryOption->name }}:</label>
            <select name="option[{{ $categoryOption->id }}]" class="form-control">
                <option value="">----</option>
                @foreach($categoryOption->values as $optionValue)
                    <option value="{{ $optionValue->id }}" {{$value==$optionValue->id ? "SELECTED":""}}>{{ $optionValue->name }}</option>
                @endforeach
            </select>
        </div>

    @elseif($categoryOption->type->name == 'double')

        <div class="form-group">
            <label for="sel1">{{ $categoryOption->name }}:</label>
            <input name="option[{{ $categoryOption->id }}]" type="text" class="form-control" value="{{ @\Modules\Product\Entities\ProductProductOptionKey::where('product_id', $product->id)->where('product_option_key_id', $categoryOption->id)->first()->value }}">
        </div>

    @endif
    @endforeach
    <hr>
@endforeach

