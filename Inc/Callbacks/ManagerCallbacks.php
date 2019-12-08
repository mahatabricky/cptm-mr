<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Callbacks;

use Cptmmr\Base\BaseController;

 class ManagerCallbacks extends BaseController
 {
     
    public function checkboxSanitize( $input )
    {

        $output = array();

        foreach( $this->managers as $key => $value ){
            $output[$key] = !empty( $input[$key] )? true : false;
        }
       
        return $output;

    }

    public function adminSectionManager()
    {
        echo "Manage the Sections and Features of this plugin by Activating Following Checkboxes";
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
?>