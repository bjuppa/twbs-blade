<div id="{{ $control_description_id }}">
	{!! $error_content or '' !!}
	@unless(empty($help_text))
		@include($bsb_pkg_ref.'::form.help-block', ['content' => e($help_text), 'tag' => empty($help_block_tag) ? 'span' : $help_block_tag])
	@endunless
	@unless(empty($help_content))
		@include($bsb_pkg_ref.'::form.help-block', ['content' => $help_content, 'tag' => empty($help_block_tag) ? 'div' : $help_block_tag])
	@endunless
</div>