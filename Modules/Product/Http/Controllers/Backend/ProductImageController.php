<?php

namespace Modules\Product\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;

use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductImage;
use View;

class ProductImageController extends Controller
{

    public function index(Product $product)
    {
        View::share('page_title', Lang::get('product::image.images'));
        $images = ProductImage::where('product_id', $product->id)->orderBy("order", "ASC")->get();
        return view('product::backend.image.index', ['product' => $product, 'images' => $images]);
    }
  
    public function create(Product $product)
    {
        View::share('page_title', Lang::get('product::image.create_edit'));
        return view('product::backend.image.create_edit', ['product' => $product]);
    }

    public function store(Request $request, Product $product)
    {

        $image = new ProductImage();

        $image->product_id = $product->id;
        $image->title = $request->get('title');

        $image->save();

        $this->uploadFeaturedImage($image);
      
        return redirect()->route("backend.product.image.edit", ['product' => $product->id, 'product_image' => $image->id])->withSuccess( __('backend.save_success') );
    }

    public function edit(Product $product, ProductImage $image)
    {
        View::share('page_title', Lang::get('product::product.create_edit'));
        return view('product::backend.image.create_edit', ['product' => $product, 'image' => $image]);
    }

    public function update(Request $request, Product $product, ProductImage $image)
    {

        $image->title = $request->get('title');
        $image->save();

        $this->uploadFeaturedImage($image);

        return redirect()->route("backend.product.image.edit", ['product' => $product->id, 'image' => $image->id])->withSuccess( __('backend.save_success') );
    }

    public function destroy(Product $product, ProductImage $image)
    {
        $image->delete();
        return redirect()->route("backend.product.image.index", [$product->id])->withSuccess( __('backend.delete_success') );
    }

    private function uploadFeaturedImage(ProductImage $image){
        $image->image = $image->uploadDropzoneImage('image_values', 'image');
        $image->save();
    }

    public function order(Request $request, Product $product){
        $items = $request->all();
        foreach ($items as $key => $item){
            $menuItem = ProductImage::find($item);
            $menuItem->order = $key;
            $menuItem->save();
        }
    }

}