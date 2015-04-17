@unless(empty($label) and empty($name))
	<label class="control-label" for="{{ $control_id }}">
		{{-- TODO: The label should have .sr-only option --}}
		{{ $label or $name }}
	</label>
@endunless