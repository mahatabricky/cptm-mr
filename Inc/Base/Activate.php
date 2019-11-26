<?php 
/**
 * @package cptm-mr
 */
namespace Cptmmr\Base;

class Activate {

    /**
     * Activate the plugin
     */
    public static function activate(){
        flush_rewrite_rules();
    }
}
?>