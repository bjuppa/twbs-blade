# Blade templates for Twitter Bootstrap
A collection of [Laravel Blade templates](http://laravel.com/docs/master/blade) for displaying [Twitter Bootstrap](http://getbootstrap.com) html elements and components.

## Configuration
Add this to your list of providers in config/app.php:
```php
'FewAgency\TwbsBlade\TwbsBladeServiceProvider',
```
## Usage examples

### Single input field
Example:
```php
@include('bsb::input.text', ['name'=>'test', 'label'=>'Your email address'])
```

### Printing a full form
Example:
```php
@include('bsb::form', ['action' => action('ExampleController@update', $model->getKey()), 'model' => $model, 'groups' => [
    'title' => ['label' => 'Name'],
    'content' => ['label' => 'Text', 'help_text' => 'This is displayed next to the input and connected to it with aria-describedby'],
    'number' => ['label' => "A number", 'type'=>'number'],
    'currency_code' => ['type' => 'select', 'label' => "Currency", 'options' => ['SEK' => 'Svenska kronor', 'GBP' => 'British Pounds']],
    '<button type="submit" class="btn btn-default">Save</submit>'
]])
```
The form will contain a hidden csrf-field and by default display validation information next to each field.

#### groups
An array of inputs (or other elements) to display in the form.
Array key is the input `name and each entry is usually an array of input options.

An entry can also be a single string or a non-associative array of strings, and if so they are displayed as strings of html within a `.form-group` element.

#### model (optional)
If supplied, inputs will be pre-filled with corresponding attribute values from this object.

#### action (optional)
Maps directly to the form's `action` attribute. If omitted the form will usually post back to the current page.

#### method (optional)
Maps directly to the form's `method` attribute. Defaults to `POST`, can be set to `GET`.

#### role (optional)
Maps directly to the form's `role` attribute. Defaults to `form`.

#### form_id (optional)
Sets the form's `id` attribute. Defaults to a generated id if omitted.

#### group_form_errors (optional)
Defaults to `false`, but if `true` all error-messages will be displayed together at the top of the form instead of next to their related inputs.
This is useful for forms where validation-messages are not directly related to specific inputs, e.g. login forms.

## Input options

### name
Name of the input, will be posted with the form. This option is pulled from the array key if the full form is used.

### type
Defaults to `text` if omitted. The useful standard implemented types are:

- text
- checkbox
- select
- multiselect
- password

In addition, most HTML5 input types work fine, e.g. `number`, `email`, etc.

### label
Displayed before the input and connected to it via element id's.

### help_text
This is displayed after the input and connected to it with `aria-describedby`.

## Optional configuration
The `bsb` prefix can be changed if you extend the service provider class in your app and set your desired `$package_reference_name` in there
(if you do this, remember to reference your own service provider in your `config/app.php` instead of the one supplied by this package)

You may publish the blade templates to your project's `views/vendor` directory for editing and overriding the original templates:
> php artisan vendor:publish --provider="FewAgency\TwbsBlade\TwbsBladeServiceProvider"
