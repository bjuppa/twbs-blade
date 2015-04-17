<?php

namespace FewAgency\TwbsBlade\ViewComposers;

use Illuminate\Contracts\View\View;

class FormComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        if ($view->group_form_errors and $view->errors->any())  //TODO: also pull out a named form's errors
        {
            $view->nest('form_error_content', $view->bsb_pkg_ref . '::form.control.errors', ['errors' => $view->errors->all()]);
        }
        foreach ($view->groups as $name => &$input) {
            if (is_array($input)) {
                if (count(array_filter(array_keys($input), 'is_string'))) {
                    //The array contains named keys, generate inputs from these options
                    $view_name = $view->bsb_pkg_ref . '::input.' . (empty($input['type']) ? 'text' : $input['type']);
                    if(!view()->exists($view_name)) {
                        $view_name = $view->bsb_pkg_ref . '::input.' . 'text';
                    }
                    $input = view($view_name, array_merge(compact('name'), $input), $view->getData());
                } else {
                    //The array contains html strings, display them together within a form-group
                    $input = view($view->bsb_pkg_ref . '::input.group', ['content' => implode("\n", $input)], $view->getData());
                }
            } elseif (!str_contains($input, '.form-group')) {
                //The input is just a string of html, but it doesn't contain any .form-group element, so we'll wrap it in one
                $input = view($view->bsb_pkg_ref . '::input.group', ['content' => $input], $view->getData());
            }
        }
        //TODO: add form-horizontal and form-inline options
    }

}