<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocaleController extends Controller {

    public function changeLocale(Request $request, $locale)
    {
        \Session::put('locale', $locale);
        \Loc::setDefaultLocale($locale);
        return $this->returnRedirect($request);
    }

    private function returnRedirect(Request $request){
        return redirect("/");
    }

}
