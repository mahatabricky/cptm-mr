<?php 
/**
 * @package cptm-mr
 */
namespace Cptmmr\Pages;
class Admin {

    public function register(){
        add_action('admin_menu',array($this,'add_admin_pages'));
    }

    public function add_admin_pages(){
        add_menu_page('Cptmmr Plugin','CPTMMR Plugin','manage_options','cptmmr_plugin',array($this,'admin_index'),'dashicons-store',110);
    }
    
    public function admin_index(){
        require_once PLUGIN_PATH.'templates/Admin.php';
    }
}
?>