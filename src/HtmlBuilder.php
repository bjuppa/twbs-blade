<?php namespace FewAgency\TwbsBlade;


class HtmlBuilder
{

    public static function element($tag_name, $attributes = [], $content = "")
    {
        $html_string = "<$tag_name";
        //TODO: add attributes
        $html_string .= $content ? ">$content</$tag_name>" : "/>";
        return $html_string;
    }
}