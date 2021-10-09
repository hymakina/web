<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App;
use Illuminate\Container\Container;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Log;
use Loc;
use Modules\Flight\Entities\Order;
use Modules\Hotel\Entities\HotelContent;
use Countries;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request, Application $app) {
        return view('frontend.main.main');
    }

}
