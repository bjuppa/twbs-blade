@extends($bsb_pkg_ref.'::form.group')

<?php
if (!isset($options_html)) {
    $options_html = '';
    if (!isset($selected_values)) {
        $selected_values = [];
    }
    if (empty($selected_values)) {
        $selected_values = old($name, empty($model->$name) ? null : $model->$name);
    }
    $selected_values = (array)$selected_values;
    $options_name = $name . "_options";
    if (empty($options) and !empty($model->$options_name)) {
        $options = $model->$options_name;
    } else {
        $options = [];
    }
    foreach ((array)$options as $option_value => $option_display) {
        $option_attributes = ['value' => $option_value];
        if (in_array($option_value, $selected_values)) {
            $option_attributes['selected'] = true;
        }
        $options_html .= bsb_html('option', $option_attributes, e($option_display));
    }
}
?>

@section($bsb_pkg_ref.'control_or_group')
    @include($bsb_pkg_ref.'::form.control.select')
@overwrite