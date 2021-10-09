<?php

namespace Modules\Slider\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;

use Modules\Slider\Entities\Slider;
use Modules\Slider\Entities\SliderImage;
use View;

class SliderImageController extends Controller
{

    public function index(Slider $slider)
    {
        View::share('page_title', Lang::get('slider::image.images'));
        return view('slider::backend.image.index', ['slider' => $slider, 'images' => $slider->images]);
    }

    public function create(Slider $slider)
    {
        View::share('page_title', Lang::get('slider::image.create_edit'));
        return view('slider::backend.image.create_edit', ['slider' => $slider]);
    }

    public function store(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'name'=>'required|max:240',
        ]);

        $image = new SliderImage();
        $image->slider_id = $slider->id;

        $image->name = $request->get('name');
        $image->sub_title = $request->get('sub_title');
        $image->content = $request->get('content');
        $image->slug = str_slug($request->get('name'));
        $image->link = $request->get('link');
        $image->link_title = $request->get('link_title');
        $image->order = $request->get('order');
        $image->image_opacity = $request->get('image_opacity');
        $image->save();

        $this->uploadFeaturedImage($image);

        return redirect()->route("backend.slider.image.edit", ['slider' => $slider->id, 'slider_image' => $image->id])->withSuccess( __('backend.save_success') );
    }

    public function edit(Slider $slider, SliderImage $image)
    {
        View::share('page_title', Lang::get('slider::slider.create_edit'));
        return view('slider::backend.image.create_edit', ['slider' => $slider, 'image' => $image]);
    }

    public function update(Request $request, Slider $slider, SliderImage $image)
    {
        $this->validate($request, [
            'name'=>'required|max:240',
        ]);

        $image->name = $request->get('name');
        $image->sub_title = $request->get('sub_title');
        $image->content = $request->get('content');
        $image->slug = str_slug($request->get('name'));
        $image->link = $request->get('link');
        $image->link_title = $request->get('link_title');
        $image->order = $request->get('order');
        $image->image_opacity = $request->get('image_opacity');
        $image->save();

        $this->uploadFeaturedImage($image);

        return redirect()->route("backend.slider.image.edit", ['slider' => $slider->id, 'slider_image' => $image->id])->withSuccess( __('backend.save_success') );
    }

    public function destroy(Slider $slider, SliderImage $image)
    {
        $image->delete();
        return redirect()->route("backend.slider.image.index", [$slider->id])->withSuccess( __('backend.delete_success') );
    }

    private function uploadFeaturedImage(SliderImage $image){
        $image->image = $image->uploadDropzoneImage('image_values', 'image');
        $image->save();
    }

}
