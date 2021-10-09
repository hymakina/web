<?php
/**
 * Created by PhpStorm.
 * User: emrahar
 * Date: 25.01.2019
 * Time: 22:08
 */

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SiteSettingFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SiteSetting';
    }
}