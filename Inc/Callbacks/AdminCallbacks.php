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

 }
?>