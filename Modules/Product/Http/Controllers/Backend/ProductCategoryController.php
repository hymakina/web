<?php

namespace Modules\Product\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Product\Entities\ProductCategory;
use View;
use Illuminate\Support\Facades\Lang;

class ProductCategoryController extends Controller
{
    public function index() {

        $categories = ProductCategory::all();
        return view("product::backend.category.index", [
            "categories" => $categories,
        ]);
    }

    public function create() {
        return view("product::backend.category.create_edit");
    }

    public function store(Request $request) {


        $item = new ProductCategory;
        $item->save();

        foreach (\Loc::getLocales() as $locale){

            if($request->input('name.'.$locale->code) == ""){
                continue;
            }

            $item->setActiveLocale($locale->code);
            $item->name =  $request->input('name.'.$locale->code);
            $item->slug = str_slug($request->input('name.'.$locale->code));
            $item->meta_title = $request->input('meta_title.'.$locale->code);
            $item->meta_keywords = $request->input('meta_keywords.'.$locale->code);
            $item->meta_description = $request->input('meta_description.'.$locale->code);

            $item->save();
        }

        return redirect()->route("backend.product.category.edit", $item->id)->withSuccess( __('backend.save_success') );
    }

    public function edit(ProductCategory $item)
    {
        return view("product::backend.category.create_edit", [
            "category" => $item
        ]);
    }

    public function update(Request $request, ProductCategory $item)
    {

        foreach (\Loc::getLocales() as $locale){

            if($request->input('name.'.$locale->code) == ""){
                continue;
            }

            $item->setActiveLocale($locale->code);
            $item->name =  $request->input('name.'.$locale->code);
            $item->slug = str_slug($request->input('name.'.$locale->code));
            $item->meta_title = $request->input('meta_title.'.$locale->code);
            $item->meta_keywords = $request->input('meta_keywords.'.$locale->code);
            $item->meta_description = $request->input('meta_description.'.$locale->code);

            $item->save();
        }

        $item->save();


        return redirect()->route("backend.product.category.edit", $item->id)->withSuccess( __('backend.save_success') );
    }

    public function destroy(ProductCategory $item)
    {
        $item->delete();
        return redirect()->route("backend.product.category.index")->withSuccess( __('backend.delete_success') );
    }

}
