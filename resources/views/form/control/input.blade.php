<input type="{{ $type or 'text' }}" name="{{ $name }}" class="form-control" id="{{ $control_id }}"
	@unless($type == 'password')
		value="{{ old($name, isset($value) ? $value : null) }}"
	@endunless
	@unless(empty($control_description_id))
    aria-describedby="{{ $control_description_id }}"
  @endunless
  @unless(empty($has_error))
    aria-invalid="true"
  @endunless
>