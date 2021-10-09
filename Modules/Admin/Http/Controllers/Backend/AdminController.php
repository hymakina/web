<?php

namespace Modules\Admin\Http\Controllers\Backend;

use App\Admin;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;
use View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;


class AdminController extends Controller
{

    public function index()
    {
        View::share('page_title', Lang::get('admin::index.admins') );
        $admins = Admin::orderBy("created_at", "DESC")->get();
        $user = Auth::guard("admin")->user();
        return view('admin::backend.index', ['admins' => $admins, 'user' => $user]);
    }

    public function create()
    {
        return view('admin::backend.create_edit');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:6|confirmed',
        ]);

        $admin = new Admin();
        $admin->name = $request->get("name");
        $admin->lastname = $request->get("lastname");
        $admin->email = $request->get("email");
        $admin->is_active = $request->get("is_active") == 1 ? 1 : 0;

        if($request->has("password") && $request->get("password") != "") {
            $admin->password = $request->get("password");
        }

        $admin->save();

        return redirect()->route("backend.admin.edit", $admin->id)->withSuccess( __('backend.save_success') );
    }

    public function show(Admin $admin)
    {
        return view('admin::backend.show', ['admin' => $admin]);
    }

    public function edit(Admin $admin)
    {
        return view('admin::backend.create_edit', ['admin' => $admin]);
    }

    public function update(Request $request, Admin $admin)
    {

        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:admins,id,' . $admin->id,
            'password'=>'nullable|min:6|confirmed',
        ]);

        $admin->name = $request->get("name");
        $admin->lastname = $request->get("lastname");
        $admin->email = $request->get("email");
        $admin->is_active = $request->get("is_active") == 1 ? 1 : 0;

        if($request->has("password") && $request->get("password") != ""){
            $admin->password = $request->get("password");
        }

        $admin->save();

        return redirect()->route("backend.admin.edit", $admin->id)->withSuccess( __('backend.save_success') );
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route("backend.admin.index")->withSuccess( __('backend.delete_success') );
    }
}
