<?php namespace FewAgency\TwbsBlade;


class HtmlBuilder
{

    public static $void_elements = [
        'area',
        'base',
        'br',
        'col',
        'embed',
        'hr',
        'img',
        'input',
        'keygen',
        'link',
        'menuitem',
        'meta',
        'param',
        'source',
        'track',
        'wbr'
    ];

    public static function element(
        $tag_name,
        $attributes = [],
        $content = null,
        $default_attributes = [],
        $forced_attributes = []
    ) {
        $html_string = "<$tag_name";
        $html_string .= self::compileAttributes($attributes, $default_attributes, $forced_attributes);
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
    protected static function compileAttributes($attributes = [], $default_attributes = [], $forced_attributes = [])
    {
        $combined_attributes = self::combineAttributes($attributes, $default_attributes, $forced_attributes);

        return self::generateAttributesString($combined_attributes);
    }

    /**
     * Clean an array of attributes so that numeric keys are replaced with their respective values
     * @param array $attributes
     * @return array
     */
    protected static function cleanNumericAttributeKeys($attributes = [])
    {
        $result = [];
        foreach ($attributes as $key => $value) {
            if (is_int($key)) {
                if (is_array($value) or is_int($value) or empty($value)) {
                    //TODO: log warning: value is not valid for usage as attribute key
                } else {
                    $result[$value] = true;
                }
            } else {
                $result[$key] = $value;
            }
        }

        return $result;
    }

    /**
     * Combine attribute arrays into one array
     * @param array $attributes Overwrites defaults
     * @param array $default_attributes Defaults
     * @param array $forced_attributes Overwrites all
     * @return array
     */
    protected static function combineAttributes($attributes = [], $default_attributes = [], $forced_attributes = [])
    {
        //Start with the defaults
        $combined_attributes = self::cleanNumericAttributeKeys($default_attributes);
        //Merge in the rest
        foreach (self::cleanNumericAttributeKeys($attributes) as $key => $value) {
            if ($key == 'class' and isset($combined_attributes[$key])) {
                //The class attribute is merged from arrays of classes, defaults are not overwritten
                $combined_attributes[$key] = array_merge((array)$combined_attributes[$key], (array)$value);
            } else {
                //All other defaults are overwritten
                $combined_attributes[$key] = $value;
            }
        }
        //Overwrite with any forced attributes
        $combined_attributes = self::cleanNumericAttributeKeys($forced_attributes) + $combined_attributes;

        return $combined_attributes;
    }

    /**
     * Make string of attributes for use in html tag
     * @param array $attributes
     * @return string
     */
    protected static function generateAttributesString($attributes = [])
    {
        $attribute_strings = [];
        foreach ($attributes as $attribute_name => $attribute_value) {
            if ($attribute_value !== false and !is_null($attribute_value)) {
                if (is_array($attribute_value)) {
                    //This attribute is a list of several values, check each value and build a string from them
                    $values = [];
                    foreach ($attribute_value as $key => $value) {
                        if (is_int($key)) {
                            //If the key is numeric, the value is put in the list
                            $values[] = $value;
                        } elseif ($value) {
                            //If the key is a string, it's put in the list if the value is truthy
                            $values[] = $key;
                        }
                    }
                    $attribute_value = implode($attribute_name == 'class' ? ' ' : ',', $values);
                }
                if ($attribute_value === true) {
                    $attribute_strings[] = e($attribute_name);
                } else {
                    $attribute_strings[] = e($attribute_name) . '="' . e($attribute_value) . '"';
                }
            }
        }

        return empty($attribute_strings) ? '' : ' ' . implode(' ', $attribute_strings);
    }
}