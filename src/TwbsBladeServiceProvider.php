<?php namespace FewAgency\TwbsBlade;

//Some hints for setting up package dev: https://laracasts.com/discuss/channels/tips/developing-your-packages-in-laravel-5

use Illuminate\Support\ServiceProvider;
use View;

class TwbsBladeServiceProvider extends ServiceProvider {

	/**
	 * @var string The name to use throughout the app for referencing this package's views, configs, etc (using
	 *      double-colon syntax). Override this by creating your own service provider in your app that extends this one.
	 */
	public $package_reference_name = 'bsb';


	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$viewPath = __DIR__ . '/../resources/views';
		$this->loadViewsFrom($viewPath, $this->package_reference_name);

		$this->publishes([
				$viewPath => base_path('resources/views/vendor/' . $this->package_reference_name),
		], 'views');

		View::share('bsb_pkg_ref', $this->package_reference_name);

		View::composer($this->package_reference_name . '::input.*', 'FewAgency\TwbsBlade\ViewComposers\InputComposer');
		View::composer($this->package_reference_name . '::form', 'FewAgency\TwbsBlade\ViewComposers\FormComposer');
	}


	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
