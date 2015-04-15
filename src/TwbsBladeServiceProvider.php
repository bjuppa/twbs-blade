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

		//TODO: move this input composer to a class, so it can be registered for other templates
		View::composer($this->package_reference_name . '::input.*', function ($view)
		{
			$data['control_id'] = $this->package_reference_name . $view->form_id . $view->name; //TODO: handle unique id if name is repeated within the form (with arrays?)
			if ( $view->errors->has($view->name) )
			{
				$data['has_errors'] = true;
				//TODO: if errors are to be displayed at start of form, collect this into that section instead
				$view->nest('error_content', $this->package_reference_name . '::form.control.errors',
						[ 'errors' => $view->errors->get($view->name) ]);
			}
			if ( $view->error_content or $view->help_text or $view->help_content )
			{
				$data['control_description_id'] = $data['control_id'] . 'desc';
			}

			$view->with($data);
		});
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
