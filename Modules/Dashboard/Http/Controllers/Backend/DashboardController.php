<?php

namespace Modules\Dashboard\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use Analytics;
use Illuminate\Support\Facades\Lang;
use Spatie\Analytics\Period;
use Carbon\Carbon;
use App\Libraries\GoogleAnalytics;
use View;

class DashboardController extends Controller
{

    public function index(Request $request)
    {

        View::share('page_title', Lang::get('dashboard::index.title') );

       return view('dashboard::index');

    }

}
