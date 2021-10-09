<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App;

class HomeController extends Controller
{

    public function index() {

        return redirect()->route('backend.dashboard.index', null,301);
    }

}
