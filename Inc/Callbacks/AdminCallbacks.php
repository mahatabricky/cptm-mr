<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Callbacks;

use Cptmmr\Base\BaseController;

 class AdminCallbacks extends BaseController
 {
     
    /**
     * Calling Admin.php file
     *
     * @return void
     */
    public function dashboardTemplates()
     {
         return require_once "$this->plugin_path./templates/admin.php";
     }

     /**
      * Calling Cpt.php file
      */

     public function cptTemplates()
     {
        return require_once "$this->plugin_path./templates/Cpt.php";
     }

      /**
      * Calling taxonomydashboard.php file
      */

      public function taxonomiesTemplates()
      {
          return require_once "$this->plugin_path./templates/taxonomydashboard.php";
      }
      
      /**
      * Calling widgetdashboard.php file
      */

      public function widgetTemplates()
      {
          return require_once "$this->plugin_path./templates/widgetdashboard.php";
      }

      public function cptmrOptionsGroup( $input )
      {
          return $input;
      }

      public function cptmrAdminSection()
      {
          echo "this is beautiful admin section ";
      }

      public function cptmrTextExample()
      {
   
        $value = esc_attr( get_option( 'text_example' ) );

        echo '<input type="text" class="regular-text" name = "text_example" value="' .$value. '" placeholder="Write something here!">';
      
    }

 }
?>