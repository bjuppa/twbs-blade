<?php
if (empty($input_attributes)) {
    $input_attributes = [];
}
if (empty($input_attributes['type'])) {
    $input_attributes['type'] = 'text';
}
if (!empty($type)) {
    $input_attributes['type'] = $type;
}
$default_attributes = ['class' => 'form-control', 'value' => old($name)];
if (!empty($control_description_id)) {
    $default_attributes['aria-describedby'] = $control_description_id;
}
if (!empty($has_error)) {
    $default_attributes['aria-invalid'] = 'true';
}
$force_attributes = ['id' => $control_id, 'name' => $name];
if ($input_attributes['type'] == 'password') {
    $force_attributes['value'] = null;
}
?>
{!! bsb_html('input', $input_attributes, null, $default_attributes, $force_attributes) !!}