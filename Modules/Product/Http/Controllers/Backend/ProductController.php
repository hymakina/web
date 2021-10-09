<?php

namespace Modules\Product\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductProductAttribute;
use Modules\Product\Entities\ProductProductOptionKey;
use View;
use Illuminate\Support\Facades\Lang;

class ProductController extends Controller
{
    public function index() {

        $products = Product::all();
        return view("product::backend.product.index", [
            "products" => $products,
        ]);
    }

    public function create() {
        return view("product::backend.product.create_edit");
    }

    public function store(Request $request) {

        $item = new Product;

        $item->is_active = $request->get('is_active');
//        $item->is_fixed_on_mainpage = $request->get('is_fixed_on_mainpage');

        $item->save();

        foreach (\Loc::getLocales() as $locale){

            if($request->input('title.'.$locale->code) == ""){
                continue;
            }

            $item->setActiveLocale($locale->code);
            $item->title =  $request->input('title.'.$locale->code);
            $item->slug = str_slug($request->input('title.'.$locale->code));
            $item->content = $request->input('content.'.$locale->code);
            $item->meta_title = $request->input('meta_title.'.$locale->code);
            $item->meta_keywords = $request->input('meta_keywords.'.$locale->code);
            $item->meta_description = $request->input('meta_description.'.$locale->code);

            $item->save();
        }

        $categories = [];
        if($request->has("categories")){
            foreach($request->get("categories") as $key => $value){
                if($value > 0){
                    $categories[] = $value;
                }
            }
        }
        $item->categories()->sync($categories);

        $this->uploadFeaturedImage($item);

        return redirect()->route("backend.product.product.edit", $item->id)->withSuccess( __('backend.save_success') );
    }

    public function edit(Product $item)
    {

        $inCategories = [];
        foreach ($item->categories()->get() as $key => $category) {
            $inCategories[] = $category->id;
        }

        return view("product::backend.product.create_edit", [
            "product" => $item,
            "inCategories" => $inCategories
        ]);
    }

    public function update(Request $request, Product $item)
    {

        $item->is_active = $request->get('is_active');
//        $item->is_fixed_on_mainpage = $request->get('is_fixed_on_mainpage');

        $item->save();

        foreach (\Loc::getLocales() as $locale){

            if($request->input('title.'.$locale->code) == ""){
                continue;
            }

            $item->setActiveLocale($locale->code);
            $item->title =  $request->input('title.'.$locale->code);
            $item->slug = str_slug($request->input('title.'.$locale->code));
            $item->content = $request->input('content.'.$locale->code);
            $item->meta_title = $request->input('meta_title.'.$locale->code);
            $item->meta_keywords = $request->input('meta_keywords.'.$locale->code);
            $item->meta_description = $request->input('meta_description.'.$locale->code);

            $item->save();
        }

        ProductProductOptionKey::where('product_id', $item->id)->delete();
        if($request->input("option")){
            $options = array_filter($request->input("option"));
            foreach($options as $key => $value){
                if($value != 0){
                    $newOptionKey = new ProductProductOptionKey();
                    $newOptionKey->product_id = $item->id;
                    $newOptionKey->product_option_key_id = $key;
                    $newOptionKey->value = $value;
                    $newOptionKey->save();
                }
            }
        }

        $this->uploadFeaturedImage($item);

        return redirect()->route("backend.product.product.edit", $item->id)->withSuccess( __('backend.save_success') );
    }

    public function destroy(Product $item)
    {
        $item->delete();
        return redirect()->route("backend.product.product.index")->withSuccess( __('backend.delete_success') );
    }

    private function uploadFeaturedImage(Product $item){
        $item->featured_image = $item->uploadDropzoneImage('image_values', 'featured_image');
        $item->save();
    }

    public function storeAttribute(Request $request, Product $product) {

        $item = ProductProductAttribute::where(['product_id' => $product->id, 'product_attribute_id' => $request->input('attribute_id')])->first();

        if(!$item){
            $item = new ProductProductAttribute();
            $item->product_id = $product->id;
            $item->product_attribute_id = $request->input('attribute_id');
            $item->save();
        }

        return view("product::backend.product.attributes", [
            "product" => $product
        ]);
    }

    public function editAttribute(Request $request, Product $product) {

        $item = ProductProductAttribute::find($request->input('attribute_id'));
        return view("product::backend.product.attribute_values", [
            "attribute" => $item
        ]);

    }

    public function updateAttribute(Request $request, Product $product, ProductProductAttribute $item) {

        foreach (\Loc::getLocales() as $locale){

            if($request->input('attribute.value.'.$locale->code) == ""){
                continue;
            }

            $item->setActiveLocale($locale->code);
            $item->value =  $request->input('attribute.value.'.$locale->code);

            $item->save();
        }

    }

    public function destroyAttribute(Product $product, ProductProductAttribute $item)
    {
        $item->delete();
        return view("product::backend.product.attributes", [
            "product" => $product
        ]);
    }

}
