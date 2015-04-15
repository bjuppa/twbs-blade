@extends($bsb_pkg_ref.'::form.group')

@section($bsb_pkg_ref.'control_or_group')
	@include($bsb_pkg_ref.'::form.control.input', ['type' => 'text'])
@overwrite