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
       // var_dump($args);
       // return;

        $name = $args['labels_for'];
        $classes = $args['class'];
        $checkbox = get_option( $name );

        echo $name."</br>";

      //  echo '<input type="text" class="regular-text" name = "text_example" value="' .$value. '" placeholder="Write something here!">';
    }
   
 }
?>