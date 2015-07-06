{{-- TODO: make this show multiple checkboxes (each with different name) --}}
{{-- Should this be in a fieldset? --}}
@extends($bsb_pkg_ref.'::form.group')

@section($bsb_pkg_ref.'control_or_group')
    @include($bsb_pkg_ref.'::form.control.checkbox', ['no_label' => true])
@overwrite