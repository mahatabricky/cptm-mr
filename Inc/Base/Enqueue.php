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
        //wp_enqueue_style( 'mypluginstyle', $this->plugin_url.'assets/css/mystyle.css');
        
        wp_enqueue_style( 'w3css', $this->plugin_url.'assets/css/w3.css');

        wp_enqueue_style( 'bootstrapmin', $this->plugin_url.'assets/css/bootstrap/bootstrap.min.css');

        wp_enqueue_style( 'bootstraptogglemin', $this->plugin_url.'assets/css/bootstrap/bootstrap-toggle.min.css');

        wp_enqueue_style( 'fontawesome', $this->plugin_url.'assets/css/font/font-awesome.min.css');

        wp_enqueue_style( 'mypluginstyle', $this->plugin_url.'assets/css/mystyle.css');
        
        wp_enqueue_script( 'mypluginscript', $this->plugin_url.'assets/js/myscript.js');
        
        wp_enqueue_script( 'jquerycorejs', $this->plugin_url.'assets/js/jquery/jquery-2.1.1.min.js');

        wp_enqueue_script( 'bootstrapminjs', $this->plugin_url.'assets/js/bootstrap/bootstrap.min.js');

        wp_enqueue_script( 'bootstraptoggleminjs', $this->plugin_url.'assets/js/bootstrap/bootstrap-toggle.min.js');

        
      }

 }
 
?>