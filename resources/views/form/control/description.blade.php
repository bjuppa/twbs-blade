<div id="{{ $control_description_id }}">
	{!! $error_content or '' !!}
	@if(isset($help_text))
		@include($bsb_pkg_ref.'::form.help-block', ['content' => e($help_text), 'tag' => isset($help_block_tag) ? $help_block_tag : 'span'])
	@endif
	@if(isset($help_content))
		@include($bsb_pkg_ref.'::form.help-block', ['content' => $help_content, 'tag' => isset($help_block_tag) ? $help_block_tag : 'div'])
	@endif
</div>