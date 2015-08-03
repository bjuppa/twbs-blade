<?php namespace FewAgency\TwbsBlade;


class HtmlBuilder
{

    public static $void_elements = ['area', 'base', 'br', 'col', 'embed', 'hr', 'img', 'input', 'keygen', 'link', 'menuitem', 'meta', 'param', 'source', 'track', 'wbr'];

    public static function element($tag_name, $attributes = [], $content = null, $default_attributes = [], $forced_attributes = [])
    {
        $html_string = "<$tag_name";
        $html_string .= self::compile_attributes($attributes, $default_attributes, $forced_attributes);
        $html_string .= (empty($content) and in_array($tag_name, self::$void_elements)) ? '>' : ">$content</$tag_name>";
        return $html_string;
    }

    /**
     * Compile a string of attributes to put inside a html tag element
     * @param array $attributes
     * @param array $default_attributes
     * @param array $forced_attributes
     * @return string
     */
    protected static function compile_attributes($attributes = [], $default_attributes = [], $forced_attributes = [])
    {
        //Start with the defaults
        $combined_attributes = self::clean_numeric_attribute_keys($default_attributes);
        //Merge in the rest
        foreach (self::clean_numeric_attribute_keys($attributes) as $key => $value) {
            if ($key == 'class' and isset($combined_attributes[$key])) {
                //Attribute class is merged from arrays of classes, defaults are not overwritten
                $combined_attributes[$key] = array_merge((array)$combined_attributes[$key], (array)$value);
            } else {
                //All other defaults are overwritten
                $combined_attributes[$key] = $value;
            }
        }
        //Overwrite with any forced attributes
        $combined_attributes = self::clean_numeric_attribute_keys($forced_attributes) + $combined_attributes;

        $attribute_strings = [];
        foreach ($combined_attributes as $key => $value) {
            if ($value !== false and !is_null($value)) {
                if ($value === true) {
                    $value = $key;
                }
                if (is_array($value)) {
                    $value = implode($key == 'class' ? ' ' : ',', $value);
                }
                $attribute_strings[] = $key . '="' . e($value) . '"';
            }
        }

        return empty($attribute_strings) ? '' : ' ' . implode(' ', $attribute_strings);
    }

    /**
     * Clean an array of attributes so that numeric keys are replaced with their respective values
     * @param array $attributes
     * @return array
     */
    protected static function clean_numeric_attribute_keys($attributes = [])
    {
        $result = [];
        foreach ($attributes as $key => $value) {
            if (is_numeric($key)) {
                if (is_array($value) or empty($value) or is_numeric($value)) {
                    //TODO: log warning: value is not a valid key
                } else {
                    $result[$value] = true;
                }
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }
}