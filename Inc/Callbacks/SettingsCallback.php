<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Callbacks;

use Cptmmr\Base\BaseController;

 class SettingsCallback extends BaseController
 {
     
    /**
     * Calling Admin.php file
     *
     * @return void
     */
    public function dashboardTemplates()
     {
         require_once "$this->plugin_path./templates/admin.php";
     }

     /**
      * Calling Cpt.php file
      */

     public function cptTemplates()
     {
         require_once "$this->plugin./templates/Cpt.php";
     }

      /**
      * Calling taxonomydashboard.php file
      */

      public function taxonomiesTemplates()
      {
          require_once "$this->plugin./templates/taxonomydashboard.php";
      }
      
      /**
      * Calling widgetdashboard.php file
      */

      public function widgetTemplates()
      {
          require_once "$this->plugin./templates/widgetdashboard.php";
      }

 }
?>