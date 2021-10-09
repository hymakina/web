<?php

namespace Modules\Translation\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Translation\Entities\UiTranslation;
use View;
use Modules\Translation\Setting as TranslationSetting;
use Loc;

class UiTranslationController extends Controller
{

    public function activateTranslation(Request $request, TranslationSetting $setting){
        $setting::set("is_translation_activated", true);
        $setting::save();
        return $this->returnRedirect($request);
    }

    public function deactivateTranslation(Request $request, TranslationSetting $setting){
        $setting::set("is_translation_activated", false);
        $setting::save();
        return $this->returnRedirect($request);
    }

    private function returnRedirect(Request $request){
        if($request->url() == url()->previous())
            return redirect("/");
        return back();
    }

    public function createOrUpdateForFrontend(Request $request, TranslationSetting $setting)
    {
        if(!$setting::get("is_translation_activated")){
            return;
        }

        $this->validate($request, [
            'key'=>'required',
            'value'=>'required'
        ]);

        $data = decryptData($request->get("key"));

        if (!is_object($data)) {
            return false;
        }

        $conditions = ['type' => 'frontend'];

        Loc::createOrUpdateTranslation($data->key, $request->get('value'), null, $conditions );

    }

}