<?php

namespace Modules\Menu\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Modules\Menu\Entities\Menu;
use View;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        View::share('page_title', Lang::get('menu::index.menu.menus'));

        $menus = Menu::orderBy("created_at", "DESC")->get();
        return view('menu::backend.menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        View::share('menu_title', Lang::get('menu::index.menu.create_edit'));
        return view('menu::backend.menu.create_edit');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:120|unique:menus'
        ]);

        $menu = new Menu();
        $menu->name = $request->get('name');
        $menu->short_code = $request->get('short_code');
        $menu->save();

        return redirect()->route("backend.menu.edit", ['menu' => $menu->id])->withSuccess( __('backend.save_success') );
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Menu $menu)
    {
        View::share('menu_title', Lang::get('menu::index.menu.create_edit'));
        return view('menu::backend.menu.create_edit', ['menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, [
            'name'=>'required|max:120|unique:menus,id,' . $menu->id,
        ]);

        $menu->name = $request->get('name');
        $menu->short_code = $request->get('short_code');
        $menu->save();

        return redirect()->route("backend.menu.edit", ['menu' => $menu->id])->withSuccess( __('backend.save_success') );
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Menu $menu)
    {
        try{
            $menu->delete();
        }catch(\Exception $e){
            return redirect()->route("backend.menu.index", [$menu->id])->with("error",  __($e->getMessage()) );
        }

        return redirect()->route("backend.menu.index", [$menu->id])->withSuccess( __('backend.delete_success') );
    }

}
