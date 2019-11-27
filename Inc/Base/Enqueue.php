<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Base;

use Cptmmr\Base\BaseController;

 class Enqueue extends BaseController
 {
     /**
      * Calling Wordpress Hook admin_enqueue_scripts for loading the wordpress 
      * Admin Scripts 
      *
      * @return
      */
     public function register(){
           add_action('admin_enqueue_scripts',array($this,'enqueue'));
     }
     /**
      *  Referring Scripts via wordpress core wp_enqueue_style,wp_enqueue_style methods
      *return
      */

      public function enqueue(){
        wp_enqueue_style('mypluginstyle',$this->plugin_url.'assets/css/mystyle.css');
        wp_enqueue_script('mypluginscript',$this->plugin_url.'assets/js/myscript.js');
      }

 }
 
?>