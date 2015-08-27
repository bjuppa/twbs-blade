<?php
if (empty($input_attributes)) {
    $input_attributes = [];
}
$default_attributes = ['class' => 'form-control'];

if (!empty($control_description_id)) {
    $default_attributes['aria-describedby'] = $control_description_id;
}
if (!empty($has_error)) {
    $default_attributes['aria-invalid'] = 'true';
}
$force_attributes = ['id' => $control_id, 'name' => $name];
?>
{!! bsb_html('textarea', $input_attributes, e(old($name, empty($model->$name) ? null : $model->$name)), $default_attributes, $force_attributes) !!}