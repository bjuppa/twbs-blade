# Blade templates for Twitter Bootstrap
http://getbootstrap.com
http://laravel.com/docs/master/templates

Add this to your list of providers in config/app.php:
> 'FewAgency\TwbsBlade\TwbsBladeServiceProvider',

Then pull in the package's views like this:
@include('bsb::input', ['name'=>'test', 'type'=>'email', 'label'=>'Your email address'])

## Optional stuff
The 'bsb' prefix can be changed if you extend the service provider in your app and set your desired $package_reference_name
(if you do this, remember to reference your own service provider in your config/app.php)

You may publish the templates to your project's views/vendor directory for editing and overriding the original templates:
> php artisan vendor:publish --provider="FewAgency\TwbsBlade\TwbsBladeServiceProvider"

