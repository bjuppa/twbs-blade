{{--
Include to create a full form with error handled inputs.

Usage example:
@include('bsb::form', [ 'groups' => [
	'email' => ['label' => 'Your email', 'type' => 'email'],
	'password' => ['label' => 'Your password', 'type' => 'password'],
	['<button type="submit" class="btn btn-primary">Login</button>', '<a class="btn btn-link" href="'. url('/password/email') .'">Forgot Your Password?</a>' ],
]])

--}}
<form role="{{ $role or 'form'  }}" method="{{ $method or 'POST' }}"
@unless(empty($action))
      action="{{ $action }}"
		@endunless
@unless(empty($form_id))
      id="{{ $form_id }}"
		@endunless
		>
	@include($bsb_pkg_ref.'::input.csrf')
	@foreach($groups as $group_html)
		{!! $group_html !!}
	@endforeach
</form>