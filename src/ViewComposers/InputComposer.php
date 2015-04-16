<?php

namespace FewAgency\TwbsBlade\ViewComposers;

use Illuminate\Contracts\View\View;

class InputComposer {

	/**
	 * Bind data to the view.
	 *
	 * @param  View $view
	 *
	 * @return void
	 */
	public function compose(View $view)
	{
		//TODO: throw error if $view->name not set
		$data['control_id'] = $view->bsb_pkg_ref . $view->form_id . $view->name; //TODO: handle unique id if name is repeated within the form (with arrays?)
		if ( $view->errors->has($view->name) )  //TODO: make this pull out a named form's errors
		{
			$data['has_error'] = true;
			//TODO: if errors are to be displayed at start of form, collect this into that section instead
			$view->nest('error_content', $view->bsb_pkg_ref . '::form.control.errors',
					[ 'errors' => $view->errors->get($view->name) ]);
		}
		if ( $view->error_content or $view->help_text or $view->help_content )
		{
			$data['control_description_id'] = $data['control_id'] . 'desc';
		}

		$view->with($data);
	}

}