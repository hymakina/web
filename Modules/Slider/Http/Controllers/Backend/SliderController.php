<?php

namespace Modules\Slider\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Intervention\Image\Facades\Image;
use Modules\Slider\Entities\Slider;
use View;

class SliderController extends Controller
{
  
    public function index()
    {

        View::share('page_title', Lang::get('slider::slider.sliders'));

        $sliders = Slider::orderBy("created_at", "DESC")->get();
        return view('slider::backend.slider.index', ['sliders' => $sliders]);
    }

    public function create(Slider $slider)
    {
        View::share('page_title', Lang::get('slider::slider.create_edit'));
        return view('slider::backend.slider.create_edit');
    }

    public function store(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'name'=>'required',
            'short_code'=>'required'
        ]);

        $slider = new Slider();
        $slider->name = $request->get('name');
        $slider->short_code = $request->get('short_code');
       
        $slider->save();

        return redirect()->route("backend.slider.edit", ['slider' => $slider->id])->withSuccess( __('backend.save_success') );
    }

    public function edit(Slider $slider)
    {
        View::share('page_title', Lang::get('slider::slider.create_edit'));
        return view('slider::backend.slider.create_edit', ['slider' => $slider]);
    }

    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'name'=>'required',
            'short_code'=>'required'
        ]);

        $slider->name = $request->get('name');
        $slider->short_code = $request->get('short_code');
       
        $slider->save();
        
        return redirect()->route("backend.slider.edit", ['slider' => $slider->id])->withSuccess( __('backend.save_success') );
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route("backend.slider.index", [$slider->id])->withSuccess( __('backend.delete_success') );
    }

}
