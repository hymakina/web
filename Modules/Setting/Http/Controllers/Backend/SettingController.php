<?php

namespace Modules\Setting\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Lang;
use View;

class SettingController extends Controller
{

    public function __construct()
    {
        View::share('page_title', Lang::get('setting::index.settings') );
    }

    public function index()
    {
        return view('setting::backend.index');
    }

    public function update(Request $request)
    {

        $all = \Setting::all();

        $merged = array_replace_recursive($all, $request->except(['_token', '_method']));

        \Setting::set($merged);
        \Setting::save();
        Artisan::call('config:clear');
        return redirect()->route("backend.setting.index");
    }
}
