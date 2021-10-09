<?php

namespace App\Providers;

use Validator;
use Session;
use Form;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('has_user', function($attribute, $value, $parameters, $validator) {
            $user = \App\User::where('email', '=', $value)->first();
            return $user ? true : false;
        });
        Validator::extend('any_user', function($attribute, $value, $parameters, $validator) {
            $user = \App\User::where('email', '=', $value)->first();
            return $user ? false : true;
        });
        Form::macro('bootstrap', function($name, $label, $error, $callback) {
			echo sprintf(
				'<div class="form-group %s">
				  <label class="control-label">%s</label>
				  %s
				  %s
				</div>', 
				$error ? 'has-error' : '',
				$label,
				$callback($name), 
				'<span class="help-block">'.$error.'</span>'
			);
		});
        Form::macro('flight', function($name, $label, $error, $callback) {
            echo sprintf(
                '<label>%s</label><div class="theme-payment-page-form-item form-group">
				  %s
				  %s
				  </div>',
                $label,
                $callback($name),
                ($error != "" ? "<span class=\"help-block\">$error</span>" : "")
            );
        });
        Form::macro('selectCustom', function($name, $label, $error, $callback) {
            echo sprintf(
                '<label>%s</label><div class="theme-payment-page-form-item form-group"><i class="fa fa-angle-down"></i>
				  %s
				  %s
				  </div>',
                $label,
                $callback($name),
                '<span class="help-block">'.$error.'</span>'
            );
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
