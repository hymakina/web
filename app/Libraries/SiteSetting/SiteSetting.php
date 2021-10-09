<?php
/**
 * Created by PhpStorm.
 * User: emrahar
 * Date: 25.01.2019
 * Time: 22:06
 */

namespace App\Libraries\SiteSetting;

class SiteSetting extends JsonSiteSettingStore
{

    public function get($key, $default = null)
    {
        return parent::get($key, $default);
    }

}