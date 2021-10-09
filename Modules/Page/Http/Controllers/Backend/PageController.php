<?php

namespace Modules\Page\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Intervention\Image\Facades\Image;
use Modules\Page\Entities\Page;
use Modules\Tag\Entities\Tag;
use View;

class PageController extends Controller
{


    public function index()
    {

        View::share('page_title', Lang::get('page::index.page.pages'));

        $pages = Page::orderBy("created_at", "DESC")->get();
        return view('page::backend.page.index', ['pages' => $pages]);
    }

    public function create()
    {
        View::share('page_title', Lang::get('page::index.page.create_edit'));
        return view('page::backend.page.create_edit');
    }

    public function store(Request $request)
    {

//        $this->validate($request, [
//            "title"    => "required|array",
//            "title.*"  => "required|max:120|string|unique:page_translations",
//        ]);

        $page = new Page();

        $page->page_category_id = $request->get('page_category_id');
        $page->user_id = Auth::guard("admin")->user()->id;
        $page->is_active = $request->get('is_active');
        $page->show_featured_image_inline = $request->get('show_featured_image_inline');
        $page->is_fixed_on_mainpage = $request->get('is_fixed_on_mainpage');
        $page->is_comment_active = $request->get('is_comment_active');
        $page->featured_image_alt = $request->get('featured_image_alt');

        if(env("PAGE_TEMPLATE_ENABLED") == true){
            $page->page_template_id = $request->get('page_template_id');
        }

        $page->save();

        foreach (\Loc::getLocales() as $locale){

            if($request->input('title.'.$locale->code) == ""){
                continue;
            }

            $page->setActiveLocale($locale->code);
            $page->title =  $request->input('title.'.$locale->code);
            $page->subtitle =  $request->input('subtitle.'.$locale->code);
            $page->slug = str_slug($request->input('title.'.$locale->code));
            $page->content = $request->input('content.'.$locale->code);
            $page->meta_title = $request->input('meta_title.'.$locale->code);
            $page->meta_keywords = $request->input('meta_keywords.'.$locale->code);
            $page->meta_description = $request->input('meta_description.'.$locale->code);
            $page->save();
        }

        $this->uploadFeaturedImage($page);
        $this->uploadThumbnail($page);

        return redirect()->route("backend.page.post.edit", ['page' => $page->id])->withSuccess( __('backend.save_success') );
    }

    public function edit(Page $page)
    {
        View::share('page_title', Lang::get('page::index.page.create_edit'));
        return view('page::backend.page.create_edit', ['page' => $page]);
    }

    public function update(Request $request, Page $page)
    {

        $page->page_category_id = $request->get('page_category_id');
        $page->is_active = $request->get('is_active');
        $page->show_featured_image_inline = $request->get('show_featured_image_inline');
        $page->is_fixed_on_mainpage = $request->get('is_fixed_on_mainpage');
        $page->is_comment_active = $request->get('is_comment_active');
        $page->featured_image_alt = $request->get('featured_image_alt');

        if(env("PAGE_TEMPLATE_ENABLED") == true){
            $page->page_template_id = $request->get('page_template_id');
        }

        $page->save();

        foreach (\Loc::getLocales() as $locale){

            if($request->input('title.'.$locale->code) == ""){
                continue;
            }

            $page->setActiveLocale($locale->code);
            $page->title =  $request->input('title.'.$locale->code);
            $page->subtitle =  $request->input('subtitle.'.$locale->code);
            $page->slug = str_slug($request->input('title.'.$locale->code));
            $page->content = $request->input('content.'.$locale->code);
            $page->meta_title = $request->input('meta_title.'.$locale->code);
            $page->meta_keywords = $request->input('meta_keywords.'.$locale->code);
            $page->meta_description = $request->input('meta_description.'.$locale->code);
            $page->save();
        }

        $this->uploadFeaturedImage($page);
        $this->uploadThumbnail($page);

        return redirect()->route("backend.page.post.edit", ['page' => $page->id])->withSuccess( __('backend.save_success') );
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route("backend.page.post.index", [$page->id])->withSuccess( __('backend.delete_success') );
    }

    private function uploadFeaturedImage(Page $page){
        $page->featured_image = $page->uploadDropzoneImage('image_values', 'featured_image');
        $page->save();
    }

    private function uploadThumbnail(Page $page){
        $page->thumbnail = $page->uploadImage("thumbnail", "thumbnail");
        $page->save();
    }

}
