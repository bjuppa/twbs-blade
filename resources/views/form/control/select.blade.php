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
if (!empty($input_attributes['multiple'])) {
    $force_attributes['name'] = str_finish($force_attributes['name'], '[]');
}
?>
{!! bsb_html('select', $input_attributes, $options_html, $default_attributes, $force_attributes) !!}