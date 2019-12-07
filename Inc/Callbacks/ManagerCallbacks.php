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

        return ( isset($input) ? true : false );

    }

    public function adminSectionManager()
    {
        echo "Manage the Sections and Features of this plugin by Activating Checkboxes";
    }

    public function checkboxField( $args )
    {
        $name = $args['labels_for'];
        $classes = $args['class'];
        $toggle  = $args['data-toggle'];
        $checkbox = get_option( $name );

        echo '<input type="checkbox" class="'.$classes.'" id = "'.$name.'" name = "'.$name.'" value="1" 
         '.($checkbox ? 'checked' : '').' data-toggle="'.$toggle.'">';
    }
   
 }
?>