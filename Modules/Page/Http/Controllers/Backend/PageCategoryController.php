<?php

namespace Modules\Page\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Modules\Page\Entities\PageCategory;
use View;

class PageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        View::share('page_title', Lang::get('page::index.category.categories'));

        $categories = PageCategory::orderBy("created_at", "DESC")->get();
        return view('page::backend.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        View::share('page_title', Lang::get('page::index.category.create_edit'));
        return view('page::backend.category.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'name'=>'required|max:120|unique:page_categories'
//        ]);

        $category = new PageCategory();
        $category->main_page_category_id = $request->input('main_page_category_id') ? :null;
        $category->save();

        foreach (\Loc::getLocales() as $locale){

            if($request->input('name.'.$locale->code) == ""){
                continue;
            }

            $category->setActiveLocale($locale->code);
            $category->name =  $request->input('name.'.$locale->code);
            $category->slug = str_slug($request->input('name.'.$locale->code));
            $category->save();
        }

        return redirect()->route("backend.page.category.edit", ['page_category' => $category->id])->withSuccess( __('backend.save_success') );
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(PageCategory $category)
    {
        View::share('page_title', Lang::get('page::index.category.create_edit'));
        return view('page::backend.category.create_edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, PageCategory $category)
    {
//        $this->validate($request, [
//            'name'=>'required|max:120|unique:page_categories,id,' . $category->id,
//        ]);

        $category->main_page_category_id = $request->input('main_page_category_id') ? :null;
        $category->save();

        foreach (\Loc::getLocales() as $locale){

            if($request->input('name.'.$locale->code) == ""){
                continue;
            }

            $category->setActiveLocale($locale->code);
            $category->name =  $request->input('name.'.$locale->code);
            $category->slug = str_slug($request->input('name.'.$locale->code));
            $category->save();
        }

        return redirect()->route("backend.page.category.edit", ['page_category' => $category->id])->withSuccess( __('backend.save_success') );
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(PageCategory $category)
    {
        try{
            $category->delete();
        }catch(\Exception $e){
            return redirect()->route("backend.page.category.index", [$category->id])->with("error",  __($e->getMessage()) );
        }

        return redirect()->route("backend.page.category.index", [$category->id])->withSuccess( __('backend.delete_success') );
    }

}
