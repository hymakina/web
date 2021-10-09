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


class MeController extends Controller
{

    public function __construct()
    {
        View::share('page_title', Lang::get('admin::index.me.profile') );
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $admin = Auth::guard("admin")->user();
        return view('admin::backend.me.index', ['admin' => $admin]);
    }

    public function update(Request $request)
    {

        $admin = Auth::guard("admin")->user();
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:admins,id,' . $admin->id,
            'password'=>'nullable|min:6|confirmed',
        ]);

        $admin->name = $request->get("name");
        $admin->lastname = $request->get("lastname");
        $admin->email = $request->get("email");

        if($request->has("password") && $request->get("password") != ""){
            $admin->password = $request->get("password");
        }

        $admin->save();
        return redirect()->route("backend.admin.me.index")->withSuccess( __('backend.save_success') );
    }

}
