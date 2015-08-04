<div class="checkbox">{{-- TODO: set class disabled as option --}}
    <label>
        <input type="{{ $type or 'checkbox' }}" name="{{ $name }}" id="{{ $control_id }}"
               value="{{ $value = isset($value) ? $value : 1 }}"
        @if(!empty($checked) or old($name) == $value or !empty($model->$name) )
               checked
                @endif
        @unless(empty($control_description_id))
               aria-describedby="{{ $control_description_id }}"
                @endunless
        @unless(empty($has_error))
               aria-invalid="true"
                @endunless
                {{-- TODO: set attribute disabled as option --}}
                >
        @if(empty($no_label))
            @if(isset($html_label))
                {!! $html_label !!}
            @else
                {{ $label }}
            @endif
        @endif
    </label>
</div>