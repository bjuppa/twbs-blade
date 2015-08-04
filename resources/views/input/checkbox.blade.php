@extends($bsb_pkg_ref.'::form.group', ['no_label' => empty($group_label)])

@section($bsb_pkg_ref.'control_or_group')
    @include($bsb_pkg_ref.'::form.control.checkbox', ['no_label' => !empty($group_label)])
@overwrite