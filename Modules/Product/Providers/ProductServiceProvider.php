<?php

namespace Modules\Product\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {

        Route::model('product_category', '\Modules\Product\Entities\ProductCategory');
        Route::model('product', '\Modules\Product\Entities\Product');
        Route::model('product_image', '\Modules\Product\Entities\ProductImage');
        Route::model('product_attribute', '\Modules\Product\Entities\ProductAttribute');
        Route::model('product_product_attribute', '\Modules\Product\Entities\ProductProductAttribute');
        Route::model('product_option_key', '\Modules\Product\Entities\ProductOptionKey');
        Route::model('product_option_key_value', '\Modules\Product\Entities\ProductOptionKeyValue');

        Route::bind('product_category_slug', function ($value, $route) {

            $result = \Modules\Product\Entities\ProductCategoryTranslation::where('slug', $value)->firstOrFail();

            $locale = \Loc::getDefaultLocale();
            if($result->locale != $locale){
                $url = \Request::segments();
                $url[0] = $result->locale;

                $compiledPaths = implode("/", $url);

                return redirect($compiledPaths)->send();

            }

            if($result && $result->slug == $value){
                return \Modules\Product\Entities\ProductCategory::whereTranslation('slug', $value)->firstOrFail();
            }
            abort(404);

        });

        Route::bind('product_slug', function ($value, $route) {

            $result = \Modules\Product\Entities\ProductTranslation::where('slug', $value)->firstOrFail();

            $locale = \Loc::getDefaultLocale();
            if($result->locale != $locale){
                $url = \Request::segments();
                $url[0] = $result->locale;

                $compiledPaths = implode("/", $url);

                return redirect($compiledPaths)->send();

            }

            if($result && $result->slug == $value){
                return \Modules\Product\Entities\Product::whereTranslation('slug', $value)->firstOrFail();
            }
            abort(404);

        });

        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('product.php'),
        ], 'config');
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'product'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/product');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/product';
        }, \Config::get('view.paths')), [$sourcePath]), 'product');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/product');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'product');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'product');
        }
    }

    /**
     * Register an additional directory of factories.
     * 
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production')) {
            app(Factory::class)->load(__DIR__ . '/../Database/factories');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
