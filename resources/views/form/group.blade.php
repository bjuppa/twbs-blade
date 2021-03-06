{{-- TODO: add optional has-feedback (icon) if textual form-group --}}
{{-- TODO: add size options to form-group --}}
<div class="{{ empty($no_group) ? 'form-group' : '' }} {{ empty($has_error) ? '' : 'has-error' }}">
    {{-- TODO: Put col-size around label to handle horizontal forms --}}
    @if(empty($no_label))
        @include($bsb_pkg_ref.'::form.control.label')
    @endif

    {{-- TODO: open a div for the 2nd column here for horizontal forms --}}

    @yield($bsb_pkg_ref.'control_or_group') {{-- This section can be a single .form-control or one wrapped in .input-group --}}
    {{-- TODO: add optional form-control-feedback icon just after form control/group --}}

    {{-- TODO: close the 2nd column div here if the description should go in it's own column. Also supply the description block with a col width in this case --}}
    @unless(empty($control_description_id))
        @include($bsb_pkg_ref.'::form.control.description')
    @endunless
    {{-- TODO: close the 2nd column div if open --}}
</div>