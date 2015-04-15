<input type="{{ $type or 'text' }}"
       name="{{ $name }}"
       class="form-control"
       id="{{ $control_id }}"
@if(isset($control_description_id))
       aria-describedby="{{ $control_description_id }}"
       @endif
       value="{{ old($name, isset($value) ? $value : null) }}"
		       >