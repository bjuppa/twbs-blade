<?php

namespace FewAgency\TwbsBlade\ViewComposers;

use Illuminate\Contracts\View\View;

class InputComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View $view
     *
     * @throws \Exception
     */
    public function compose(View $view)
    {
        if (empty($view->name) and !str_contains($view->getName(), ['csrf', 'group'])) {
            throw new \Exception('Input needs a "name" parameter set in ' . $view->getPath());
        }
        $data['control_id'] = $view->bsb_pkg_ref . $view->form_id . $view->name; //TODO: handle unique id if name is repeated within the form with [] array syntax and radios/checkboxes
        if ($view->errors->has($view->name))  //TODO: also pull out a named form's errors
        {
            $data['has_error'] = true;
            if (!$view->group_form_errors) {
                $view->nest('control_error_content', $view->bsb_pkg_ref . '::form.control.errors', ['errors' => $view->errors->get($view->name)]);
            }
        }

        if ($view->control_error_content or $view->help_text or $view->html_help_text) {
            $data['control_description_id'] = $data['control_id'] . 'desc';
        }

        $view->with($data);
    }

}