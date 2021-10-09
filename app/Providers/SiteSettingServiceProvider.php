<?php

namespace App\Providers;

use App\Facades\DynamicSettingFacade;
use App\Facades\ModuleSettingFacade;
use App\Libraries\SiteSetting\SiteSetting;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

class SiteSettingServiceProvider extends ServiceProvider
{

    public function boot()
    {

        foreach (\Module::all() as $module){

            $name = "Modules\\" . $module->getStudlyName() . '\Setting';

            $this->app->singleton($name, function () use ($module){
                $path = $module->getPath() .'/store.json';
                return new SiteSetting($this->app['files'], $path);
            });

            $facade = "Facades\\$name";

            $loader = AliasLoader::getInstance();
            $loader->alias($name, $facade);

        }

        \Module::macro('setting', function ($moduleName) {
            $module = \Module::find($moduleName);
            $name = "Modules\\" . $module->getStudlyName() . '\Setting';
            return $this->app->get($name);
        });

    }
}
