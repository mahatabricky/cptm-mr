<?php
/**
 * @package cptm-mr
 */
namespace Cptmmr\Base;

 class Enqueue {
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
        wp_enqueue_style('mypluginstyle',PLUGIN_URL.'assets/css/mystyle.css');
        wp_enqueue_script('mypluginscript',PLUGIN_URL.'assets/js/myscript.js');
      }

 }
?>