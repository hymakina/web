<?php

namespace Modules\Product\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Product\Entities\ProductOptionKey;
use Modules\Product\Entities\ProductOptionKeyValue;
use View;
use Illuminate\Support\Facades\Lang;

class ProductOptionController extends Controller
{
    public function index() {

        $options = ProductOptionKey::all();
        return view("product::backend.option.index", [
            "options" => $options,
        ]);
    }

    public function create() {
        return view("product::backend.option.create_edit");
    }

    public function store(Request $request) {


        $item = new ProductOptionKey;

        $item->product_category_id =  $request->input('product_category_id');
        $item->product_option_type_id =  $request->input('product_option_type_id');

        $item->save();

        foreach (\Loc::getLocales() as $locale){

            if($request->input('name.'.$locale->code) == ""){
                continue;
            }

            $item->setActiveLocale($locale->code);
            $item->name = $request->input('name.'.$locale->code);

            $item->save();
        }

        return redirect()->route("backend.product.option.edit", $item->id)->withSuccess( __('backend.save_success') );
    }

    public function edit(ProductOptionKey $item)
    {
        return view("product::backend.option.create_edit", [
            "option" => $item
        ]);
    }

    public function update(Request $request, ProductOptionKey $item)
    {

        foreach (\Loc::getLocales() as $locale){

            if($request->input('name.'.$locale->code) == ""){
                continue;
            }

            $item->setActiveLocale($locale->code);
            $item->name =  $request->input('name.'.$locale->code);

            $item->save();
        }

        return redirect()->route("backend.product.option.edit", $item->id)->withSuccess( __('backend.save_success') );
    }

    public function destroy(ProductOptionKey $item)
    {
        $item->delete();
        return redirect()->route("backend.product.option.index")->withSuccess( __('backend.delete_success') );
    }

    public function storeValue(Request $request, ProductOptionKey $optionKey) {

        $optionKeyValue = new ProductOptionKeyValue();
        $optionKeyValue->product_option_key_id = $optionKey->id;
        $optionKeyValue->save();

        foreach (\Loc::getLocales() as $locale){

            if($request->input('value.'.$locale->code) == ""){
                continue;
            }

            $optionKeyValue->setActiveLocale($locale->code);
            $optionKeyValue->name =  $request->input('value.'.$locale->code);

            $optionKeyValue->save();
        }

        return view("product::backend.option.values", [
            "option" => $optionKey
        ]);
    }

    public function updateValue(Request $request, ProductOptionKey $optionKey, ProductOptionKeyValue $item) {


        foreach (\Loc::getLocales() as $locale){

            if($request->input('value.'.$locale->code) == ""){
                continue;
            }

            $item->setActiveLocale($locale->code);
            $item->name =  $request->input('value.'.$locale->code);

            $item->save();
        }

    }

    public function destroyValue(ProductOptionKey $optionKey, ProductOptionKeyValue $item)
    {
        $item->delete();
        return view("product::backend.option.values", [
            "option" => $optionKey
        ]);
    }

}
