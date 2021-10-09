<div class="col-md-6">

    <ul class="todo-list">
        @foreach($product->attributes as $attribute)
        <li>
            <!-- drag handle -->
            <span class="handle">
                <i class="fa fa-ellipsis-v"></i>
                <i class="fa fa-ellipsis-v"></i>
            </span>
            <label>&nbsp;

                @if($attribute->attribute)
                {{$attribute->attribute->getTranslation("tr")->name}}
                @endif
            </label>
            <div class="tools">

                <a href="javascript:void(0)" id="{{$attribute->id}}" class="product-product-attribute">
                    <i class="fa fa-edit"></i>
                </a>

                <a data-attribute="{{$attribute->id}}" class="product-product-attribute-delete" href="javascript:void(0)"  >
                    <i class="fa fa-trash-o"></i>
                </a>

            </div>
        </li>
        @endforeach
    </ul>

</div>
<div class="col-md-6" id="product-attribute-values">

</div>