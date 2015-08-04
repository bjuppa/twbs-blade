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

## Form options
Each form will contain a hidden csrf-field and by default display validation information next to each input.

### groups
An array of inputs (or other elements) to display in the form.
Array key is the input `name` and each entry is usually an array of input options.

An entry can also be a single string or a non-associative array of strings, and if so they are displayed as strings of html within a `.form-group` element.

### model (optional)
If supplied, inputs will be pre-filled with corresponding attribute values from this object.

### action (optional)
Maps directly to the form's `action` attribute. If omitted the form will usually post back to the current page.

### method (optional)
Maps directly to the form's `method` attribute. Defaults to `POST`, can be set to `GET`.

### role (optional)
Maps directly to the form's `role` attribute. Defaults to `form`.

### form_id (optional)
Sets the form's `id` attribute. Defaults to a generated id if omitted.

### group_form_errors (optional)
Defaults to `false`, but if `true` all error-messages will be displayed together at the top of the form instead of next to their related inputs.
This is useful for forms where validation-messages are not directly related to specific inputs, e.g. login forms.


## Input options

### name
Name of the input, will be posted with the form. This option is pulled from the array key if the `bsb::form` template is used.

### type
Defaults to `text` if omitted. The implemented types are:

- text
- checkbox
- select
- multiselect
- password

In addition, most HTML5 input types work fine, e.g. `number`, `email`, etc.
The multiselect types will automatically add brackets to the form input's name to access selected values as an array at the server side.

### label/html_label
Displayed before the input and connected to it via element's id. Defaults to `name` if not supplied. 

### help_text/html_help_text
This is displayed after the input and connected to it with `aria-describedby`.

### help_block_tag
This can override the type of html element that contains the help text. If not set `span` is used around `help_text` and `div` around `html_help_text`.

### no_label
Set this to `true` to not display any label for the form-group.

### group_label
Set this to `true` on checkboxes to display the group-label instead of having the label within the input-tag.

### no_group
Set to `true` to not have a `.form-group` class on the input's grouping div. Useful for keeping a list of checkboxes closer together.

### value
Can be used to specifically set the `value` attribute of the input.
The value is usually automatically pulled from old input or from a model.
The value defaults to 1 for checkboxes.

### selected_values
Can be used with selects and multiselects to specify the pre-selected value or an array of pre-selected values.
This is usually automatically pulled from old input or from a model.

### checked
Set to `true` on a checkbox to make it pre-selected.
Otherwise the checked-status is pulled from old input or from a model.

### options/options_html
Can be used with selects and multiselects to specify the list of available options.
`options_html` is used as raw output within the select tag.
`options` can be an array of label strings with the corresponding values as keys.
If no options are specified, the supplied `model` will be checked for a property called *inputname*_options.

### input_attributes
Array of extra html attributes (keys and values) to put on the input element.
Boolean attributes (like `disabled`) can be set to `true` for the desired effect.
If the `class` attribute is set here it's value is merged with any other classes that have been set automatically.


## Optional package configuration
The `bsb` prefix can be changed if you extend the service provider class in your app and set your desired `$package_reference_name` in there
(if you do this, remember to reference your own service provider in your `config/app.php` instead of the one supplied by this package)

You may publish the blade templates to your project's `views/vendor` directory for editing and overriding the original templates:
> php artisan vendor:publish --provider="FewAgency\TwbsBlade\TwbsBladeServiceProvider"
