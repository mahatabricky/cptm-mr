<?php
namespace Cptmmr\Pages\Admin;

class AdminPage{
    

    public function __construct()
    {
        add_action('admin_menu',array($this,'admin_pages'));

    }

    public function admin_pages(){
        add_menu_page('cptm', 'cptm', 'manage_options', 'cptm', array($this,'admin_index'),'dashicons-buddicons-activity',10);
    }
    
    public function admin_index(){
           echo ASSETS;
    }
}
?>