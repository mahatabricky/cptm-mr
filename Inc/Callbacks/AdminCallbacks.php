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

    /**
     * Calling gallerydashboard.php file
     * 
     */

    public function galleryTemplates()
    {
        return require_once "$this->plugin_path./templates/gallerydashboard.php";
    }
      
    /**
    *  Calling testimonialdashboard.php file
    */

    public function testimonialTemplates()
    {
        return require_once "$this->plugin_path./templates/testimonialdashboard.php";
    }

    /**
     *  Calling templatesdashboard.php file
     */

    public function templateTemplates()
    {
        return require_once "$this->plugin_path./templates/templatesdashboard.php";
    }

    /**
     *  Calling logindashboard.php file
     */

    public function loginTemplates()
    {
        return require_once "$this->plugin_path./templates/logindashboard.php";
    }

    /**
     *  Calling membershipdashboard.php file
     */

    public function membershipTemplates()
    {
        return require_once "$this->plugin_path./templates/membershipdashboard.php";
    }
    
    /**
     *  Calling chatdashboard.php file
     */

    public function chatTemplates()
    {
        return require_once "$this->plugin_path./templates/chatdashboard.php";
    }    

    //   public function cptmrOptionsGroup( $input )
    //   {
    //       return $input;
    //   }

    //   public function checkboxSanitize( $input )
    //   {
    //       return $input;
    //   }


    // public function cptmrTextExample()
    // {
   
    //     $value = esc_attr( get_option( 'cpt_manager' ) );

    //     echo '<input type="text" class="regular-text" name = "text_example" value="' .$value. '" placeholder="Write something here!">';
      
    // }

    // public function cptmrFirstName()
    // {

    //     $value = esc_attr( get_option( 'taxonomy_manager' ) );

    //     echo '<input type="text" class="regular-text" name = "first_name" value="' .$value. '" placeholder="Write first name here!">';
      
    // }

 }
?>