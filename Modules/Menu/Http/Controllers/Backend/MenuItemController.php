<?php

namespace Modules\Menu\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Modules\Menu\Entities\Menu;
use View;
use Modules\Menu\Entities\MenuItem;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Menu $menu)
    {

        View::share('page_title', Lang::get('menu::index.item.items') . " (" . $menu->name . ")" );

        $menuItems = MenuItem::where('menu_id', $menu->id)->orderBy("order", "ASC")->get();
        return view('menu::backend.item.index', ['menuItems' => $menuItems, 'menu' => $menu]);
    }

    public function create(Request $request, Menu $menu)
    {
        return view('menu::backend.item.create_edit', ['menu' => $menu]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request, Menu $menu)
    {

        $validationRules = [
            'title'=>'required',
        ];

        if($request->get("type") == "custom"){
            $validationRules['fix_url'] = 'required';
        }else if($request->get("type") == "blog"){
            $validationRules['blog_route'] = 'required|integer|exists:blogs,id';
        }else if($request->get("type") == "page"){
            $validationRules['page_route'] = 'required|integer|exists:pages,id';
        }else if($request->get("type") == "page_category"){
            $validationRules['page_category_route'] = 'required|integer|exists:page_categories,id';
        }else if($request->get("type") == "contact"){
            $validationRules['contact_route'] = 'required|integer|exists:contacts,id';
        }else if($request->get("type") == "flight_landingpage"){
            $validationRules['flight_landingpage_route'] = 'required|integer|exists:flight_landing_pages,id';
        }else if($request->get("type") == "product_category"){
            $validationRules['product_category_route'] = 'required|integer|exists:product_categories,id';
        }

        $messages = [
            'fix_url.*'    => Lang::get('menu::validation.item.fix_url_required'),
            'blog_route.*' => Lang::get('menu::validation.item.blog_route_required'),
            'page_route.*' => Lang::get('menu::validation.item.page_route_required'),
            'contact_route.*' => Lang::get('menu::validation.item.contact_route_required'),
            'flight_landingpage_route.*' => Lang::get('menu::validation.item.flight_landingpage_route_required'),
        ];

        $this->validate($request, $validationRules, $messages);

        $menuItem = new MenuItem();
        $menuItem->menu_id = $menu->id;

        $menuItem->title = $request->get("title");
        $menuItem->slug = str_slug($request->get("title"));
        $menuItem->type = $request->get("type");

        if($menuItem->type == "custom"){
            $menuItem->value = $request->get("fix_url");
        }else if($menuItem->type == "blog"){
            $menuItem->value = $request->get("blog_route");
        }else if($menuItem->type == "page"){
            $menuItem->value = $request->get("page_route");
        }else if($menuItem->type == "page_category"){
            $menuItem->value = $request->get("page_category_route");
        }else if($menuItem->type == "page_categories"){
            $menuItem->value = implode(",",$request->get("page_categories"));
        }else if($menuItem->type == "contact"){
            $menuItem->value = $request->get("contact_route");
        }else if($menuItem->type == "flight_landingpage"){
            $menuItem->value = $request->get("flight_landingpage_route");
        }else if($menuItem->type == "product_category"){
            $menuItem->value = $request->get("product_category_route");
        }else if($menuItem->type == "product_categories"){
            $menuItem->value = implode(",",$request->get("product_categories"));
        }

        $menuItem->save();

        return redirect()->route("backend.menu.item.edit", ['menu' => $menu->id, 'menu_item' => $menuItem->id])->withSuccess( __('backend.save_success') );
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Menu $menu, MenuItem $menuItem)
    {
        return view('menu::backend.item.create_edit', ['menu' => $menu, 'menuItem' => $menuItem]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, Menu $menu, MenuItem $menuItem)
    {
        $validationRules = [
            'title'=>'required',
        ];

        if($request->get("type") == "custom"){
            $validationRules['fix_url'] = 'required';
        }else if($request->get("type") == "blog"){
            $validationRules['blog_route'] = 'required|integer|exists:blogs,id';
        }else if($request->get("type") == "page"){
            $validationRules['page_route'] = 'required|integer|exists:pages,id';
        }else if($request->get("type") == "page_category"){
            $validationRules['page_category_route'] = 'required|integer|exists:page_categories,id';
        }else if($request->get("type") == "contact"){
            $validationRules['contact_route'] = 'required|integer|exists:contacts,id';
        }else if($request->get("type") == "flight_landingpage"){
            $validationRules['flight_landingpage_route'] = 'required|integer|exists:flight_landing_pages,id';
        }else if($request->get("type") == "product_category"){
            $validationRules['product_category_route'] = 'required|integer|exists:product_categories,id';
        }

        $messages = [
            'fix_url.*'    => Lang::get('menu::validation.item.fix_url_required'),
            'blog_route.*' => Lang::get('menu::validation.item.blog_route_required'),
            'page_route.*' => Lang::get('menu::validation.item.page_route_required'),
            'contact_route.*' => Lang::get('menu::validation.item.contact_route_required'),
            'flight_landingpage_route.*' => Lang::get('menu::validation.item.flight_landingpage_route_required'),
        ];

        $this->validate($request, $validationRules, $messages);

        $menuItem->menu_id = $menu->id;

        $menuItem->title = $request->get("title");
        $menuItem->slug = str_slug($request->get("title"));
        $menuItem->type = $request->get("type");

        if($menuItem->type == "custom"){
            $menuItem->value = $request->get("fix_url");
        }else if($menuItem->type == "blog"){
            $menuItem->value = $request->get("blog_route");
        }else if($menuItem->type == "page"){
            $menuItem->value = $request->get("page_route");
        }else if($menuItem->type == "page_category"){
            $menuItem->value = $request->get("page_category_route");
        }else if($menuItem->type == "page_categories"){
            $menuItem->value = implode(",",$request->get("page_categories"));
        }else if($menuItem->type == "contact"){
            $menuItem->value = $request->get("contact_route");
        }else if($menuItem->type == "flight_landingpage"){
            $menuItem->value = $request->get("flight_landingpage_route");
        }else if($menuItem->type == "product_category"){
            $menuItem->value = $request->get("product_category_route");
        }else if($menuItem->type == "product_categories"){
            $menuItem->value = implode(",",$request->get("product_categories"));
        }

        $menuItem->save();

        return redirect()->route("backend.menu.item.edit", ['menu' => $menu->id, 'menu_item' => $menuItem->id])->withSuccess( __('backend.save_success') );
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Menu $menu, MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route("backend.menu.item.index", [$menu->id])->withSuccess( __('backend.delete_success') );
    }

    public function order(Request $request, Menu $menu){
        $items = $request->all();
        foreach ($items as $key => $item){
            $menuItem = MenuItem::find($item);
            $menuItem->order = $key;
            $menuItem->save();
        }
    }
}
