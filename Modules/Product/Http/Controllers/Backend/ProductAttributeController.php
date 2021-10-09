<?php

namespace Modules\Product\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Product\Entities\ProductAttribute;
use View;
use Illuminate\Support\Facades\Lang;

class ProductAttributeController extends Controller
{
    public function index() {

        $attributes = ProductAttribute::all();
        return view("product::backend.attribute.index", [
            "attributes" => $attributes,
        ]);
    }

    public function create() {
        return view("product::backend.attribute.create_edit");
    }

    public function store(Request $request) {


        $item = new ProductAttribute;
        $item->save();

        foreach (\Loc::getLocales() as $locale){

            if($request->input('name.'.$locale->code) == ""){
                continue;
            }

            $item->setActiveLocale($locale->code);
            $item->name =  $request->input('name.'.$locale->code);

            $item->save();
        }

        return redirect()->route("backend.product.attribute.edit", $item->id)->withSuccess( __('backend.save_success') );
    }

    public function edit(ProductAttribute $item)
    {
        return view("product::backend.attribute.create_edit", [
            "attribute" => $item
        ]);
    }

    public function update(Request $request, ProductAttribute $item)
    {

        foreach (\Loc::getLocales() as $locale){

            if($request->input('name.'.$locale->code) == ""){
                continue;
            }

            $item->setActiveLocale($locale->code);
            $item->name =  $request->input('name.'.$locale->code);

            $item->save();
        }

        $item->save();


        return redirect()->route("backend.product.attribute.edit", $item->id)->withSuccess( __('backend.save_success') );
    }

    public function destroy(ProductAttribute $item)
    {
        $item->delete();
        return redirect()->route("backend.product.attribute.index")->withSuccess( __('backend.delete_success') );
    }

}
