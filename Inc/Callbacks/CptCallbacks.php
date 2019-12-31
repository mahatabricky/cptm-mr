<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Callbacks;


class CptCallbacks {


    public function cptSanitize( $input )
    {
        return $input;
    }

    public function cptSectionManager()
    {
        echo "Fillup the form to register new custom post type";
    }

    public function textField( $args )
    {
        echo '<input type="text" name="post_type_name" id="post_type_name" placeholder="Eg.post type">';
    }

    public function checkboxField( $args )
    {
        $name = $args['labels_for'];
        $classes = $args['class'];
        $toggle  = $args['data-toggle'];
        $option_name = $args['option_name'];

        $checkbox = get_option( $option_name );

         echo '<input type="checkbox" class="'.$classes.'" id = "'.$name.'" name = "'.$option_name.'['.$name.']" 
         value="1" '.($checkbox[$name] ? 'checked' : '').' data-toggle="'.$toggle.'">';
    }


}