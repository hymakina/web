<?php

use Modules\Translation\Setting as TranslationSetting;

function _uit($key, $placeholder = false, $toLocale = null)
{

    $conditions = ['type' => 'frontend'];
    $translation = Loc::translate($key, $toLocale, $placeholder, $conditions);


    if (TranslationSetting::get("is_translation_activated") && Auth::guard('admin')->check() && Auth::guard('admin')->user()->can('translation')) {
        return prepareTranslationHtml($key, $placeholder, $translation);
    }

    if($placeholder){
        return 'placeholder="'.$translation.'"';
    }

    return $translation;
}

function prepareTranslationHtml($key, $placeholder, $translation){

    $data = new \stdClass();
    $data->key = $key;

    if($placeholder){
        return 'data-placeholder="true" data-title="'.getOriginalTitle($key).'" data-key="'.encryptData($data).'" data-value="'.$translation.'" data-uitranslation="true" placeholder="Click To Translate: '.$translation.'"  ';
    }

    return '<label data-placeholder="false" data-title="'.getOriginalTitle($key).'" data-key="'.encryptData($data).'" data-value="'.$translation.'" data-uitranslation="true" class="translation-title-container" style="margin: 0; padding: 0">'.$translation.'</label>';
}

function getOriginalTitle($key){
    $tmp = explode('.', $key);
    return end($tmp);
}
