# Blade templates for Twitter Bootstrap
A collection of [Laravel Blade templates](http://laravel.com/docs/master/blade) for displaying [Twitter Bootstrap](http://getbootstrap.com) html elements and components.

##Configuration
Add this to your list of providers in config/app.php:
```php
'FewAgency\TwbsBlade\TwbsBladeServiceProvider',
```
##Usage examples
Showing a single input field somewhere in a Blade template:
```php
@include('bsb::input.text', ['name'=>'test', 'label'=>'Your email address'])
```

Printing a full form:
```php
@include('bsb::form', ['action' => action('ExampleController@update', $model->getKey()), 'model' => $model, 'groups' => [
    'title' => ['label' => 'Name'],
    'content' => ['label' => 'Text', 'help_text' => 'This help text is displayed next to the input and connected to it with aria-describedby'],
    'number' => ['label' => "A number", 'type'=>'number'],
    'currency_code' => ['type' => 'select', 'label' => "Currency"],
    '<button type="submit" class="btn btn-default">Save</submit>'
]])
```
## Optional stuff
The 'bsb' prefix can be changed if you extend the service provider class in your app and set your desired $package_reference_name in there
(if you do this, remember to reference your own service provider in your config/app.php instead of the one supplied by this package)

You may publish the blade templates to your project's views/vendor directory for editing and overriding the original templates:
> php artisan vendor:publish --provider="FewAgency\TwbsBlade\TwbsBladeServiceProvider"
