<?php 
/**
 * @package cptm-mr
 */
namespace Cptmmr\Pages;
use Cptmmr\Base\BaseController;
class Admin extends BaseController
{

    public function register(){
        add_action('admin_menu',array($this,'add_admin_pages'));
    }

    public function add_admin_pages(){
        add_menu_page('Cptmmr Plugin','CPTMMR Plugin','manage_options','cptmmr_plugin',array($this,'admin_index'),'dashicons-store',110);
    }
    
    public function admin_index(){
        require_once $this->plugin_path.'templates/Admin.php';
    }
}
?>