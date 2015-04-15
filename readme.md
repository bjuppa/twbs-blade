# Blade templates for Twitter Bootstrap
http://getbootstrap.com
http://laravel.com/docs/master/templates

Add this to your list of providers in config/app.php:
> 'FewAgency\TwbsBlade\TwbsBladeServiceProvider',

Then pull in the package's views like this:
> @include('bsb::input.text', ['name'=>'test', 'type'=>'email', 'label'=>'Your email address'])

## Optional stuff
The 'bsb' prefix can be changed if you extend the service provider class in your app and set your desired $package_reference_name in there
(if you do this, remember to reference your own service provider in your config/app.php instead of the one supplied by this package)

You may publish the templates to your project's views/vendor directory for editing and overriding the original templates:
> php artisan vendor:publish --provider="FewAgency\TwbsBlade\TwbsBladeServiceProvider"
