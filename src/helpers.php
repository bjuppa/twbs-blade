<?php

if (!function_exists('bsb_html')) {
    /**
     * Generate a HTML element as a string.
     *
     * @param string $tag_name
     * @param array $attributes
     * @param string $html_content
     * @param array $default_attributes
     * @param array $forced_attributes
     * @return string
     */
    function bsb_html($tag_name, $attributes = [], $html_content = null, $default_attributes = [], $forced_attributes = [])
    {
        return app('FewAgency\TwbsBlade\HtmlBuilder')->element($tag_name, $attributes, $html_content, $default_attributes, $forced_attributes);
    }
}