<form role="{{ $role or 'form' }}" method="{{ $method or 'POST' }}"
@unless(empty($action))
      action="{{ $action }}"
        @endunless
@unless(empty($form_id))
      id="{{ $form_id }}"
        @endunless
        >
    @include($bsb_pkg_ref.'::input.csrf')
    @unless(empty($form_error_content))
    <div class="form-group has-error">
        {!! $form_error_content !!}
    </div>
    @endunless
    @foreach($groups as $group_html)
        {!! $group_html !!}
    @endforeach
</form>