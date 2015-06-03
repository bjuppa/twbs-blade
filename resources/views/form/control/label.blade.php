@unless(empty($label) and empty($name) and empty($html_label))
    <label class="control-label" for="{{ $control_id }}">
        {{-- TODO: The label should have .sr-only option --}}
        @if(isset($html_label))
            {!! $html_label !!}
        @else
            {{ $label or $name }}
        @endif
    </label>
@endunless