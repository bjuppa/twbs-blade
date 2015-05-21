<?php

if ( ! function_exists('bsb_html'))
{
    /**
     * Generate a HTML element as a string.
     *
     * @param string $tag_name
     * @param array $attributes
     * @param string $content
     * @return string
     */
    function bsb_html($tag_name, $attributes = [], $content = "")
    {
        return app('FewAgency\TwbsBlade\HtmlBuilder')->element($tag_name, $attributes, $content);
    }
}