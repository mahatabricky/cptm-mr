<?php

/**
 * @package cptm-mr
 */

namespace Cptmmr\Callbacks;

/**
 *  Handle Custom post type callbacks
 * @category Callbacks
 * @author   <mahatabricky@gmail.com>
 * 
 */

class CptCallbacks
{

    /**
     * Sanitize user input
     * @param array $input
     * @return void
     */
    public function cptSanitize($input)
    {
        return $input;
    }

    /**
     * Generate Custom post type section 
     * @return String
     */

    public function cptSectionManager()
    {
        echo "Fillup the form to register new custom post type";
    }

    /**
     * Generate text field 
     * @param mixed $args
     * @return  void
     */
    public function textField($args)
    {

        $name = $args['labels_for'];

        $option_name = $args['option_name'];

        $title = $args['title'];

        echo '<input type="text" name="' . $name . '" id="' . $name . '" placeholder="' . $title . '">';
    }

    /**
     * Generate Text Area field
     * param array $args
     * return void
     */

    public function testAreaField($args)
    {
        $name = $args['labels_for'];

        $option_name = $args['option_name'];

        $title = $args['title'];

        echo '<textarea  name="' . $name . '" id="' . $name . '" placeholder="' . $title . '" rows="4" cols="18"> </textarea>';
    }

    /**
     *  Generate Checkbox field
     * @param mixed $args
     * @return void
     */
    public function checkboxField($args)
    {
        $name = $args['labels_for'];
        $classes = $args['class'];
        $toggle  = $args['data-toggle'];
        $option_name = $args['option_name'];

        $checkbox = get_option($option_name);

        echo '<input type="checkbox" class="' . $classes . '" id = "' . $name . '" name = "' . $option_name . '[' . $name . ']" 
         value="1" ' . ($checkbox[$name] ? 'checked' : '') . ' data-toggle="' . $toggle . '">';
    }
}
