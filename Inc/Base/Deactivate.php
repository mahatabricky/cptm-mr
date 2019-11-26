<?php 
/**
 * @package cptm-mr
 */
namespace Cptmmr\Base;

 class Deactivate {
  
    /**
     * Deactivate the plugin
     */
    public static function deactivate(){
        flush_rewrite_rules();
    }

 }
?>