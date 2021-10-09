<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Catalog\Entities\ProductOption;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductCategory;
use Modules\Product\Entities\ProductOptionKey;
use Modules\Product\Entities\ProductProductOptionKey;

class ProductController extends Controller {

    public function catalog() {
        return view('frontend.product.index');
    }

    public function index(ProductCategory $category) {
        return view('frontend.product.index', compact('category'));
    }

    public function search(Request $request, ProductCategory $category) {
        $inputs = array_filter($request->except("_token"));
        $inputKeys = array_keys($inputs);

        $options = ProductOptionKey::where('product_category_id', $category->id)
            ->whereIn('id', $inputKeys)
            ->with('type')
            ->get()
            ->pluck('type.name', 'id')->toArray();

        $query = DB::table('products')
            ->select('products.id');

        $data = [];
        foreach($options as $key => $type){

            $value = $inputs[$key];

            if($type == "double" && ($value[0] == "" || $value[1] == "")){
                continue;
            }

            $query->leftJoin('product_product_option_keys as '.$key,function ($join) use($key) {
                $join->on('products.id', '=' , $key.'.product_id') ;
                $join->where($key.'.product_option_key_id','=', $key) ;
            });

        }

        foreach($options as $key => $type){

            $value = $inputs[$key];

            if($type == "double" && ($value[0] == "" || $value[1] == "")){
                continue;
            }

            if($type == "double"){
                $query->whereBetween($key.'.value', array($value[0], $value[1]));
            }else{
                $query->where($key.'.value', $value);
            }

        }

        $result = $query->get()->pluck('id')->toArray();

        $products = Product::whereIn('id', $result)->get();

        return view('frontend.product.index', compact('category', 'products'));
    }

}
