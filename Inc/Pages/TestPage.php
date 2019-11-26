<?php
/**
 * This is Test Page 
 */
namespace Cptmmr\Pages;

class TestPage {

    public function __construct()
    {
        add_action('admin_menu',array($this,'admin_pages'));

    }

    public function admin_pages(){
        add_menu_page('Test', 'Test', 'manage_options', 'Test', array($this,'admin_index'),'dashicons-buddicons-activity',10);
    }
    
    public function admin_index(){
           echo NAME;
    }
}
?>